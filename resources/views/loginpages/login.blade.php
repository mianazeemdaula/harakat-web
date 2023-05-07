<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Harkat Shop</title>
</head>

<body>
    <div class=" flex flex-row w-screen h-screen">

        <div class=" w-6/12 h-full">
            <img src="{{URL::asset('/images/header.png')}}" alt="" class=" w-full h-full object-cover">
        </div>

        <div class=" flex flex-col justify-center items-center w-6/12 h-full bg-gray-400">
            <h1>LogIn</h1>
            <div class=" mt-6">You don't have Account?<a href="{{url('shop/reg')}}" class=" font-bold text-blue-600 ml-2">SignUp</a></div>
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Error:</strong>
                    <span class="block sm:inline">{{ $errors->first('error') }}</span>
                </div>
            @endif
            <div>
                <form action="{{ url('/login') }}" method="POST" class=" flex flex-col">
                    @csrf
                    <div class=" mt-8">User Name</div>
                    <input type="text" class="input-full" name="email">
                    <div class=" mt-8">Password</div>
                    <input type="password" name="password" class="input-full">
                    <div class=" flex flex-row"><input type="checkbox" class=" w-6 h-6 mt-6"> <span class=" flex items-end ml-2">Remember me</span></div>
                    <button type="submit" class="text-white py-2 px-44 mt-6 rounded-lg  bg-blue-600 font-bold">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>
<script>
        
</script>
</html>