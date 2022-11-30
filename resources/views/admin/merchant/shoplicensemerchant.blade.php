<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>HarqatShop</title>
</head>

<body>
    <div class="flex flex-col justify-center items-center w-screen h-screen">
        <div class="w-3/6 h-5/6">
            <div class="p-4 text-blue-600 text-2xl font-bold">SHOP LICENSE</div>
            <hr>
            <div class="flex flex-col items-center p-2 space-y-4">
                <div class="border-2 border-blue-600 mt-6 p-6 w-52 h-52">
                    <img src="{{URL::asset('/images/montano.png')}}" alt="">
                </div>
                <button class="px-10 py-3 text-center text-white bg-blue-700">Shop License</button>
            </div>
            <hr>
            <div class="flex flex-row p-3 gap-x-4">
                <button class="px-10 py-3 text-center text-white bg-green-700">Approve</button>
                <button class="px-10 py-3 text-center text-white bg-red-700">Reject</button>
                <button class="px-10 py-3 rounded-full ml-56 text-center text-white bg-blue-700">Close</button>
            </div>
        </div>
    </div>
</body>

</html>