<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class MainController extends Controller
{
    //
    public function index() {

        return view('index');
    }

    public function getUpload() {
        
        return view('includes.upload');
    }

    public function upload(Request $request) {
        $md5Name = md5_file($request->file('uploaded_file')->getRealPath());
        $extension = $request->file('uploaded_file')->getClientOriginalExtension();
        if ($extension == "ovpn") {
        $fullname = $md5Name.'.'.$extension;
        $request->file('uploaded_file')->storeAs('public', $fullname);
        $url = url('public').'/'.$fullname;
        $data['status'] = true;
        $data['url'] = $url;
        }
        else {
        $data['status'] = false;
        $data['error_reason'] = 'Ext. not allowed';
        $data['error_values'] = $extension;
        }
        return response()->json($data);
    }


}
