@extends(
    auth()->user()->hasRole('shop')
        ? 'layouts.shop'
        : 'layouts.admin'
)
@section('body')
    <div class="p-10 w-full">
        <h5 class="font-semibold mb-4">{{ __('labels.chat_room') }}</h5>
        <div class="w-full">
            <div class="flex flex-col h-96">
                <div class="flex-1 overflow-y-auto bg-gray-50 mb-4 rounded-lg" id="chat">
                    @foreach ($chats as $chat)
                        <div class="py-5 px-4 border-b transition hover:bg-indigo-100">
                            <div class="">{{ $chat->msg }}</div>
                            <span class="text-gray-500 text-xs">{{ $chat->user->name }}</span>
                            <span class="text-gray-500 text-xs">{{ $chat->created_at->format('H:i') }}</span>
                        </div>
                    @endforeach
                </div>
                <div class="flex-none">
                    <form action="{{ route('mailboxes.update', $id) }}" method="POST" class="flex space-x-4">
                        @csrf
                        @method('put')
                        <input type="text" name="message" placeholder="Type your message..." class="border p-2 w-full">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2">{{ __('lables.send') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="module">
        $(document).ready(function() {
            $("#chat").animate({ scrollTop: $('#chat').prop("scrollHeight")}, 1000);
        });
    </script>
@endsection
