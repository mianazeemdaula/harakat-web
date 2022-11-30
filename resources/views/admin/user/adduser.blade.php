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
            <div class="w-full h-full p-4">
                <h2 class="text-center font-bold">Add/Edit User</h2>
                <div class="flex flex-row justify-between m-6">
                    <div class="w-3/6">
                        <form action="" method="POST" class="flex flex-col space-y-2">
                            <input type="text" placeholder="Name">
                            <input type="email" placeholder="Email Address">
                            <input type="phone" placeholder="Contact Number">
                            <input type="password" placeholder="Password">
                            <input type="password" placeholder="Confirm Password">
                            <input type="text" placeholder="Status">
                            <input type="text" placeholder="Shop">
                            <a href=" {{url('')}}" class="flex justify-center"><button type="submit" class="text-white rounded-lg px-16 py-3 bg-blue-600">Submit</button></a>
                        </form>
                    </div>
                    <div class="flex justify-center items-center w-72 h-72 m-8 p-2 border-2">
                        <a href="http://"><button class="mt-8 py-2 px-10 font-bold text-center text-white rounded-lg bg-blue-700">Upload Image</button></a>
                    </div>
                </div>
            </div>
        </div>


    </div>
</body>

</html>