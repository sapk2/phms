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
   <script src="https://kit.fontawesome.com/beb264445c.js" crossorigin="anonymous"></script>
   <!-- Scripts -->
   <script src="//unpkg.com/alpinejs" defer></script>
   @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
   <div class="flex">
      <div class="w-60 bg-blue-200 shadow-lg h-screen">
         <div class="container">
            <img src="{{asset('img/logo.png')}}" class=" w-16 h-16 mx-auto my-5" alt="" srcset="">
         </div>
         <div class="mt-3">
            <h1 class="px-4 text-center text-2xl text-bold">Admin</h1>
            <hr class="color-red">
         </div>
         <div class="mt-5">
            <a href="{{route('pharmacist.dashboard')}}" class="px-4 py-2 hover:bg-gray-300 block border-b border-gray-300 border-l-blue-300 border-l-2 ml-2 mt-1"><i class="fa-solid fa-house"> Dashboard</i></a>
            <a href="{{route('pharmacist.patientmngt.patientindex')}}" class="px-4 py-2 hover:bg-gray-300 block border-b border-gray-300 border-l-blue-300 border-l-2 ml-2 mt-1"><i class="fa-solid fa-user"> Patient</i></a>
            <a href="{{route('pharmacist.medicinemngt.medindex')}}" class="px-4 py-2 hover:bg-gray-300 block border-b border-gray-300 border-l-blue-300 border-l-2 ml-2 mt-1"><i class="fa-solid fa-tablets"> Medicine</i></a>
            <a href="{{route('pharmacist.prescriptions.index')}}" class="px-4 py-2 hover:bg-gray-300 block border-b border-gray-300 border-l-blue-300 border-l-2 ml-2 mt-1"><i class="fa-solid fa-prescription"> Prescription</i></a>
            <a href="{{route('pharmacist.prescriptiondetail.prescribeindex')}}" class="px-4 py-2 hover:bg-gray-300 block border-b border-gray-300 border-l-blue-300 border-l-2 ml-2 mt-1"><i class="fa-solid fa-prescription"> Detailsprescrption</i></a>
            <a href="{{route('pharmacist.inventory.index')}}" class="px-4 py-2 hover:bg-gray-300 block border-b border-gray-300 border-l-blue-300 border-l-2 ml-2 mt-1"><i class="fa-solid fa-warehouse"> Inventory</i></a>
            <a href="#" class="px-4 py-2 hover:bg-gray-300 block border-b border-gray-300 border-l-blue-300 border-l-2 ml-2 mt-1"><i class="fa-brands fa-adversal"> sales Management</i></a>
            <a href="#" class="px-4 py-2 hover:bg-gray-300 block border-b border-gray-300 border-l-blue-300 border-l-2 ml-2 mt-1"><i class="fa-solid fa-newspaper"> Report</i></a>
            <div class="relative">
               <a href="#" id="settingBtn" class="px-4 py-2 hover:bg-gray-300 block border-b  border-gray-300 border-l-blue-300 border-l-2 ml-2 mt-1"><i class="fa-solid fa-wrench"> Setting</i></a>
               <!--Dropdown Menu--->
               <div id="dropdownMenu" class="absolute hidden bg-white border border-gray-300 mt-1 ml-1 rounded-md shadow-lg">
                  <a href="{{route('pharmacist.user.userindex')}}" class="px-4 py-2 hover:bg-gray-300 block border-b border-gray-300 border-l-blue-300 border-l-2 ml-2 mt-1"><i class="fa-solid fa-users-gear"> Manageuser</i></a>
                  <a href="#" class="px-4 py-2 hover:bg-gray-300 block border-b border-gray-300 border-l-blue-300 border-l-2 ml-2 mt-1"><i class="fa-solid fa-house-medical"> General setting</i></a>
                  <a href="#" class="px-4 py-2 hover:bg-gray-300 block border-b border-gray-300 border-l-blue-300 border-l-2 ml-2 mt-1"><i class="fa-solid fa-address-card"> Profile</i></a>
               </div>
            </div>
            <script>
               const settingBtn = document.getElementById('settingBtn');
               const dropdownMenu = document.getElementById('dropdownMenu');

               // Toggle dropdown on click
               settingBtn.addEventListener('click', function(event) {
                  event.preventDefault();
                  dropdownMenu.classList.toggle('hidden');
               });

               // Close dropdown if click outside or no hover on the setting link
               document.addEventListener('click', function(event) {
                  if (!settingBtn.contains(event.target) && !dropdownMenu.contains(event.target)) {
                     dropdownMenu.classList.add('hidden');
                  }
               });

               // Close dropdown when the mouse leaves the dropdown
               dropdownMenu.addEventListener('mouseleave', function() {
                  dropdownMenu.classList.add('hidden');
               });
            </script>
            <a href="" class="px-4 py-2 hover:bg-gray-300 block border-b border-gray-300 border-l-blue-300 border-l-2 ml-2 mt-1"><i class="fa-solid fa-bell"> Notification</i></a>
            <form action="{{route('logout')}}" method="POST" class="px-4 py-2 hover:bg-gray-300 block border-b border-gray-300 border-l-blue-300 border-l-2 ml-2 mt-1">
               @csrf
               <button type="submit" class="w-full text-left"><i class="fa-solid fa-right-from-bracket"> Logout</i></button>
            </form>

         </div>

      </div>
       <!--page content-->
   <div  class="flex-1 p-4">
   <div class="top-0 p-3 bg-blue-900 w-full text-white right-full inset-y-0 right-0 justify-end inline-flex">
                Hello, <a href="#"> <span class="pr-2 pl-1"> {{Auth::user()->name}} </span></a>
                </div>
      @yield('content')
   </div>
   </div>

  
</body>

</html>