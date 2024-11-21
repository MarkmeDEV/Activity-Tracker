<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex">
    @auth
        <aside class="hidden w-[20rem] h-screen bg-slate-900 fixed left-0 top-0 p-5 lg:flex flex-col justify-between">
        <div class="flex flex-col gap-5">
            <a href="{{ route('dashboard') }}" class="text-white font-bold text-2xl">Power Usage</a>
            <div class="flex flex-col gap-3 mt-10">
                <a href="dashboard" class="flex items-center gap-3 text-white text-lg font-primary hover:bg-slate-700/30 p-5 rounded-md">
                    <i class="ri-dashboard-fill"></i>
                    <span class="font-bold">Dashboard</span>
                </a>
                <a href="{{ route('movein.index') }}" class="flex items-center gap-3 text-white text-lg font-primary hover:bg-slate-700/30 p-5 rounded-md">
                    <i class="ri-import-fill"></i>
                    <span class="font-bold">Move In</span>
                </a>
                <a href="#" class="flex items-center gap-3 text-white text-lg font-primary hover:bg-slate-700/30 p-5 rounded-md">
                    <i class="ri-user-settings-fill"></i>
                    <span class="font-bold">Account Settings</span>
                </a>
            </div>
        </div>
            <a href="{{ route('logout') }}" class="flex items-center gap-3 text-white text-lg font-primary hover:bg-slate-700/30 p-5 rounded-md">
                <i class="ri-logout-box-fill"></i>
                <span class="font-bold">Logout</span>
            </a>
        </aside>
    @endauth
    @auth
        <div class="flex-1 lg:ml-[20rem]">
    @endauth
    @guest
        <div class="flex-1">
    @endguest    
        <header class="w-full bg-slate-900 p-4 flex items-center justify-between">
            @guest
                <a href="{{ route('home') }}" class="text-white font-bold text-2xl">Power Usage</a>
            @endguest
            @auth
                <div class="p-2 text-xl cursor-pointer">
                    <i class="ri-menu-line text-white"></i>
                </div>
            @endauth
            <div class="flex items-center gap-1">
                @guest
                    <a href="{{ route('login') }}" class="text-white font-medium hover:bg-gray-200/10 px-4 py-1 rounded-md transition-all">Login</a>
                    <a href="{{ route('register') }}" class="text-white font-medium hover:bg-gray-200/10 px-4 py-1 rounded-md transition-all">Register</a>
                @endguest
                @auth
                    @php
                        $username = explode('@', auth()->user()->email)[0];
                        $initials = strtoupper(collect(explode('.', $username))->map(fn($part) => $part[0])->implode(''));
                    @endphp
                    <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center text-slate-900 border-2 border-slate-500 cursor-pointer hover:bg-slate-200 transition-all">
                        {{ $initials }}
                    </div>
                @endauth
            </div>
        </header>
        <main class="p-5 bg-gray-200">
            {{ $slot }}
        </main>
    </div>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
</body>
</html>
