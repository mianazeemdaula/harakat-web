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
            <div class="w-full h-full ml-4">
                <table class="table-auto mt-16 border border-slate-400">
                    <thead>
                        <tr>
                            <th class="border border-slate-300 p-2">No </th>
                            <th class="border border-slate-300 p-2">Name</th>
                            <th class="border border-slate-300 p-2">Email</th>
                            <th class="border border-slate-300 p-2">Contact details</th>
                            <th class="border border-slate-300 p-2">Acton</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border border-slate-300 p-2">01`</td>
                            <td class="border border-slate-300 p-2">Macdonald</td>
                            <td class="border border-slate-300 p-2"><a href="">resturent@gmail.com</a></td>
                            <td class="border border-slate-300 p-2">02735926572653876</td>
                            <td class="flex flex-col p-2 space-y-4 border border-slate-300">
                                <button class="py-2 px-2 text-center text-white rounded-lg bg-blue-700">Update User</button>
                                <button class="py-2 px-2 text-center text-white rounded-lg bg-blue-700">Delete user</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <a href="{{url('adduser')}}" class="flex justify-center"><button class="mt-8 py-4 px-10 font-extrabold text-center text-white rounded-lg bg-blue-700">Add User</button></a>
            </div>
        </div>


    </div>
</body>

</html>