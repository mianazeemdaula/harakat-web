@extends('layouts.admin')
@section('body')
    <div class="w-full m-6">
        <form method="POST" action="{{ route('app-content.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-2 gap-4">
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
                    <label for="title_ar" class="block text-gray-700 font-bold mb-2">Title Arabic:</label>
                    <input id="title_ar" name="title_ar" type="text"
                        class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('title_ar') }}" required>
                    @error('title_ar')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="content" class="block text-gray-700 font-bold mb-2">Content:</label>
                    <textarea id="content" rows="5" name="content" class=" p-4 form-input rounded-md shadow-sm mt-1 block w-full">{{ old('content') }}</textarea>
                    @error('content')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="content_ar" class="block text-gray-700 font-bold mb-2">Content Arabic:</label>
                    <textarea id="content_ar" rows="5" name="content_ar"
                        class="p-4 form-input rounded-md shadow-sm mt-1 block w-full">{{ old('content_ar') }}</textarea>
                    @error('content_ar')
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
