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
                    <a href="{{url('shopdetails')}}"><button type="submit" class="w-52 h-12 text-xl text-white bg-blue-800">Shop Details</button></a>
                    <a href="{{url('rating&reviews')}}"><button type="submit" class="w-52 h-12 text-xl text-blue-800 border border-blue-800">Rating & Reviews</button></a>
                    <a href=""><button type="submit" class="w-52 h-12 text-xl text-blue-800 border border-blue-800">Configuration</button></a>
                </div>
                <div class="grid grid-cols-2 justify-items-center gap-4">
                    <div>
                        <h3 class="p-2">Name</h3>
                        <input type="text" placeholder="Name" class="w-72 h-10">
                    </div>
                    <div>
                        <h3 class="p-2">Address</h3>
                        <input type="text" placeholder="Address" class="w-72 h-10">
                    </div>
                    <div>
                        <h3 class="p-2">Phone</h3>
                        <input type="text" placeholder="Phone" class="w-72 h-10">
                    </div>
                    <div>
                        <h3 class="p-2">Email</h3>
                        <input type="email" placeholder="Email" class="w-72 h-10">
                    </div>
                    <div>
                        <h3 class="p-2">Base Delivery Charge</h3>
                        <input type="text" placeholder="Base Delivery Charge" class="w-72 h-10">
                    </div>
                    <div>
                        <h3 class="p-2">Delivery Charges (per KM)</h3>
                        <input type="text" placeholder="Delivery Charges(per KM)" class="w-72 h-10">
                    </div>
                    <div>
                        <h3 class="p-2">Minimum Order Amount</h3>
                        <input type="text" placeholder="Minimum Orde Amount" class="w-72 h-10">
                    </div>
                    <div>
                        <h3 class="p-2">License</h3>
                        <input type="text" placeholder="License" class="w-72 h-10">
                    </div>
                    <div>
                        <h3 class="p-2">Delivery Radius(KM)</h3>
                        <input type="text" placeholder="Delivery Radius(KM)" class="w-72 h-10">
                    </div>
                    <div>
                        <h3 class="p-2">Other License</h3>
                        <input type="text" placeholder="Other License" class="w-72 h-10">
                    </div>
                    <button class="w-52 h-10 m-8 rounded-lg text-xl text-white bg-blue-800">View On Map</button>
                    <div>
                        <h3 class="p-2">Award</h3>
                        <input type="text" placeholder="Award" class="w-72 h-10">
                    </div>
                </div>
                <a href="" class="flex justify-center"><button class="w-52 h-10 rounded-lg text-xl text-white bg-blue-800">Submit</button></a>
            </div>
        </div>
    </div>
</body>

</html>