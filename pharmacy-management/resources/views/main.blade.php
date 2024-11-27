<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$settings->name}}</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

</head>

<body class="bg-gray-100 font-sans">
    <!-- Navbar -->
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <img src="{{asset('storage/'.$settings->logo)}}" class="w-15 h-15" alt="" srcset="">
                    <a href="#" class="flex-shrink-0 flex items-center text-2xl font-bold text-blue-600">
                        {{$settings->name}}
                    </a>
                </div>
                <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                    <a href="{{ route('index') }}" class="text-gray-900 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">Home</a>
                    <a href="{{ route('products') }}" class="text-gray-500 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">Products</a>
                    <a href="#about" class="text-gray-500 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">About</a>
                    <a href="#contact" class="text-gray-500 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">Contact</a>
                </div>

                @if (Route::has('login'))
                <nav class="-mx-3 flex flex-1 justify-end">
                    @auth
                    @if(Auth::user()->role == 'admin')
                    <a
                        href="{{ route('pharmacist.dashboard') }}"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-black dark:hover:text-black/80 dark:focus-visible:ring-blue">
                        Dashboard
                    </a>
                    @else
                    <span

                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-black dark:hover:text-black/80 dark:focus-visible:ring-blue">
                        {{Auth::user()->name}}
                    </span>
                    @endif
                    @else
                    <a
                        href="{{ route('login') }}"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-black dark:hover:text-black/80 dark:focus-visible:ring-blue">
                        Log in
                    </a>

                    @if (Route::has('register'))
                    <a
                        href="{{ route('register') }}"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-black dark:hover:text-black/80 dark:focus-visible:ring-blue">
                        Register
                    </a>
                    @endif
                    @endauth
                </nav>
                @endif


            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-16">
        @yield('content')
    </div>



    <!-- Footer -->
    <footer class="p-4 bg-white md:p-8 lg:p-10 dark:bg-gray-800">
        <div class="mx-auto max-w-screen-xl text-center">
            <!-- Logo and Name -->
            <a href="{{ route('index') }}" class="flex justify-center items-center text-2xl font-semibold text-gray-900 dark:text-white">
                <img src="{{ asset('storage/'.$settings->logo) }}" class="w-11 h-11" alt="{{ $footer->name }}">
                <span class="ml-2">{{ $settings->name }}</span>
            </a>

            <!-- Description -->
            <p class="my-6 text-gray-500 dark:text-gray-400">{{ $footer->description }}</p>

            <!-- Social Media Links -->
            <ul class="flex flex-wrap justify-center items-center mb-6 text-gray-900 dark:text-white">
                @if($footer->facebook_url)
                <li class="mr-4">
                    <a href="{{ $footer->facebook_url }}" target="_blank" class="hover:underline md:mr-6">Facebook</a>
                </li>
                @endif

                @if($footer->twitter_url)
                <li class="mr-4">
                    <a href="{{ $footer->twitter_url }}" target="_blank" class="hover:underline md:mr-6">Twitter</a>
                </li>
                @endif

                @if($footer->instagram_url)
                <li class="mr-4">
                    <a href="{{ $footer->instagram_url }}" target="_blank" class="hover:underline md:mr-6">Instagram</a>
                </li>
                @endif

                @if($footer->linkedin_url)
                <li class="mr-4">
                    <a href="{{ $footer->linkedin_url }}" target="_blank" class="hover:underline md:mr-6">LinkedIn</a>
                </li>
                @endif

                <li class="mr-4">
                    <a href="mailto:{{ $footer->email }}" class="mr-4 hover:underline md:mr-6">✉️{{ $footer->email }}</a>
                </li>
                <li>
                    <span> contact us: {{$footer->phone}}</span>
                </li>
            </ul>

            <!-- Copyright Text -->
            <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© {{ date('Y') }} <a href="#" class="hover:underline">{{ $footer->name }}</a>. All Rights Reserved.</span>
        </div>
    </footer>

</body>

</html>