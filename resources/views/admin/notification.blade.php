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
                <h2 class="text-center font-bold">Notification</h2>
                <form action="" method="POST" class="flex flex-col items-center space-y-4">
                    <input type="text" placeholder="To" class="w-4/6 px-4">
                    <input type="email" placeholder="Message" class="w-4/6 px-4">
                    <a href=" {{url('')}}" class="flex justify-center"><button type="submit" class="text-white rounded-full px-16 py-3 bg-blue-600">Save</button></a>
                </form>

            </div>
        </div>
    </div>
</body>

</html>