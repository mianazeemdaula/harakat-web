@extends('layouts.signup')
@section('body')
    <form action="{{ url('/shop/reg/final') }}" method="POST">
        @csrf
        <div class=" flex flex-row justify-between w-screen h-14 bg-blue-900">
            <div class=" font-bold text-white text-xl ml-24 mt-3">Merchant Singup Page</div>
            <button type="submit" class="my-3 mr-24 text-white px-6 py-1 rounded-full bg-slate-400">Next</button>
        </div>
        <div class=" w-screen h-screen">
            <div class=" absolute m-12">
                <img src="{{ asset('/images/Harkatshop.png') }}" alt="logo" class=" w-36 h-24">
            </div>
            <div class=" flex flex-col mt-4 w-screen justify-center items-center">
                <div>Step 3 of 3</div>
                <h1>Create your Account</h1>
                <div class="w-1/2 mt-6">
                    <div class="">
                        <input type="text" name="shop_name" placeholder="Full Name">
                        @error('shop_name')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="md:flex flex-col space-y-5 mt-4">

                        <div class="flex items-center space-x-4">
                            <div class="">
                                <input type="email" placeholder="Email" name="email" class="">
                                @error('email')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="">
                                <input type="password" placeholder="Password" name="password" class="">
                                @error('password')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="flex items-center space-x-8">
                            <div class="">
                                <input type="phone" placeholder="Phone" name="phone" class="">
                                @error('phone')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <select name="city" id="">
                                    @foreach ($cities as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('city')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="flex items-center space-x-8">
                            <div class="">
                                <input type="text" placeholder="Latitude" name="lat" class="flex flex-1">
                                @error('lat')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="">
                                <input type="lng" placeholder="Longitude" name="lng" class="flex flex-1">
                                @error('lng')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="flex items-center space-x-8">
                            <div class="">
                                <input type="text" placeholder="Other Licsnse" name="other_license" class="flex flex-1">
                                @error('other_license')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="">
                                <input type="text" placeholder="Awards" name="awards" class="flex flex-1">
                                @error('awards')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
