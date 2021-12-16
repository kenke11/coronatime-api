<div class="min-h-screen flex">
    <div class="flex-1 flex flex-col w-7/12 justify-center py-12 px-4 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
        <div class="mx-auto w-full max-w-sm lg:w-96">
            <div>
                <img class="h-12 w-auto" src="{{asset('images/logo.png')}}" alt="Workflow">
                <h2 class="mt-16 text-3xl font-semibold text-gray-900">
                    Welcome back
                </h2>
                <p class="mt-4 text-sm text-gray-500">
                    Welcome back! Please enter your details
                </p>
            </div>

            <div class="mt-8">

                <div class="mt-6">
                    <form
                        wire:submit.prevent="login"
                        action="#"
                        method="POST"
                        class="space-y-6">

                        <div>
                            @if($errors->any())
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li><small class="text-red-600">{{$error}}</small></li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>

                        <div class="mt-3">
                            <label for="username" class="block text-sm font-semibold text-gray-900">
                                Username
                            </label>
                            <div class="mt-1">
                                <input
                                    wire:model.defer="username"
                                    id="username"
                                    name="username"
                                    type="text"
                                    class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                    placeholder="Enter unique username or email"
                                >
                            </div>
                        </div>

                        <div class="space-y-1">
                            <label for="password" class="block text-sm font-semibold text-gray-900">
                                Password
                            </label>
                            <div class="mt-1">
                                <input
                                    wire:model.defer="password"
                                    id="password"
                                    name="password"
                                    type="password"
                                    autocomplete="current-password"
                                    class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                    placeholder="Fill in password"
                                >
                            </div>
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input
                                    id="remember-me"
                                    name="remember-me"
                                    type="checkbox"
                                    class="h-4 w-4 text-green-500"
                                >
                                <label for="remember-me" class="ml-2 block font-semibold text-sm text-gray-900">
                                    Remember this device
                                </label>
                            </div>

                            <div class="text-sm">
                                <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">
                                    Forgot your password?
                                </a>
                            </div>
                        </div>

                        <div>
                            <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-500 hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                Sign in
                            </button>
                        </div>

                        <div class="flex justify-center text-gray-500">
                            <span>Don’t have and account? <a href="{{route('register')}}" class="font-semibold text-gray-800">Sign up for free</a></span>
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
