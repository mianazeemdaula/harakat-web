<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ShopDocument;
use App\Models\UserLoyaltyCard;
use App\Models\LoyaltyCard;

class DocumentController extends Controller
{
    public function getdocs($role, $id)
    {
        if($role == 'shop'){
            $docs =  ShopDocument::where('shop_id',$id)->get();
            return view('admin.documents.shop', compact('id', 'docs'));
        }else if($role == 'rider'){
            $docs =  ShopDocument::where('shop_id',$id)->get();
            return view('admin.documents.rider', compact('id', 'docs'));
        }
        else if($role == 'user'){
            $cards =  LoyaltyCard::get();
            $userCards = UserLoyaltyCard::where('user_id', $id)->get();
            return view('admin.documents.user', compact('id', 'cards', 'userCards'));
        }
        
    }

    public function viewStatus($role, $id,$type)
    {
        if($role == 'shop' || $role == 'rider'){
            $docs =  ShopDocument::where('shop_id', $id)
            ->where('type',$type)->get();
            return view('admin.documents.shop_docs', compact('docs', 'role', 'id'));
        }
        $doc = UserLoyaltyCard::findOrFail($type);
        return view('admin.documents.view_user_doc', compact('doc', 'role', 'id'));
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($shopId)
    {
        $docs = ShopDocument::where('shop_id', $shopId)->get();
        return view('admin.merchant.document.index', compact('docs'));
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
        $doc = ShopDocument::findOrFail($id);
        return view('admin.documents.view_shop_doc', compact('doc'));
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
        $doc = ShopDocument::find($id);
        $doc->status = $request->status;
        $doc->save();
        return  redirect("documents/shop/$doc->shop_id")->with('success', 'Document updated successfully.');

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
