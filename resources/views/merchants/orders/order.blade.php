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
            <div class="w-full h-auto m-6 space-y-8">
                <div class="w-3/6 space-x-6">
                    <button class="px-4 py-2 text-xl outline-none border-b-4 border-blue-800">PENDING</button>
                    <button class="px-4 py-2 text-xl outline-none">ACTIVITY</button>
                    <button class="px-4 py-2 text-xl outline-none">HISTORY</button>
                </div>
                <div class="flex flex-row justify-between m-6">
                    <button type="array_search" class="px-24 py-2 text-gray-400 bg-gray-200">Search</button>
                    <button class="px-24 py-2 rounded-lg text-white bg-blue-800">Refresh</button>
                </div>
                <div class="w-6/6 h-3/6 p-4 rounded-lg space-y-3 border-2 border-gray-300">
                    <div class="flex flex-row justify-between">
                        <div class="flex flex-row space-x-4">
                            <h3 class="mt-2">ORDER ID- 646</h3>
                            <a href="orderdetails"><button class="px-8 py-2 rounded-lg font-semibold text-blue-800 border border-blue-800">VIEW DETAILS</button></a>
                        </div>
                        <div class="flex flex-row">
                            <h3>ORDER DATE- </h3>
                            <div class="font-semibold text-gray-900"> july 31, 2022 09:09 AM</div>
                        </div>
                    </div>
                    <div class="flex flex-row justify-between">
                        <div class="flex flex-row space-x-4">
                            <img class="h-16 w-16 object-cover rounded-full" src="{{URL::asset('/images/montano.png')}}" alt="" />
                            <div class="mt-4 font-semibold text-gray-900">Toastadas x 1 more</div>
                        </div>
                        <div class="flex flex-row">
                            <div class="font-semibold text-gray-900">Payment cash</div>
                        </div>
                    </div>
                    <hr class="h-1 bg-gray-300">
                    <div class="flex flex-row justify-between">
                        <div class="space-y-3">
                            <div class="font-semibold text-gray-900">Price- AED 75</div>
                            <h3>Contact User- 8001234</h3>
                        </div>
                        <div class="space-x-3">
                            <button class="px-6 py-2 text-white bg-slate-300">REJECT</button>
                            <button class="px-8 py-2 text-white bg-blue-800">CONFIRM</button>
                        </div>
                    </div>
                </div>
                <div class="w-6/6 h-3/6 p-4 rounded-lg space-y-3 border-2 border-gray-300">
                    <div class="flex flex-row justify-between">
                        <div class="flex flex-row space-x-4">
                            <h3 class="mt-2">ORDER ID- 646</h3>
                            <a href="orderdetails"><button class="px-8 py-2 rounded-lg font-semibold text-blue-800 border border-blue-800">VIEW DETAILS</button></a>
                        </div>
                        <div class="flex flex-row">
                            <h3>ORDER DATE- </h3>
                            <div class="font-semibold text-gray-900"> july 31, 2022 09:09 AM</div>
                        </div>
                    </div>
                    <div class="flex flex-row justify-between">
                        <div class="flex flex-row space-x-4">
                            <img class="h-16 w-16 object-cover rounded-full" src="{{URL::asset('/images/montano.png')}}" alt="" />
                            <div class="mt-4 font-semibold text-gray-900">Toastadas x 1 more</div>
                        </div>
                        <div class="flex flex-row">
                            <div class="font-semibold text-gray-900">Payment cash</div>
                        </div>
                    </div>
                    <hr class="h-1 bg-gray-300">
                    <div class="flex flex-row justify-between">
                        <div class="space-y-3">
                            <div class="font-semibold text-gray-900">Price- AED 75</div>
                            <h3>Contact User- 8001234</h3>
                        </div>
                        <div class="space-x-3">
                            <button class="px-6 py-2 text-white bg-slate-300">REJECT</button>
                            <button class="px-8 py-2 text-white bg-blue-800">CONFIRM</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>