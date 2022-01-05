<div class="min-h-screen flex">
    <div class="flex-1 flex flex-col w-7/12 justify-center py-12 px-4 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
        <div class="mx-auto w-full max-w-sm lg:w-96">
            <div>
                <img class="h-12 w-auto" src="{{asset('images/logo.png')}}" alt="Workflow">
                <h2 class="mt-16 text-3xl font-semibold text-gray-900">
                    @lang('welcome_back')
                </h2>
                <p class="mt-4 text-sm text-gray-500">
                    @lang('welcome_back_please_enter_your_details')
                </p>
            </div>
            <div class="mt-8">
                <div class="mt-6">
                    <form
                        wire:submit.prevent="login"
                        action="#"
                        method="POST"
                        class="space-y-6">
                        <div class="h-2">
                            @error('not_verified')
                                <p class="text-red-600 text-xs font-semibold">{{$message}}</p>
                            @enderror
                            @error('not_login')
                                <p class="text-red-600 text-xs font-semibold">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <label for="username" class="block text-sm font-semibold text-gray-900">
                                @lang('username')
                            </label>
                            <div class="mt-1 relative">
                                <input
                                    wire:model="username"
                                    id="username"
                                    name="username"
                                    type="text"
                                    class="@if($username) @error('username') border-red-600 @else border-green-600 @enderror @endif appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                    placeholder="@lang('enter_unique_username_or_email')"
                                >
                                @if($username)
                                    @error('username')
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-red-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                @else
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-green-600" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    @enderror
                                @endif
                            </div>
                            <div class="mt-1 h-2">
                                @error('username')
                                <div class="text-red-600 font-semibold text-xs flex ">
                                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="ml-2 self-center">{{$message}}</span>
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="space-y-1">
                            <label for="password" class="block text-sm font-semibold text-gray-900">
                                @lang('password')
                            </label>
                            <div class="mt-1 relative">
                                <input
                                    wire:model="password"
                                    id="password"
                                    name="password"
                                    type="password"
                                    autocomplete="current-password"
                                    class="@if($password) @error('password') border-red-600 @else border-green-600 @enderror @endif appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                    placeholder="@lang('fill_in_password')"
                                >
                                @if($password)
                                    @error('password')
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-red-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                @else
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-green-600" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    @enderror
                                @endif
                            </div>
                            <div class="mt-1 h-5">
                                @error('password')
                                <div class="text-red-600 font-semibold text-xs flex ">
                                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="ml-2 self-center">{{$message}}</span>
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input
                                    wire:model="remember_me"
                                    id="remember_me"
                                    name="remember_me"
                                    type="checkbox"
                                    value="remember_me"
                                    class="h-4 w-4 text-green-500"
                                >
                                <label for="remember_me" class="ml-2 block font-semibold text-xs text-gray-900">
                                    @lang('remember_this_device')
                                </label>
                            </div>

                            <div class="text-xs">
                                <a href="{{route('verify-reset-password')}}" class="font-semibold text-indigo-600 hover:text-indigo-500">
                                    @lang('forgot_your_password')
                                </a>
                            </div>
                        </div>

                        <div>
                            <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-500 hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                @lang('sign_in')
                            </button>
                        </div>

                        <div class="flex justify-center text-gray-500">
                            <span>@lang('dont_have_and_account') <a href="{{route('register')}}" class="font-semibold text-gray-800">@lang('sign_up_for_free')</a></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="hidden lg:block relative w-0 flex-1">
        <img class="absolute inset-0 h-full w-full object-cover" src="{{asset('images/covid-vaccine.png')}}" alt="">
    </div>
</div>
