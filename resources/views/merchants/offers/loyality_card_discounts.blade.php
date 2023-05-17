@extends('layouts.shop')
@section('body')
    <div class="w-full m-6">
        <form method="POST" action="{{ url('loyalty-card-discount') }}">
            @csrf
            <div class="grid grid-cols-2 gap-4">
                @foreach ($cards as $item)
                    <div>
                        <label for="{{ $item->id }}"
                            class="block text-gray-700 font-bold mb-2">{{ app()->currentLocale() == 'en' ? $item->name : $item->name_ar }}:</label>
                        <input id="{{ $item->id }}" name="key-{{ $item->id }}" type="text"
                            class="form-input rounded-md shadow-sm mt-1 block w-full"
                            value="{{ \App\Models\ShopLoyaltyCardDiscount::where('user_id', auth()->id())->where('loyalty_card_id', $item->id)->first()->discount_percent ?? 0 }}"
                            required autofocus>
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
