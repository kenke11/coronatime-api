<div class="-mx-4 md:mx-0">
    <div class="w-60 mt-1 relative md:border md:border-gray-300 rounded-md shadow-sm">
        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
            <svg class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
        </div>
        <input
            wire:model="search"
            type="search"
            name="search"
            id="search"
            class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-14 py-4 sm:text-sm border-gray-300 rounded-md"
            placeholder="@lang('search_by_country')">
    </div>

    <div class="my-10">
        <div class="w-screen-max overflow-x-auto rounded-md text-xs md:text-sm border border-gray-100">
            <div class="grid grid-cols-4 gap-4  bg-gray-100 py-5 pl-4 md:pl-10 font-semibold">
                <div class="flex items-center">
                    @lang('location')
                    <div class="ml-2">
                        <div class="mb-0.5">
                            <img src="{{asset('images/up.png')}}" >
                        </div>
                        <div>
                            <img src="{{asset('images/down.png')}}" >
                        </div>
                    </div>
                </div>
                <div class="flex items-center">
                    @lang('new_case')
                    <div class="ml-2">
                        <div class="mb-0.5">
                            <img src="{{asset('images/up.png')}}" >
                        </div>
                        <div>
                            <img src="{{asset('images/down.png')}}" >
                        </div>
                    </div>
                </div>
                <div class="flex items-center">
                    @lang('deaths')
                    <div class="ml-2">
                        <div class="mb-0.5">
                            <img src="{{asset('images/up.png')}}" >
                        </div>
                        <div>
                            <img src="{{asset('images/down.png')}}" >
                        </div>
                    </div>
                </div>
                <div class="flex items-center">
                    @lang('recovered')
                    <div class="ml-2">
                        <div class="mb-0.5">
                            <img src="{{asset('images/up.png')}}" >
                        </div>
                        <div>
                            <img src="{{asset('images/down.png')}}" >
                        </div>
                    </div>
                </div>
            </div>
            <div class="overflow-y-auto max-h-150">
                @foreach($countries as $country)
                    <div class="grid grid-cols-4 gap-4  py-5 pl-4 md:pl-10 border-b border-gray-100">
                        <div>{{$country->country}}</div>
                        <div>{{$country->confirmed}}</div>
                        <div>{{$country->deaths}}</div>
                        <div>{{$country->recovered}}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
