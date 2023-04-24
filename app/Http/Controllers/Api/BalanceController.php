<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\Balance;
use App\Models\Transaction;

use App\Helper\StripePayment;
use App\Models\PaymentCard;

class BalanceController extends Controller
{
    public function balance()
    {
        $data = auth()->user()->balance();
        return response()->json($data, 200);
    }

    public function deposit(Request $request)
    {
        $user = $request->user();
        $amount = $request->request;
        $type = $request->type;

        if($type == 'cash'){
            $transaction = Transaction::create([
                'user_id' => $user->id,
                'type' => 'Cash',
                'amount' => -$amount,
                'details' => "Deposit Cash"
            ]);
            Balance::updateOrCreate(
                ['user_id'=> $user->id],
                ['cash' => DB::raw("cash - $amount")]
            );
        }else if($type == 'card'){
            $card = PaymentCard::find($request->card);
            $payment = StripePayment::cardPayment($card, intval($amount) * 100);
            if($payment && isset($payment['id'])){
                $transaction = Transaction::create([
                    'user_id' => $user->id,
                    'type' => 'Cash',
                    'amount' => -$amount,
                    'details' => "Deposit by ".substr($card->card_no,12),
                ]);
                Balance::updateOrCreate(
                    ['user_id'=> $user->id],
                    ['cash' => DB::raw("cash - $amount")]
                );
            }else{
                return response()->json(['message' => $payment['message']], 422);
            }
            
        }
        return $this->balance();
    }

    public function expense(Request $request)
    {
        $user = $request->user();
        $amount = $request->request;
        $type = $request->type;

        $transaction = Transaction::create([
            'user_id' => $user->id,
            'type' => 'Expense',
            'amount' => -$amount,
            'details' => $request->details,
        ]);
        Balance::updateOrCreate(
            ['user_id'=> $user->id],
            ['balance' => DB::raw("balance - $amount")]
        );
        return $this->balance();
    }
}
