<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Countrie;
use Illuminate\Contracts\Validation\Validator;
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
        return view('countrie.index');
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
        'name' => 'required|unique:countries|max:60',
        'image' => 'required',
        ]);

        $validator = Validator::make($data, $rules);

        $countrie = new Countrie;
        $countrie->name = $request->name;
        $countrie->image = $request->image;
        $countrie->image_code = 1;
        $countrie->premium  = 1;
        $countrie->sort = 1;
        $countrie->active = 1;
        $countrie->image_code = 1;
        $countrie->save();

        $data['error'] = false;
        $data['name'] = $request->name;
        $data['image'] = $request->image;
        
        return response()->json($data);
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
        return view('countrie.edit');
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
    }
}
