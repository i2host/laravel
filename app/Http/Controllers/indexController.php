<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;
class indexController extends Controller
{
    //
    public function index() {
        $data['config'] = Config::get('services.stripe.secret');
        return view('index',$data);
    }
}
