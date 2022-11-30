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
            <div class="w-full">
                <form action="" method="POST" class="flex flex-col space-y-5 p-8">
                    <div class="flex items-center space-x-8">
                        <input type="password" placeholder="Promo Cade(Not allowed space)" class="flex flex-1">
                        <input type="password" placeholder="Promo Code Usage Limit" class="flex flex-1">
                    </div>
                    <div class="flex items-center space-x-8">
                        <input type="text" placeholder="Discount" class="flex flex-1">
                        <input type="text" placeholder="Discount Type" class="flex flex-1">
                    </div>
                    <div class="flex items-center space-x-8">
                        <input type="text" placeholder="Expiry Date" class="flex flex-1">
                        <input type="text" placeholder="Status" class="flex flex-1">
                    </div>
                    <a href=" {{url('')}}" class="mt-12 flex justify-center"><button type="submit" class="text-white rounded-full mt-8 px-16 py-3  bg-blue-600">Save</button></a>

                </form>
            </div>
        </div>
    </div>
</body>

</html>