<aside class="sidebar">
    <button type="button" class="sidebar-close-btn !mt-4">
        <iconify-icon icon="radix-icons:cross-2"></iconify-icon>
    </button>
    <div>
        <a href="{{ route('dashboard') }}" class="sidebar-logo">
            <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />

        </a>
    </div>
    <div class="sidebar-menu-area">
        <ul class="sidebar-menu" id="sidebar-menu">
            <li>
                <a href="{{ route('dashboard') }}" class="@if ($activeMenu == 'dashboard') active-page @endif">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
                    <span>Dashboard</span>
                </a>
            </li>
            @if (auth()->user()->role == 'admin')
                <li @class([
                    'dropdown',
                    'show open' => $activeMenu == 'penduduk' || $activeMenu == 'rt',
                ])>
                    <a href="javascript:void(0)">
                        <iconify-icon icon="fa6-solid:users-line" class="menu-icon"></iconify-icon>
                        <span>Penduduk</span>
                    </a>
                    <ul class="sidebar-submenu">
                        <li>
                            <a href="{{ route('penduduk.index') }}"><i
                                    class="ri-circle-fill circle-icon text-secondary-600 w-auto"></i>
                                Data Penduduk</a>
                        </li>

                        <li>
                            <a href="{{ route('rt.index') }}"><i
                                    class="ri-circle-fill circle-icon text-danger-600 w-auto"></i>
                                Data RT</a>
                        </li>

                    </ul>
                </li>
            @endif

            <li @class([
                'dropdown',
                'show open' => $activeMenu == 'permintaan' || $activeMenu == 'selesai',
            ])>
                <a href="javascript:void(0)">
                    <iconify-icon icon="fa6-solid:envelope" class="menu-icon"></iconify-icon>
                    <span>Surat</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{ route('surat_permintaan.index') }}"><i
                                class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            Pengajuan Surat</a>
                    </li>
                    @if (auth()->user()->role == 'admin')
                        <li>
                            <a href="{{ route('surat_selesai.index') }}"><i
                                    class="ri-circle-fill circle-icon text-warning-600 w-auto"></i>
                                Surat Selesai</a>
                        </li>
                    @endif
                </ul>
            </li>
            @if (auth()->user()->role == 'admin')
                <li>
                    <a href="kanban.html">
                        <iconify-icon icon="flowbite:users-group-outline" class="menu-icon"></iconify-icon>
                        <span>Users</span>
                    </a>
                </li>
            @endif

        </ul>
    </div>
</aside>
