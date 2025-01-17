@extends('layouts.shop')
@section('body')
    <div class="w-full h-auto m-6 space-y-8">
        <div class="w-3/6 space-x-6">
            <button class="px-4 py-2 text-xl outline-none border-b-4 border-blue-800">PENDING</button>
            <button class="px-4 py-2 text-xl outline-none">ACTIVE</button>
            <button class="px-4 py-2 text-xl outline-none">HISTORY</button>
        </div>
        <div class="flex flex-row justify-between m-6">
            <button type="array_search" class="px-24 py-2 text-gray-400 bg-gray-200">Search</button>
            <a href="{{ url()->current() }}" class="px-24 py-2 rounded-lg text-white bg-blue-800">Refresh</a>
        </div>
        @foreach ($orders as $order)
            <div class=" p-4 rounded-lg space-y-3 border-2 border-gray-300">
                <div class="flex items-center justify-between">
                    <div class="flex flex-row space-x-4">
                        <h3 class="mt-2">ORDER ID-{{ $order->id }}</h3>
                        <a href="{{ url("shop/order/$order->id") }}"
                            class="px-8 py-2 rounded-lg font-semibold text-blue-800 border border-blue-800">VIEW
                            DETAILS</a>
                    </div>
                    <div class="flex flex-row">
                        <h3>ORDER DATE- </h3>
                        <div class="font-semibold text-gray-900"> {{ $order->created_at }} </div>
                    </div>
                </div>
                @foreach ($order->details as $item)
                    <div class="flex flex-row space-x-4 items-center">
                        <img class="h-8 w-8 object-cover rounded-full" src="{{ URL::asset('/images/montano.png') }}"
                            alt="" />
                        <div class="font-semibold text-gray-900">{{ $item->product->name }} x {{ $item->qty }}</div>
                    </div>
                @endforeach
                <div class="flex flex-row justify-between">

                    <div class="flex flex-row">
                        <div class="font-semibold text-gray-900">Payment {{ $order->payment_type }}</div>
                    </div>
                </div>
                <hr class="h-1 bg-gray-300">
                <div class="flex items-center justify-between">
                    <div class="space-y-3">
                        <div class="font-semibold text-gray-900">Price- AED ${{ $order->total_amount }}</div>
                        <h3>Contact User- {{ $order->user->mobile }}</h3>
                    </div>
                    <div class=" flex space-x-3">
                        <form action="{{ url("shop/order/$order->id") }}" method="post">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="status" value="canceled">
                            <button type="submit" class="px-6 py-2 text-white bg-slate-300">REJECT</button>
                        </form>
                        <form action="{{ url("shop/order/$order->id") }}" method="post">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="status" value="accept">
                            <button type="submit" class="px-8 py-2 text-white bg-blue-800">CONFIRM</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
