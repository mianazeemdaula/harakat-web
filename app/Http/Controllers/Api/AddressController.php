<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use MatanYadaev\EloquentSpatial\Objects\Point;

use App\Models\Address;

class AddressController extends Controller
{

    public function index()
    {
        $data = Address::where('status', true)->paginate();
        return response()->json($data, 200);
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
        $request->validate([
            'title' => 'required',
            'address' => 'required',
            'lat' => 'required',
            'lng' => 'required',
        ]);
        $add = new Address();
        $add->user_id = $request->user()->id;
        $add->title = $request->title;
        $add->address = $request->address;
        $add->location = new Point( $request->lat,  $request->lng);
        $add->save();
        return response()->json($add, 200);
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
            'address' => 'required',
            'lat' => 'required',
            'lng' => 'required',
        ]);
        $add = Address::find($id);
        $add->title = $request->title;
        $add->address = $request->address;
        $add->location = new Point( $request->lat,  $request->lng);
        $add->save();
        return response()->json($add, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Address::find($id)->delete();
        return  response()->json($data, 200);
    }
}
