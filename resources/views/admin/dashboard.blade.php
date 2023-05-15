@extends('layouts.admin')
@section('body')
    <div class="p-10">
        <div class="grid grid-cols-3 gap-4 mb-4">
            <x-stat-card title="Total Sales" count="AED {{ 0 }}" color="bg-lime-200">
                <x-bi-basket-fill style="color: #555" />
            </x-stat-card>
            <x-stat-card title="Total Balance" count="AED {{ 0 }}" color="bg-gray-200">
                <x-bi-bag-fill />
            </x-stat-card>
            <x-stat-card title="Total Users" count="{{ $totalUser }}" color="bg-orange-200">
                <x-bi-person-circle />
            </x-stat-card>
            <x-stat-card title="Total Shops" count="{{ $totalShop }}" color="bg-green-200">
                <x-bi-building-fill />
            </x-stat-card>
            <x-stat-card title="Total Riders" count="{{ $totalRider }}" color="bg-red-200">
                <x-bi-car-front />
            </x-stat-card>
            <x-stat-card title="Today Users" count="{{ $todayUser }}" color="bg-blue-200">
                <x-bi-person-circle />
            </x-stat-card>
        </div>
        <div class="py-10">
            <div class="grid md:grid-cols-2 grid-cols-1 gap-4 ">
                <div class="shadow-lg h-96 rounded-lg">
                    <div class="overflow-x-auto mt-0 overflow-hidden">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Image</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Product</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Total Sale
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ([] as $item)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->id }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->name_ar }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="shadow-lg h-96 rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Image</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Shop</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Total Sale
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ([] as $item)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->id }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->name_ar }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
