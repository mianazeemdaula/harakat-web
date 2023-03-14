<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use MatanYadaev\EloquentSpatial\Objects\Point;
use Illuminate\Support\Facades\DB;

use App\Models\Order;
use App\Models\OrderDetail;

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
        DB::beginTransaction();
        // try {
            $orderCount = Order::count();
            $orderNum = sprintf('%04d', ($orderCount + 1));
            $order = new Order();
            $order->number = $orderNum;
            $order->shop_id = $request->shop_id;
            $order->user_id = $request->user()->id();
            $order->extra_note = $request->extra_note;
            $order->payment_type = $request->payment_type;
            $order->vat = $request->vat;
            $order->gross_amount = $request->gross_amount;
            $order->delivery_amount = $request->delivery_cost;
            $order->total_amount = $request->total_amount;
            $order->drop_address = $request->drop_address;
            $order->drop_location = new Point($request->drop_lat, $request->drop_lng);
            $order->save();
            foreach ($request->items as $details) {
                $item = new OrderDetail;
                $item->order_id = $order->id;
                $item->product_id = $detail->product_id;
                $item->qty = $detail->qty;
                $item->price = $detail->price;
                $item->delivery_charges = $detail->charges;
                $item->status = $detail->status;
                $item->save();
            }
            DB::rollback();
            return response()->json($order, 200);
        // } catch (\Exception $th) {
        //     DB::rollback();
        //     return response()->json($th->getMessage(), 422);
        // }
        
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
