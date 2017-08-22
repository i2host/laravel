<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Plan;
use App\Admin\I18n;
use Custom;
use Validator;

class PlanController extends Controller
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
        $plans = Plan::all();
        $datas['datas'] = $plans;
        $i18ns = I18n::all();
        $datas['i18ns'] = $i18ns;
        return view('admin.plan.index',$datas);
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
            'name' => 'required|max:240',
            'description' => 'required|max:240',
            'duration' => 'required|numeric',
            'amount' => 'required|numeric',
            'points' => 'required|numeric',
            'active' => 'required',
            ];
        }
        else if ($id != "") {
            return [
            'name' => 'required|max:240',
            'description' => 'required|max:240',
            'duration' => 'required|numeric',
            'amount' => 'required|numeric',
            'points' => 'required|numeric',
            'sort' => 'required|numeric',
            'active' => 'required',
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
            $plan = new Plan;
            $plan->name = $request->name;
            $plan->description = $request->description;
            $plan->duration = $request->duration;
            $plan->amount = $request->amount;
            $plan->points = $request->points;
            $plan->sort = $this->custom->lastsort('plans');
            $plan->active  = $request->active;
            if ($plan->save()) {
                $htmldata[] = $plan->name;
                $htmldata[] = $plan->description;
                $htmldata[] = $plan->duration;
                $htmldata[] = $plan->amount;
                $htmldata[] = $plan->points;
                $htmldata[] = $plan->sort;
                $htmldata[] = ($plan->active) ? 'Yes' : 'No';

                $data['success'] = true;
                $data['type'] = 'Add';
                $data['id'] = $plan->id;
                $data['htmldata'] = $this->custom->htmldata($htmldata,$plan->id);
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
        $plan = Plan::find($id);
        $datas['data'] = $plan;
        return view('admin.plan.delete',$datas);
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
        $plan = Plan::find($id);
        $i18ns = I18n::all();
        $datas['data'] = $plan;
        $datas['i18ns'] = $i18ns;
        return view('admin.plan.edit',$datas);
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
            $plan = Plan::find($id);
            $plan->name = $request->name;
            $plan->description = $request->description;
            $plan->duration = $request->duration;
            $plan->amount = $request->amount;
            $plan->points  = $request->points;
            $plan->sort  = $request->sort;
            $plan->active  = $request->active;
            if ($plan->save()) {
                $htmldata[] = $this->custom->htmldata("",$plan->id,'edit');
                $htmldata[] = $plan->name;
                $htmldata[] = $plan->description;
                $htmldata[] = $plan->duration;
                $htmldata[] = $plan->amount;
                $htmldata[] = $plan->points;
                $htmldata[] = $plan->sort;
                $htmldata[] = ($plan->active) ? 'Yes' : 'No';
                $data['success'] = true;
                $data['type'] = 'Edit';
                $data['id'] = $plan->id;
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
        $plan = Plan::findOrFail($id);
       if ($plan->delete()) {
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
