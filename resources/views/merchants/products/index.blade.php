@extends('layouts.shop')
@section('body')
    <div class="w-full m-6">
        <div class="my-4">
            <a href="{{ route('products.create') }}" class="p-2 rounded-lg text-xl text-white bg-blue-800">Add
                Product</a>
        </div>
        @foreach ($products as $product)
            <div class="bg-white overflow-hidden shadow-sm rounded-lg divide-y divide-gray-200 mb-4">
                <div class="px-4 py-4 sm:px-6 bg-green-50">
                    <div class="flex items-center justify-between ">
                        <div class="text-lg leading-6 font-medium text-gray-900">AED {{ $product->price }}</div>
                        <div class="text-sm leading-5 text-gray-500">{{ $product->category->name }}</div>
                    </div>
                </div>
                <div class="px-4 py-4 sm:px-6 flex items-center justify-between">
                    <div class="flex items-center">
                        <img class="h-12 w-12 rounded-full object-cover" src="{{ $product->image }}" alt="">
                        <div class="">
                            <div class="ml-4 font-bold">{{ $product->name }}</div>
                            <div class="ml-4">{{ Str::substr($product->description, 0, 50) }}...</div>
                        </div>
                    </div>
                    <div class="flex items-center space-x-2">
                        <a href="{{ route('products.edit', $product->id) }}" class="text-gray-500 hover:text-gray-700">
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 3h6v6M4 17l6.125-1.625L16.375 9l2.25-2.25L20.75 4l-2.25-2.25L16.375 3l-6.25 6.375L4 16.75v.5l.625.125L8.625 19l.5-.625" />
                            </svg>

                        </a>
                        <form action="{{ route('products.destroy', $product) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-gray-500 hover:text-gray-700">
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M4.293 13.707a1 1 0 010-1.414L8.586 7.5 4.293 3.207a1 1 0 111.414-1.414L10 6.086l4.293-4.293a1 1 0 111.414 1.414L11.414 7.5l4.293 4.293a1 1 0 11-1.414 1.414L10 8.914l-4.293 4.293a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
        <div>
            <x-web-pagination :paginator="$products" />
        </div>
    </div>
@endsection
