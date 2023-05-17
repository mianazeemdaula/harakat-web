<div class="border-4 h-60 border-blue-600 rounded-lg">
    <div class="h-12 text-white text-center bg-blue-600">{{ $title }}</div>
    <div class="flex flex-col items-center justify-around h-40">
        <div> {{ $status }}</div>
        {{ $slot }}
    </div>
</div>
