@extends('layouts.admin')
@section('body')
    <div class="w-full p-10">
        <div class="my-4">
            <a href="{{ route('app-content.create') }}" class="p-2 rounded-lg text-white bg-blue-800">Add Content</a>
        </div>
        <div class="overflow-x-auto mt-6">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Title</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Title Arabic</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Content
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($cats as $item)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $item->title }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->title_ar }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ implode(' ', array_slice(explode(' ', $item->content), 0, 10)) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <div class="flex space-x-3"><a href="{{ route('app-content.edit', $item->id) }}">
                                        <x-bi-pencil />
                                    </a>
                                    {{-- <a href="http://">
                                    <x-bi-folder />
                                </a> --}}
                                    <form action="{{ route('app-content.destroy', $item->id) }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button type="submit">
                                            <x-bi-trash />
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
