<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
#use App\User;

class SubscriptionController extends Controller
{
    //
    public function __construct() {
        
    }

    public function index() {
        $user = Auth::user();
        $data['user'] = $user;
        return view('subscription.index',$data);
    }

    public function order(Request $request) {

            $user = Auth::user();
            $input = $request->all();
            $token = $input['stripeToken'];
            try {
                $user->newSubscription('main',$input['plane'])
                ->trialDays(10)
                ->create($token,[
                        'email' => $user->email
                    ]);
                return back()->with('success','Subscription is completed.');
            } catch (Exception $e) {
                return back()->with('success',$e->getMessage());
            }

    }
}
