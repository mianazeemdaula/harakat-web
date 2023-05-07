@extends('layouts.signup')
@section('body')
    <form action="{{ url('shop/reg') }}" method="POST">
        @csrf
        <div class=" flex flex-col w-screen h-screen">
            <div class=" flex flex-row justify-between w-screen h-14 bg-blue-900">
                <div class=" font-bold text-white text-xl ml-24 mt-3">Merchant Singup Page</div>
                <button type="submit" class="my-3 mr-24 text-white px-6 py-1 rounded-full bg-slate-400">Next</button>
            </div>
            <div class="w-screen">
                <div class="absolute m-12">
                    <img src="{{ URL::asset('/images/Harkatshop.png') }}" alt="logo" class=" object-contain w-36 h-24">
                </div>
                <div class="  mt-8  flex  flex-col  items-center  h-60">
                    <div>Step 1 of 3</div>
                    <h1>What is your business name?</h1>
                    <div><input name="name" type="text"
                            class=" outline-none border-b border-gray-500 py-2 mt-40 w-96"></div>
                    @error('name')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                    <div class="  text-xs  mt-4">
                        <p>By continuing, you agree to accept our <a
                                class=" hover:text-blue-600  border-white  border  border-b-slate-600"
                                href="">Privacy & Policy</a></p>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
