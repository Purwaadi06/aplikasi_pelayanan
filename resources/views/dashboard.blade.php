{{-- @extends('sidebar')
@section('content')
    @include('topbar', ['title' => Auth::user()->role == 'admin' ? 'Dashboard Admin' : 'Dashboard User'])

    @if (Auth::user()->role == 'admin')
        <div class="flex min-h-screen bg-gray-100">

            <main class="flex-1 p-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                    <div class="bg-cyan-500 text-white p-4 rounded shadow">
                        <div class="text-3xl font-bold">24</div>
                        <div class="text-sm">Data Penduduk</div>
                        <a href="#" class="text-white underline text-xs">Lihat detail</a>
                    </div>
                    <div class="bg-green-500 text-white p-4 rounded shadow">
                        <div class="text-3xl font-bold">32</div>
                        <div class="text-sm">Permintaan Surat</div>
                        <a href="#" class="text-white underline text-xs">Lihat detail</a>
                    </div>
                    <div class="bg-orange-500 text-white p-4 rounded shadow">
                        <div class="text-3xl font-bold">24</div>
                        <div class="text-sm">Surat Selesai</div>
                        <a href="#" class="text-white underline text-xs">Lihat detail</a>
                    </div>
                </div>

                <div class="bg-white p-6 rounded shadow text-center">
                    <img src="/assets/logo_cikundul.png" alt="Logo Kelurahan" class="w-32 mb-4 mx-auto">
                    <h2 class="text-xl font-bold mb-2">Halo, Administrator</h2>
                    <p>Selamat datang di <span class="text-blue-600">Website Aplikasi Pelayanan Surat Kelurahan
                            Cikundul.</span></p>
                    <p class="mt-2 text-sm text-gray-600">{{ now()->translatedFormat('l, d F Y') }}</p>
                </div>
            </main>
        </div>
    @elseif (Auth::user()->role == 'user')
        <div class="bg-gray-100 items-center justify-center mt-6 w-full">
            <div class="bg-white p-6 rounded-lg w-full max-w-none text-center mb-6">
                <h1 class="text-3xl font-semibold text-gray-800 mb-4">Ajukan Surat</h1>
                <p class="text-gray-600 mb-6">
                    Silakan ajukan permintaan surat yang Anda butuhkan melalui tombol di bawah ini.
                </p>

                <a href="{{ route('surat_permintaan.create') }}"
                    class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-medium px-6 py-2 rounded transition duration-300">
                    Ajukan Surat
                </a>
            </div>


            <div class="bg-white p-6 rounded-lg shadow overflow-x-auto">
                <h2 class="text-xl font-semibold mb-4 text-left text-gray-700">Daftar Surat Anda</h2>
                <table class="table-auto w-full border border-gray-300 text-sm">
                    <thead class="bg-gray-200 text-left">
                        <tr>
                            <th class="border px-4 py-2">No</th>
                            <th class="border px-4 py-2">Jenis Surat</th>
                            <th class="border px-4 py-2">Keperluan</th>
                            <th class="border px-4 py-2">Status</th>
                            <th class="border px-4 py-2">Tanggal Ajukan</th>
                            <th class="border px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            // Filter data surat hanya milik user yang login
                            $userSurat = $data->where('nik', Auth::user()->nik);
                        @endphp

                        @forelse ($userSurat as $index => $item)
                            <tr>
                                <td class="border px-4 py-2">{{ $index + 1 }}</td>
                                <td class="border px-4 py-2">{{ $item->jenis_surat }}</td>
                                <td class="border px-4 py-2">{{ $item->keperluan }}</td>
                                <td class="border px-4 py-2 capitalize">{{ $item->status }}</td>
                                <td class="border px-4 py-2">{{ $item->created_at->format('d M Y') }}</td>
                                <td class="border px-4 py-2">
                                    <a href="{{ route('surat_permintaan.edit', $item->id) }}"
                                        class="bg-yellow-500 hover:bg-yellow-600 text-black font-semibold px-3 py-1 rounded">
                                        Edit
                                    </a>
                                    <form action="{{ route('surat_permintaan.destroy', $item->id) }}" method="POST"
                                        class="inline-block" onsubmit="return confirm('Yakin ingin menghapus?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-600 hover:bg-red-700 text-white font-semibold px-3 py-1 rounded ml-1">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="border px-4 py-4 text-center text-gray-500">
                                    Anda belum memiliki permintaan surat.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection --}}
<!-- meta tags and other links -->

@include('layouts.app')

<!-- Mirrored from wowdash.wowtheme7.com/tailwind/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 13 Jun 2025 08:26:21 GMT -->


@include('sidebar-admin')

@include('topbar')


<div class="dashboard-main-body">
    <div class="flex flex-wrap items-center justify-between gap-2 mb-6">
        <h6 class="font-semibold mb-0 dark:text-white">Dashboard</h6>
        <ul class="flex items-center gap-[6px]">
            <li class="font-medium">
                <a href="index.html"
                    class="flex items-center gap-2 text-neutral-600 hover:text-primary-600 dark:text-white dark:hover:text-primary-600">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Dashboard
                </a>
            </li>
            <li class="text-neutral-600 dark:text-white">-</li>
            <li class="text-neutral-600 font-medium dark:text-white">AI</li>
        </ul>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-3 3xl:grid-cols-4 gap-6">
        <div
            class="card shadow-none border border-gray-200 dark:border-neutral-600 dark:bg-neutral-700 rounded-lg h-full bg-gradient-to-r from-cyan-600/10 to-bg-white">
            <div class="card-body p-5">
                <div class="flex flex-wrap items-center justify-between gap-3">
                    <div>
                        <p class="font-medium text-neutral-900 dark:text-white mb-1">Total Users</p>
                        <h6 class="mb-0 dark:text-white">20,000</h6>
                    </div>
                    <div class="w-[50px] h-[50px] bg-cyan-600 rounded-full flex justify-center items-center">
                        <iconify-icon icon="gridicons:multiple-users" class="text-white text-2xl mb-0"></iconify-icon>
                    </div>
                </div>
                <p class="font-medium text-sm text-neutral-600 dark:text-white mt-3 mb-0 flex items-center gap-2">
                    <span class="inline-flex items-center gap-1 text-success-600 dark:text-success-400"><iconify-icon
                            icon="bxs:up-arrow" class="text-xs"></iconify-icon> +4000</span>
                    Last 30 days users
                </p>
            </div>
        </div><!-- card end -->
        <div
            class="card shadow-none border border-gray-200 dark:border-neutral-600 dark:bg-neutral-700 rounded-lg h-full bg-gradient-to-r from-purple-600/10 to-bg-white">
            <div class="card-body p-5">
                <div class="flex flex-wrap items-center justify-between gap-3">
                    <div>
                        <p class="font-medium text-neutral-900 dark:text-white mb-1">Total Subscription</p>
                        <h6 class="mb-0 dark:text-white">15,000</h6>
                    </div>
                    <div class="w-[50px] h-[50px] bg-purple-600 rounded-full flex justify-center items-center">
                        <iconify-icon icon="fa-solid:award" class="text-white text-2xl mb-0"></iconify-icon>
                    </div>
                </div>
                <p class="font-medium text-sm text-neutral-600 dark:text-white mt-3 mb-0 flex items-center gap-2">
                    <span class="inline-flex items-center gap-1 text-danger-600 dark:text-danger-400"><iconify-icon
                            icon="bxs:down-arrow" class="text-xs"></iconify-icon> -800</span>
                    Last 30 days subscription
                </p>
            </div>
        </div><!-- card end -->
        <div
            class="card shadow-none border border-gray-200 dark:border-neutral-600 dark:bg-neutral-700 rounded-lg h-full bg-gradient-to-r from-blue-600/10 to-bg-white">
            <div class="card-body p-5">
                <div class="flex flex-wrap items-center justify-between gap-3">
                    <div>
                        <p class="font-medium text-neutral-900 dark:text-white mb-1">Total Free Users</p>
                        <h6 class="mb-0 dark:text-white">5,000</h6>
                    </div>
                    <div class="w-[50px] h-[50px] bg-blue-600 rounded-full flex justify-center items-center">
                        <iconify-icon icon="fluent:people-20-filled" class="text-white text-2xl mb-0"></iconify-icon>
                    </div>
                </div>
                <p class="font-medium text-sm text-neutral-600 dark:text-white mt-3 mb-0 flex items-center gap-2">
                    <span class="inline-flex items-center gap-1 text-success-600 dark:text-success-400"><iconify-icon
                            icon="bxs:up-arrow" class="text-xs"></iconify-icon> +200</span>
                    Last 30 days users
                </p>
            </div>
        </div><!-- card end -->

    </div>

    <div class="grid grid-cols-1 xl:grid-cols-12 gap-6 mt-6">

        <div class="xl:col-span-12 2xl:col-span-12">
            <div class="card h-full border-0">
                <div class="card-body p-6">



                    <div class="p-6 rounded shadow text-center">
                        @if (auth()->user()->role == 'dmin')
                            <img src="/assets/logo_cikundul.png" alt="Logo Kelurahan" class="mb-4 mx-auto"
                                style="width: 9.5rem">
                            <h2 class="text-xl font-bold mb-2">Halo, Administrator</h2>
                            <p>Selamat datang di <span class="text-blue-600">Website Aplikasi Pelayanan Surat Kelurahan
                                    Cikundul.</span></p>
                            <p class="mt-2 text-sm text-gray-600">{{ now()->translatedFormat('l, d F Y') }}</p>
                        @else
                            <h1 class="text-3xl font-semibold text-gray-800 mb-4">Ajukan Surat</h1>
                            <p class="text-gray-600 mb-6">
                                Silakan ajukan permintaan surat yang Anda butuhkan melalui tombol di bawah ini.
                            </p>

                            <a href="{{ route('surat_permintaan.create') }}"
                                class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-medium px-6 py-2 rounded transition duration-300">
                                Ajukan Surat
                            </a>
                            <h2 class="text-xl font-semibold mb-4 text-left text-gray-700">Daftar Surat Anda</h2>
                            <table class="table-auto w-full border border-gray-300 text-sm">
                                <thead class="bg-gray-200 text-left">
                                    <tr>
                                        <th class="border px-4 py-2">No</th>
                                        <th class="border px-4 py-2">Jenis Surat</th>
                                        <th class="border px-4 py-2">Keperluan</th>
                                        <th class="border px-4 py-2">Status</th>
                                        <th class="border px-4 py-2">Tanggal Ajukan</th>
                                        <th class="border px-4 py-2">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        // Filter data surat hanya milik user yang login
                                        $userSurat = $data;
                                    @endphp

                                    @forelse ($userSurat as $index => $item)
                                        <tr>
                                            <td class="border px-4 py-2">{{ $index + 1 }}</td>
                                            <td class="border px-4 py-2">{{ $item->jenis_surat }}</td>
                                            <td class="border px-4 py-2">{{ $item->keperluan }}</td>
                                            <td class="border px-4 py-2 capitalize">{{ $item->status }}</td>
                                            <td class="border px-4 py-2">{{ $item->created_at->format('d M Y') }}</td>
                                            <td class="border px-4 py-2">
                                                <a href="{{ route('surat_permintaan.edit', $item->id) }}"
                                                    class="bg-yellow-500 hover:bg-yellow-600 text-black font-semibold px-3 py-1 rounded">
                                                    Edit
                                                </a>
                                                <form action="{{ route('surat_permintaan.destroy', $item->id) }}"
                                                    method="POST" class="inline-block"
                                                    onsubmit="return confirm('Yakin ingin menghapus?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="bg-red-600 hover:bg-red-700 text-white font-semibold px-3 py-1 rounded ml-1">
                                                        Hapus
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="border px-4 py-4 text-center text-gray-500">
                                                Anda belum memiliki permintaan surat.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        @endif
                    </div>

                </div>
            </div>
        </div>

    </div>

</div>
<footer class="d-footer">
    <div class="flex items-center justify-between gap-3 flex-wrap">
        <p class="mb-0 text-neutral-600">&copy; 2024 WowDash. All Rights Reserved.</p>
        <p class="mb-0">Made by <a href="https://themeforest.net/user/wowtheme7/portfolio"
                class="text-primary-600 dark:text-primary-600 hover:underline">wowtheme7</a></p>
    </div>
</footer>
</main>

<!-- jQuery library js -->
<script src="{{ asset('template') }}/assets/js/lib/jquery-3.7.1.min.js"></script>
<!-- Apex Chart js -->
<script src="{{ asset('template') }}/assets/js/lib/apexcharts.min.js"></script>
<!-- Data Table js -->
<script src="{{ asset('template') }}/assets/js/lib/simple-datatables.min.js"></script>
<!-- Iconify Font js -->
<script src="{{ asset('template') }}/assets/js/lib/iconify-icon.min.js"></script>
<!-- jQuery UI js -->
<script src="{{ asset('template') }}/assets/js/lib/jquery-ui.min.js"></script>
<!-- Vector Map js -->
<script src="{{ asset('template') }}/assets/js/lib/jquery-jvectormap-2.0.5.min.js"></script>
<script src="{{ asset('template') }}/assets/js/lib/jquery-jvectormap-world-mill-en.js"></script>
<!-- Popup js -->
<script src="{{ asset('template') }}/assets/js/lib/magnifc-popup.min.js"></script>
<!-- Slick Slider js -->
<script src="{{ asset('template') }}/assets/js/lib/slick.min.js"></script>
<!-- prism js -->
<script src="{{ asset('template') }}/assets/js/lib/prism.js"></script>
<!-- file upload js -->
<script src="{{ asset('template') }}/assets/js/lib/file-upload.js"></script>
<!-- audio player -->
<script src="{{ asset('template') }}/assets/js/lib/audioplayer.js"></script>

<script src="{{ asset('template') }}/assets/js/flowbite.min.js"></script>
<!-- main js -->
<script src="{{ asset('template') }}/assets/js/app.js"></script>

<script src="{{ asset('template') }}/assets/js/homeOneChart.js"></script>

</body>

</html>
