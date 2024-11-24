<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Tugas Pemweb T^T</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-pink-100 font-sans">
    <div class="min-h-screen flex flex-col">
        <header class="bg-pink-400 text-white py-4 shadow-md">
            <div class="container mx-auto flex justify-between items-center px-4">
                <a href="{{ route('posts.index') }}" class="text-2xl font-bold hover:underline">Blog Tugas Pemweb</a>
                <nav>
                    @guest
                        <a href="{{ route('login') }}" class="mr-4 hover:underline">Login</a>
                        <a href="{{ route('register') }}" class="hover:underline">Register</a>
                    @else
                        <span class="mr-4">Hello, {{ Auth::user()->name }}</span>
                        <a href="{{ route('logout') }}" class="hover:underline"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            @csrf
                        </form>
                    @endguest
                </nav>
            </div>
        </header>

        <main class="flex-grow">
            @yield('content')
        </main>

        <footer class="bg-pink-400 text-white text-center py-4">
            &copy; {{ date('Y') }} Blog App. All rights reserved.
        </footer>
    </div>
</body>
</html>
