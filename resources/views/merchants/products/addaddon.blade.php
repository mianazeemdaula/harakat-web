@extends('layouts.shop')
@section('body')
    <div class="w-full m-6">
        <div>
            <form method="POST" action="{{ url('product-addons') }}">
                @csrf
                <input type="hidden" name="product_id" value="{{ $id }}">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="category" class="block text-gray-700 font-bold mb-2">Category:</label>
                        <select id="category" name="category" class="form-input rounded-md shadow-sm mt-1 block w-full">
                            @foreach ($cats as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="addons" class="block text-gray-700 font-bold mb-2">Addon:</label>
                        <select id="addons" name="addons" class="form-input rounded-md shadow-sm mt-1 block w-full">
                            @foreach ($firstAddons as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('addons')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <button type="submit"
                            class="py-2 px-4 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50">Submit</button>
                    </div>
            </form>
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
                            Price
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Available
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Category
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($addons as $item)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->name_ar }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->price }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $item->available ? 'Yes' : 'No' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->category->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('js')
    <script>
        var catId;
        const categorySelect = document.getElementById('category');
        const addonsSelect = document.getElementById('addons');
        categorySelect.addEventListener('change', () => {
            catId = categorySelect.value;
            axios.get('/addons/' + catId)
                .then(response => {
                    addonsSelect.innerHTML = "";
                    response.data.forEach(category => {
                        const option = document.createElement('option');
                        option.value = category.id;
                        option.text = category.name;
                        addonsSelect.appendChild(option);
                    });
                    if (response.data.length > 0) {
                        addonsSelect.value = response.data[0].id;
                    }
                })
                .catch(error => {
                    console.log(error);
                });
        });

        // addonsSelect.addEventListener('change', () => {
        //     addonid = addonsSelect.value;
        //     axios.post('/product-addons/', {
        //             'product_id': {{ $id }},
        //             'addon_id': addonid,
        //         })
        //         .then(response => {
        //             console.log(response);
        //         })
        //         .catch(error => {
        //             console.log(error);
        //         });
        // });
    </script>
@endsection
