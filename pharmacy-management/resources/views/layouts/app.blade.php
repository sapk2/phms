<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">




 <div class="flex">
        <!-- Sidebar -->
        <aside class="w-64 h-screen bg-gray-800 text-white">
            <div class="p-6">
            <img src="{{asset('img/logo.png')}}" alt="" srcset="" class="w-11 h-15 center">
                <h1 class="text-2xl  text-center font-semibold "> Admin</h1>
                <hr class="">
               
                <nav class="mt-6">
                    <ul>
                        <li class="mt-4">
                            <a href="" class="block p-2 rounded hover:bg-gray-700">Users</a>
                        </li>
                        <li class="mt-4">
                            <a href="" class="block p-2 rounded hover:bg-gray-700">Medicine</a>
                        </li>
                        <li class="mt-4">
                            <a href="" class="block p-2 rounded hover:bg-gray-700">Inventory</a>
                        </li>
                        <li class="mt-4">
                            <a href="" class="block p-2 rounded hover:bg-gray-700">Sales</a>

                        </li>
                        <li class="mt-4">
                        <form action="{{route('logout')}}" method="post"class="block p-2 rounded hover:bg-gray-700">
                        @csrf
                        <button type="submit" class="block w-full text-left"> Logout</button>
                    </form> </li>

                    </ul>
                </nav>
            </div>
        </aside>








        <!--page content-->
        <div>
            @yield('content')
        </div>
    </body>
</html>
