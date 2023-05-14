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
                            <x-bi-pencil-square />
                        </a>
                        <form action="{{ route('products.destroy', $product) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-gray-500 hover:text-gray-700">
                                <x-bi-trash-fill />
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
