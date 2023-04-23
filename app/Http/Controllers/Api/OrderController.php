<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use MatanYadaev\EloquentSpatial\Objects\Point;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Helper\StripePayment;

use App\Models\Order;
use App\Models\PaymentCard;
use App\Models\OrderDetail;
use App\Models\OrderAddon;
use App\Models\OrderPayment;
use App\Models\Transaction;
use App\Models\OrderCancel;

use App\Models\Offer;

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
            $order->discount_amount = $request->discount;
            $order->delivery_amount = $request->delivery_cost;
            $order->total_amount = $request->total_amount;
            $order->drop_address = $request->drop_address;
            $order->drop_location = new Point($request->drop_lat, $request->drop_lng);
            if($request->offer){
                $offer = Offer::where('code', Str::upper($request->offer))->first();
                $order->offer_id = $offer->id;
            }
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
                $add->addon_id = $addon['id'];
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
                    $pay->payment_id = isset($payment['id']) ? $payment['id'] : "";
                    $pay->status = isset($payment['id']) ? 'paid' : 'declined';
                    $pay->data = json_encode($payment);
                    $pay->save();
                }
            }
            $order= Order::with(['payment', 'details','user', 'shop','addons'])->find($order->id);
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
        $order= Order::with(['details','payment','addons','shop','user'])->find($id);
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
        try {
            DB::beginTransaction();
            $order = Order::find($id);
            $order->status = $request->status;
            if($request->status == 'accept'){
                $order->approved_at = now();
            }else if($request->status == 'processed'){
                $order->processes_at = now();
            }else if($request->status == 'assigned'){
                $order->assigned_at = now();
            }else if($request->status == 'dispatched'){
                $order->dispatched_at = now();
            }else if($request->status == 'picked'){
                $order->picked_at = now();
            }else if($request->status == 'delivered'){
                $order->delivered_at = now();
                if($order->payment_type == 'cod'){
                    $amount = $order->total_amount - $order->delivery_amount;
                    $transaction = Transaction::create([
                        'user_id' => $order->rider_id,
                        'type' => 'Income',
                        'amount' => $amount,
                        'details' => "COD Order #$order->id"
                    ]);
                    $transaction->increaseBalance($amount);
                }else{
                    $amount = $order->total_amount;
                    $transaction = Transaction::create([
                        'user_id' => $order->shop_id,
                        'type' => 'Income',
                        'amount' => $amount,
                        'details' => "Order #$order->id"
                    ]);
                    $transaction->increaseBalance($amount);
                }
                $amount = $order->delivery_amount;
                $transaction = Transaction::create([
                    'user_id' => $order->rider_id,
                    'type' => 'Income',
                    'amount' => $amount,
                    'details' => "Earning Order #$order->id"
                ]);
                $transaction->increaseBalance($amount);
            }else if($request->status == 'canceled'){
                $order->canceled_at = now();
                $cancel = new OrderCancel();
                $cancel->order_id = $order->id;
                $cancel->rider_id = $request->user()->id;
                $cancel->reason = $request->reason;
                $cancel->save();
            }
            $order->save();
            DB::commit();
            return $this->show($order->id);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json($th->getMessage(), 422);
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
    }

    public function riderActiveOrders()
    {
        $data = Order::with(['details','payment','addons','shop','user'])
        ->orderBy('created_at','desc')->paginate();
        return response()->json($data, 200);
    }
}
