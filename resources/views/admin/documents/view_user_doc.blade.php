@extends('layouts.admin')
@section('body')
    <div class="p-9 w w-full">
        <div class="flex flex-col items-center justify-center">
            <div class="text-center">{{ $doc->card->name }}</div>
            <img src="{{ $doc->doc }}" alt="" srcset="" class="w-80 h-80 my-6">
            <div class="flex space-x-4">
                <form action="{{ route('user-loyalty-card.update', $doc->id) }}" method="post">
                    @csrf
                    @method('put')
                    <input type="hidden" name="status" value="accept">
                    <button
                        class="py-2 px-4 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50">{{ __('label.accept') }}</button>
                </form>
                <form action="{{ route('user-loyalty-card.update', $doc->id) }}" method="post">
                    @csrf
                    @method('put')
                    <input type="hidden" name="status" value="reject">
                    <button
                        class="py-2 px-4 bg-red-500 text-white rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-600 focus:ring-opacity-50">{{ __('label.reject') }}</button>
                </form>
                <a href="{{ $doc->path }}"
                    class="py-2 px-4 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50">{{ __('label.open') }}</a>
            </div>
        </div>
    </div>
@endsection
