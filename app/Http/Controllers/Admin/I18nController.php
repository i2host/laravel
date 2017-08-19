<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\I18n;
use Custom;
use Validator;
class I18nController extends Controller
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
        $i18ns = new I18n;
        $datas['datas'] = $i18ns::all();
        return view('admin.i18n.index',$datas);
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
            'code' => 'required|max:240|unique:i18ns'
            ];
        }
        else if ($id != "") {
            return [
            'code' => 'required|max:240|unique:i18ns,code,'.$id,
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
            $i18n = new I18n;
            $i18n->code = $request->code;
            $i18n->active  = 0;
            if ($i18n->save()) {
                $htmldata[] = $i18n->code;
                $htmldata[] = ($i18n->active) ? 'Yes' : 'No';

                $data['success'] = true;
                $data['type'] = 'Add';
                $data['id'] = $i18n->id;
                $data['htmldata'] = $this->custom->htmldata($htmldata,$i18n->id);
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
        $i18n = I18n::find($id);
        $datas['data'] = $i18n;
        return view('admin.i18n.delete',$datas);
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
        $i18n = I18n::find($id);
        $datas['data'] = $i18n;
        return view('admin.i18n.edit',$datas);
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
            $i18n = I18n::find($id);
            $i18n->code = $request->code;
            $i18n->active  = $request->active;
            if ($i18n->save()) {
                $htmldata[] = $this->custom->htmldata("",$i18n->id,'edit');
                $htmldata[] = $i18n->code;
                $htmldata[] = ($i18n->active) ? 'Yes' : 'No';
                $data['success'] = true;
                $data['type'] = 'Edit';
                $data['id'] = $i18n->id;
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
        $i18n = I18n::findOrFail($id);
       if ($i18n->delete()) {
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
