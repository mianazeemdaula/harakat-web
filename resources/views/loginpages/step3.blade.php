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
  <div class="  flex  flex-col  w-screen  h-screen">
    <div class="   flex  flex-row  justify-between   w-screen  h-14  bg-blue-900">
      <div class="  font-bold  text-white  text-xl  ml-24  mt-3">Merchant Singup Page</div>

    </div>

    <div class=" w-screen h-screen">
      <div class=" absolute m-12">
        <img src="{{URL::asset('/images/Harkatshop.png')}}" alt="logo" class=" w-36 h-24">
      </div>
      <div class=" flex flex-col mt-4 w-screen justify-center items-center">
        <div>Step 3 of 3</div>
        <h1>Create your Account</h1>
        <div class="w-1/2 mt-6">
          <form action="" method="POST" class="flex flex-col space-y-5">
            <input type="text" placeholder="Full Name">
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
              <input type="text" placeholder="Other Licsnse" class="flex flex-1">
              <input type="text" placeholder="Awards" class="flex flex-1">
            </div>
            <div class="mt-12 flex justify-end">
              <a href=" {{url('dashboard')}}"><button type="submit" class="text-white rounded-lg px-5 py-3  bg-blue-600">Create</button></a>
            </div>
          </form>
        </div>
      </div>

    </div>

  </div>
</body>

</html>