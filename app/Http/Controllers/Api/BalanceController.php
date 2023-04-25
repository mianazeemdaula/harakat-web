<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Helper\StripePayment;
use Carbon\Carbon;

use App\Models\Balance;
use App\Models\Transaction;
use App\Models\CashDeposit;
use App\Models\PaymentCard;

class BalanceController extends Controller
{
    public function balance()
    {
        $data = Balance::where('user_id', auth()->user()->id)->first();
        return response()->json($data, 200);
    }

    public function deposit(Request $request)
    {
        $user = $request->user();
        $amount = $request->amount;
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
            $cash = new CashDeposit;
            $cash->user_id = $user->id;
            $cars->amount = $amount;
            $cash->save();
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
        $amount = $request->amount;

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

    public function earning(Request $request)
    {
        $user = $request->user();
        $type = $request->type;
        $sdate = Carbon::parse($request->start_date);
        $edate = Carbon::parse($request->end_date);
        $data = [];
        if($type == 'weekly'){
            $data =  Transaction::selectRaw('DATE(created_at) as _date, SUM(amount) as total')
            ->whereBetween('created_at', [$sdate, $edate])
            // ->where('type', 'Income')
            ->groupBy('_date')
            ->get();
        }else if($type == 'monthly'){
            $currentYear = $sdate->format('Y');
            $data =  Transaction::selectRaw("MONTH(created_at) as _date, SUM(amount) as total")
            ->whereRaw("YEAR(created_at) = ?", [$currentYear])
            ->groupBy('_date')
            // ->where('type', 'Income')
            ->orderBy('_date', 'ASC')
            ->get();
        }else if($type == 'yearly'){
            $currentYear = $sdate->format('Y');
            $data = Transaction::selectRaw("YEAR(created_at) as _date, SUM(amount) as total")
            ->whereRaw("YEAR(created_at) >= ?", [$currentYear - 5]) // Only get data for last 5 years
            // ->where('type', 'Income')
            ->groupBy('_date')
            ->orderBy('_date', 'ASC')
            ->get();
        }
        return response()->json($data, 200);
    }
    
}
