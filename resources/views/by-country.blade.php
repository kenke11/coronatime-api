<x-layouts.dashboard>
    <div class="w-60 mt-1 relative border border-gray-300 rounded-md shadow-sm">
        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
            <svg class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </div>
        <input
            type="search"
            name="search"
            id="search"
            class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-14 py-4 sm:text-sm border-gray-300 rounded-md"
            placeholder="Search by country">
    </div>

    <div class="my-10">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-100">
                            <tr class="font-semibold text-sm">
                                <th scope="col" class="px-6 py-3 text-left font-medium tracking-wider">
                                    Location
                                </th>
                                <th scope="col" class="px-6 py-3 text-left font-medium tracking-wider">
                                    New cases
                                </th>
                                <th scope="col" class="px-6 py-3 text-left font-medium tracking-wider">
                                    Deaths
                                </th>
                                <th scope="col" class="px-6 py-3 text-left font-medium tracking-wider">
                                    Recovered
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 text-sm overflow-y-auto ">
                                @foreach($countries as $country)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{$country->country}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{$country->confirmed}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{$country->deaths}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{$country->recovered}}
                                        </td>
                                    </tr>
                                @endforeach
                                </div>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.dashboard>
