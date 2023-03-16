<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\PaymentCard;

class CardController extends Controller
{

    public function index()
    {
        $data = PaymentCard::where('user_id',auth()->user()->id)
        ->where('active', true)->get();
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
            'holder_name' => 'required',
            'card_no' => 'required',
            'expiry_month' => 'required',
            'expiry_year' => 'required',
            'cvc' => 'required',
        ]);
        $card = new PaymentCard();
        $card->user_id = $request->user()->id;
        $card->holder_name = $request->holder_name;
        $card->card_no = $request->card_no;
        $card->expiry_month = $request->expiry_month;
        $card->expiry_year = $request->expiry_year;
        $card->cvc = $request->cvc;
        $card->save();
        return $this->index();
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
            'holder_name' => 'required',
            'card_no' => 'required',
            'expiry_month' => 'required',
            'expiry_year' => 'required',
            'cvc' => 'required',
        ]);
        $card = PaymentCard::find($id);
        $card->holder_name = $request->holder_name;
        $card->card_no = $request->card_no;
        $card->expiry_month = $request->expiry_month;
        $card->expiry_year = $request->expiry_year;
        $card->cvc = $request->cvc;
        $card->save();
        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PaymentCard::find($id)->delete();
        return $this->index();
    }
}
