@extends('layouts.shop')
@section('body')
    <form action="{{ url('shopdetails') }}" method="post">
        @csrf
        <div class="w-full m-6 space-y-4">
            <div class="flex flex-row w-5/6 justify-between space-x-4">
                <a href="{{ url('shopdetails') }}" class="w-52 text-center h-12 text-xl text-white bg-blue-800">Shop
                    Details</a>
                <a href="{{ url('shop-reviews') }}"
                    class="w-52 text-center h-12 text-xl text-blue-800 border border-blue-800">Rating &
                    Reviews</a>
                <a href="{{ url('shop-configuration') }}"
                    class="w-52 text-center h-12 text-xl text-blue-800 border border-blue-800">Configuration</a>
            </div>
            <div class="grid grid-cols-2 justify-items-center gap-4">
                <div>
                    <h3 class="p-2">Name</h3>
                    <input type="text" placeholder="Name" name="name" value="{{ $shop->shop->shop_name }}"
                        class="w-72 h-10">
                </div>
                <div>
                    <h3 class="p-2">Address</h3>
                    <input type="text" placeholder="Address" name="address" value="{{ $shop->shop->address }}"
                        class="w-72 h-10">
                </div>
                <div>
                    <h3 class="p-2">Phone</h3>
                    <input type="text" placeholder="Phone" name="phone" value="{{ $shop->shop->phone }}"
                        class="w-72 h-10">
                </div>
                <div>
                    <h3 class="p-2">Email</h3>
                    <input type="email" placeholder="Email" name="email" value="{{ $shop->email }}" class="w-72 h-10">
                </div>
                <div>
                    <h3 class="p-2">Base Delivery Charge</h3>
                    <input type="text" placeholder="Base Delivery Charge" name="base_delivery_charges"
                        value="{{ $shop->shop->base_delivery_charges }}" class="w-72 h-10">
                </div>
                <div>
                    <h3 class="p-2">Delivery Charges (per KM)</h3>
                    <input type="text" placeholder="Delivery Charges(per KM)" name="delivery_charges_km"
                        value="{{ $shop->shop->delivery_charges_km }}" class="w-72 h-10">
                </div>
                <div>
                    <h3 class="p-2">Minimum Order Amount</h3>
                    <input type="text" placeholder="Minimum Orde Amount" name="min_order_amount"
                        value="{{ $shop->shop->min_order_amount }}" class="w-72 h-10">
                </div>
                <div>
                    <h3 class="p-2">License</h3>
                    <input type="text" placeholder="License" name="licence" value="{{ $shop->shop->min_order_amount }}"
                        class="w-72 h-10">
                </div>
                <div>
                    <h3 class="p-2">Delivery Radius(KM)</h3>
                    <input type="text" placeholder="Delivery Radius(KM)" name="delivery_radius"
                        value="{{ $shop->shop->delivery_radius }}" class="w-72 h-10">
                </div>
                <div>
                    <h3 class="p-2">Other License</h3>
                    <input type="text" placeholder="Other License" class="w-72 h-10">
                </div>
                <button class="w-52 h-10 m-8 rounded-lg text-xl text-white bg-blue-800">View On Map</button>
                <div>
                    <h3 class="p-2">Award</h3>
                    <input type="text" placeholder="Award" class="w-72 h-10">
                </div>
            </div>
            <a href="" class="flex justify-center"><button
                    class="w-52 h-10 rounded-lg text-xl text-white bg-blue-800">Submit</button></a>
        </div>
    </form>
@endsection
