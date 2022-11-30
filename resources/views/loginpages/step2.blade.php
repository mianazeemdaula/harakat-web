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
  <div class="  flex  flex-col  w-screen-md  h-screen">
    <div class="   flex  flex-row  justify-between   w-screen  h-14  bg-blue-900">
      <div class="  font-bold  text-white  text-xl  ml-24  mt-3">Merchant Singup Page</div>
      <a href="{{url('step3')}}" class="mt-3 mr-24"> <button type="submit" class="text-white px-6 py-1 rounded-full bg-slate-400">Next</button></a>
    </div>
    <div>
      <div class=" absolute m-12">
        <img src="{{URL::asset('/images/Harkatshop.png')}}" alt="logo" class=" w-36 h-24">
      </div>
      <div class="  flex  flex-col   mt-8  w-screen  items-center ">
        <div>Step 2 of 3</div>
        <h1>Choose Your Business</h1>
        <div class="grid grid-cols-2 gap-12 mt-20">
          <div><img class="h-32 w-32 object-cover rounded-lg" src="{{URL::asset('/images/Component.png')}}" alt="" />
            <div class="text-sm text-rose-400">Restaurant & Cafe</div>
          </div>
          <div><img class="h-32 w-32 object-cover rounded-lg" src="{{URL::asset('/images/header.png')}}" alt="" />
            <div class="text-sm text-rose-400">Fashion & Perfumes</div>
          </div>
          <div><img class="h-32 w-32 object-cover rounded-lg" src="{{URL::asset('/images/header.png')}}" alt="" />
            <div class="text-sm text-rose-400">Sweets & Flowers</div>
          </div>
          <div><img class="h-32 w-32 object-cover rounded-lg" src="{{URL::asset('/images/header.png')}}" alt="" />
            <div class="text-sm text-rose-400">Electronics</div>
          </div>
        </div>
      </div>
    </div>

  </div>
</body>

</html>