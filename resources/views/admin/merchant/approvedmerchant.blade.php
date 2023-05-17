@extends('layouts.admin')

@section('body')
    <div class="w-full h-full ml-4">
        <div class="flex flex-row space-x-12 mt-12">
            <a href="{{ url('shops-status/approved') }}"
                class="px-8 py-3 {{ $status == 'approved' ? 'bg-blue-800 text-white' : 'border-2 border-blue-800 text-blue-800' }}  font-extrabold">Approved
                Merchant</a>
            <a href="{{ url('shops-status/pending') }}"
                class="px-8 py-3 {{ $status == 'pending' ? 'bg-blue-800 text-white' : 'border-2 border-blue-800 text-blue-800' }}  font-extrabold">Pending
                Merchant</a>
            <a href="{{ url('shops-status/rejected') }}"
                class="px-8 py-3 {{ $status == 'rejected' ? 'bg-blue-800 text-white' : 'border-2 border-blue-800 text-blue-800' }}  font-extrabold">Rejected
                Merchant</a>
        </div>
        <div class="overflow-x-auto mt-6">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
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
                    @foreach ($shops as $item)
                        <tr>
                            <td class="border border-slate-300 p-2">{{ $item->id }}</td>
                            <td class="border border-slate-300 p-2">{{ $item->shop->shop_name ?? '' }}</td>
                            <td class="border border-slate-300 p-2">{{ $item->email }}</td>
                            <td class="border border-slate-300 p-2"><img src="{{ $item->image }}" alt=""
                                    class="w-20 h-20"></td>
                            <td class="border border-slate-300 p-2">{{ $item->shop->address ?? '' }}</td>
                            <td class="border border-slate-300 p-2">{{ $item->rating }}</td>
                            <td class="border border-slate-300 p-2">{{ $item->shop->status ?? '' }}</td>
                            <td class="border border-slate-300 p-2">{{ $item->shop->phone ?? '' }}</td>
                            <td class="flex flex-col p-2 space-y-2 border border-slate-300">
                                <a href="{{ url("shop-products/$item->id") }}"
                                    class="py-2 px-5 text-center text-white rounded-lg bg-blue-700 w-48">Product
                                    List</a>
                                <a href="{{ url("documents/shop/$item->id/") }}"
                                    class="py-2 px-3 text-center text-white rounded-lg bg-blue-700">Document
                                    List</a>

                                <form action="{{ url("shop-update-status/$item->id") }}" method="post">
                                    @csrf
                                    @method('put')
                                    @if ($item->shop->status == 'pending' || $item->shop->status == 'rejected')
                                        <input type="hidden" name="status" value="approved">
                                        <button
                                            class="py-2 px-3 text-center text-white rounded-lg bg-blue-700">Approve</button>
                                    @elseif ($item->shop->status == 'approved')
                                        <input type="hidden" name="status" value="rejected">
                                        <button
                                            class="py-2 px-3 text-center text-white rounded-lg bg-blue-700">Reject</button>
                                    @endif
                                </form>
                                {{-- <a class="py-2 px-2 text-center text-white rounded-lg bg-blue-700">Edit</a>
                                <a class="py-2 px-2 text-center text-white rounded-lg bg-blue-700">Delete</a> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
