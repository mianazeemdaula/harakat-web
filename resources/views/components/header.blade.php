<div class="flex flex-row items-center justify-between">
    <div class="m-4"> <img src="{{ URL::asset('/images/Harkatshop.png') }}" alt="logo"></div>
    <div class="flex flex-row items-center space-x-4 mr-16">
        <div><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
            </svg>
        </div>
        {{-- <a href="{{ route('lang_change') }}">
            <div class="bg-slate-200 p-2 text-center rounded-full w-14">
                {{ app()->getLocale() == 'en' ? 'عربی' : 'Eng' }}
            </div>
        </a> --}}
        <form action="{{ url('/logout') }}" method="post">
            @csrf
            <button type="submit"
                class="rounded-full py-1 px-4 text-gray-300 border border-gray-300">{{ __('label.logout') }}</button>
        </form>
    </div>
</div>
<hr>
