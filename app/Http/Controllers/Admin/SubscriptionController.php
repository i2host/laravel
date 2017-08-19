<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Subscription;
use App\User;
use App\Plan;
use Custom;
use Validator;

class SubscriptionController extends Controller
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
        $subscription = Subscription::all();
        $plans = Plan::all()->where('active','=','1');
        $users = User::all();
        $datas['datas'] = $subscription;
        $datas['plans'] = $plans;
        $datas['users'] = $users;
        return view('admin.subscription.index',$datas);
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
            'plan_id' => 'required',
            'user_id' => 'required|max:240',
            'paid_by' => 'required|numeric',
            'start_date' => 'required',
            ];
        }
        else if ($id != "") {
            return [
            'plan_id' => 'required',
            'user_id' => 'required|max:240',
            'paid_by' => 'required|numeric',
            'start_date' => 'required',
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
            $plan = Plan::where('id', $request->plan_id)->get();
            $subscription = new Subscription;
            $subscription->plan_id = $request->plan_id;
            $subscription->user_id = $request->user_id;
            $subscription->paid_by = $request->paid_by;
            $subscription->start_date = $request->start_date;
            $end = date('Y-m-d H:i:s', strtotime($request->start_date. ' + '.$plan[0]->duration.' days'));
            $subscription->end_date = $end;
            if ($subscription->save()) {
                $htmldata[] = $subscription->User->name;
                $htmldata[] = $subscription->User->last_name;
                $htmldata[] = $subscription->User->email;
                $htmldata[] = $subscription->Plan->name;
                $htmldata[] = $subscription->Plan->duration;
                $htmldata[] = ($subscription->paid_by) ? 'Points' : 'Cash';
                $htmldata[] = $subscription->start_date;
                $htmldata[] = $subscription->end_date;

                $data['success'] = true;
                $data['type'] = 'Add';
                $data['id'] = $subscription->id;
                $data['htmldata'] = $this->custom->htmldata($htmldata,$subscription->id);
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
        $subscription = Subscription::find($id);
        $datas['data'] = $subscription;
        return view('admin.subscription.delete',$datas);
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
        $subscription = Subscription::find($id);
        $plans = Plan::all();
        $users = User::all();
        $datas['data'] = $subscription;
        $datas['plans'] = $plans;
        $datas['users'] = $users;
        return view('admin.subscription.edit',$datas);
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
        $data['success'] = true;
        $data['type'] = 'Edit';
        $data['id'] = '';
        $data['htmldata'] = '';
        return response()->json($data);
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
        $subscription = Subscription::findOrFail($id);
       if ($subscription->delete()) {
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
