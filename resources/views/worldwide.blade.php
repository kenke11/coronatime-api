<x-layouts.dashboard>
    <div>
        <div>
            <div class="grid grid-cols-1 gap-6 grid-cols-1 grid-cols-1 md:hidden">
                <div class="col-span-1 flex flex-col text-center bg-white rounded-lg shadow divide-y divide-gray-200 bg-purple-100">
                    <div class="flex-1 flex flex-col p-10">
                        <img class="w-24 self-center" src="{{asset('images/stats1.png')}}" alt="stats">
                        <div class="mt-6 font-semibold text-xl">
                            @lang('new_case')
                        </div>
                        <div class="text-4xl font-semibold text-blue-700 mt-4">
                            {{$new_case}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 gap-6 grid-cols-2 md:grid-cols-3 mt-4 md:mt-0">

                <div class="col-span-1 hidden md:flex flex-col text-center bg-white rounded-lg shadow divide-y divide-gray-200 bg-purple-100">
                    <div class="flex-1 flex flex-col p-10">
                        <img class="w-24 self-center" src="{{asset('images/stats1.png')}}" alt="stats">
                        <div class="mt-6 font-semibold text-sm md:text-xl">
                            @lang('new_case')
                        </div>
                        <div class="text-2xl md:text-4xl font-semibold text-blue-700 mt-4">
                            {{$new_case}}
                        </div>
                    </div>
                </div>

                <div class="col-span-1 flex flex-col text-center bg-white rounded-lg shadow divide-y divide-gray-200 bg-green-100">
                    <div class="flex-1 flex flex-col p-10">
                        <img class="w-24 self-center" src="{{asset('images/stats2.png')}}" alt="stats">
                        <div class="mt-12 font-semibold text-sm md:text-xl">
                            @lang('recovered')
                        </div>
                        <div class="text-2xl md:text-4xl font-semibold text-green-700 mt-4">
                            {{$recovered}}
                        </div>
                    </div>
                </div>

                <div class="col-span-1 flex flex-col text-center bg-white rounded-lg shadow divide-y divide-gray-200 bg-yellow-50">
                    <div class="flex-1 flex flex-col p-10">
                        <img class="w-24 self-center" src="{{asset('images/stats3.png')}}" alt="stats">
                        <div class="mt-12 font-semibold text-sm md:text-xl">
                            @lang('deaths')
                        </div>
                        <div class="text-2xl md:text-4xl font-semibold text-yellow-300 mt-4">
                            {{$deaths}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.dashboard>
