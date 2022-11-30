<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Harkatshop</title>
</head>

<body>
    <div class="w-screen h-screen">
        <x-header></x-header>
        <div class="flex flex-row w-screen mt-2 h-5/6">
            <x-merchant.sidebar></x-merchant.sidebar>
            <div class="w-full m-6 space-y-4">
                <a href="{{url('order')}}">
                    <div class="flex items-center text-black text-xl font-bold"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                        </svg>
                        BACK</div>
                </a>
                <div class="flex flex-row justify-between">
                    <div class="text-black text-xl font-bold">ORDER DETAILS : # 704</div>
                    <button class="px-6 py-2 mr-28 rounded-lg text-white bg-blue-600">ON THE WAY</button>
                </div>
                <div class="flex flex-row space-x-1">
                    <div class="flex flex-row space-x-4 w-4/6 h-2/6 p-4 rounded-lg border border-slate-300">
                        <img src="{{URL::asset('/images/montano.png')}}" alt="logo" class="w-2/6 h-5/6">
                        <div class="border-l-2 border-slate-300"></div>
                        <div>
                            <h3>TOSTADAS X 2</h3>
                            <h3>AED 75</h3>
                        </div>
                    </div>
                    <div class="w-2/6 h-3/6 p-4 rounded-lg space-y-4 border border-slate-300">
                        <div class="flex flex-row justify-between">
                            <div>
                                <div class="font-semibold text-gray-900">User Name</div>
                                <h3>saeed</h3>
                            </div>
                            <img class="h-16 w-16 object-cover rounded-full" src="{{URL::asset('/images/montano.png')}}" alt="">
                        </div>
                        <div class="font-semibold text-gray-900">User Mobile</div>
                        <h3>8001234</h3>
                        <div class="font-semibold text-gray-900">User Address</div>
                        <h3>Abu Dhabi,Al Ain,Mazed</h3>
                    </div>
                </div>
                <div class="flex flex-row space-x-1">
                    <div class="flex flex-row space-x-4 w-4/6 h-2/6 p-4 rounded-lg border border-slate-300">
                        <img src="{{URL::asset('/images/montano.png')}}" alt="logo" class="w-2/6 h-5/6">
                        <div class="border-l-2 border-slate-300"></div>
                        <div>
                            <h3>SANDWICH X 2</h3>
                            <h3>AED 75</h3>
                        </div>
                    </div>
                    <div class="w-2/6 h-3/6 p-4 rounded-lg space-y-4 border border-slate-300">
                        <div class="flex flex-row justify-between">
                            <div class="font-semibold text-gray-900">Order Price</div>
                            <h3>AED 75</h3>
                        </div>
                        <div class="flex flex-row justify-between">
                            <div class="font-semibold text-gray-900">Delivery Charges</div>
                            <h3>AED 20</h3>
                        </div>
                        <div class="flex flex-row justify-between">
                            <div class="font-semibold text-gray-900">VAT (5%)</div>
                            <h3>AED 4.75</h3>
                        </div>
                        <div class="flex flex-row justify-between">
                            <div class="font-semibold text-gray-900">Total Price</div>
                            <h3>AED 99.75</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>