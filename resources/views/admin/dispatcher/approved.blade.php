@extends('layouts.shop')
@section('body')
    <div class="p-9">
        <div class="flex flex-row space-x-1 mt-12">
            <a href="{{ url('shop/pending/order/') }}"
                class="px-8 py-3 border-2 border-blue-800 rounded-lg text-blue-800 font-extrabold">Pending
                Orders(1)</a>
            <a href="{{ url('shop/approved/order/') }}"
                class="px-8 py-3 bg-blue-800 rounded-lg text-white font-extrabold">Approved
                Orders(1)</a>
            <a href="{{ url('shop/processing/order/') }}"
                class="px-8 py-3 border-2 border-blue-800 rounded-lg text-blue-800 font-extrabold">Processing
                Orders(1)</a>
            <a href="{{ url('shop/completed/order/') }}"
                class="px-8 py-3 border-2 border-blue-800 rounded-lg text-blue-800 font-extrabold">Completed
                Orders(1)</a>
            <a href="{{ url('shop/cacnel/order/') }}"
                class="px-8 py-3 border-2 border-blue-800 rounded-lg text-blue-800 font-extrabold">Cancelled
                Orders(1)</a>
        </div>
        @foreach ($orders as $order)
            <div class="flex flex-row w-full rounded-md border-2 border-blue-800 mt-2">
                <div class="m-4"><img class="border-2 border-blue-800 object-fill h-40 w-60"
                        src="{{ URL::asset('/images/montano.png') }}" alt=""></div>
                <div class="w-4/6 p-4 space-y-8">
                    <div class="grid grid-cols-3 gap-4">
                        <h2>Staus : {{ $order->status }}</h2>
                        <h2>Order No : {{ $order->id }}</h2>
                        <div class="text-red-600 text-2xl">{{ $order->created_at->diffForHumans() }}</div>
                    </div>
                    <h2>{{ $order->drop_address }}
                    </h2>
                </div>
                <div class="flex flex-col gap-y-5 w-32 my-2 mr-4">
                    <form action="{{ url("shop/order/$order->id") }}" method="post">
                        @csrf
                        @method('put')
                        @if ($order->status == 'open' || $order->status == 'pending')
                            <input type="hidden" name="status" value="accept">
                            <button class="py-3 px-2 text-center text-white rounded-lg bg-green-700">Accept</button>
                        @elseif ($order->status == 'accept')
                            <input type="hidden" name="status" value="processed">
                            <button class="py-3 px-2 text-center text-white rounded-lg bg-green-700">Processed</button>
                        @elseif ($order->status == 'processed')
                            <input type="hidden" name="status" value="dispatched">
                            <button class="py-3 px-2 text-center text-white rounded-lg bg-green-700">Dispatched</button>
                        @endif
                    </form>
                    <button class="py-3 px-2 text-center text-white rounded-lg bg-amber-700">Order Details</button>
                    <button class="py-3 px-2 text-center text-white rounded-lg bg-red-700">Cancel</button>
                </div>
            </div>
        @endforeach
    </div>
@endsection
