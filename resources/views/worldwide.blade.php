<x-layouts.app>

    <header>
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="relative bg-white border-b-2 border-gray-100">
            <div class="px-6 px-4 md:px-28">
                <div
                    class="flex justify-between items-center py-6">
                    <div class="flex justify-start lg:w-0 lg:flex-1">
                        <a href="{{route('dashboard')}}">
                            <span class="sr-only">Workflow</span>
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
                                <span>English</span>
                                <svg class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>

                            <div
                                class="absolute border border-gray-200 rounded-md mt-5 bg-gray-100"
                                x-show="isOpen"
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 transform scale-90"
                                x-transition:enter-end="opacity-100 transform scale-100"
                                x-transition:leave="transition ease-in duration-300"
                                x-transition:leave-start="opacity-100 transform scale-100"
                                x-transition:leave-end="opacity-0 transform scale-90"
                            >
                                <div class="py-1 text-sm">
                                    <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                                    <a href="#" class="text-gray-700 block px-6 py-2 hover:bg-gray-200">Georgia</a>
                                    <a href="#" class="text-gray-700 block px-6 py-2 hover:bg-gray-200">English</a>
                                    <a href="#" class="text-gray-700 block px-6 py-2 hover:bg-gray-200">Russia</a>
                                </div>
                            </div>
                        </div>
                        <div class="-mr-2 -my-2 md:hidden">
                            <button type="button"
                                    class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
                                    aria-expanded="false">
                                <span class="sr-only">Open menu</span>
                                <!-- Heroicon name: outline/menu -->
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
                                    Tazo K.
                                </div>
                            </div>
                            <div class="pl-4 border-l-2">
                                <a href="{{route('logout')}}">Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="mx-4 md:mx-28 mb-12">
        <div class="my-4 md:my-10">
            <h2 class="font-semibold text-2xl">Worldwide Statistics</h2>
        </div>
        <div>
           <div class="flex space-x-6 md:space-x-20 border-b border-gray-300">
               <a href="#" class="font-semibold border-b-4 border-gray-900 pb-4">Worldwide</a>
               <a href="#" class="pb-4">By country</a>
           </div>
        </div>
        <div class="mt-10">
            <div>
                <div class="grid grid-cols-1 gap-6 grid-cols-1 grid-cols-1 md:hidden">
                    <div class="col-span-1 flex flex-col text-center bg-white rounded-lg shadow divide-y divide-gray-200 bg-purple-100">
                        <div class="flex-1 flex flex-col p-10">
                            <img class="w-24 self-center" src="{{asset('images/stats1.png')}}" alt="stats">
                            <div class="mt-6 font-semibold text-xl">
                                New cases
                            </div>
                            <div class="text-4xl font-semibold text-blue-700 mt-4">
                                715,523
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-6 grid-cols-2 md:grid-cols-3 mt-4 md:mt-0">

                    <div class="col-span-1 hidden md:flex flex-col text-center bg-white rounded-lg shadow divide-y divide-gray-200 bg-purple-100">
                        <div class="flex-1 flex flex-col p-10">
                            <img class="w-24 self-center" src="{{asset('images/stats1.png')}}" alt="stats">
                            <div class="mt-6 font-semibold text-sm md:text-xl">
                                New cases
                            </div>
                            <div class="text-2xl md:text-4xl font-semibold text-blue-700 mt-4">
                                715,523
                            </div>
                        </div>
                    </div>

                    <div class="col-span-1 flex flex-col text-center bg-white rounded-lg shadow divide-y divide-gray-200 bg-green-100">
                        <div class="flex-1 flex flex-col p-10">
                            <img class="w-24 self-center" src="{{asset('images/stats2.png')}}" alt="stats">
                            <div class="mt-6 font-semibold text-sm md:text-xl">
                                Recovered
                            </div>
                            <div class="text-2xl md:text-4xl font-semibold text-green-700 mt-4">
                                72,005
                            </div>
                        </div>
                    </div>

                    <div class="col-span-1 flex flex-col text-center bg-white rounded-lg shadow divide-y divide-gray-200 bg-yellow-50">
                        <div class="flex-1 flex flex-col p-10">
                            <img class="w-24 self-center" src="{{asset('images/stats3.png')}}" alt="stats">
                            <div class="mt-6 font-semibold text-sm md:text-xl">
                                Death
                            </div>
                            <div class="text-2xl md:text-4xl font-semibold text-yellow-300 mt-4">
                                8,332
                            </div>
                        </div>
                    </div>

                    <!-- More people... -->
                </div>
            </div>
        </div>
    </div>

</x-layouts.app>
