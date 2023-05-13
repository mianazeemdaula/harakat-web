@extends('layouts.shop')
@section('body')
    <div class="w-full m-6">
        {{-- <div class="flex justify-between pr-32 pl-12">
            <h2 class="font-bold">ADD NEW ADDON'S CATEGORY</h2>
            <a href="{{ url('product') }}">
                <h3 class="flex items-center font-bold text-xl"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                    </svg>ADDON'S LIST</h3>
            </a>
        </div>
        <div class="grid grid-cols-2 gap-8 justify-items-center p-6">
            <div>
                <h3 class="p-2">NAME</h3>
                <input type="text" placeholder="Name" class="w-80">
            </div>
            <div>
                <h3 class="p-2">NAME(Arabic)</h3>
                <input type="text" placeholder="Name" class="w-80">
            </div>
            <div>
                <h3 class="p-2">DISCRIPTION</h3>
                <input type="text" placeholder="Discription" class="w-80 h-32 rounded-xl">
            </div>
            <div>
                <h3 class="p-2">DISCRIPTON(Arabic)</h3>
                <input type="text" placeholder="Discription" class="w-80 h-32 rounded-xl">
            </div>
        </div>
        <div class="pl-12 flex justify-end items-center pr-32">
            <a href="{{ url('addnewaddons') }}"><button
                    class="w-32 h-10 rounded-lg text-white bg-blue-600">submit</button></a>
        </div> --}}

        <form method="POST" action="{{ route('addon-cat.store') }}">
            @csrf

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="name" class="block text-gray-700 font-bold mb-2">Name:</label>
                    <input id="name" name="name" type="text"
                        class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('name') }}" required
                        autofocus>
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="name_ar" class="block text-gray-700 font-bold mb-2">Name Arabic:</label>
                    <input id="name_ar" name="name_ar" type="text"
                        class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('name_ar') }}" required>
                    @error('name_ar')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="description" class="block text-gray-700 font-bold mb-2">Description:</label>
                    <input id="description" name="description" class="form-input rounded-md shadow-sm mt-1 block w-full"
                        value="{{ old('description') }}" required>
                    @error('description')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="description_ar" class="block text-gray-700 font-bold mb-2">Description Arabic:</label>
                    <input id="description_ar" name="description_ar" type="text"
                        class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('description_ar') }}"
                        required>
                    @error('description_ar')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>



                <div class="mt-4">
                    <button type="submit"
                        class="py-2 px-4 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50">Submit</button>
                </div>
        </form>

    </div>
@endsection
