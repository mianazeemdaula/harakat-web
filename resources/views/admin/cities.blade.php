@extends('layouts.shop')
@section('body')
    <div class="w-full p-9">
        <h2 class="text-center font-bold">Manage Citites</h2>
        <form action="" method="POST" class="flex flex-col items-center space-y-4">
            <input type="text" placeholder="Country" class="w-4/6 px-4">
            <input type="email" placeholder="City" class="w-4/6 px-4">
            <button type="submit" class="text-white rounded-full px-16 py-3 bg-blue-600">Submit</button>
        </form>

        <div class="overflow-x-auto mt-6">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            ID</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Name</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Name Arabic
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($cities as $item)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $item->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->name_ar }}
                            </td>
                            <td
                                class="px-6 py-4 whitespace-nowrap text-sm text-right {{ $item->type == '' ? 'text-green-500' : 'text-red-500' }}">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
