<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shringar</title>
    <!-- Scripts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* Custom styles */
        .bg-baby-pink {
            background-color: #f8c8dc;
        }

        .text-black {
            color: black;
        }

        .hover-text-pink:hover {
            color: #e75480;
        }

        .mobile-search {
            display: none;
            margin-top: 10px;
        }

        .mobile-search.active {
            display: block;
        }

        /* Dropdown styles */
        .dropdown-menu {
            display: none;
            position: absolute;
            right: 0;
            margin-top: 5px;
            background-color: white;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1;
            border-radius: 8px;
        }

        .dropdown-menu a {
            padding: 10px 20px;
            display: block;
            text-decoration: none;
            color: black;
            font-size: 14px;
        }

        .dropdown-menu a:hover {
            background-color: #f0f0f0;
        }

        .dropdown:hover .dropdown-menu {
            display: block;
        }
    </style>
</head>

<body>
    @include('layouts.alert')

    <!-- Navbar -->
    <nav class="shadow bg-rose-200 px-4 md:px-16 py-2 flex justify-between items-center mb-10 sticky top-0 z-40">
        <!-- Logo -->
        <a href={{route('home')}} class="font-bold text-lg text-black tracking-wide hover:scale-105 transition-transform duration-300">
            <img src="{{asset('images/packages/Designer.png')}}" alt="logo"
                class="max-h-12 hover:scale-105 transition-transform duration-300">
        </a>

       <!-- Search Bar (Desktop) -->
<form action="{{ route('search') }}" method="GET" class="hidden md:flex items-center space-x-2 w-full max-w-lg">
    <input type="search" name="query" value="{{ request()->query('query') }}"
        class="border border-gray-300 rounded-lg px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-yellow-400"
        placeholder="Search..." aria-label="Search" />
    <button type="submit"
        class="rounded-lg px-6 py-2 text-sm font-semibold bg-black text-white hover:bg-yellow-400 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200 ease-in-out">
        <span class="sr-only">Search</span>
        <i class="ri-search-line"></i>
    </button>
</form>


        <!-- Mobile Search Icon -->
        <button id="toggleSearch" type="button"
            class="block md:hidden text-black text-lg hover-text-pink transition duration-200">
            <i class="ri-search-line"></i>
        </button>

        <!-- Navigation Links -->
        <div class="flex gap-4 md:gap-6">
            <a href={{route('home')}} class="text-black text-sm md:text-md font-medium hover-text-pink transition-all duration-300">
                Home
            </a>
            <a href="{{ route('about') }}" class="text-black text-sm md:text-md font-medium hover-text-pink transition-all duration-300">About</a>

            <a href="{{route('contact')}}" class="text-black text-sm md:text-md font-medium hover-text-pink transition-all duration-300">
                Contact
            </a>
            <a href="{{route('services.public')}}" class="text-black text-sm md:text-md font-medium hover-text-pink transition-all duration-300">
                Services
            </a>
            <a href="{{route('bridal.packages')}}" class="text-black text-sm md:text-md font-medium hover-text-pink transition-all duration-300">
                Packages
            </a>

            <!-- User Dropdown -->
            @auth
            <div class="relative dropdown">
                <button class="text-black text-sm md:text-md font-medium flex items-center gap-2 hover-text-pink transition-all duration-300">
                    {{ auth()->user()->name }}
                    <i class="ri-arrow-down-s-line"></i>
                </button>
                <div class="dropdown-menu bg-white shadow-lg rounded-lg w-48 py-2">
                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-md">
                        Profile
                    </a>
                    <form method="POST" action="{{ route('logout') }}" id="logout-form">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-2 text-gray-700 hover:bg-red-100 hover:text-red-600 rounded-md">
                            Logout
                        </button>
                    </form>
                </div>

            </div>
            @else
            <a href="{{ route('login') }}" class="text-sm md:text-md text-black hover-text-pink">
                Login
            </a>
            @endauth
        </div>
    </nav>

    <!-- Mobile Search Box -->
    <form action="{{ route('search') }}" method="GET" id="mobileSearchBox"
        class="mobile-search px-4">
        <input type="search" name="search" value="{{ request()->query('search') }}"
            class="border border-gray-300 rounded-lg px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-yellow-400"
            placeholder="Search..." aria-label="Search" />
        <button type="submit"
            class="w-full mt-2 rounded-lg px-6 py-2 text-sm font-semibold bg-black text-white hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200 ease-in-out">
            Search
        </button>
    </form>

    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <div id="aboutclass">
    <footer class="bg-rose-200 text-black px-4 md:px-16 py-8 mt-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- About -->
            <div>
                <h1 class="text-xl md:text-2xl font-semibold">SHRINGAR | Makeover Concepts</h1>
                <p class="mt-2 text-sm md:text-base">Durbar Marg, Kathmandu, Nepal.</p>
                <p class="mt-1 text-sm md:text-base">P: 085475736473</p>
                <p class="mt-1 text-sm md:text-base">Email: <a href="mailto:purnimasadashankar111@gmail.com"
                        class="text-blue-500">purnimasadashanakar111@gmail.com</a></p>
            </div>

            <!-- Quick Links -->
            <div>
                <h1 class="text-xl md:text-2xl font-semibold">Quick Links</h1>
                <ul class="mt-4 text-sm md:text-base">
                    <li><a href="#" class="hover-text-pink">About</a></li>
                    <li><a href="#" class="hover-text-pink">Photo Gallery</a></li>
                    <li><a href="#" class="hover-text-pink">Contact</a></li>
                </ul>
            </div>

            <!-- Services -->
            <div>
                <h1 class="text-xl md:text-2xl font-semibold">Services</h1>
                <ul class="mt-4 text-sm md:text-base">
                    <li><a href="#" class="hover-text-pink">Wedding Guest Makeup</a></li>
                    <li><a href="#" class="hover-text-pink">Bridal Makeup</a></li>
                    <li><a href="#" class="hover-text-pink">Themed Photoshoot Makeup</a></li>
                    <li><a href="#" class="hover-text-pink">SFX Makeup</a></li>
                    <li><a href="#" class="hover-text-pink">Creative Makeup</a></li>
                </ul>
            </div>
        </div>

        <div class="mt-8 text-center">
            <p class="text-sm">&copy; 2024 SHRINGAR Pvt. Ltd. All rights reserved.</p>
        </div>
    </footer>
</div>

</body>

</html>
