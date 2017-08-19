<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Server;
use App\Countrie;
use Custom;
use Validator;
class ServerController extends Controller
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
        $servers = Server::all();
        $countries = Countrie::all();
        $datas['datas'] = $servers;
        $datas['countries'] = $countries; 
        return view('admin.server.index',$datas);
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
            'name' => 'required|max:60|unique:servers',
            'server_ip' => 'required|max:45|unique:servers',
            'file_type' => 'required|min:3|max:3',
            'file' => 'required',
            'countrie_id' => 'required',
            'premium' => 'required',
            ];
        }
        else if ($id != "") {
            return [
            'name' => 'required|max:60|unique:servers,name,'.$id,
            'server_ip' => 'required|max:45|unique:servers,server_ip,'.$id,
            'file_type' => 'required|min:3|max:3',
            'file' => 'required',
            'countrie_id' => 'required',
            'premium' => 'required',
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
            $server = new Server;
            $server->name = $request->name;
            $server->server_ip = $request->server_ip;
            $server->file_type = $request->file_type;
            $server->file = $request->file;
            $server->countrie_id = $request->countrie_id;
            $server->sort = $this->custom->lastsort('servers');;
            $server->premium  = $request->premium;
            $server->active = 0;
            if ($server->save()) {
                $htmldata[] = $server->name;
                $htmldata[] = $request->server_ip;
                $htmldata[] = $server->file_type;
                $htmldata[] = $server->file;
                $htmldata[] = $server->Countrie->name;
                $htmldata[] = $server->sort;
                $htmldata[] = ($server->premium) ? 'Yes' : 'No';
                $htmldata[] = ($server->active) ? 'Yes' : 'No';

                $data['success'] = true;
                $data['type'] = 'Add';
                $data['id'] = $server->id;
                $data['htmldata'] = $this->custom->htmldata($htmldata,$server->id);
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
        $server = Server::find($id);
        $datas['data'] = $server;
        return view('admin.server.delete',$datas);
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
        $server = Server::find($id);
        $Countires = Countrie::all();
        $datas['data'] = $server;
        $datas['countries'] = $Countires;
        return view('admin.server.edit',$datas);
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
            $server = Server::find($id);
            $server->name = $request->name;
            $server->server_ip = $request->server_ip;
            $server->file_type = $request->file_type;
            $server->file = $request->file;
            $server->countrie_id = $request->countrie_id;
            $server->sort  = $request->sort;
            $server->premium  = $request->premium;
            $server->active  = $request->active;
            if ($server->save()) {
                $htmldata[] = $this->custom->htmldata("",$server->id,'edit');
                $htmldata[] = $server->name;
                $htmldata[] = $server->server_ip;
                $htmldata[] = $server->file_type;
                $htmldata[] = $server->file;
                $htmldata[] = $server->countrie->name;
                $htmldata[] = $server->sort;
                $htmldata[] = ($server->premium) ? 'Yes' : 'No';
                $htmldata[] = ($server->active) ? 'Yes' : 'No';
                $data['success'] = true;
                $data['type'] = 'Edit';
                $data['id'] = $server->id;
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
        $server = Server::findOrFail($id);
       if ($server->delete()) {
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
