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
                <div class="flex flex-row w-5/6 justify-between">
                    <a href="{{url('shopdetails')}}"><button type="submit" class="w-52 h-12 text-xl text-blue-800 border border-blue-800">Shop Details</button></a>
                    <a href="{{url('rating&reviews')}}"><button type="submit" class="w-52 h-12 text-xl text-blue-800 border border-blue-800">Rating & Reviews</button></a>
                    <a href="{{url('configuration')}}"><button type="submit" class="w-52 h-12 text-xl text-white bg-blue-800">Configuration</button></a>
                </div>
                <h2>DELIVERY TIMINGSS</h2>
                <div>
                    <h3 class="ml-3">Preparation Time</h3>
                    <input type="" name="" id="" placeholder="00:00:00" class="w-52 h-8">
                </div>
                <div class="flex flex-row space-x-24">
                    <div>
                        <h3 class="ml-3">Minimum Delivery Time</h3>
                        <input type="" name="" id="" placeholder="15 min" class="w-52 h-8">
                    </div>
                    <div>
                        <h3 class="ml-3">Maximum Delivery Time</h3>
                        <input type="" name="" id="" placeholder="15 min" class="w-52 h-8">
                    </div>
                </div>
                <h2>Set Time Slot</h2>
                <div class="w-4/6 h-72 p-4 rounded-lg border border-gray-500">
                    <div class="flex flex-row space-x-4">
                        <h2>Monday</h2>
                        <input type="" name="" id="" placeholder="15 min" class="w-64 h-10">
                        <h2>TO</h2>
                        <input type="" name="" id="" placeholder="15 min" class="w-64 h-10">
                        <input type="checkbox" role="switch" name="" id="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>