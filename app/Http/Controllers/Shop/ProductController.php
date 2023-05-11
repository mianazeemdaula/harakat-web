<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use App\Models\ProductCategory;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate();
        return view('merchants.products.index', compact('products'));
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
        $product = new Product;
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
        $product = Product::findOrFail($id);
        $categories = ProductCategory::all();
        return view('merchants.products.editproduct', compact('product','categories'));
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
        $product = Product::find($id);
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
