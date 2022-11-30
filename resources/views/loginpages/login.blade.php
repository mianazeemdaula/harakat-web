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
    <div class=" flex flex-row w-screen h-screen">

        <div class=" w-6/12 h-full">
            <img src="{{URL::asset('/images/header.png')}}" alt="" class=" w-full h-full">
        </div>

        <div class=" flex flex-col justify-center items-center w-6/12 h-full bg-gray-400">
            <h1>LogIn</h1>
            <div class=" mt-6">You don't have Account?<a href="{{url('step1')}}" class=" font-bold text-blue-600 ml-2">SignUp</a></div>
            <div>
                <form action="" method="POST" class=" flex flex-col">
                    <div class=" mt-8">User Name</div>
                    <input type="text" class="input-full">
                    <div class=" mt-8">Password</div>
                    <input type="password" class="input-full">
                    <div class=" flex flex-row"><input type="checkbox" class=" w-8 h-8 mt-6"> <span class=" flex items-end ml-2">Remember me</span></div>
                    <a href="merchants.dashboard" class="mt-6"><button type="submit" class="text-white py-2 px-44  rounded-lg  bg-blue-600 font-bold">Login</button></a>
                </form>
            </div>
        </div>

    </div>
</body>

</html>