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
            <div class="w-full h-full ml-4 text-center">
                <h2 class="text-blue-600 font-bold">ADD MERCHANT</h2>
                <form action="" method="POST" class="flex flex-col space-y-5 m-6">
                    <input type="text" placeholder="Shop Name">
                    <div class="flex items-center space-x-8">
                        <input type="text" placeholder="Category" class="flex flex-1">
                        <input type="text" placeholder="Full Name" class="flex flex-1">
                    </div>
                    <div class="flex items-center space-x-8">
                        <input type="email" placeholder="Email" class="flex flex-1">
                        <input type="password" placeholder="Password" class="flex flex-1">
                    </div>
                    <div class="flex items-center space-x-8">
                        <input type="phone" placeholder="Phone" class="flex flex-1">
                        <input type="text" placeholder="City" class="flex flex-1">
                    </div>
                    <div class="flex items-center space-x-8">
                        <input type="text" placeholder="Address" class="flex flex-1">
                        <input type="text" placeholder="License" class="flex flex-1">
                    </div>
                    <div class="flex items-center space-x-8">
                        <input type="text" placeholder="Other License" class="flex flex-1">
                        <input type="text" placeholder="Awards" class="flex flex-1">
                    </div>
                    <div class="mt-6 flex justify-center">
                        <a href=" {{url('')}}"><button type="submit" class="text-white rounded-lg px-5 py-3  bg-blue-600">Add Merchant</button></a>
                    </div>

                </form>
            </div>
        </div>


    </div>
</body>

</html>