<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Server;
use App\Countrie;
use Custom;
use Validator;
class ServerController extends Controller
{
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
        return view('server.index',$datas);
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

    public function rules()
    {
        return [
            'name' => 'required|unique:servers|max:60',
            'file' => 'required',
            'countrie_id' => 'required',
            'premium' => 'required',
        ];
    }

    public function lastsort() {
        $lastsort = new Server;
        $lastsort = $lastsort::orderBy('sort', 'desc')->take(1)->get();
        if (sizeof($lastsort) == 0)
        $lastsort = 1;
        else 
        $lastsort = $lastsort[0]->sort + 1;
        return $lastsort;
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
        $sort = $this->lastsort();
        $server = new Server;
        $server->name = $request->name;
        $server->file = $request->file;
        $server->countrie_id = $request->countrie_id;
        $server->sort = $sort;
        $server->premium  = $request->premium;
        $server->active = 0;
        $server->save();

        $htmldata[] = $server->name;
        $htmldata[] = $server->file;
        $htmldata[] = $server->Countrie->name;
        $htmldata[] = $server->sort;
        $htmldata[] = ($server->premium) ? 'Yes' : 'No';
        $htmldata[] = ($server->active) ? 'Active' : 'Inactive';

        $custom = new Custom;
        $data['success'] = true;
        $data['type'] = 'Add';
        $data['id'] = $server->id;
        $data['htmldata'] = $custom->htmldata($htmldata,$server->id);
        return response()->json($data);
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
    }
}
