<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class AdminloginController extends Controller
{
    //
    public function __construct() {
        $this->middleware('guest:admin');
    }
    public function showLoginForm() {
        return view('auth.admin.login');
    }

    public function login(Request $request) {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        $login['email'] = $request->email;
        $login['password'] = $request->password;

        if (Auth::guard('admin')->attempt($login)) {
            return redirect()->intended(route('admin.dashboard'));
        }

        return redirect()->back()->withInput($request->only('email'));
    }
}
