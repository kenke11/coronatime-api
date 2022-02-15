<div
    x-data="{isOpen: true}"
    aria-live="assertive"
    class="fixed inset-0 flex items-end px-4 py-6 pointer-events-none sm:p-6 items-end"
    x-cloak
    x-show="isOpen"
    x-transition:enter="transition ease-out duration-600"
    x-transition:enter-start="opacity-0 transform translate-x-8"
    x-transition:enter-end="opacity-100 transform translate-x-0"
    x-transition:leave="transition ease-in duration-300"
    x-transition:leave-start="opacity-100 transform translate-x-0"
    x-transition:leave-end="opacity-0 transform translate-x-8"
    x-init="
        setTimeout(() => { isOpen = false }, 5000)
    "
    xmlns:x-transition="http://www.w3.org/1999/xhtml">
    <div class="w-full flex flex-col items-center space-y-4 sm:items-end">

        <div class="max-w-sm w-full bg-white shadow-lg rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden">
            <div class="p-4">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <x-icons.success></x-icons.success>
                    </div>
                    <div class="ml-3 w-0 flex-1 pt-0.5">
                        <p class="text-sm font-medium text-gray-900">
                            {{$message}}
                        </p>
                    </div>
                    <div class="ml-4 flex-shrink-0 flex">
                        <button
                            @click="isOpen = false"
                            class="bg-white rounded-md inline-flex text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        >
                            <span class="sr-only">Close</span>
                            <x-icons.exit></x-icons.exit>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
