@extends('layouts.shop')
@section('body')
    <div class="p-9 w w-full">
        <div class="grid grid-cols-3 gap-8">
            <x-document-card title="Shop Licence"
                status="{{ ucfirst($docs->where('type', 'licence')->first()->status ?? 'Pending') }}">
                <a href="{{ url('shop-docs-upload/licence') }}"
                    class="py-2 px-4 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50">{{ __('label.submit') }}</a>
            </x-document-card>
            <x-document-card title="Other Licence"
                status="{{ ucfirst($docs->where('type', 'other')->first()->status ?? 'Pending') }}">
                <a href="{{ url('shop-docs-upload/other') }}"
                    class="py-2 px-4 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50">{{ __('label.submit') }}</a>
            </x-document-card>
            <x-document-card title="Awards"
                status="{{ ucfirst($docs->where('type', 'award')->first()->status ?? 'Pending') }}">
                <a href="{{ url('shop-docs-upload/award') }}"
                    class="py-2 px-4 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50">{{ __('label.submit') }}</a>
            </x-document-card>
        </div>
    </div>
@endsection
