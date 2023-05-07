@extends('layouts.shop')
@section('body')
    <div class="w-full m-6 space-y-4">
        <div class="flex flex-row w-5/6 justify-between space-x-4">
            <a href="{{ url('shopdetails') }}" class="w-52 text-center h-12 text-xl text-blue-800 border border-blue-800">Shop
                Details</a>
            <a href="{{ url('shop-reviews') }}" class="w-52 text-center h-12 text-xl text-white bg-blue-800">Rating &
                Reviews</a>
            <a href="{{ url('shop-configuration') }}"
                class="w-52 text-center h-12 text-xl text-blue-800 border border-blue-800">Configuration</a>
        </div>
        <div class="space-y-6">
            @foreach ($reviews as $review)
                <div class="flex flex-row items-center space-x-5 w-5/6 h-36 p-8 border-2 border-gray-600">
                    <img class="h-20 w-20 object-cover rounded-full" src="{{ URL::asset('/images/user.png') }}"
                        alt="" />
                    <div class=" space-y-3">
                        <h3 class="font-bold">{{ $review->reviewable->name }}</h3>
                        <h3>{{ $review->created_at->format('Y-m-d') }}</h3>
                        <div class="flex space-x-2"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="currentColor" class="w-6 h-6 text-yellow-500">
                                <path fill-rule="evenodd"
                                    d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                    clip-rule="evenodd" />
                            </svg>
                            <h3>{{ $review->rating }}</h3>
                        </div>
                        <div>{{ $review->description }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
