<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">


        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->

        <!-- In the head section or at the bottom of the body in package/create.blade.php -->

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            .mydescription ol{
                list-style-type: numeric;
                padding-left: 10px;
            }

            .mydescription ul{
                list-style-type: disc;
                padding-left: 10px;
            }

            /* Fix the sidebar */
            nav {
                position: fixed; /* This will make the sidebar stay fixed while scrolling */
                top: 0;
                left: 0;
                bottom: 0;
                width: 15rem; /* Adjust the width of the sidebar */
                z-index: 10; /* Ensure it stays above other content */
            }

            /* Make the rest of the content scrollable */
            .p-4.flex-1 {
                margin-left: 15rem; /* This makes space for the fixed sidebar */
                padding: 1rem;
                overflow-y: auto; /* Ensure content is scrollable */
                height: 100vh; /* Make sure the content takes full height */
            }
        </style>

    </head>
    <body class="font-sans antialiased">
            @include('layouts.alert')

            <div class="flex">
                <nav class="w-56 h-screen shadow-lg bg-blue-100">
                    <img src="{{asset('images/packages/Designer.png')}}" alt="" class="w-32 mx-auto mt-4 flex">
                    <ul class="mt-8">
                        <li>
                            <a href="{{route('dashboard')}}" class="block hover:bg-pink-200 p-4 rounded-lg font-bold text-xl">Dashboard</a>
                        </li>

                        <li>
                            <a href="{{route('service.index')}}" class="block hover:bg-pink-200 p-4 rounded-lg font-bold text-xl">Services</a>
                        </li>

                        <li>
                            <a href="{{route('booking.index')}}" class="block hover:bg-pink-200 p-4 rounded-lg font-bold text-xl">Appointment</a>
                        </li>

                        <li>
                            <a href="{{route('package.index')}}" class="block hover:bg-pink-200 p-4 rounded-lg font-bold text-xl">Packages</a>
                        </li>

                        <li>
                            <a href="{{route('user.index')}}" class="block hover:bg-pink-200 p-4 rounded-lg font-bold text-xl">Users</a>
                        </li>
                        <li>
                            <form action="{{route('logout')}}" method="POST">
                             @csrf
                             <button type="submit" class="hover:bg-pink-200 p-4 rounded-lg font-bold text-xl w-full text-left">Logout</button>
                            </form>
                         </li>

                    </ul>
                </nav>

                <div class="p-4 flex-1">
                    @yield('content')
                </div>
            </div>
    </body>
</html>
