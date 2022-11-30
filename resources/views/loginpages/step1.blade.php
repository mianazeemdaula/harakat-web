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
  <div class=" flex flex-col w-screen h-screen">

    <div class=" flex flex-row justify-between w-screen h-14 bg-blue-900">
      <div class=" font-bold text-white text-xl ml-24 mt-3">Merchant Singup Page</div>
      <a href="{{url('step2')}}" class="mt-3 mr-24"><button type="submit" class=" text-white px-6 py-1 rounded-full bg-slate-400">Next</button></a>
    </div>


    <div class="  w-screen">
      <div class=" absolute m-12">
        <img src="{{URL::asset('/images/Harkatshop.png')}}" alt="logo" class=" w-36 h-24">
      </div>


      <div class="  mt-8  flex  flex-col  items-center  h-60">
        <div>Step 1 of 3</div>
        <h1>What is your business name?</h1>
        <div><input type="text" class=" outline-none border-b border-gray-500 py-2 mt-40 w-96"></div>
        <div class="  text-xs  mt-4">
          <p>By continuing, you agree to accept our <a class=" hover:text-blue-600  border-white  border  border-b-slate-600" href="">Privacy & Policy</a></p>
        </div>
      </div>

    </div>



  </div>

</body>

</html>