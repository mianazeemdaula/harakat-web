@extends('layouts.shop')
@section('body')
    <div class="w-full m-6">
        <div class="flex justify-between pr-32 pl-12">
            <h2 class="font-bold">EDIT PRODUCT</h2>
            <a href="{{ url('products') }}">
                <h3 class="flex items-center font-bold text-xl"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                    </svg>PRODUCT LIST</h3>
            </a>
        </div>
        <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="flex justify-center">
                <label for="avatar" class="relative">
                    <img src="{{ $product->image }}" alt="image" class="rounded-full w-24 h-24">
                    <img id="preview" src="#" alt="Preview"
                        class="absolute inset-0 w-full h-full object-cover rounded-full opacity-0">
                    <input type="file" id="avatar" name="image" accept="image/*" class="hidden"
                        onchange="previewImage(event)">
                </label>
            </div>
            <div class="grid grid-cols-2 gap-2 justify-items-center p-6">
                <div>
                    <h3 class="p-2">NAME</h3>
                    <input type="text" placeholder="name" name="name" value="{{ $product->name }}" class="w-80">
                </div>
                <div>
                    <h3 class="p-2">NAME(Arabic)</h3>
                    <input type="text" placeholder="Arabic" name="name_ar" value="{{ $product->name_ar }}"
                        class="w-80">
                </div>
                <div>
                    <h3 class="p-2">Price</h3>
                    <input type="text" placeholder="Price" name="price" value="{{ $product->price }}" class="w-80">
                </div>
                <div>
                    <h3 class="p-2">Preparation Time (minuts)</h3>
                    <input type="text" placeholder="Preparation Time" name="prepration_time"
                        value="{{ $product->prepration_time }}" class="w-80">
                </div>
                <div>
                    <h3 class="p-2">DISCRIPTION</h3>
                    <input type="text" placeholder="Discription" name="description" value="{{ $product->description }}"
                        class="w-80 h-32 rounded-xl">
                </div>
                <div>
                    <h3 class="p-2">DISCRIPTON(Arabic)</h3>
                    <input type="text" placeholder="Discription" name="description_ar"
                        value="{{ $product->description_ar }}" class="w-80 h-32 rounded-xl">
                </div>
                <div>
                    <h3 class="p-2">Promotion Price</h3>
                    <input type="text" placeholder="Promotion Price" name="promo_price"
                        value="{{ $product->promo_price }}" class="w-80">
                </div>
                <div>
                    <h3 class="p-2">Weight (Grams)</h3>
                    <input type="text" placeholder="Name" name="weight" value="{{ $product->weight }}" class="w-80">
                </div>
                <div>
                    <h3 class="p-2">Category</h3>
                    <select name="category" id="" class="w-80">
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}"
                                {{ $item->id == $product->product_category_id ? 'selected' : '' }}> {{ $item->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="flex items-center space-x-4 mt-4">
                    <a href="{{ url("/product-addons/$product->id") }}"
                        class="w-80 flex justify-center text-white rounded-full mt-8 px-16 py-3  bg-blue-600">Manage
                        Addons</a>
                </div>

                <button class="w-52 h-10 rounded-lg text-xl text-white bg-blue-800">Submit</button>
                <div class="grid grid-cols-2 gird-cols-3 gap-2">
                    <h3>Available</h3>
                    <h3>Promotion</h3>
                    <input type="checkbox" name="available" {{ $product->available ? 'checked' : '' }} class="w-6 h-6">
                    <input type="checkbox" name="promo" {{ $product->promo ? 'checked' : '' }} class="w-6 h-6">
                </div>
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
