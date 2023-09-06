@extends('layouts.rider')
@section('body')
    <div class="w-full m-6 pb-4">
        <form method="POST" action="{{ route('vehicles.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-end">
                <div>
                    <label for="make" class="block text-gray-700 font-bold mb-2">Make:</label>
                    <input id="make" name="make" type="text"
                        class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('make') }}" required
                        autofocus>
                    @error('make')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="model" class="block text-gray-700 font-bold mb-2">Model:</label>
                    <input id="model" name="model" type="text"
                        class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('model') }}" required>
                    @error('model')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="year" class="block text-gray-700 font-bold mb-2">Year:</label>
                    <input id="year" name="year" type="text"
                        class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('year') }}" required>
                    @error('year')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="type" class="block text-gray-700 font-bold mb-2">Type:</label>
                    <select name="type" class="form-input rounded-md shadow-sm mt-1 block w-full"
                        value="{{ old('type') }}">
                        <option value="bike">Bike</option>
                        <option value="car">Car</option>
                    </select>
                    @error('type')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="plate_number" class="block text-gray-700 font-bold mb-2">Plate Number:</label>
                    <input id="plate_number" name="plate_number" type="text"
                        class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('plate_number') }}"
                        required>
                    @error('plate_number')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="plate_source" class="block text-gray-700 font-bold mb-2">Plate Source:</label>
                    <select name="plate_source" class="form-input rounded-md shadow-sm mt-1 block w-full"
                        value="{{ old('plate_source') }}">
                        @foreach (\App\Models\City::all() as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    @error('plate_source')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="category" class="block text-gray-700 font-bold mb-2">Car Plate Category:</label>
                    <select name="category" class="form-input rounded-md shadow-sm mt-1 block w-full"
                        value="{{ old('category') }}">
                        <option value="(1(2) 12345)">(1(2) 12345)</option>
                        <option value="(A12345)">(A12345)</option>
                        <option value="(A12345) AA">(A12345) AA</option>
                        <option value="Fujairah license plates">Fujairah license plates</option>
                        <option value="Ras Al Khaimah license plates">Ras Al Khaimah license plates</option>
                        <option value="Sharjah license plates">Sharjah license plates</option>
                        <option value="Umm al-Quwain license plates">Umm al-Quwain license plates</option>
                    </select>
                    @error('category')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="cylender" class="block text-gray-700 font-bold mb-2">Cylender:</label>
                    <input id="cylender" name="cylender" type="text"
                        class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('cylender') }}" required>
                    @error('cylender')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="licence_issue_date" class="block text-gray-700 font-bold mb-2">Licence Issuange
                        Date:</label>
                    <input id="licence_issue_date" name="licence_issue_date" type="date"
                        class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('licence_issue_date') }}"
                        required>
                    @error('licence_issue_date')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="licence_expiry_date" class="block text-gray-700 font-bold mb-2">Licence Expiry Date:</label>
                    <input id="licence_expiry_date" name="licence_expiry_date" type="date"
                        class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('licence_expiry_date') }}"
                        required>
                    @error('licence_expiry_date')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="insurance_type" class="block text-gray-700 font-bold mb-2">Insurance Type:</label>
                    <select name="insurance_type" class="form-input rounded-md shadow-sm mt-1 block w-full"
                        value="{{ old('insurance_type') }}">
                        <option value="a">A</option>
                        <option value="b">B</option>
                    </select>
                    @error('insurance_type')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="area" class="block text-gray-700 font-bold mb-2">Area:</label>
                    <select name="area" class="form-input rounded-md shadow-sm mt-1 block w-full"
                        value="{{ old('area') }}">
                        <option value="govt colony">Govt Colony</option>
                        <option value="dhaki">Dhaki</option>
                    </select>
                    @error('area')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="zone" class="block text-gray-700 font-bold mb-2">Zone:</label>
                    <select name="zone" class="form-input rounded-md shadow-sm mt-1 block w-full"
                        value="{{ old('zone') }}">
                        <option value="A1">A1</option>
                        <option value="A2">A2</option>
                    </select>
                    @error('zone')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="rider_id" class="block text-gray-700 font-bold mb-2">Driver:</label>
                    <select name="rider_id" class="form-input rounded-md shadow-sm mt-1 block w-full"
                        value="{{ old('rider_id') }}">
                        @foreach (\App\Models\User::whereHas('rider')->get() as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    @error('rider_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="vehicle_receive_date" class="block text-gray-700 font-bold mb-2">Vehicle Receive
                        Date:</label>
                    <input id="vehicle_receive_date" name="vehicle_receive_date" type="date"
                        class="form-input rounded-md shadow-sm mt-1 block w-full"
                        value="{{ old('vehicle_receive_date') }}" required>
                    @error('vehicle_receive_date')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="vehicle_return_date" class="block text-gray-700 font-bold mb-2">Vehicle Return
                        Date:</label>
                    <input id="vehicle_return_date" name="vehicle_return_date" type="date"
                        class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('name_ar') }}" required>
                    @error('vehicle_return_date')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="">
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
