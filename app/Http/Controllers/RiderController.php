<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\City;

class RiderController extends Controller
{
    public function index()
    {
        $riders = User::whereHas('rider')->paginate();
        return view('admin.riders.index', compact('riders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ProductCategory::all();
        return view('merchants.products.addproduct', compact('categories'));
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
            'name' => 'required',
        ]);
        $product = new User;
        $product->user_id = $request->user()->id;
        $product->name = $request->name;
        $product->name_ar = $request->name_ar;
        $product->description = $request->description;
        $product->description_ar = $request->description_ar;
        $product->price = $request->price;
        $product->weight = $request->weight;
        $product->promo_price = $request->promo_price;
        $product->prepration_time = $request->prepration_time;
        $product->product_category_id = $request->category;
        $product->available = $request->has('available') ? 1 : 0;
        $product->promo = $request->has('promo') ? 1 : 0;
        if($request->has('image')){
            $file = $request->image;
            $ext = $file->getClientOriginalExtension();
            $fileName = time().'.'.$ext;
            $path = "product/".$fileName;
            $image = Image::make($file->getRealPath());
            $image->save($path);
            $product->image = $path;
        }
        $product->save();
        return  redirect()->back()->with('success', 'Item updated successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $cities = City::all();
        return view('admin.riders.edit', compact('user','cities'));
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
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        // $user->rider->dob = $request->dob;
        $user->rider->city_id = $request->city;
        $user->rider->appartment = $request->appartment;
        $user->save();
        $user->rider->save();
        return  redirect()->back()->with('success', 'User updated successfully.');

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
