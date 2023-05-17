@extends('layouts.admin')
@section('body')
    <div class="w-full p-9">
        <div class="flex items-center justify-between">
            <h5 class="">Cities</h5>
            <a href="{{ route('cities.create') }}" class="py-2 px-2 text-center text-white rounded-lg bg-blue-700">Create
                City</a>
        </div>

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
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
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
                            <td>
                                <div class="flex space-x-3"><a href="{{ route('cities.edit', $item->id) }}">
                                        <x-bi-pencil />
                                    </a>
                                    {{-- <a href="http://">
                                        <x-bi-folder />
                                    </a> --}}
                                    <a href="http://">
                                        <x-bi-trash />
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
