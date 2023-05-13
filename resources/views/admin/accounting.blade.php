@extends('layouts.shop')
@section('body')
    <div class="w-full p-8">
        <div class="flex justify-between">
            <div class="flex shadow-xl p-6 rounded-xl">
                <div class="bg-blue-200 p-2 rounded-lg w-12 h-12 flex justify-center items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <g id="vuesax_outline_dollar-square" data-name="vuesax/outline/dollar-square"
                            transform="translate(-172 -572)">
                            <g id="dollar-square">
                                <path id="Vector"
                                    d="M5.49,10.84H2.98A3.027,3.027,0,0,1,.01,7.76a.755.755,0,0,1,.75-.75.755.755,0,0,1,.75.75A1.531,1.531,0,0,0,2.98,9.34H5.49A1.247,1.247,0,0,0,6.68,8.06c0-.87-.31-1.04-.82-1.22L1.83,5.42A2.5,2.5,0,0,1,0,2.78,2.737,2.737,0,0,1,2.69,0H5.2A3.027,3.027,0,0,1,8.17,3.08a.75.75,0,0,1-1.5,0A1.531,1.531,0,0,0,5.2,1.5H2.69A1.247,1.247,0,0,0,1.5,2.78c0,.87.31,1.04.82,1.22L6.35,5.42A2.5,2.5,0,0,1,8.18,8.06,2.75,2.75,0,0,1,5.49,10.84Z"
                                    transform="translate(179.91 578.58)" fill="#292d32" />
                                <path id="Vector-2" data-name="Vector"
                                    d="M.75,13.5A.755.755,0,0,1,0,12.75V.75A.755.755,0,0,1,.75,0,.755.755,0,0,1,1.5.75v12A.755.755,0,0,1,.75,13.5Z"
                                    transform="translate(183.25 577.25)" fill="#292d32" />
                                <path id="Vector-3" data-name="Vector"
                                    d="M13.75,21.5h-6C2.32,21.5,0,19.18,0,13.75v-6C0,2.32,2.32,0,7.75,0h6c5.43,0,7.75,2.32,7.75,7.75v6C21.5,19.18,19.18,21.5,13.75,21.5Zm-6-20C3.14,1.5,1.5,3.14,1.5,7.75v6C1.5,18.36,3.14,20,7.75,20h6C18.36,20,20,18.36,20,13.75v-6c0-4.61-1.64-6.25-6.25-6.25Z"
                                    transform="translate(173.25 573.25)" fill="#292d32" />
                                <path id="Vector-4" data-name="Vector" d="M0,0H24V24H0Z" transform="translate(172 572)"
                                    fill="none" opacity="0" />
                            </g>
                        </g>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-gray-400">Total Amount for Cash</p>
                    <span class="font-medium">AED {{ $balance->cash ?? 0 }}</span>
                </div>
            </div>
            <div class="flex shadow-xl p-6 rounded-xl">
                <div class="bg-blue-200 p-2 rounded-lg w-12 h-12 flex justify-center items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <g id="vuesax_outline_dollar-square" data-name="vuesax/outline/dollar-square"
                            transform="translate(-172 -572)">
                            <g id="dollar-square">
                                <path id="Vector"
                                    d="M5.49,10.84H2.98A3.027,3.027,0,0,1,.01,7.76a.755.755,0,0,1,.75-.75.755.755,0,0,1,.75.75A1.531,1.531,0,0,0,2.98,9.34H5.49A1.247,1.247,0,0,0,6.68,8.06c0-.87-.31-1.04-.82-1.22L1.83,5.42A2.5,2.5,0,0,1,0,2.78,2.737,2.737,0,0,1,2.69,0H5.2A3.027,3.027,0,0,1,8.17,3.08a.75.75,0,0,1-1.5,0A1.531,1.531,0,0,0,5.2,1.5H2.69A1.247,1.247,0,0,0,1.5,2.78c0,.87.31,1.04.82,1.22L6.35,5.42A2.5,2.5,0,0,1,8.18,8.06,2.75,2.75,0,0,1,5.49,10.84Z"
                                    transform="translate(179.91 578.58)" fill="#292d32" />
                                <path id="Vector-2" data-name="Vector"
                                    d="M.75,13.5A.755.755,0,0,1,0,12.75V.75A.755.755,0,0,1,.75,0,.755.755,0,0,1,1.5.75v12A.755.755,0,0,1,.75,13.5Z"
                                    transform="translate(183.25 577.25)" fill="#292d32" />
                                <path id="Vector-3" data-name="Vector"
                                    d="M13.75,21.5h-6C2.32,21.5,0,19.18,0,13.75v-6C0,2.32,2.32,0,7.75,0h6c5.43,0,7.75,2.32,7.75,7.75v6C21.5,19.18,19.18,21.5,13.75,21.5Zm-6-20C3.14,1.5,1.5,3.14,1.5,7.75v6C1.5,18.36,3.14,20,7.75,20h6C18.36,20,20,18.36,20,13.75v-6c0-4.61-1.64-6.25-6.25-6.25Z"
                                    transform="translate(173.25 573.25)" fill="#292d32" />
                                <path id="Vector-4" data-name="Vector" d="M0,0H24V24H0Z" transform="translate(172 572)"
                                    fill="none" opacity="0" />
                            </g>
                        </g>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-gray-400">Total Balance</p>
                    <span class="font-medium">AED {{ $balance->balance ?? 0 }}</span>
                </div>
            </div>
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
