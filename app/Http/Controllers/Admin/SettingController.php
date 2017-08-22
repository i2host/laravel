<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Setting;
use Custom;
use Validator;

class SettingController extends Controller
{
    private $custom;

    public function __construct() {
        $this->middleware('auth:admin');
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
        $settings = new Setting;
        $datas['datas'] = $settings::all();
        return view('admin.setting.index',$datas);
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
            'name' => 'required|max:240|unique:settings',
            'value' => 'required',
            ];
        }
        else if ($id != "") {
            return [
            'name' => 'required|max:240|unique:settings,name,'.$id,
            'value' => 'required',
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
        $validator = Validator::make($request->all(), $this->rules());
        if ($validator->fails()) {
            $data['success'] = false;
            $data['type'] = 'Add';
            $data['messages'] = $validator->errors();
            return response()->json($data);
        }
        else {
            $setting = new Setting;
            $setting->name = $request->name;
            $setting->value = $request->value;
            if ($setting->save()) {
                $htmldata[] = $setting->name;
                $htmldata[] = $setting->value;

                $data['success'] = true;
                $data['type'] = 'Add';
                $data['id'] = $setting->id;
                $data['htmldata'] = $this->custom->htmldata($htmldata,$setting->id);
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
        $setting = Setting::find($id);
        $datas['data'] = $setting;
        return view('admin.setting.delete',$datas);
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
        $setting = Setting::find($id);
        $datas['data'] = $setting;
        return view('admin.setting.edit',$datas);
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
            $setting = Setting::find($id);
            $setting->name = $request->name;
            $setting->value = $request->value;
            if ($setting->save()) {
                $htmldata[] = $this->custom->htmldata("",$setting->id,'edit');
                $htmldata[] = $setting->name;
                $htmldata[] = $setting->value;
                $data['success'] = true;
                $data['type'] = 'Edit';
                $data['id'] = $setting->id;
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
        $setting = Setting::findOrFail($id);
       if ($setting->delete()) {
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
