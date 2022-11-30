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
    <div class="w-screen h-screen">
        <x-header></x-header>
        <div class="flex flex-row w-screen mt-2 h-5/6">
            <x-merchant.sidebar></x-merchant.sidebar>
            <div class="w-full h-auto m-6">
                <div class="flex space-x-4">
                    <div class="w-3/6">
                        <div class="flex flex-row justify-between items-center p-4 w-5/6 h-2/6 border rounded-lg border-gray-300">
                            <h3 class="font-bold text-2xl">Addon's Categories</h3>
                            <a href="{{url('addnewaddons-category')}}"><img src="{{URL::asset('/images/plusicon.png')}}" alt="logo" class="w-8 h-8"></a>
                        </div>
                        <div class="p-4 w-5/6 h-5/6 space-y-4 border rounded-lg border-gray-300">
                            <div class="flex flex-row justify-between">
                                <h3 class="font-bold text-lg">Addon's category 1</h3>
                                <div class="flex space-x-4">
                                    <img src="{{URL::asset('/images/minusicon.png')}}" alt="logo" class="w-6 h-6">
                                    <img src="{{URL::asset('/images/edit.png')}}" alt="logo" class="w-6 h-6">
                                </div>
                            </div>
                            <div class="flex flex-row justify-between">
                                <h3 class="font-bold text-lg">Addon's category 2</h3>
                                <div class="flex space-x-4">
                                    <img src="{{URL::asset('/images/minusicon.png')}}" alt="logo" class="w-6 h-6">
                                    <img src="{{URL::asset('/images/edit.png')}}" alt="logo" class="w-6 h-6">
                                </div>
                            </div>
                            <div class="flex flex-row justify-between">
                                <h3 class="font-bold text-lg">Addon's category 3</h3>
                                <div class="flex space-x-4">
                                    <img src="{{URL::asset('/images/minusicon.png')}}" alt="logo" class="w-6 h-6">
                                    <img src="{{URL::asset('/images/edit.png')}}" alt="logo" class="w-6 h-6">
                                </div>
                            </div>
                            <div class="flex flex-row justify-between">
                                <h3 class="font-bold text-lg">Addon's category 4</h3>
                                <div class="flex space-x-4">
                                    <img src="{{URL::asset('/images/minusicon.png')}}" alt="logo" class="w-6 h-6">
                                    <img src="{{URL::asset('/images/edit.png')}}" alt="logo" class="w-6 h-6">
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <h3 class="font-bold text-xl">Categories Addon's Are Removed Successfully</h3>
                            <div class="text-red-800 text-xl">Removed action not working.Please remove all sub addon's then try to remove categories again.</div>
                        </div>
                    </div>
                    <div class="w-3/6">
                        <div class="flex flex-row justify-between items-center p-4 w-5/6 h-2/6 border rounded-lg border-gray-300">
                            <h3 class="font-bold text-2xl">Addon's</h3>
                            <img src="{{URL::asset('/images/plusicon.png')}}" alt="logo" class="w-8 h-8">
                        </div>
                        <div class="p-4 w-5/6 h-5/6 space-y-4 border rounded-lg border-gray-300">
                            <div class="flex flex-row justify-between">
                                <h3 class="font-bold text-lg">Addon's 1</h3>
                                <div class="flex space-x-4">
                                    <img src="{{URL::asset('/images/minusicon.png')}}" alt="logo" class="w-6 h-6">
                                    <img src="{{URL::asset('/images/edit.png')}}" alt="logo" class="w-6 h-6">
                                </div>
                            </div>
                            <div class="flex flex-row justify-between">
                                <h3 class="font-bold text-lg">Addon's 1</h3>
                                <div class="flex space-x-4">
                                    <img src="{{URL::asset('/images/minusicon.png')}}" alt="logo" class="w-6 h-6">
                                    <img src="{{URL::asset('/images/edit.png')}}" alt="logo" class="w-6 h-6">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>