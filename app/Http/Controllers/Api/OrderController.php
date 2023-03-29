<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use MatanYadaev\EloquentSpatial\Objects\Point;
use Illuminate\Support\Facades\DB;
use App\Helper\StripePayment;

use App\Models\Order;
use App\Models\PaymentCard;
use App\Models\OrderDetail;
use App\Models\OrderAddon;
use App\Models\OrderPayment;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Order::with(['details','payment','addons','shop','user'])
        ->orderBy('created_at','desc')->paginate();
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
        DB::beginTransaction();
        // try {
            $orderCount = Order::count();
            $orderNum = sprintf('%04d', ($orderCount + 1));
            $order = new Order();
            $order->number = $orderNum;
            $order->shop_id = $request->shop_id;
            $order->user_id = $request->user()->id;
            $order->extra_note = $request->extra_note;
            $order->payment_type = $request->payment_type;
            $order->vat = $request->vat;
            $order->gross_amount = $request->gross_amount;
            $order->delivery_amount = $request->delivery_cost;
            $order->total_amount = $request->total_amount;
            $order->drop_address = $request->drop_address;
            $order->drop_location = new Point($request->drop_lat, $request->drop_lng);
            $order->save();
            foreach ($request->items as $detail) {
                $item = new OrderDetail;
                $item->order_id = $order->id;
                $item->product_id = $detail['product_id'];
                $item->qty = $detail['qty'];
                $item->price = $detail['price'];
                $item->delivery_charges = $detail['charges'];
                $item->status = $detail['status'];
                $item->save();
            }
            foreach ($request->addons as $addon) {
                $add = new OrderAddon();
                $add->order_id = $order->id;
                $add->addon_id = $addon['addon_id'];
                $add->qty = $addon['qty'];
                $add->price = $addon['price'];
                $add->save();
            }
            DB::commit();
            if($request->payment_type == 'card'){
                $order->payment_card = $request->card;
                $order->save();
                $payment = StripePayment::cardPayment(PaymentCard::find($request->card), intval($request->total_amount) * 100);
                if($payment){
                    $pay = new OrderPayment();
                    $pay->order_id = $order->id;
                    $pay->gateway = 'stripe';
                    $pay->payment_id = $payment['id'];
                    $pay->status = $payment ? 'paid' : 'declined';
                    $pay->data = $payment ? json_encode($payment): null;
                    $pay->save();
                }
            }
            $order= Order::with(['payment', 'details','user', 'shop'])->find($order->id);
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
        $order= Order::with(['payment', 'details','user', 'shop'])->find($id);
            return response()->json($order, 200);
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
