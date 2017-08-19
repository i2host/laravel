<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\page;
use App\I18n;
use Custom;
use Validator;
class PageController extends Controller
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
        $pages = Page::all();
        $i18ns = I18n::all();
        $datas['datas'] = $pages;
        $datas['i18ns'] = $i18ns;
        return view('admin.page.index',$datas);
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
            'i18n_id' => 'required',
            'title' => 'required|max:240',
            'content' => 'required',
            'public' => 'required|numeric',
            'active' => 'required|numeric',
            ];
        }
        else if ($id != "") {
            return [
            'i18n_id' => 'required',
            'title' => 'required|max:240',
            'content' => 'required',
            'public' => 'required|numeric',
            'active' => 'required|numeric',
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
            $page = new Page;
            $page->i18n_id = $request->i18n_id;
            $page->title = $request->title;
            $page->content = $request->content;
            $page->public = $request->public;
            $page->active  = $request->active;
            if ($page->save()) {
                $htmldata[] = $page->I18n->code;
                $htmldata[] = $page->title;
                $htmldata[] = ($page->public) ? 'Yes' : 'No';
                $htmldata[] = ($page->active) ? 'Yes' : 'No';
                $htmldata[] = $page->created_at->format('d M Y - H:i:s');
                $htmldata[] = $page->updated_at->format('d M Y - H:i:s');

                $data['success'] = true;
                $data['type'] = 'Add';
                $data['id'] = $page->id;
                $data['htmldata'] = $this->custom->htmldata($htmldata,$page->id);
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
        $page = Page::find($id);
        $datas['data'] = $page;
        return view('admin.page.delete',$datas);
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
        $page = Page::find($id);
        $i18ns = I18n::all();
        $datas['data'] = $page;
        $datas['i18ns'] = $i18ns;
        return view('admin.page.edit',$datas);
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
            $page = Page::find($id);
            $page->i18n_id = $request->i18n_id;
            $page->title = $request->title;
            $page->content = $request->content;
            $page->public  = $request->public;
            $page->active  = $request->active;
            if ($page->save()) {
                $htmldata[] = $this->custom->htmldata("",$page->id,'edit');
                $htmldata[] = $page->I18n->code;
                $htmldata[] = $page->title;
                $htmldata[] = ($page->public) ? 'Yes' : 'No';
                $htmldata[] = ($page->active) ? 'Yes' : 'No';
                $htmldata[] = $page->created_at->format('d M Y - H:i:s');
                $htmldata[] = $page->updated_at->format('d M Y - H:i:s');
                $data['success'] = true;
                $data['type'] = 'Edit';
                $data['id'] = $page->id;
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
        $page = Page::findOrFail($id);
       if ($page->delete()) {
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
