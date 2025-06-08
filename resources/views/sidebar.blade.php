<div x-data="{ open: true, dropdownOpen: false }" class="flex h-screen">

    <!-- Sidebar Navigation -->
    <div :class="open ? 'w-64' : 'w-20'" class="transition-all duration-300 bg-white dark:bg-gray-800 shadow-lg h-full flex flex-col">

        <!-- Sidebar Header -->
        <div class="flex items-center justify-between p-4 relative">
            <h2 x-show="open" class="text-xl font-bold text-gray-800 dark:text-white">Menu</h2>
            
            <div class="flex items-center gap-2">
                <!-- Dropdown toggle button -->
                {{-- <button @click="dropdownOpen = !dropdownOpen" class="relative p-1 text-gray-600 dark:text-gray-300 focus:outline-none" x-show="open" aria-label="User menu">
                    <svg class="w-6 h-6 rounded-full border border-gray-400" fill="currentColor" viewBox="0 0 24 24">
                        <circle cx="12" cy="7" r="4" />
                        <path d="M6 21v-2a6 6 0 0 1 12 0v2" />
                    </svg>
                </button> --}}

                <!-- Sidebar toggle button -->
                <button @click="open = !open" class="p-1 text-gray-600 dark:text-gray-300 focus:outline-none" aria-label="Toggle sidebar">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <template x-if="open">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </template>
                        <template x-if="!open">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </template>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 px-2 space-y-2 text-gray-700 dark:text-gray-200">

            @if(Auth::check() && Auth::user()->role === 'admin')
                <!-- Navigation -->

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

                        <!-- Master Dropdown -->
                        <div x-data="{ isOpen: false }">
                            <button @click="isOpen = !isOpen" class="w-full flex items-center gap-3 px-4 py-2 rounded hover:bg-gray-200 dark:hover:bg-gray-700 focus:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-square-pen">
                                    <path d="M12 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
                                    <path d="M18.375 2.625a1 1 0 0 1 3 3l-9.013 9.014a2 2 0 0 1-.853.505l-2.873.84a.5.5 0 0 1-.62-.62l.84-2.873a2 2 0 0 1 .506-.852z"/>
                                </svg>
                                <span x-show="open" class="transition-all duration-200">Master</span>
                                <svg x-show="open" :class="isOpen ? 'rotate-90' : ''"
                                    class="w-4 h-4 ml-auto transform transition-transform duration-200"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </button>

                            <!-- Submenu -->
                            <div x-show="isOpen && open" x-cloak class="ml-8 mt-1 space-y-1 transition-all duration-200">
                                <a href="/penduduk" class="flex items-center px-4 py-2 rounded hover:bg-gray-200 dark:hover:bg-gray-700 text-sm">  
                                    <span class="ml-1">Master Penduduk</span>
                                </a>
                                <a href="/admin" class="flex items-center px-4 py-2 rounded hover:bg-gray-200 dark:hover:bg-gray-700 text-sm">
                                    <span class="ml-1">Master Administrator</span>
                                </a>
                            </div>
                        </div>

                        <!-- Master Surat Dropdown -->
            <div x-data="{ isSuratOpen: false }">
                <button @click="isSuratOpen = !isSuratOpen" class="w-full flex items-center gap-3 px-4 py-2 rounded hover:bg-gray-200 dark:hover:bg-gray-700 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-file-text">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                        <polyline points="14 2 14 8 20 8"/>
                        <line x1="16" y1="13" x2="8" y2="13"/>
                        <line x1="16" y1="17" x2="8" y2="17"/>
                        <line x1="10" y1="9" x2="8" y2="9"/>
                    </svg>
                    <span x-show="open" class="transition-all duration-200"> Surat</span>
                    <svg x-show="open" :class="isSuratOpen ? 'rotate-90' : ''"
                        class="w-4 h-4 ml-auto transform transition-transform duration-200"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>

                <!-- Submenu -->
                <div x-show="isSuratOpen && open" x-cloak class="ml-8 mt-1 space-y-1 transition-all duration-200">
                    <a href="/surat_permintaan" class="flex items-center px-4 py-2 rounded hover:bg-gray-200 dark:hover:bg-gray-700 text-sm">
                        <span class="ml-1">Surat Permintaan</span>
                    </a>
                    <a href="/surat_keterangan" class="flex items-center px-4 py-2 rounded hover:bg-gray-200 dark:hover:bg-gray-700 text-sm">
                        <span class="ml-1">Surat Selesai</span>
                    </a>
                </div>
            </div>

                        
                    </nav>
                </div>

                <!-- Main Content -->
                <div class="flex-1 overflow-y-auto p-6">
                    @yield('content')
                </div>
            </div>



            @endif
        </nav>
    </div>

    <!-- Main Content -->
    <div class="flex-1 overflow-y-auto p-6">
        @yield('content')
    </div>
</div>
