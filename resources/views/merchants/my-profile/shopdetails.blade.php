@extends('layouts.shop')
@section('body')
    <form action="{{ url('shopdetails') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="w-full m-6 space-y-4">
            <div class="flex flex-row w-5/6 justify-between space-x-4">
                <a href="{{ url('shopdetails') }}" class="w-52 text-center h-12 text-xl text-white bg-blue-800">Shop
                    Details</a>
                <a href="{{ url('shop-reviews') }}"
                    class="w-52 text-center h-12 text-xl text-blue-800 border border-blue-800">Rating &
                    Reviews</a>
                <a href="{{ url('shop-configuration') }}"
                    class="w-52 text-center h-12 text-xl text-blue-800 border border-blue-800">Configuration</a>
            </div>
            <div class="grid grid-cols-2 justify-items-center gap-4">
                <div class="flex items-center space-x-4">
                    <!-- Avatar with preview image -->
                    <label for="avatar" class="relative">
                        <img src="{{ $shop->image }}" alt="image" class="rounded-full w-24 h-24">
                        <img id="preview" src="#" alt="Preview"
                            class="absolute inset-0 w-full h-full object-cover rounded-full opacity-0">
                        <input type="file" id="avatar" name="image" accept="image/*" class="hidden"
                            onchange="previewImage(event)">
                    </label>
                </div>

                <div>
                    <h3 class="p-2">Name</h3>
                    <input type="text" placeholder="Name" name="name" value="{{ $shop->shop->shop_name }}"
                        class="w-72 h-10">
                </div>
                <div>
                    <h3 class="p-2">Address</h3>
                    <input type="text" placeholder="Address" name="address" value="{{ $shop->shop->address }}"
                        class="w-72 h-10">
                </div>
                <div>
                    <h3 class="p-2">Phone</h3>
                    <input type="text" placeholder="Phone" name="phone" value="{{ $shop->shop->phone }}"
                        class="w-72 h-10">
                </div>
                <div>
                    <h3 class="p-2">Email</h3>
                    <input type="email" placeholder="Email" readonly name="email" value="{{ $shop->email }}"
                        class="w-72 h-10">
                </div>
                <div>
                    <h3 class="p-2">Minimum Order Amount</h3>
                    <input type="text" placeholder="Minimum Orde Amount" name="min_order_amount"
                        value="{{ $shop->shop->min_order_amount }}" class="w-72 h-10">
                </div>
                <div>
                    <h3 class="p-2">License</h3>
                    <input type="text" placeholder="License" name="licence" value="{{ $shop->shop->min_order_amount }}"
                        class="w-72 h-10">
                </div>
                <div>
                    <h3 class="p-2">Delivery Radius(KM)</h3>
                    <input type="text" placeholder="Delivery Radius(KM)" name="delivery_radius"
                        value="{{ $shop->shop->delivery_radius }}" class="w-72 h-10">
                </div>
                <div>
                    <h3 class="p-2">License</h3>
                    <div class="flex flex-row gap-2">
                        @foreach ($shop->licences as $item)
                            <div class="bg-gray-200 text-gray-700 rounded-full px-3 py-1 text-sm font-semibold">
                                {{ $item->title }}
                            </div>
                        @endforeach
                    </div>
                </div>
                <div>
                    <h3 class="p-2">Award</h3>
                    <div class="flex flex-row gap-2">
                        @foreach ($shop->awards as $item)
                            <div class="bg-gray-200 text-gray-700 rounded-full px-3 py-1 text-sm font-semibold">
                                {{ $item->title }}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <a href="" class="flex justify-center"><button
                    class="w-52 h-10 rounded-lg text-xl text-white bg-blue-800">Submit</button></a>
        </div>
    </form>
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
