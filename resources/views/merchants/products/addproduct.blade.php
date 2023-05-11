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
        <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-2 gap-2 justify-items-center p-6">
                <div>
                    <h3 class="p-2">NAME</h3>
                    <input type="text" placeholder="name" name="name" class="w-80">
                    @error('name')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <h3 class="p-2">NAME(Arabic)</h3>
                    <input type="text" placeholder="Arabic" name="name_ar" class="w-80">
                    @error('name_ar')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <h3 class="p-2">Price</h3>
                    <input type="text" placeholder="Price" name="price" class="w-80">
                    @error('price')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <h3 class="p-2">Preparation Time (minuts)</h3>
                    <input type="text" placeholder="Preparation Time" name="prepration_time" class="w-80">
                    @error('prepration_time')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <h3 class="p-2">DISCRIPTION</h3>
                    <input type="text" placeholder="Discription" name="description" class="w-80 h-32 rounded-xl">
                    @error('description')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <h3 class="p-2">DISCRIPTON(Arabic)</h3>
                    <input type="text" placeholder="Discription" name="description_ar" class="w-80 h-32 rounded-xl">
                    @error('description_ar')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <h3 class="p-2">Promotion Price</h3>
                    <input type="text" placeholder="Promotion Price" name="promo_price" class="w-80">
                    @error('promo_price')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <h3 class="p-2">Weight (Grams)</h3>
                    <input type="text" placeholder="Name" name="weight" class="w-80">
                    @error('weight')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <h3 class="p-2">Category</h3>
                    <select name="category" id="" class="w-80">
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}"> {{ $item->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex items-center space-x-4 mt-4">
                    <label for="avatar" class="relative">
                        <img src="https://ui-avatars.com/api/?name=Axy+Boe" alt="image" class="rounded-full w-24 h-24">
                        <img id="preview" src="#" alt="Preview"
                            class="absolute inset-0 w-full h-full object-cover rounded-full opacity-0">
                        <input type="file" id="avatar" name="image" accept="image/*" class="hidden"
                            onchange="previewImage(event)">
                    </label>
                    <button class="w-52 h-10 rounded-lg text-xl text-white bg-blue-800">Submit</button>
                    @error('image')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="grid grid-cols-2 gird-cols-3 gap-2">
                    <h3>Available</h3>
                    <h3>Promotion</h3>
                    <input type="checkbox" name="available" class="w-6 h-6">
                    <input type="checkbox" name="promo" class="w-6 h-6">
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
