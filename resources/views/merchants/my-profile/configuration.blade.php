@extends('layouts.shop')
@section('body')
    <form action="{{ url('/shop-configuration') }}" method="POST">
        @csrf
        <div class="w-full m-6 space-y-4">
            <div class="flex flex-row w-5/6 justify-between">
                <a href="{{ url('shopdetails') }}"
                    class="w-52 text-center  h-12 text-xl text-blue-800 border border-blue-800">Shop
                    Details</a>
                <a href="{{ url('shop-reviews') }}"
                    class="w-52 text-center h-12 text-xl text-blue-800 border border-blue-800">Rating &
                    Reviews</a>
                <a href="{{ url('shop-configuration') }}"
                    class="w-52 text-center h-12 text-xl text-white bg-blue-800">Configuration</a>
            </div>
            <h2>DELIVERY TIMINGS</h2>
            <div>
                <h3 class="ml-3">Preparation Time</h3>
                <input type="text" name="prepration_time" id="" value="{{ $shop->shop->prepration_time }}"
                    placeholder="00:00:00" class="w-52 h-8">
            </div>
            <div class="flex flex-row space-x-24">
                <div>
                    <h3 class="ml-3">Minimum Delivery Time</h3>
                    <input type="text" name="min_delivery_time" value="{{ $shop->shop->min_delivery_time }}"
                        id="" placeholder="15 min" class="w-52 h-8">
                </div>
                <div>
                    <h3 class="ml-3">Maximum Delivery Time</h3>
                    <input type="text" name="max_delivery_time" value="{{ $shop->shop->max_delivery_time }}"
                        id="" placeholder="15 min" class="w-52 h-8">
                </div>
            </div>
            <h2>Set Time Slot</h2>
            <div class=" p-4 rounded-lg border border-gray-500">
                @for ($i = 0; $i <= 6; $i++)
                    <div class="flex flex-row space-x-4 space-y-4 items-center">
                        @php
                            $weekday = \Carbon\Carbon::now()->startOfWeek();
                        @endphp
                        <div class="flex-1">
                            <h4>{{ $weekday->addDays($i)->format('l') }}</h4>
                        </div>
                        <div class=" flex space-x-4">
                            <input type="time" name="timefrom[]" value="{{ $shop->timeSlots[$i]->min_delivery_time }}"
                                placeholder="15 min" class="w-64 h-10">
                            <h4>TO</h4>
                            <input type="time" value="{{ $shop->timeSlots[$i]->max_delivery_time }}" name="timeto[]"
                                placeholder="15 min" class="w-64 h-10">
                            {{-- <input type="checkbox" role="switch" name="" id=""> --}}
                        </div>
                    </div>
                @endfor
            </div>
            <div class="">
                <button type="submit" class="text-white py-2 px-44 mt-6 rounded-lg  bg-blue-600 font-bold">Save</button>
            </div>

        </div>
    </form>
@endsection
