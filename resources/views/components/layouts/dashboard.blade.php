<!doctype html>
<html lang="en" xmlns:livewire="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
    @livewireStyles
</head>
<body>

    <header>
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="relative bg-white border-b-2 border-gray-100">
        <div class="px-6 px-4 md:px-28">
            <div
                class="flex justify-between items-center py-6">
                <div class="flex justify-start lg:w-0 lg:flex-1">
                    <a href="{{route('dashboard')}}">
                        <img class="h-8 w-auto sm:h-10" src="{{asset('images/logo.png')}}" alt="">
                    </a>
                </div>
                <div class="flex space-x-6">
                    <div
                        x-data="{isOpen: false}"
                    >
                        <div
                            @click="isOpen = !isOpen"
                            class="flex items-center cursor-pointer"
                        >
                            <span>@lang('language')</span>
                            <svg class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>

                        <div
                            class="absolute border border-gray-200 rounded-md mt-5 bg-gray-100"
                            x-show="isOpen"
                            @click.away="isOpen = false"
                            @keydown.escape.window="isOpen = false"
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 transform scale-90"
                            x-transition:enter-end="opacity-100 transform scale-100"
                            x-transition:leave="transition ease-in duration-300"
                            x-transition:leave-start="opacity-100 transform scale-100"
                            x-transition:leave-end="opacity-0 transform scale-90"
                        >
                            <div class="py-1 text-sm">
                                <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                                <a href="{{route('lang', 'ka')}}" class="text-gray-700 block px-6 py-2 hover:bg-gray-200">@lang('georgian')</a>
                                <a href="{{route('lang', 'en')}}" class="text-gray-700 block px-6 py-2 hover:bg-gray-200">@lang('english')</a>
                            </div>
                        </div>
                    </div>
                    <div class="-mr-2 -my-2 md:hidden">
                        <button type="button"
                                class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
                                aria-expanded="false">
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M4 6h16M4 12h16M4 18h16"/>
                            </svg>
                        </button>
                    </div>

                    <div class="hidden md:flex">
                        <div class="flex space-x-11 mr-4">
                            <div class="font-semibold">
                                {{auth()->user()->username}}
                            </div>
                        </div>
                        <div class="pl-4 border-l-2">
                            <a href="{{route('logout')}}">@lang('log_out')</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

    <nav class="mx-4 md:mx-28">
        <div class="my-4 md:my-10">
            <h2 class="font-semibold text-2xl">@lang('worldwide_statistics')</h2>
        </div>
        <div>
            <div class="flex space-x-6 md:space-x-20 border-b border-gray-300">
                <a href="{{route('dashboard')}}" class="@if(request()->url() === route('dashboard')) font-semibold border-gray-900 @else border-opacity-0 @endif border-b-4 hover:border-gray-900 transition duration-150">@lang('worldwide')</a>
                <a href="{{route('by-country')}}" class="@if(request()->url() === route('by-country')) font-semibold border-gray-900 @else border-opacity-0 @endif pb-4 border-b-4 hover:border-gray-900 transition duration-150">@lang('by_country')</a>
            </div>
        </div>
    </nav>

    <div
        class="mx-4 md:mx-28 mb-12 pt-10"
    >
        {{$slot}}
    </div>

    @livewireScripts
</body>
</html>
