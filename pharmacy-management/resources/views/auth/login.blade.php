@vite(['resources/css/app.css', 'resources/js/app.js'])
<section class="bg-gray-50 dark:bg-white-900">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-black">
            <img class="w-11 h-11 mr-2" src="{{asset('/img/logo.png')}}" alt="logo">
            Pharmatech
        </a>
        <div class="w-full bg-white rounded-lg dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-white-800 dark:border-white-700 shadow-lg">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                    Sign in to your account
                </h1>
                <form class="space-y-4 md:space-y-6" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                        <input type="email" name="email" id="email" :value="old('email')" required autofocus autocomplete="username" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required="">
                    </div>
                    @error('email')
                    <span class="flex items-center justify-center text-red-500">{{ $message }}</span>
                    @enderror

                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" required autocomplete="current-password" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                    </div>
                    @error('password')
                    <span class="flex items-center justify-center text-red-500">{{ $message }}</span>
                    @enderror
                    <div class="flex items-center justify-between">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="remember" aria-describedby="remember" type="checkbox" name="remember" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-white-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="remember" class="text-white-500 dark:text-white-300">Remember me</label>
                            </div>
                        </div>
                        <a href="{{route('password.request')}}" class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">Forgot password?</a>
                    </div>
                    <!-- Session Status -->
                    @if (session('status'))
                    <div class="pt-4 flex items-center justify-center">
                        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ session('status') }}
                        </div>
                    </div>
                    @endif
                    @if (session('login'))
                            <div class="flex items-center justify-center text-red-500">
                                {{ session('login') }}
                            </div>
                        @endif
                    <button type="submit" class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Sign in</button>
                    <p class="text-sm font-light text-red-500 dark:text-red-400">
                        Don’t have an account yet? <a href="register" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Sign up</a>
                    </p>

                </form>
                <div class="mt-6">
                    <p class="text-center text-white">
                        {{ __('Or login with') }}
                    </p>
                    <div class="flex justify-center">
                        <a href="{{ route('login.google')}}"><img src="{{asset('/img/google-plus.png')}}" class="w-11" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>