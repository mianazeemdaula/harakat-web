@extends('layouts.shop')
@section('body')
    <div class="w-full m-6">
        <h6 class="">
            {{ Str::ucfirst($type) }}
        </h6>
        <form method="POST" action="{{ route('shop-docs.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="type" value="{{ $type }}">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="avatar" class="relative w-40 h-40">
                        <img src="https://ui-avatars.com/api/?name=John+Doe" alt="image" class="w-40 h-40">
                        <img id="preview" src="#" alt="Preview"
                            class="absolute inset-0  w-40 h-40 object-cover opacity-0">
                        <input type="file" id="avatar" name="image" accept="image/*" class="hidden"
                            onchange="previewImage(event)">
                    </label>
                    @error('image')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
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
