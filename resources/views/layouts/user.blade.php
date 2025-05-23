<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'User Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="flex">
        <!-- Sidebar -->
        <div class="w-64 bg-blue-800 text-white min-h-screen">
            <div class="p-4">
                <h2 class="text-xl font-bold">
                    <i class="fas fa-user mr-2"></i>User Panel
                </h2>
                <p class="text-sm text-blue-200 mt-1">{{ auth()->user()->name }}</p>
            </div>
            <nav class="mt-8">
                <a href="{{ route('user.dashboard') }}" class="block px-4 py-3 hover:bg-blue-700 {{ request()->routeIs('user.dashboard') ? 'bg-blue-700' : '' }}">
                    <i class="fas fa-tachometer-alt mr-2"></i>Dashboard
                </a>
                <a href="{{ route('user.articles.index') }}" class="block px-4 py-3 hover:bg-blue-700 {{ request()->routeIs('user.articles.*') ? 'bg-blue-700' : '' }}">
                    <i class="fas fa-newspaper mr-2"></i>My Articles
                </a>
                <a href="{{ route('user.articles.create') }}" class="block px-4 py-3 hover:bg-blue-700 {{ request()->routeIs('user.articles.create') ? 'bg-blue-700' : '' }}">
                    <i class="fas fa-plus mr-2"></i>Create Article
                </a>
                <a href="{{ route('home') }}" class="block px-4 py-3 hover:bg-blue-700">
                    <i class="fas fa-home mr-2"></i>Visit Site
                </a>
                <form method="POST" action="{{ route('logout') }}" class="block">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-3 hover:bg-blue-700">
                        <i class="fas fa-sign-out-alt mr-2"></i>Logout
                    </button>
                </form>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1">
            <header class="bg-white shadow-sm border-b">
                <div class="px-6 py-4">
                    <h1 class="text-2xl font-semibold text-gray-800">@yield('header', 'User Dashboard')</h1>
                </div>
            </header>

            <main class="p-6">
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        {{ session('error') }}
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>