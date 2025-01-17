<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\City;
use App\Models\Country;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::all();
        return view('admin.cities.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        return view('admin.cities.create', compact('countries'));
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
            'name' =>'required|unique:cities',
            'name_ar' => 'required',
            'country_id' => 'required|exists:countries,id',
        ]);
        $city = new City;
        $city->name = $request->name;
        $city->name_ar = $request->name_ar;
        $city->country_id = $request->country_id;
        $city->save();
        return redirect('cities')->with('success', 'City added successfully');
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
        $city = City::findOrFail($id);
        $countries = Country::all();
        return view('admin.cities.edit', compact('city', 'countries'));
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
            'name' =>"required|unique:cities,name,$id",
            'name_ar' => 'required',
            'country_id' => 'required|exists:countries,id',
        ]);
        $city = City::findOrFail($id);
        $city->name = $request->name;
        $city->name_ar = $request->name_ar;
        $city->country_id = $request->country_id;
        $city->save();
        return redirect('cities')->with('success', 'City updated successfully');
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
