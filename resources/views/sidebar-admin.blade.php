<div x-data="{ open: true }" class="flex h-screen">

    <!-- Sidebar Navigation -->
    <div :class="open ? 'w-64' : 'w-20'" class="transition-all duration-300 bg-white dark:bg-gray-800 shadow-lg h-full flex flex-col">

        <!-- Sidebar Header -->
        <div class="flex items-center justify-between p-4">
            <h2 x-show="open" class="text-xl font-bold text-gray-800 dark:text-white">Menu</h2>
            <button @click="open = !open" class="p-1 text-gray-600 dark:text-gray-300 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </button>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 px-2 space-y-2 text-gray-700 dark:text-gray-200">

            <!-- Dashboard -->
            <a href="/dashboard" class="flex items-center gap-3 px-4 py-2 rounded hover:bg-gray-200 dark:hover:bg-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                     stroke-linejoin="round" class="lucide lucide-layout-dashboard">
                    <rect width="7" height="9" x="3" y="3" rx="1"/>
                    <rect width="7" height="5" x="14" y="3" rx="1"/>
                    <rect width="7" height="9" x="14" y="12" rx="1"/>
                    <rect width="7" height="5" x="3" y="16" rx="1"/>
                </svg>
                <span x-show="open" class="transition-all duration-200">Dashboard</span>
            </a> 
        </nav>
    </div>

    <!-- Main Content -->
    <div class="flex-1 overflow-y-auto p-6">
        @yield('content')
    </div>
</div>