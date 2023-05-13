<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use App\Models\Offer;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers = Offer::where('user_id',auth()->user()->id)->paginate();
        return view('merchants.offers.index', compact('offers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('merchants.offers.create');
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
            'image' => 'required',
            'title' => 'required',
            'discount' => 'required',
            'code' => 'required|unique:offers',
            'limit' => 'required',
            'min_purchase' => 'required',
            'max_discount' => 'required',
            'start_date' => 'required',
            'expire_date' => 'required',
        ]);
        $product = new Offer;
        $product->user_id = $request->user()->id;
        $product->title = $request->title;
        $product->type = 'first';
        $product->discount = $request->discount;
        $product->code = strtoupper($request->code);
        $product->limit = $request->limit;
        $product->min_purchase = $request->min_purchase;
        $product->max_discount = $request->max_discount;
        $product->start_date = $request->start_date;
        $product->expire_date = $request->expire_date;
        if($request->has('image')){
            $file = $request->image;
            $ext = $file->getClientOriginalExtension();
            $fileName = time().'.'.$ext;
            $path = "offers/".$fileName;
            $image = Image::make($file->getRealPath());
            $image->save($path);
            $product->image = $path;
        }
        $product->save();
        return  redirect()->back()->with('success', 'Item created successfully.');
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
        $offer = Offer::findOrFail($id);
        return view('merchants.offers.edit',compact('offer'));
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
            'title' => 'required',
            'discount' => 'required',
            'code' => 'required',
            'limit' => 'required',
            'min_purchase' => 'required',
            'max_discount' => 'required',
            'start_date' => 'required',
            'expire_date' => 'required',
        ]);
        $product = Offer::findOrFail($id);
        $product->user_id = $request->user()->id;
        $product->title = $request->title;
        $product->type = 'first';
        $product->discount = $request->discount;
        $product->code = strtoupper($request->code);
        $product->limit = $request->limit;
        $product->min_purchase = $request->min_purchase;
        $product->max_discount = $request->max_discount;
        $product->start_date = $request->start_date;
        $product->expire_date = $request->expire_date;
        if($request->has('image')){
            $file = $request->image;
            $ext = $file->getClientOriginalExtension();
            $fileName = time().'.'.$ext;
            $path = "offers/".$fileName;
            $image = Image::make($file->getRealPath());
            $image->save($path);
            $product->image = $path;
        }
        $product->save();
        return  redirect()->back()->with('success', 'Item updated successfully.');
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
