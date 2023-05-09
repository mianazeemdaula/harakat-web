<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\UserLoyaltyCard;

use Image;

class LoyaltyCardController extends Controller
{

    public function index()
    {
        $data = UserLoyaltyCard::where('user_id',auth()->user()->id)->get();
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
            'card' => 'required',
            'image' => 'required',
        ]);
        $card = UserLoyaltyCard::where('user_id',auth()->user()->id)
        ->where('loyalty_card_id',$request->card)->get();
        if(!$card){
            $card = new UserLoyaltyCard();
        }
        $card->user_id = $request->user()->id;
        $card->loyalty_card_id = $request->card;
        if($request->has('image')){
            $file = $request->image;
            $ext = $file->getClientOriginalExtension();
            $fileName = time().'.'.$ext;
            $path = "loyaltycards/".$fileName;
            $image = Image::make($file->getRealPath());
            $image->save($path);
            $card->path = $path;
        }
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
            'card' => 'required',
            'image' => 'required',
        ]);
        $card = UserLoyaltyCard::find($id);
        $card->loyalty_card_id = $request->card;
        if($request->has('image')){
            $file = $request->image;
            $ext = $file->getClientOriginalExtension();
            $fileName = time().'.'.$ext;
            $path = "loyaltycards/".$fileName;
            $image = Image::make($file->getRealPath());
            $image->save($path);
            $card->path = $path;
        }
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
        UserLoyaltyCard::find($id)->delete();
        return $this->index();
    }
}
