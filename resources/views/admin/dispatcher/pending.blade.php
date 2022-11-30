<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>HarkatShop</title>
</head>

<body>
    <div class="w-screen h-screen">
        <x-header></x-header>
        <div class="flex flex-row w-screen mt-2 h-5/6">
            <x-admin.sidebar></x-admin.sidebar>
            <div class="w-full h-full ml-2 mr-6">
                <div class="flex flex-row space-x-1 mt-12">
                    <button type="submit" class="px-8 py-3 bg-blue-800 rounded-lg text-white font-extrabold">Pending Orders(1)</button>
                    <a href="{{url('approved')}}"><button type="submit" class="px-8 py-3 border-2 border-blue-800 rounded-lg text-blue-800 font-extrabold">Approved Orders(1)</button></a>
                    <a href="{{url('processing')}}"><button type="submit" class="px-8 py-3 border-2 border-blue-800 rounded-lg text-blue-800 font-extrabold">Processing Orders(1)</button></a>
                    <a href="{{url('completed')}}"><button type="submit" class="px-8 py-3 border-2 border-blue-800 rounded-lg text-blue-800 font-extrabold">Completed Orders(1)</button></a>
                    <a href="{{url('cancelled')}}"><button type="submit" class="px-8 py-3 border-2 border-blue-800 rounded-lg text-blue-800 font-extrabold">Cancelled Orders(1)</button></a>
                </div>
                <div class="w-full h-12 mt-6 px-5 flex items-center bg-blue-800 text-xl text-white font-extrabold">Pending Orders (last 24 hours)</div>
                <div class="flex flex-row w-full h-3/6 border-2 border-blue-800">
                    <div class="m-4"><img class="border-2 border-blue-800 object-fill h-40 w-60" src="{{URL::asset('/images/montano.png')}}" alt=""></div>
                    <div class="w-4/6 p-4 space-y-8">
                        <h2>Madonald</h2>
                        <div class="grid grid-cols-3 gap-4">
                            <h2>status:Pending</h2>
                            <h2>Order No:Pending</h2>
                            <div class="text-red-600 text-2xl">47 minutes ago</div>
                        </div>
                        <h2>Hamdan Road,WTC Mall,Comiche Area,Abu Dhabi rashed bin saeed road,Al markazai,comiche area abudhabi</h2>
                    </div>
                    <div class="flex flex-col gap-y-5 w-32 mt-6 mr-4">
                        <button class="py-3 px-2 text-center text-white rounded-lg bg-green-700">Approve</button>
                        <button class="py-3 px-2 text-center text-white rounded-lg bg-amber-700">Order Details</button>
                        <button class="py-3 px-2 text-center text-white rounded-lg bg-red-700">Cancel</button>
                    </div>
                </div>
            </div>
        </div>


    </div>
</body>

</html>