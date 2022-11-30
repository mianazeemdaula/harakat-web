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
            <div class="w-full h-auto m-4">
                <h2 class="text-center text-blue-600 font-bold">Order Details</h2>
                <div class="mt-4 grid grid-cols-2 auto-cols-max w-4/6">
                    <div class="font-bold">Order Details</div>
                    <div class="text-gray-500">456354</div>
                    <div class="font-bold">Shop Name</div>
                    <div class="text-gray-500">Macdonald</div>
                    <div class="font-bold">Cutomer Name</div>
                    <div class="text-gray-500">Test</div>
                    <div class="font-bold">Pickup Address</div>
                    <div class="text-gray-500">Abu Dhabi,World trade center mall</div>
                    <div class="font-bold">Delivery Address</div>
                    <div class="text-gray-500">Abu Dhabi,Rasheed bin saeed,Etislat Area</div>
                    <div class="font-bold">Phone Number</div>
                    <div class="text-gray-500">000456354</div>
                    <div class="font-bold">Order Date</div>
                    <div class="text-gray-500">01-01-2023 05:30:00</div>
                    <div class="font-bold">Total Amount</div>
                    <div class="text-gray-500">AED 1000</div>
                    <div class="font-bold">Payment type</div>
                    <div class="text-gray-500">Cash On Delivery</div>
                    <div class="font-bold">Payment Status</div>
                    <div class="text-gray-500">Pending</div>
                    <div class="font-bold">Order status</div>
                    <div class="text-gray-500">Time</div>
                    <div class="font-bold">Ordered</div>
                    <div class="text-gray-500">01-01-2023 05:30:00</div>
                    <div class="font-bold">Approved</div>
                    <div class="text-gray-500">01-01-2023 05:30:00</div>
                    <div class="font-bold">Processing</div>
                    <div class="text-gray-500">01-01-2023 05:30:00</div>
                    <div class="font-bold">Delivered</div>
                    <div class="text-gray-500">01-01-2023 05:30:00</div>
                </div>
                <hr class="h-2 mt-6 bg-gray-500">
                <div class="grid grid-cols-5">
                    <div>Product Image</div>
                    <div>Product Name</div>
                    <div>Price</div>
                    <div>Quantity</div>
                    <div>Total Amount</div>
                </div>
                <hr class="h-1 bg-black">
                <div class="grid grid-cols-5 m-4">
                    <img src="{{URL::asset('/images/montano.png')}}" alt="" class="w-32 h-32">
                    <div>Beef Burger</div>
                    <div>AED 30</div>
                    <div>02</div>
                    <div>AED 60</div>
                </div>
                <hr class="h-1 bg-black">
                <div class="grid grid-cols-5 m-4">
                    <img src="{{URL::asset('/images/montano.png')}}" alt="" class="w-32 h-32">
                    <div>Juice</div>
                    <div>AED 05</div>
                    <div>02</div>
                    <div>AED 10</div>
                </div>
                <a href=" {{url('orderdetails-1merchant')}}" class="m-8 flex justify-end"><button type="submit" class="text-white rounded-lg px-5 py-3  bg-blue-600">Add Merchant</button></a>
            </div>
        </div>


    </div>
</body>

</html>