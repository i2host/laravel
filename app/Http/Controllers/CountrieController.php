<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Countrie;
use Custom;
use Validator;
class CountrieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $countries = Countrie::all();
        $datas['datas'] = $countries;
        return view('countrie.index',$datas);
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
            'name' => 'required|unique:countries|max:60',
            'image' => 'required',
            'image_code' => 'required',
            'premium' => 'required',
        ];
    }

    public function rulesedit()
    {
        return [
            'name' => 'required|max:60',
            'image' => 'required',
            'image_code' => 'required',
            'premium' => 'required',
        ];
    }

    public function lastsort() {
        $lastsort = new Countrie;
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
        $validator = Validator::make($request->all(), $this->rules());
        if ($validator->fails()) {
            $data['success'] = false;
            $data['type'] = 'Add';
            $data['messages'] = $validator->errors();
            return response()->json($data);
        }
        else {
        $sort = $this->lastsort();
        $countrie = new Countrie;
        $countrie->name = $request->name;
        $countrie->image = $request->image;
        $countrie->image_code = $request->image_code;
        $countrie->sort = $sort;
        $countrie->premium  = $request->premium;
        $countrie->active = 0;
        $countrie->save();

        $htmldata[] = $countrie->name;
        $htmldata[] = $countrie->image;
        $htmldata[] = $countrie->image_code;
        $htmldata[] = $countrie->sort;
        $htmldata[] = ($countrie->premium) ? 'Yes' : 'No';
        $htmldata[] = ($countrie->active) ? 'Active' : 'Inactive';

        $custom = new Custom;
        $data['success'] = true;
        $data['type'] = 'Add';
        $data['id'] = $countrie->id;
        $data['htmldata'] = $custom->htmldata($htmldata,$countrie->id);
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
        $countrie = Countrie::find($id);
        $datas['data'] = $countrie;
        return view('countrie.delete',$datas);
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
        $countrie = Countrie::find($id);
        $datas['data'] = $countrie;
        return view('countrie.edit',$datas);
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
        $validator = Validator::make($request->all(), $this->rulesedit());
        if ($validator->fails()) {
            $data['success'] = false;
            $data['type'] = 'Edit';
            $data['messages'] = $validator->errors();
            return response()->json($data);
        }
        else {
            $countrie = Countrie::find($id);
            $countrie->name = $request->name;
            $countrie->image = $request->image;
            $countrie->image_code = $request->image_code;
            $countrie->sort  = $request->sort;
            $countrie->premium  = $request->premium;
            $countrie->active  = $request->active;
            $countrie->save();

            $custom = new Custom;
            $htmldata[] = $custom->htmldata("",$countrie->id,'edit');
            $htmldata[] = $countrie->name;
            $htmldata[] = $countrie->image;
            $htmldata[] = $countrie->image_code;
            $htmldata[] = $countrie->sort;
            $htmldata[] = ($countrie->premium) ? 'Yes' : 'No';
            $htmldata[] = ($countrie->active) ? 'Active' : 'Inactive';

            
            $data['success'] = true;
            $data['type'] = 'Edit';
            $data['id'] = $countrie->id;
            $data['htmldata'] = $htmldata;
            return response()->json($data);
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
        $countrie = Countrie::findOrFail($id);
        $countrie->delete();

        $data['success'] = true;
        $data['type'] = 'Delete';
        return response()->json($data);
    }
}
