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
            <div class="flex flex-col justify-center items-center w-full h-full">
                <div class="flex flex-row space-x-20">
                    <button type="submit" class="w-72 py-3 bg-blue-800 text-white font-bold">Shop License</button>
                    <button type="submit" class="w-72 py-3 bg-blue-800 text-white font-bold">Other License</button>
                    <button type="submit" class="w-72 py-3 bg-blue-800 text-white font-bold">Awards</button>
                </div>
                <div class="flex flex-row space-x-20">
                    <div class="flex flex-col justify-center items-center space-y-12 w-72 h-72 border-2 border-blue-800">
                        <div class="text-blue-800 font-bold">Pending</div>
                        <button class="px-10 py-3 text-center text-white rounded-lg bg-blue-700">Shop License</button>
                    </div>
                    <div class="flex flex-col justify-center items-center space-y-12 w-72 h-72 border-2 border-blue-800">
                        <div class="text-blue-800 font-bold">Pending</div>
                        <button class="px-10 py-3 text-center text-white rounded-lg bg-blue-700">Other License</button>
                    </div>
                    <div class="flex flex-col justify-center items-center space-y-12 w-72 h-72 border-2 border-blue-800">
                        <div class="text-blue-800 font-bold">Award not founded</div>
                        <button class="px-14 py-3 text-center text-white rounded-lg bg-blue-700">Awards</button>
                    </div>
                </div>

            </div>
        </div>


    </div>
</body>

</html>