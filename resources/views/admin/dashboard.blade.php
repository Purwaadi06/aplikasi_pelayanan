@extends('layouts.app', ['title' => 'Dashboard', 'activeMenu' => 'dashboard', 'icon' => 'solar:home-smile-angle-outline'])

@section('content')




    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-3 3xl:grid-cols-4 gap-6">
        <div
            class="card shadow-none border border-gray-200 dark:border-neutral-600 dark:bg-neutral-700 rounded-lg h-full bg-gradient-to-r from-cyan-600/10 to-bg-white">
            <div class="card-body p-5">
                <div class="flex flex-wrap items-center justify-between gap-3">
                    <div>
                        <p class="font-medium text-neutral-900 dark:text-white mb-1">Total Penduduk</p>
                        <h6 class="mb-0 dark:text-white">{{ $totalPenduduk }}</h6>
                    </div>
                    <div class="w-[50px] h-[50px] bg-cyan-600 rounded-full flex justify-center items-center">
                        <iconify-icon icon="gridicons:multiple-users" class="text-white text-2xl mb-0"></iconify-icon>
                    </div>
                </div>

            </div>
        </div><!-- card end -->
        <div
            class="card shadow-none border border-gray-200 dark:border-neutral-600 dark:bg-neutral-700 rounded-lg h-full bg-gradient-to-r from-purple-600/10 to-bg-white">
            <div class="card-body p-5">
                <div class="flex flex-wrap items-center justify-between gap-3">
                    <div>
                        <p class="font-medium text-neutral-900 dark:text-white mb-1">Total Permintaan Surat</p>
                        <h6 class="mb-0 dark:text-white">{{ $totalPermintaanSurat }}</h6>
                    </div>
                    <div class="w-[50px] h-[50px] bg-purple-600 rounded-full flex justify-center items-center">
                        <iconify-icon icon="fa6-solid:envelopes-bulk" class="text-white text-2xl mb-0"></iconify-icon>
                    </div>
                </div>

            </div>
        </div><!-- card end -->
        <div
            class="card shadow-none border border-gray-200 dark:border-neutral-600 dark:bg-neutral-700 rounded-lg h-full bg-gradient-to-r from-blue-600/10 to-bg-white">
            <div class="card-body p-5">
                <div class="flex flex-wrap items-center justify-between gap-3">
                    <div>
                        <p class="font-medium text-neutral-900 dark:text-white mb-1">Total Surat Selesai</p>
                        <h6 class="mb-0 dark:text-white">{{ $totalSuratSelesai }}</h6>
                    </div>
                    <div class="w-[50px] h-[50px] bg-blue-600 rounded-full flex justify-center items-center">
                        <iconify-icon icon="fa6-solid:envelope-circle-check"
                            class="text-white text-2xl mb-0"></iconify-icon>
                    </div>
                </div>

            </div>
        </div><!-- card end -->

    </div>

    <div class="grid grid-cols-1 xl:grid-cols-12 gap-6 mt-6">

        <div class="xl:col-span-12 2xl:col-span-12">
            <div class="card h-full border-0">
                <div class="card-body p-6">



                    <div class="p-6 rounded shadow text-center">
                        @if (auth()->user()->role == 'admin')
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
                            <h2 class="text-xl font-semibold mb-4 mt-10 text-gray-700">Daftar Surat Anda</h2>
                            <table class="table-auto w-full border border-gray-300 text-sm" id="table-surat">
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

                                    @foreach ($userSurat as $index => $item)
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
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>

                </div>
            </div>
        </div>

    </div>


@endsection

@section('js')
    <script>
        let table = null
        table = $('#table-surat').DataTable()
    </script>
@endsection
