@extends('layouts.admin')
@section('body')
    <div class="w-full p-8">
        <div class="flex justify-between">
            <x-stat-card title="Total Amount for Cash" count="AED {{ $balance->cash ?? 0 }}">
                <x-bi-bank />
            </x-stat-card>
            <x-stat-card title="Total Balance" count="AED {{ $balance->cash ?? 0 }}">
                <x-bi-bank />
            </x-stat-card>
        </div>
        <div class="mt-8"></div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Description</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Amount
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($transactions as $item)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->created_at }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->details }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->type }}</td>
                            <td
                                class="px-6 py-4 whitespace-nowrap text-sm text-right {{ $item->type == 'Income' ? 'text-green-500' : 'text-red-500' }}">
                                AED{{ $item->amount }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
