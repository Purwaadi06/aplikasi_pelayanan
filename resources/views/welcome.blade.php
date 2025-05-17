<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Kelurahan Cikundul</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Tailwind CSS -->
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body class="bg-[url('{{ asset("assets/hero_cikundul.png") }}')] bg-cover bg-center bg-no-repeat min-h-screen">

        <!-- Navbar -->
        <nav
            class="bg-transparent backdrop-blur-sm px-4 py-2 flex items-center justify-between fixed top-0 left-0 right-0 z-50">
            <div class="flex items-center">
                <img src="{{ asset("assets/logo_cikundul.png") }}" alt="Logo Kelurahan" class="w-14 h-auto">
            </div>

            @if (Route::has("login"))
                <div class="flex items-center space-x-4">
                    @auth
                        <a href="{{ url("/dashboard") }}"
                            class="text-sm font-semibold text-white hover:text-gray-200 focus:outline focus:outline-2 focus:outline-red-500 rounded">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route("login") }}"
                            class="text-sm font-semibold text-white hover:text-gray-200 focus:outline focus:outline-2 focus:outline-red-500 rounded">
                            Log in
                        </a>

                        @if (Route::has("register"))
                            <a href="{{ route("register") }}"
                                class="text-sm font-semibold text-white hover:text-gray-200 focus:outline focus:outline-2 focus:outline-red-500 rounded">
                                Register
                            </a>
                        @endif
                    @endauth
                </div>
            @endif
        </nav>

        <!-- Hero Section with Image -->
        <section class="w-full min-h-screen flex items-center justify-center">
            <div class="flex flex-col md:flex-row items-center justify-center gap-12 text-center">
                <!-- Text Content -->
                <div class="flex-1">
                    <h1 class="text-4xl md:text-5xl font-bold text-white mb-6 leading-tight">
                        Selamat Datang di Kelurahan Cikundul
                    </h1>
                    <p class="text-lg md:text-xl text-white mb-8">
                        Akses layanan surat menyurat dan informasi administrasi dengan cepat, mudah, dan efisien.
                    </p>
                    @auth
                        <a href="{{ url("/dashboard") }}"
                            class="inline-block bg-blue-700 text-white font-semibold px-6 py-3 rounded-full hover:bg-blue-800 transition">
                            Masuk ke Dashboard
                        </a>
                    @else
                        <a href="{{ route("login") }}"
                            class="inline-block bg-blue-700 text-white font-semibold px-6 py-3 rounded-full hover:bg-blue-800 transition">
                            Ajukan Surat Sekarang
                        </a>
                    @endauth
                </div>
            </div>
        </section>

    </body>

</html>
