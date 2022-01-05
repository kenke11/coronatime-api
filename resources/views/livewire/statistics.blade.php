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
            type="text"
            name="search"
            id="search"
            class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-14 py-4 sm:text-sm border-gray-300 rounded-md"
            placeholder="@lang('search_by_country')">
    </div>

    <div class="my-10">
        <div class="overflow-x-auto rounded-md text-xs md:text-sm border border-gray-100">
            <div class="grid grid-cols-4 gap-4 bg-gray-100 py-5 pl-4 md:pl-10 font-semibold">
                <div class="">
                    <form wire:submit.prevent="location">
                        <button
                            type="submit"
                            class="cursor-pointer flex items-center self-start"
                        >
                            <span class="font-semibold">@lang('location')</span>
                            <div class="ml-1">
                                <div class="mb-0.5 transform rotate-180  opacity-25 @if($locationSort == 'DESC') opacity-100 @endif">
                                    <img src="{{asset('images/vector.png')}}" >
                                </div>
                                <div class="opacity-25 @if($locationSort == 'ASC') opacity-100 @endif">
                                    <img src="{{asset('images/vector.png')}}" >
                                </div>
                            </div>
                        </button>
                    </form>
                </div>
                <div class="">
                    <form wire:submit.prevent="newCase">
                        <button
                            type="submit"
                            class="-ml-0.5 cursor-pointer flex items-center self-start"
                        >
                            <span class="font-semibold">@lang('new_case')</span>
                            <div class="ml-1">
                                <div class="mb-0.5 transform rotate-180  opacity-25 @if($newCaseSort == 'DESC') opacity-100 @endif">
                                    <img src="{{asset('images/vector.png')}}" >
                                </div>
                                <div class="opacity-25 @if($newCaseSort == 'ASC') opacity-100 @endif">
                                    <img src="{{asset('images/vector.png')}}" >
                                </div>
                            </div>
                        </button>
                    </form>
                </div>
                <div class="">
                    <form wire:submit.prevent="deaths">
                        <button
                            type="submit"
                            class="-ml-1.5 cursor-pointer flex items-center self-start"
                        >
                            <span class="font-semibold">@lang('deaths')</span>
                            <div class="ml-1">
                                <div class="mb-0.5 transform rotate-180  opacity-25 @if($deathsSort == 'DESC') opacity-100 @endif">
                                    <img src="{{asset('images/vector.png')}}" >
                                </div>
                                <div class="opacity-25 @if($deathsSort == 'ASC') opacity-100 @endif">
                                    <img src="{{asset('images/vector.png')}}" >
                                </div>
                            </div>
                        </button>
                    </form>
                </div>
                <div class="">
                    <form wire:submit.prevent="recovered">
                        <button
                            type="submit"
                            class="-ml-3 cursor-pointer flex items-center self-start"
                        >
                            <span class="font-semibold">@lang('recovered')</span>
                            <div class="ml-1">
                                <div class="mb-0.5  transform rotate-180 opacity-25 @if($recoveredSort == 'DESC') opacity-100 @endif">
                                    <img src="{{asset('images/vector.png')}}" >
                                </div>
                                <div class="opacity-25 @if($recoveredSort == 'ASC') opacity-100 @endif">
                                    <img src="{{asset('images/vector.png')}}" >
                                </div>
                            </div>
                        </button>
                    </form>
                </div>
            </div>
            <div class="overflow-y-auto max-h-96 w-full">
                @forelse($countries as $country)
                    <div class="grid grid-cols-4 gap-4 py-5 pl-4 md:pl-10 border-b border-gray-100 w-full">
                        <div>{{$country->country}}</div>
                        <div>{{$country->confirmed}}</div>
                        <div>{{$country->deaths}}</div>
                        <div>{{$country->recovered}}</div>
                    </div>
                @empty
                    <div class="px-5 md:px-10 py-5 text-gray-400">
                        @lang('countries_not_found')
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
