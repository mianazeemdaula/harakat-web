@extends('layouts.admin')
@section('body')
    <div class="w-full m-6">
        <form method="POST" action="{{ url('notification') }}">
            @csrf
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="to" class="block text-gray-700 font-bold mb-2">TO:</label>
                    <input type="checkbox" name="riders" id=""> Riders
                    <input type="checkbox" name="shops" id=""> Shops
                    <input type="checkbox" name="users" id=""> Users
                    @error('to')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="individual" class="block text-gray-700 font-bold mb-2">Individual:</label>
                    <select id="individual" name="individual[]" multiple
                        class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('individual') }}">
                        @foreach ($users as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    @error('individual')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="title" class="block text-gray-700 font-bold mb-2">Title:</label>
                    <input id="title" name="title" type="text"
                        class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('title') }}" required
                        autofocus>
                    @error('title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="body" class="block text-gray-700 font-bold mb-2">Body:</label>
                    <input id="body" name="body" type="text"
                        class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('body') }}" required>
                    @error('body')
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
