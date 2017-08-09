<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class ApiController extends Controller
{
    //

    public function index($lang="") {

    if ($lang != "") {
    App::setLocale($lang);
    }
    $data['id'] = __('msg_welcome_title');
    $data['name'] = $lang;
    return response()->json($data);
    }

}
