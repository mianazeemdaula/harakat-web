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
                <div class="flex flex-row space-x-12 mt-12">
                    <a href="{{url('approvedmerchant')}}"><button type="submit" class="px-8 py-3 border-2 border-blue-800 rounded-lg text-blue-800 font-extrabold">Approved Merchant</button></a>
                    <button type="submit" class="px-8 py-3 bg-blue-800 rounded-lg text-white font-extrabold">Pending Merchant</button>
                    <a href="{{url('rejectedmerchant')}}"><button type="submit" class="px-8 py-3 border-2 border-blue-800 rounded-lg text-blue-800 font-extrabold">Rejected Merchant</button></a>
                </div>
                <table class="table-auto mt-16 border border-slate-400">
                    <thead>
                        <tr>
                            <th class="border border-slate-300 p-2">No </th>
                            <th class="border border-slate-300 p-2">Name</th>
                            <th class="border border-slate-300 p-2">Email</th>
                            <th class="border border-slate-300 p-2">Image</th>
                            <th class="border border-slate-300 p-2">Address</th>
                            <th class="border border-slate-300 p-2">Rating</th>
                            <th class="border border-slate-300 p-2">Status</th>
                            <th class="border border-slate-300 p-2">Contact details</th>
                            <th class="border border-slate-300 p-2">Acton</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border border-slate-300 p-2">01`</td>
                            <td class="border border-slate-300 p-2">Macdonald</td>
                            <td class="border border-slate-300 p-2"><a href="">resturent@gmail.com</a></td>
                            <td class="border border-slate-300 p-2"><img src="{{URL::asset('/images/montano.png')}}" alt="" class="w-20 h-20"></td>
                            <td class="border border-slate-300 p-2">UAE Abu Dhabi</td>
                            <td class="border border-slate-300 p-2">0</td>
                            <td class="border border-slate-300 p-2">Approved</td>
                            <td class="border border-slate-300 p-2">02735926572653876</td>
                            <td class="flex flex-col p-2 space-y-4 border border-slate-300">
                                <button class="py-2 px-2 text-center text-white rounded-lg bg-green-700">Approve</button>
                                <button class="py-2 px-2 text-center text-white rounded-lg bg-red-700">Rejected</button>
                                <a href="{{url('shoplicensemerchant')}}"><button class="py-2 px-2 text-center text-white rounded-lg bg-blue-700">Review Shop Info.</button></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>


    </div>
</body>

</html>