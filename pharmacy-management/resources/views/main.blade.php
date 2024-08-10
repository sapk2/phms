<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    
</head>

<body class="bg-gray-100 font-sans">
    <!-- Navbar -->
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <img src="{{asset('img/logo.png')}}" class="w-11 h-11" alt="" srcset="">
                    <a href="#" class="flex-shrink-0 flex items-center text-2xl font-bold text-blue-600">
                        Pharmacy
                    </a>
                </div>
                <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                    <a href="#" class="text-gray-900 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">Home</a>
                    <a href="#" class="text-gray-500 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">Products</a>
                    <a href="#" class="text-gray-500 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">About</a>
                    <a href="#" class="text-gray-500 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium">Contact</a>
                </div>

                @if (Route::has('login'))
                <nav class="-mx-3 flex flex-1 justify-end">
                    @auth
                    <a
                        href="{{ url('/dashboard') }}"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-black dark:hover:text-black/80 dark:focus-visible:ring-blue">
                        Dashboard
                    </a>
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

    <footer class="bg-gray-800 text-gray-300">
    <div class="container mx-auto px-6 py-10">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- New York -->
            <div>
                <h3 class="text-white font-semibold">NEW YORK</h3>
                <p>Huntersville, <br> 957 Hill Hills Suite 491, United States</p>
                <p><i class="fas fa-phone-alt"></i> Office: +12(3) 456 7890 1234</p>
                <p><i class="fas fa-envelope"></i> Support: company@name.com</p>
            </div>
            <!-- Rome -->
            <div>
                <h3 class="text-white font-semibold">ROME</h3>
                <p>Piazza di Spagna, <br> 00187 Roma RM, Italy</p>
                <p><i class="fas fa-phone-alt"></i> Office: +12(3) 456 7890 1234</p>
                <p><i class="fas fa-envelope"></i> Support: company@name.it</p>
            </div>
            <!-- London -->
            <div>
                <h3 class="text-white font-semibold">LONDON</h3>
                <p>Fulham Rd, <br> London SW6 1HS, United Kingdom</p>
                <p><i class="fas fa-phone-alt"></i> Office: +12(3) 456 7890 1234</p>
                <p><i class="fas fa-envelope"></i> Support: company@name.co.uk</p>
            </div>
        </div>

        <div class="mt-8 flex justify-center">
            <form class="w-full md:w-1/2 flex items-center">
                <input type="email" placeholder="Your email" class="w-full p-3 rounded-l bg-gray-700 text-gray-300 focus:outline-none">
                <button type="submit" class="p-3 bg-blue-600 text-white rounded-r">Subscribe</button>
            </form>
        </div>

        <div class="mt-8 flex justify-between items-center border-t border-gray-700 pt-6">
            <div>
                <a href="#" class="text-white text-lg font-semibold">Flowbite</a>
                <p>© 2021-2022 Flowbite™. All Rights Reserved.</p>
            </div>
            <div>
                <a href="#" class="text-white text-sm">English (US)</a>
            </div>
        </div>
    </div>
</footer>

    <!-- Footer
    <footer class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="text-center text-gray-600">
                <p>&copy; 2024 Pharmacy Management System. Parisoftcreation All rights reserved.</p>
            </div>
        </div>
    </footer> -->
</body>

</html>