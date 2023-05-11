<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Harqat Shop</title>
</head>

<body>
    <form action="{{ url('shop/reg/cat') }}" method="POST" id="myForm">
        @csrf
        <input type="hidden" id="category_id" name="category" value="">
        <div class="  flex  flex-col  w-screen-md  h-screen">
            <div class="   flex  flex-row  justify-between   w-screen  h-14  bg-blue-900">
                <div class="  font-bold  text-white  text-xl  ml-24  mt-3">Merchant Singup Page</div>
                <button type="submit" class="my-3 mr-24 text-white px-6 py-1 rounded-full bg-slate-400">Next</button>
            </div>
            <div>
                <div class=" absolute m-12">
                    <img src="{{ URL::asset('/images/Harkatshop.png') }}" alt="logo" class=" w-36 h-24">
                </div>
                <div class="  flex  flex-col   mt-8  w-screen  items-center ">
                    <div>Step 2 of 3</div>
                    <h1>Choose Your Business</h1>
                    @error('category')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                    <div class="grid grid-cols-2 gap-12 mt-20 cats">
                        @foreach ($categories as $item)
                            <div class="">
                                <div class="relative image-container" data-id="{{ $item->id }}">
                                    <img class="h-32 w-32 object-cover rounded-lg " src="{{ $item->image }}"
                                        alt="" />
                                    <div
                                        class="absolute inset-0 flex justify-center items-center bg-gray-900 bg-opacity-50 text-white font-bold text-lg uppercase rounded-full transition-opacity duration-300 opacity-0 pointer-events-none selected-icon">
                                        <span>Selected</span>
                                    </div>
                                </div>
                                <div class="text-sm text-rose-400 text-center">{{ $item->name }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </form>
</body>
<script>
    const grid = document.querySelector('.cats');
    const hiddenField = document.querySelector('#category_id');

    grid.addEventListener('click', (event) => {
        const imageContainer = event.target.closest('.image-container');
        if (imageContainer) {
            const selectedIcon = imageContainer.querySelector('.selected-icon');
            // Remove the "selected" class from all images except the one that was clicked
            grid.querySelectorAll('.image-container').forEach((container) => {
                if (container !== imageContainer) {
                    const otherSelectedIcon = container.querySelector('.selected-icon');
                    otherSelectedIcon.classList.remove('opacity-100', 'pointer-events-auto');
                }
            });
            // Toggle the "selected" class on the clicked image
            selectedIcon.classList.toggle('opacity-100');
            selectedIcon.classList.toggle('pointer-events-auto');
            hiddenField.value = imageContainer.dataset.id;
        }
    });
</script>

</html>
