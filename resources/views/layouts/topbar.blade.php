{{-- <!DOCTYPE html>
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
</html> --}}
<main class="dashboard-main">
    <div class="navbar-header border-b border-neutral-200 dark:border-neutral-600">
        <div class="flex items-center justify-between">
            <div class="col-auto">
                <div class="flex flex-wrap items-center gap-[16px]">
                    <button type="button" class="sidebar-toggle">
                        <iconify-icon icon="heroicons:bars-3-solid" class="icon non-active"></iconify-icon>
                        <iconify-icon icon="iconoir:arrow-right" class="icon active"></iconify-icon>
                    </button>
                    <button type="button" class="sidebar-mobile-toggle d-flex !leading-[0]">
                        <iconify-icon icon="heroicons:bars-3-solid" class="icon !text-[30px]"></iconify-icon>
                    </button>

                </div>
            </div>
            <div class="col-auto">
                <div class="flex flex-wrap items-center gap-3">
                    <button type="button" id="theme-toggle"
                        class="flex h-10 w-10 items-center justify-center rounded-full bg-neutral-200 dark:bg-neutral-700 dark:text-white">
                        <span id="theme-toggle-dark-icon" class="hidden">
                            <i class="ri-sun-line"></i>
                        </span>
                        <span id="theme-toggle-light-icon" class="hidden">
                            <i class="ri-moon-line"></i>
                        </span>
                    </button>

                    <!-- Language Dropdown Start  -->

                    <!-- Language Dropdown End  -->

                    <!-- Message Dropdown Start  -->


                    <!-- Notification Start  -->
                    <button data-dropdown-toggle="dropdownNotification"
                        class="has-indicator flex h-10 w-10 items-center justify-center rounded-full bg-neutral-200 dark:bg-neutral-700"
                        type="button">
                        <iconify-icon icon="iconoir:bell"
                            class="text-xl text-neutral-900 dark:text-white"></iconify-icon>
                    </button>
                    <div id="dropdownNotification"
                        class="z-10 hidden w-full max-w-[394px] overflow-hidden rounded-2xl bg-white shadow-lg dark:bg-neutral-700">
                        <div
                            class="m-4 flex items-center justify-between gap-2 rounded-lg bg-primary-50 px-4 py-3 dark:bg-primary-600/25">
                            <h6 class="mb-0 text-lg font-semibold text-neutral-900">
                                Notification
                            </h6>
                            <span
                                class="flex h-10 w-10 items-center justify-center rounded-full bg-white font-bold text-primary-600 dark:bg-neutral-600 dark:text-white">05</span>
                        </div>
                        <div class="scroll-sm !border-t-0">
                            <div class="max-h-[400px] overflow-y-auto">
                                <a href="javascript:void(0)"
                                    class="flex justify-between gap-1 px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="relative flex h-11 w-11 flex-shrink-0 items-center justify-center rounded-full bg-success-200 text-success-600 dark:bg-success-600/25">
                                            <iconify-icon icon="bitcoin-icons:verify-outline"
                                                class="text-2xl"></iconify-icon>
                                        </div>
                                        <div>
                                            <h6 class="fw-semibold mb-1 text-sm">Congratulations</h6>
                                            <p class="mb-0 line-clamp-1 text-sm">
                                                Your profile has been Verified. Your profile has been
                                                Verified
                                            </p>
                                        </div>
                                    </div>
                                    <div class="shrink-0">
                                        <span class="text-sm text-neutral-500">23 Mins ago</span>
                                    </div>
                                </a>
                                <a href="javascript:void(0)"
                                    class="flex justify-between gap-1 px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <div class="flex items-center gap-3">
                                        <div class="relative flex-shrink-0">
                                            <img class="h-11 w-11 rounded-full"
                                                src="{{ asset('template') }}/assets/images/notification/profile-4.png"
                                                alt="Joseph image" />
                                        </div>
                                        <div>
                                            <h6 class="fw-semibold mb-1 text-sm">Ronald Richards</h6>
                                            <p class="mb-0 line-clamp-1 text-sm">
                                                You can stitch between artboards
                                            </p>
                                        </div>
                                    </div>
                                    <div class="shrink-0">
                                        <span class="text-sm text-neutral-500">23 Mins ago</span>
                                    </div>
                                </a>
                                <a href="javascript:void(0)"
                                    class="flex justify-between gap-1 px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="relative flex h-11 w-11 flex-shrink-0 items-center justify-center rounded-full bg-primary-100 text-primary-600 dark:bg-primary-600/25">
                                            AM
                                        </div>
                                        <div>
                                            <h6 class="fw-semibold mb-1 text-sm">Arlene McCoy</h6>
                                            <p class="mb-0 line-clamp-1 text-sm">
                                                Invite you to prototyping
                                            </p>
                                        </div>
                                    </div>
                                    <div class="shrink-0">
                                        <span class="text-sm text-neutral-500">23 Mins ago</span>
                                    </div>
                                </a>
                                <a href="javascript:void(0)"
                                    class="flex justify-between gap-1 px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <div class="flex items-center gap-3">
                                        <div class="relative flex-shrink-0">
                                            <img class="h-11 w-11 rounded-full"
                                                src="{{ asset('template') }}/assets/images/notification/profile-6.png"
                                                alt="Joseph image" />
                                        </div>
                                        <div>
                                            <h6 class="fw-semibold mb-1 text-sm">Annette Black</h6>
                                            <p class="mb-0 line-clamp-1 text-sm">
                                                Invite you to prototyping
                                            </p>
                                        </div>
                                    </div>
                                    <div class="shrink-0">
                                        <span class="text-sm text-neutral-500">23 Mins ago</span>
                                    </div>
                                </a>
                                <a href="javascript:void(0)"
                                    class="flex justify-between gap-1 px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="relative flex h-11 w-11 flex-shrink-0 items-center justify-center rounded-full bg-primary-100 text-primary-600 dark:bg-primary-600/25">
                                            DR
                                        </div>
                                        <div>
                                            <h6 class="fw-semibold mb-1 text-sm">Darlene Robertson</h6>
                                            <p class="mb-0 line-clamp-1 text-sm">
                                                Invite you to prototyping
                                            </p>
                                        </div>
                                    </div>
                                    <div class="shrink-0">
                                        <span class="text-sm text-neutral-500">23 Mins ago</span>
                                    </div>
                                </a>
                            </div>

                            <div class="px-4 py-3 text-center">
                                <a href="javascript:void(0)"
                                    class="text-center font-semibold text-primary-600 hover:underline dark:text-primary-600">See
                                    All Notification
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Notification End  -->

                    <button data-dropdown-toggle="dropdownProfile" class="flex items-center justify-center rounded-full"
                        type="button">
                        <img src="{{ asset('template') }}/assets/images/user.png" alt="image"
                            class="object-fit-cover h-10 w-10 rounded-full" />
                    </button>
                    <div id="dropdownProfile"
                        class="dropdown-menu-sm z-10 hidden rounded-lg bg-white p-3 shadow-lg dark:bg-neutral-700">
                        <div
                            class="mb-4 flex items-center justify-between gap-2 rounded-lg bg-primary-50 px-4 py-3 dark:bg-primary-600/25">
                            <div>
                                <h6 class="mb-0 text-lg font-semibold text-neutral-900">
                                    Robiul Hasan
                                </h6>
                                <span class="text-neutral-500">Admin</span>
                            </div>
                            <button type="button" class="hover:text-danger-600">
                                <iconify-icon icon="radix-icons:cross-1" class="icon text-xl"></iconify-icon>
                            </button>
                        </div>

                        <div class="scroll-sm max-h-[400px] overflow-y-auto pe-2">
                            <ul class="flex flex-col">
                                <li>
                                    <a class="flex items-center gap-4 px-0 py-2 text-black hover:text-primary-600"
                                        href="view-profile.html">
                                        <iconify-icon icon="solar:user-linear" class="icon text-xl"></iconify-icon>
                                        My Profile</a>
                                </li>

                                <li>
                                    <a href="javascript:void(0)"
                                        class="flex items-center gap-4 px-0 py-2 text-black hover:text-danger-600"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <iconify-icon icon="lucide:power" class="icon text-xl"></iconify-icon>
                                        Log Out
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="hidden">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
