@extends('layouts.shop')
@section('body')
    <div class="w-full">
        <form action="{{ url("promos/$offer->id") }}" method="POST" enctype="multipart/form-data"
            class="flex flex-col space-y-5 p-8">
            @csrf
            @method('put')
            <div class="flex items-center space-x-8">
                <div>
                    <input type="text" placeholder="Title" name="title" value="{{ $offer->title }}" class="">
                    @error('title')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <input type="text" placeholder="Discount AED" name="discount" value="{{ $offer->discount }}">
                    @error('discount')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="flex items-center space-x-8">
                <div>
                    <input type="text" placeholder="Promo Cade(Not allowed space)" name="code"
                        value="{{ $offer->code }}" class="flex flex-1">
                    @error('code')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div><input type="number" placeholder="Promo Code Usage Limit" name="limit" value="{{ $offer->limit }}"
                        class="flex flex-1">
                    @error('limit')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="flex items-center space-x-8">
                <div>
                    <input type="number" placeholder="Min Purchase" name="min_purchase" value="{{ $offer->min_purchase }}"
                        class="flex flex-1">
                    @error('min_purchase')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <input type="number" placeholder="Max Discount" name="max_discount" value="{{ $offer->max_discount }}"
                        class="flex flex-1">
                    @error('max_discount')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="flex items-center space-x-8">
                <div>
                    <input type="date" placeholder="Start Date" name="start_date" value="{{ $offer->start_date }}"
                        class="flex flex-1">
                    @error('start_date')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <input type="date" placeholder="Expiry Date" name="expire_date" value="{{ $offer->expire_date }}"
                        class="flex flex-1">
                    @error('expire_date')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="flex items-center space-x-8 ">
                <div class="">
                    <label for="avatar" class="relative">
                        <img src="{{ $offer->image }}" alt="image" class="rounded-full w-24 h-24">
                        <img id="preview" src="#" alt="Preview"
                            class="absolute inset-0 w-full h-full object-cover rounded-full opacity-0">
                        <input type="file" id="avatar" name="image" accept="image/*" class="hidden"
                            onchange="previewImage(event)">
                    </label>
                    @error('image')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit"
                    class="w-80 flex justify-center text-white rounded-full mt-8 px-16 py-3  bg-blue-600">Save</button>

            </div>

        </form>
    </div>
@endsection


@section('js')
    <script>
        function previewImage(event) {
            const preview = document.getElementById('preview');
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.addEventListener('load', function() {
                    preview.setAttribute('src', reader.result);
                    preview.classList.add('opacity-100');
                });
                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection
