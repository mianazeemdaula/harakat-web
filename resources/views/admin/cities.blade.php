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
                <h2 class="text-center font-bold">Manage Documents</h2>
                <form action="" method="POST" class="flex flex-col items-center space-y-4">
                    <input type="text" placeholder="Country" class="w-4/6 px-4">
                    <input type="email" placeholder="City" class="w-4/6 px-4">
                    <a href=" {{url('')}}" class="flex justify-center"><button type="submit" class="text-white rounded-full px-16 py-3 bg-blue-600">Submit</button></a>
                </form>
                <table class="table-auto mt-4 border border-slate-400 m-8">
                    <thead>
                        <tr>
                            <th class="border border-slate-300 p-2">No </th>
                            <th class="border border-slate-300 p-2">Country</th>
                            <th class="border border-slate-300 p-2">City</th>
                            <th class="border border-slate-300 p-2">Acton</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border border-slate-300 p-2">01</td>
                            <td class="border border-slate-300 p-2">UAE</td>
                            <td class="border border-slate-300 p-2">Abu Dhabi Island</td>
                            <td class="flex flex-col p-2 space-y-4 border border-slate-300">
                                <button class="py-2 px-12 text-center text-white rounded-lg bg-blue-700">Update Country/city</button>
                                <button class="py-2 px-12 text-center text-white rounded-lg bg-blue-700">Delete Country/city</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="border border-slate-300 p-2">02</td>
                            <td class="border border-slate-300 p-2">UAE</td>
                            <td class="border border-slate-300 p-2">DUbai</td>
                            <td class="border border-slate-300 p-2"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>