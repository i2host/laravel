<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Device;
use Custom;
use Validator;

class DeviceController extends Controller
{
    private $custom;

    public function __construct() {
        $this->custom = new Custom;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $devices = Device::all();
        $datas['datas'] = $devices; 
        return view('device.index',$datas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function rules($id="")
    {
        if ($id == "") {
            return [
            'vpnusername' => 'required|max:240|unique:devices',
            'vpnpassword' => 'required|max:240',
            'mac' => array(
                'required',
                'regex:/^([0-9A-Fa-f]{2}[:-]){5}([0-9A-Fa-f]{2})$/',
                'unique:devices'
            ),
            'type' => 'required|min:6|max:100',
            'model' => 'required',
            'os_version' => array(
                'required',
                'regex:/^[0-9.]+$/'
            ),
            'app_version' => array(
                'required',
                'regex:/^[0-9.]+$/'
            ),
            'pin' => 'required|unique:devices',
            'note' => 'required',
            'active' => 'required',
            ];
        }
        else if ($id != "") {
            return [
            'vpnusername' => 'required|max:240|unique:devices,vpnusername,'.$id,
            'vpnpassword' => 'required|max:240',
            'mac' => array(
                'required',
                'regex:/^([0-9A-Fa-f]{2}[:-]){5}([0-9A-Fa-f]{2})$/',
                'unique:devices,mac,'.$id
            ),
            'type' => 'required|min:6|max:100',
            'model' => 'required',
            'os_version' => array(
                'required',
                'regex:/^[0-9.]+$/'
            ),
            'app_version' => array(
                'required',
                'regex:/^[0-9.]+$/'
            ),
            'pin' => 'required|unique:devices,pin,'.$id,
            'note' => 'required',
            'active' => 'required',
            ];
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->request->add(['pin' => $this->custom->genNum(12)]);
        $validator = Validator::make($request->all(), $this->rules());
        if ($validator->fails()) {
            $data['success'] = false;
            $data['type'] = 'Add';
            $data['messages'] = $validator->errors();
            return response()->json($data);
        }
        else {
            $device = new Device;
            $device->vpnusername = $request->vpnusername;
            $device->vpnpassword = $request->vpnpassword;
            $device->mac = $request->mac;
            $device->type = $request->type;
            $device->model = $request->model;
            $device->os_version = $request->os_version;
            $device->app_version = $request->app_version;
            $device->pin = $request->pin;
            $device->note = $request->note;
            $device->online = 0;
            $device->active  = $request->active;
            if ($device->save()) {
                $htmldata[] = $device->mac;
                $htmldata[] = $device->os_version;
                $htmldata[] = $device->type;
                $htmldata[] = $device->app_version;
                $htmldata[] = $device->model;
                $htmldata[] = $device->last_connect;
                $htmldata[] = $device->last_disconnect;
                $htmldata[] = $device->last_logout;
                $htmldata[] = $device->last_login;
                $htmldata[] = $device->pin;
                $htmldata[] = $device->note;
                $htmldata[] = ($device->online) ? 'Yes' : 'No';
                $htmldata[] = ($device->active) ? 'Yes' : 'No';

                $data['success'] = true;
                $data['type'] = 'Add';
                $data['id'] = $device->id;
                $data['htmldata'] = $this->custom->htmldata($htmldata,$device->id);
                return response()->json($data);
            }
            else {
                $data['success'] = false;
                $data['type'] = 'Add';
                return response()->json($data);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $device = Device::find($id);
        $datas['data'] = $device;
        return view('device.delete',$datas);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $device = Device::find($id);
        $datas['data'] = $device;
        return view('device.edit',$datas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validator = Validator::make($request->all(), $this->rules($id));
        if ($validator->fails()) {
            $data['success'] = false;
            $data['type'] = 'Edit';
            $data['messages'] = $validator->errors();
            return response()->json($data);
        }
        else {
            $device = Device::find($id);
            $device->vpnusername = $request->vpnusername;
            $device->vpnpassword = $request->vpnpassword;
            $device->mac = $request->mac;
            $device->type = $request->type;
            $device->model = $request->model;
            $device->os_version = $request->os_version;
            $device->app_version = $request->app_version;
            $device->pin = $request->pin;
            $device->note = $request->note;
            $device->active  = $request->active;
            if ($device->save()) {
                $htmldata[] = $this->custom->htmldata("",$device->id,'edit');
                $htmldata[] = $device->mac;
                $htmldata[] = $device->os_version;
                $htmldata[] = $device->type;
                $htmldata[] = $device->app_version;
                $htmldata[] = $device->model;
                $htmldata[] = $device->last_connect;
                $htmldata[] = $device->last_disconnect;
                $htmldata[] = $device->last_logout;
                $htmldata[] = $device->last_login;
                $htmldata[] = $device->pin;
                $htmldata[] = $device->note;
                $htmldata[] = ($device->online) ? 'Yes' : 'No';
                $htmldata[] = ($device->active) ? 'Yes' : 'No';
                $data['success'] = true;
                $data['type'] = 'Edit';
                $data['id'] = $device->id;
                $data['htmldata'] = $htmldata;
                return response()->json($data);
            }
            else {
                $data['success'] = false;
                $data['type'] = 'Edit';
                return response()->json($data);
            }
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $device = Device::findOrFail($id);
       if ($device->delete()) {
            $data['success'] = true;
            $data['type'] = 'Delete';
            return response()->json($data);
        }
        else {
            $data['success'] = false;
            $data['type'] = 'Delete';
            return response()->json($data);
        }
    }
}
