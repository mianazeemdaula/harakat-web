@extends('layouts.admin')
@section('body')
    <div class="w-full m-6">
        <form method="POST" action="{{ url('app-setting') }}">
            @csrf
            <div class="grid grid-cols-2 gap-4">
                @foreach ($settings as $item)
                    <div>
                        <label for="{{ $item->key }}"
                            class="block text-gray-700 font-bold mb-2">{{ __("label.$item->key") }}:</label>
                        <input id="{{ $item->key }}" name="{{ $item->key }}" type="text"
                            class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ $item->value }}" required
                            autofocus>
                        @error($item->key)
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                @endforeach
                <div class="mt-4">
                    <button type="submit"
                        class="py-2 px-4 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50">Submit</button>
                </div>
        </form>
    </div>
@endsection
