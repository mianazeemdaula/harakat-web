@extends('layouts.admin')
@section('body')
    <div class="w-full p-10">
        <h6>{{ Str::ucfirst($role) }} Documents</h6>
        <div class="overflow-x-auto mt-6">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            ID</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Tilte</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Document
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Type
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($docs as $item)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->title }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><img src="{{ $item->doc }}"
                                    alt="" srcset="" class="w-10 h-10 rounded-md"></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->type }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->status }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <div class="flex space-x-3">
                                    <a href="{{ url("documents/$item->id") }}">
                                        <x-bi-eye />
                                    </a>
                                    <a href="{{ url("doc/$item->id/reject") }}">
                                        <x-bi-file-earmark-excel />
                                    </a>
                                    <a href="{{ url("doc/$item->id/accept") }}">
                                        <x-bi-check-circle />
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
