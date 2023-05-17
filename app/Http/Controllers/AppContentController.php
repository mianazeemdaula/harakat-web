<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\AppContent;

use Image;

class AppContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = AppContent::all();
        return view('admin.app_content.index',compact('cats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.app_content.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'title_ar' => 'required',
            'content' => 'required',
            'content_ar' => 'required',
        ]);
        $cat= new AppContent;
        $cat->title = $request->title;
        $cat->title_ar = $request->title_ar;
        $cat->content = $request->content;
        $cat->content_ar = $request->content_ar;
        $cat->page_key = \Str::random(1);
        $cat->save();
        return redirect()->route('app-content.index');
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
        $content = AppContent::findOrFail($id);
        return view('admin.app_content.edit', compact('content'));
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
        $request->validate([
            'title' => 'required',
            'title_ar' => 'required',
            'content' => 'required',
            'content_ar' => 'required',
        ]);
        $cat= AppContent::findOrFail($id);
        $cat->title = $request->title;
        $cat->title_ar = $request->title_ar;
        $cat->content = $request->content;
        $cat->content_ar = $request->content_ar;
        $cat->save();
        return redirect('/app-content');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AppContent::findOrFail($id)->delete();
        return redirect()->back();
    }
}
