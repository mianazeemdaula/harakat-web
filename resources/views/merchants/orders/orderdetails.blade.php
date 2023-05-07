@extends('layouts.shop')
@section('body')
    <div class="w-full m-6 space-y-4">
        <a href="{{ url('shop/order') }}">
            <div class="flex items-center text-black text-xl font-bold"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                </svg>
                BACK</div>
        </a>
        <div class="flex flex-row justify-between">
            <div class="text-black text-xl font-bold">ORDER DETAILS : # {{ $order->id }}</div>
            <button class="px-6 py-2 mr-28 rounded-lg text-white bg-blue-600">ON THE WAY</button>
        </div>
        <div class="flex flex-row space-x-4">
            <div class="flex-auto">
                @foreach ($order->details as $item)
                    <div class="mb-2 flex flex-row space-x-4 p-4 rounded-lg border border-slate-300">
                        <img src="{{ URL::asset('/images/montano.png') }}" alt="logo" class="w-12 h-12">
                        <div class="border-l-2 border-slate-300"></div>
                        <div>
                            <h3>{{ $item->product->name }} X {{ $item->qty }}</h3>
                            <h3>AED {{ $item->price * $item->qty }}</h3>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="w-96 space-y-2">
                <div class="p-4 rounded-lg space-y-4 border border-slate-300">
                    <div class="flex flex-row justify-between">
                        <div>
                            <div class="font-semibold text-gray-900">User Name</div>
                            <h3>{{ $order->user->name }}</h3>
                        </div>
                        <img class="h-16 w-16 object-cover rounded-full" src="{{ URL::asset('/images/montano.png') }}"
                            alt="">
                    </div>
                    <div class="font-semibold text-gray-900">User Mobile</div>
                    <h3>{{ $order->user->mobile }}</h3>
                    <div class="font-semibold text-gray-900">User Address</div>
                    <h3>{{ $order->drop_address }}</h3>
                </div>
                <div class="p-4 rounded-lg space-y-4 border border-slate-300">
                    <div class="flex flex-row justify-between">
                        <div class="font-semibold text-gray-900">Order Price</div>
                        <h3>AED {{ $order->gross_amount }}</h3>
                    </div>
                    <div class="flex flex-row justify-between">
                        <div class="font-semibold text-gray-900">Delivery Charges</div>
                        <h3>AED {{ $order->delivery_amount }}</h3>
                    </div>
                    <div class="flex flex-row justify-between">
                        <div class="font-semibold text-gray-900">VAT (5%)</div>
                        <h3>AED {{ $order->vat }}</h3>
                    </div>
                    <div class="flex flex-row justify-between">
                        <div class="font-semibold text-gray-900">Discount</div>
                        <h3>AED {{ $order->discount_amount }}</h3>
                    </div>
                    <div class="flex flex-row justify-between">
                        <div class="font-semibold text-gray-900">Total Price</div>
                        <h3>AED {{ $order->total_amount }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
