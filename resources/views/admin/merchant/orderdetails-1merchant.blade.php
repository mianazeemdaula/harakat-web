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
                <div class="w-1/4 h-5/6 rounded-3xl bg-gray-200 space-y-6">
                    <div class="mt-4 text-center text-4xl font-bold text-gray-400">Recipe #</div>
                    <div class="flex flex-row ml-4 space-x-6">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-orange-600">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <h4 class="text-orange-600">time</h4>
                    </div>
                    <div class="grid grid-cols-4 grid-rows-3 ml-4 text-xs gap-y-4">
                        <div>Total</div>
                        <div>Discount Rate</div>
                        <div>VAT</div>
                        <div>Total</div>
                        <div>70</div>
                        <div>0</div>
                        <div>06</div>
                        <div>76.0</div>
                        <div>AED</div>
                        <div>%</div>
                        <div>AED</div>
                        <div>AED</div>
                    </div>
                    <div class="grid grid-cols-4 grid-rows-2 ml-4 text-xs gap-y-4">
                        <div>Beef Burger</div>
                        <div>02</div>
                        <div>30</div>
                        <div>60</div>
                        <div>jucie</div>
                        <div>02</div>
                        <div>05</div>
                        <div>10.0</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>