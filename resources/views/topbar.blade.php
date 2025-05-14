<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900">

    <div class="p-4 bg-white dark:bg-gray-800 shadow">
        <div x-data="{ open: false }" class="relative">
            <div class="flex justify-between">
                <h1 class="text-2xl font-bold">{{ $title ?? 'Dashboard' }}</h1>
                <button @click="open = !open" class="flex items-center focus:outline-none">
                    <img class="w-8 h-8 rounded-full object-cover" src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}" alt="Avatar">
                    <span class="ml-2 text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</span>
                    <svg class="ml-1 w-4 h-4 text-gray-600 dark:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
            </div>
            {{-- Dropdown --}}
            <div x-show="open" @click.away="open = false"
                class="absolute right-0 mt-2 w-48 bg-white dark:bg-gray-700 rounded-md shadow-lg py-1 z-20 transition-all"
                x-cloak>
                <div class="px-4 py-2 text-sm text-gray-700 dark:text-gray-300 border-b border-gray-200 dark:border-gray-600">
                    {{ Auth::user()->email }}
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>
