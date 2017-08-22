<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Admin\User;
use Custom;
use Validator;

class UserController extends Controller
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
        $users = User::all();
        $datas['datas'] = $users;
        return view('admin.user.index',$datas);
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
            'name' => 'required|unique:users|max:60',
            'last_name' => 'required|max:60',
            'email' => 'required|email|unique:users|max:60',
            'password' => 'required|min:6|max:100',
            'active' => 'required',
            'type' => 'required',
            'points' => 'required',
            'premium' => 'required',
            ];
        }
        else if ($id != "") {
            return [
            'name' => 'required|max:255',
            'last_name' => 'required|max:100',
            'email' => 'required|email|max:60|unique:users,email,'.$id,
            'username' => 'sometimes|max:100|unique:users,username,'.$id,
            'password' => 'sometimes|max:255',
            'type' => 'required',
            'points' => 'required',
            'active' => 'required',
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
        $user = new User;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->type = $request->type;
        $user->points = $request->points;
        $user->premium  = $request->premium;
        $user->active  = $request->active;
        if ($user->save()) {

        $htmldata[] = $user->email;
        $htmldata[] = '-';
        $htmldata[] = $user->name;
        $htmldata[] = $user->last_name;
        $htmldata[] = ($user->type) ? 'Basic' : 'Facebook';
        $htmldata[] = $user->points;
        $htmldata[] = '-';
        $htmldata[] = '-';
        $htmldata[] = '-';
        $htmldata[] = '-';
        $htmldata[] = ($user->premium) ? 'Yes' : 'No';
        $htmldata[] = ($user->active) ? 'Yes' : 'No';

        $data['success'] = true;
        $data['type'] = 'Add';
        $data['id'] = $user->id;
        $data['htmldata'] = $this->custom->htmldata($htmldata,$user->id);
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
        $user = User::find($id);
        $datas['data'] = $user;
        return view('admin.user.delete',$datas);
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
        $user = User::find($id);
        $datas['data'] = $user;
        return view('admin.user.edit',$datas);
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
        if ($request->username == "")
        unset($request->username);
        $validator = Validator::make($request->all(), $this->rules($id));
        if ($validator->fails()) {
            $data['success'] = false;
            $data['type'] = 'Edit';
            $data['messages'] = $validator->errors();
            return response()->json($data);
        }
        else {
            $user = User::find($id);
            $user->email = $request->email;
            if ($request->username != "")
                $user->username  = $request->username;
            if ($request->password != "")
                $user->password = Hash::make($request->password);
            $user->name = $request->name;
            $user->last_name = $request->last_name;
            $user->type = $request->type;
            $user->points = $request->points;
            $user->subscription_end = $request->subscription_end;
            $user->note = $request->note;
            $user->premium  = $request->premium;
            $user->active  = $request->active;
        if ($user->save()) {

            $htmldata[] = $this->custom->htmldata("",$user->id,'edit');
            $htmldata[] = $user->email;
            if ($user->username != "")
            $htmldata[] = $user->username;
            else
            $htmldata[] = '-';
            $htmldata[] = $user->name;
            $htmldata[] = $user->last_name;
            $htmldata[] = ($user->type) ? 'Basic' : 'Facebook';
            $htmldata[] = $user->points;
            $htmldata[] = $user->subscription_end;
            $htmldata[] = $user->last_logout;
            $htmldata[] = $user->last_login;
            $htmldata[] = $user->note;
            $htmldata[] = ($user->premium) ? 'Yes' : 'No';
            $htmldata[] = ($user->active) ? 'Yes' : 'No';

            $data['success'] = true;
            $data['type'] = 'Edit';
            $data['id'] = $user->id;
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
        $user = User::findOrFail($id);
       if ($user->delete()) {
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
