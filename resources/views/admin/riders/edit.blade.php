@extends('layouts.admin')
@section('body')
    <div class="w-full m-6">
        <form method="POST" action="{{ route('riders.update', $user->id) }}">
            @csrf
            @method('put')
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="name" class="block text-gray-700 font-bold mb-2">Name:</label>
                    <input id="name" name="name" type="text"
                        class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ $user->name }}" required
                        autofocus>
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block text-gray-700 font-bold mb-2">Email:</label>
                    <input id="email" name="email" type="email"
                        class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ $user->email }}" required>
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="mobile" class="block text-gray-700 font-bold mb-2">Mobile:</label>
                    <input id="mobile" name="mobile" class="form-input rounded-md shadow-sm mt-1 block w-full"
                        value="{{ $user->mobile }}" required>
                    @error('mobile')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="address" class="block text-gray-700 font-bold mb-2">Address:</label>
                    <input id="address" name="address" type="text"
                        class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ $user->rider->address }}"
                        required>
                    @error('address')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="category" class="block text-gray-700 font-bold mb-2">City:</label>
                    <select name="city" class="form-input rounded-md shadow-sm mt-1 block w-full">
                        @foreach ($cities as $city)
                            <option value="{{ $city->id }}" {{ $user->rider->city_id == $city->id ? 'selected' : '' }}>
                                {{ $city->name }}</option>
                        @endforeach
                    </select>
                    @error('city')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="appartment" class="block text-gray-700 font-bold mb-2">Appartment:</label>
                    <input id="appartment" name="appartment" type="text"
                        class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ $user->rider->appartment }}"
                        required>
                    @error('appartment')
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
