<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Addon;
use App\Models\AddonCategory;
class AddonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ids = AddonCategory::where('user_id', auth()->user()->id)->pluck('id');
        $addons = Addon::whereIn('addon_category_id', $ids)->get();
        return view('merchants.addons.index',compact('addons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = AddonCategory::where('user_id', auth()->user()->id)->get();
        return view('merchants.addons.create',compact('cats'));
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
            'name' => 'required',
            'name_ar' => 'required',
            'description' => 'required',
            'description_ar' => 'required',
        ]);
        $addon = new Addon;
        $addon->addon_category_id = $request->category;
        $addon->name = $request->name;
        $addon->name_ar = $request->name_ar;
        $addon->description = $request->description;
        $addon->description_ar = $request->description_ar;
        $addon->price = $request->price;
        $addon->weight = $request->weight;
        $addon->available = $request->has('available') ? 1 : 0;
        $addon->save();
        return redirect()->route('addons.index')->with(['success'=>'Addon created succesfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Addon::where('addon_category_id',$id)->get();
        return response()->json($data, 200);
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
