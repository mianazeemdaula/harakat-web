<?php

namespace App\Http\Controllers\Rider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Vehicle;
use App\Models\FleetMaintenance;

class FleetMaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($fleetId)
    {
        $collection = FleetMaintenance::where('vehicle_id', $fleetId)->get();
        return view('rider.fleets.maintenances.index',compact('collection', 'fleetId'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rider.fleets.create');
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

        ]);
        $v = new FleetMaintenance();
        $v->type = $request->type;
        $v->plate_number = $request->plate_number;
        $v->make = $request->make;
        $v->model = $request->model;
        $v->_year = $request->year;
        $v->plate_source = $request->plate_source;
        $v->category = $request->category;
        $v->cylender = $request->cylender;
        $v->licence_issue_date = $request->licence_issue_date;
        $v->licence_expiry_date = $request->licence_expiry_date;
        $v->insurance_type = $request->insurance_type;
        $v->area = $request->area;
        $v->zone = $request->zone;
        $v->rider_id = $request->rider_id;
        $v->vehicle_receive_date = $request->vehicle_receive_date;
        $v->vehicle_return_date = $request->vehicle_return_date;
        $v->save();
        return redirect()->route('vehicles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = FleetMaintenance::findOrFail($id);
        return view('rider.fleets.edit', compact('model'));
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

        ]);
        $v = FleetMaintenance::findOrFail($id);
        $v->type = $request->type;
        $v->plate_number = $request->plate_number;
        $v->make = $request->make;
        $v->model = $request->model;
        $v->_year = $request->year;
        $v->plate_source = $request->plate_source;
        $v->category = $request->category;
        $v->cylender = $request->cylender;
        $v->licence_issue_date = $request->licence_issue_date;
        $v->licence_expiry_date = $request->licence_expiry_date;
        $v->insurance_type = $request->insurance_type;
        $v->area = $request->area;
        $v->zone = $request->zone;
        $v->rider_id = $request->rider_id;
        $v->vehicle_receive_date = $request->vehicle_receive_date;
        $v->vehicle_return_date = $request->vehicle_return_date;
        $v->save();
        return redirect()->route('vehicles.index');
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
