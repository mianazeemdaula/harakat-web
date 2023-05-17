@extends('layouts.admin')
@section('body')
    <div class="p-9 w w-full">
        <div class="grid grid-cols-3 gap-8">
            @foreach ($cards as $item)
                @php
                    $card = $userCards->where('loyalty_card_id', $item->id)->first();
                @endphp
                <x-document-card title="{{ $item->name }}" status="{{ ucfirst($card->status ?? 'Pending') }}">
                    <a href="{{ $card == null ? '#' : url("user-loyalty-card/$card->id") }}"
                        class="py-2 px-4 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50">{{ __('label.check_status') }}</a>
                </x-document-card>
            @endforeach
        </div>
    </div>
@endsection
