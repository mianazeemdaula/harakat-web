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
            <div class="w-1/2">
                <h2 class="text-center font-bold">Manage Citites</h2>
                <form action="" method="POST" class="flex flex-col items-center space-y-4">
                    <input type="text" placeholder="Country" class="w-4/6 px-4">
                    <input type="email" placeholder="City" class="w-4/6 px-4">
                    <button type="submit" class="text-white rounded-full px-16 py-3 bg-blue-600">Submit</button>
                </form>
                <table class="table-auto  mt-4 border border-slate-400 m-8">
                    <thead>
                        <tr>
                            <th class="border border-slate-300 p-2">No </th>
                            <th class="border border-slate-300 p-2">Name</th>
                            <th class="border border-slate-300 p-2">Name</th>
                            {{-- <th class="border border-slate-300 p-2">Acton</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cities as $item)
                            <tr>
                                <td class="border border-slate-300 p-2">{{ $item->id }}</td>
                                <td class="border border-slate-300 p-2">{{ $item->name_ar }}</td>
                                <td class="border border-slate-300 p-2">{{ $item->name }}</td>
                                {{-- <td class="flex flex-col p-2 space-y-4 "> --}}
                                {{-- <button
                                        class="py-2 px-12 text-center text-white rounded-lg bg-blue-700">Edit</button>
                                    <button
                                        class="py-2 px-12 text-center text-white rounded-lg bg-blue-700">Delete</button> --}}
                                {{-- </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
