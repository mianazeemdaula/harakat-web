@extends('layouts.shop')
@section('body')
    <div class="m-9 w-full">
        <div class="flex flex-row space-x-1 ">
            <a href="{{ url('shop/pending/order/') }}"
                class="px-4 py-3 {{ $status == 'pending' ? 'bg-blue-800 text-white' : 'border-2 border-blue-800 text-blue-800' }} rounded-lg  font-extrabold">Pending
                Orders({{ $pendingCount }})</a>
            <a href="{{ url('shop/approved/order/') }}"
                class="px-4 py-3 {{ $status == 'approved' ? 'bg-blue-800 text-white' : 'border-2 border-blue-800 text-blue-800' }} rounded-lg  font-extrabold">Approved
                Orders({{ $approvedCount }})</a>
            <a href="{{ url('shop/processing/order/') }}"
                class="px-4 py-3 {{ $status == 'processing' ? 'bg-blue-800 text-white' : 'border-2 border-blue-800 text-blue-800' }} rounded-lg  font-extrabold">Processing
                Orders({{ $processedCount }})</a>
            <a href="{{ url('shop/completed/order/') }}"
                class="px-4 py-3 {{ $status == 'completed' ? 'bg-blue-800 text-white' : 'border-2 border-blue-800 text-blue-800' }} rounded-lg  font-extrabold">Completed
                Orders({{ $completedCount }})</a>
            <a href="{{ url('shop/canceled/order/') }}"
                class="px-4 py-3 {{ $status == 'canceled' ? 'bg-blue-800 text-white' : 'border-2 border-blue-800 text-blue-800' }} rounded-lg  font-extrabold">Cancelled
                Orders({{ $canceledCount }})</a>
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
