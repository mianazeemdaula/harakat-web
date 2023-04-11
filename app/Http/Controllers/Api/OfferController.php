<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\Offer;

class OfferController extends Controller
{
    public function claim(Request $request)
    {
        $offer = Offer::where('code', $request->code)
        ->whereDate('start_date','>=' ,now())
        ->whereDate('expire_date','<=' ,now())
        ->where('min_purchase', '>=', $request->amount)
        ->where('status', true)
        ->first();
        if(!$offer){
            return response()->json(['message' => 'offer_not_found'], 204);
        }
        $count = Order::where('offer_id', $offer->id)->count();
        if($count >= $offer->limit){
            return response()->json(['message' => 'offer_limit_exceed'], 204);
        }
        return response()->json($offer, 200);
    }
}
