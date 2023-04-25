<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\User;
use App\Models\Rider;

use App\Helper\FCM;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);
        $fcmTokens = [];
        $riderIds = Rider::whereNotNull('live_geo')->pluck('user_id');
        $riders = User::whereNotNull('fcm_token')->whereIn('id',$riderIds)->get();
        foreach ($riders as $rider) {
            $fcmTokens[] = $rider->fcm_token;
        }
        $order->req_riders = json_encode($riderIds);
        $order->save();
        $data = [
            'type' => 'new_order',
            'id' => $order->id,
            'from' => $order->shop->shop->address,
            'to' => $order->drop_address,
        ];
        FCM::send($fcmTokens, 'New Order Request', 'You have a new order request to deliver', $data);
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
