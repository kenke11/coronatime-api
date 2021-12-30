<div class="min-h-screen flex flex-col ">
    <div
        class="fixed top-0 h-1 bg-green-500 z-10 w-full animate-pulse"
        wire:loading
        wire:target="resetPassword"
    >

    </div>
    <div class="flex justify-center mt-16">
        <img src="{{asset('images/logo.png')}}" alt="logo">
    </div>
    <div class="flex justify-center mt-20 md:mt-32">
        <div class="flex-1 flex flex-col w-7/12 justify-center py-12 px-4 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
            <div class="mx-auto w-full max-w-sm lg:w-96">
                <div class="text-center flex justify-center">
                    <h1 class="font-semibold text-2xl">Reset Password</h1>
                </div>
                <div class="mt-14">


                    <form
                        wire:submit.prevent="resetPassword"
                        method="POST"
                        class="space-y-6"
                        action="#">
                        <div class="h-2">
                            @error('email_not_exist')
                                <p class="text-red-600 fort-semibold text-sm">{{$message}}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="email" class="block text-md font-semibold text-gray-900">
                                Email
                            </label>
                            <div class="mt-1">
                                <input
                                    wire:model="email"
                                    id="email"
                                    name="email"
                                    type="email"
                                    class="@error('email') border-red-600 @enderror appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                    placeholder="Enter unique username or email"
                                >
                            </div>
                            <div class="mt-1 h-2">
                                @error('email')
                                <div class="text-red-600 font-semibold text-xs flex ">
                                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="ml-2 self-center">{{$message}}</span>
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="w-full flex justify-center uppercase py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-500 hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                RESET PASSWORD
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
