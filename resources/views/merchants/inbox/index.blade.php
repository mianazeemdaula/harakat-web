@extends(
    auth()->user()->hasRole('shop')
        ? 'layouts.shop'
        : 'layouts.admin'
)
@section('body')
    <div class="w-full p-9">
        <div class="flex items-center justify-between">
            <h5 class="">MailBox</h5>
            {{-- <a href="{{ route('mailboxes.create') }}" class="py-2 px-2 text-center text-white rounded-lg bg-blue-700">Create
                MailBox</a> --}}
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
                            Title
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Content
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 " id="chatlist">
                    @foreach ($inboxes as $item)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <img src="{{ $item->user->image }}" class="rounded-full w-10 h-10" alt=""
                                    srcset="">
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $item->user_id == auth()->id() ? $item->user2->name ?? '' : $item->user->name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->title }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ implode(' ', array_slice(explode(' ', $item->content), 0, 10)) }}
                            </td>
                            <td>
                                <div class="flex space-x-3">

                                    <a href="{{ route('mailboxes.show', $item->id) }}">
                                        <x-bi-eye />
                                    </a>
                                    {{-- <a href="{{ route('mailboxes.edit', $item->id) }}">
                                        <x-bi-pencil />
                                    </a>
                                    <a href="http://">
                                        <x-bi-trash />
                                    </a> --}}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            <x-web-pagination :paginator="$inboxes" />
        </div>
    </div>
@endsection
