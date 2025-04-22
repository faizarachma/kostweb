<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Admin Kost</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-white">
    <div class="flex">
        <!-- Sidebar -->
        <div class="w-1/5 bg-white h-screen p-5 shadow-md">
            <h2 class="font-bold text-xl mb-5">🏠 Kost Putri Alifa Purwokerto</h2>
            <ul>
                <li class="mb-2">
                    <a href="{{ route('dashboard') }}"
                        class="block p-2 rounded-full hover:bg-gray-100 hover:text-black {{ request()->routeIs('dashboard') ? 'bg-pink-500 text-white' : '' }}">📊
                        Dashboard Statistik</a>
                </li>
                <li class="mb-2">
                    <a href="{{ route('kamar') }}"
                        class="block p-2 rounded-full hover:bg-gray-100 hover:text-black {{ request()->routeIs('kamar') ? 'bg-pink-500 text-white' : '' }}">🛏️
                        Kelola Kamar</a>
                </li>
                <li class="mb-2">
                    <a href="{{ route('penghuni') }}"
                        class="block p-2 rounded-full hover:bg-gray-100 hover:text-black {{ request()->routeIs('penghuni') ? 'bg-pink-500 text-white' : '' }}">👥
                        Kelola Penghuni</a>
                </li>
                <li class="mb-2">
                    <a href="{{ route('pemesanan') }}"
                        class="block p-2 rounded-full hover:bg-gray-100 hover:text-black {{ request()->routeIs('pemesanan') ? 'bg-pink-500 text-white' : '' }}">📜
                        Kelola Pemesanan</a>
                </li>
                <li class="mb-2">
                    <a href="{{ route('notifikasi') }}"
                        class="block p-2 rounded-full hover:bg-gray-100 hover:text-black {{ request()->routeIs('notifikasi') ? 'bg-pink-500 text-white' : '' }}">🔔
                        Kelola Notifikasi</a>
                </li>
            </ul>

            <div class="absolute bottom-5 left-5">
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-full">🚪 Log Out</button>
                </form>
            </div>
        </div>

        <!-- Content -->
        <div class="w-4/5 p-10">
            <div class="flex justify-between items-center mb-5">
                <h1 class="text-3xl font-bold mb-8 text-start">@yield('title')</h1>
                <!-- Icon Notifikasi -->
                <div class="relative">
                    <button class="text-gray-600 hover:text-gray-800 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V4a2 2 0 10-4 0v1.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0a3.001 3.001 0 01-6 0m6 0H9" />
                        </svg>
                    </button>
                    <!-- Notifikasi Badge -->
                    <span class="absolute top-0 right-0 inline-block w-2 h-2 bg-red-600 rounded-full"></span>
                </div>
            </div>

            @yield('content')


        </div>

    </div>

    <div>
    </div>




    @stack('scripts')
</body>

</html>
