@extends('layouts.shop')
@section('body')
    <div class="w-full m-6">
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
