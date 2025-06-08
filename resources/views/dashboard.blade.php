@extends('sidebar')
@section('content')
    @include('topbar', ['title' => Auth::user()->role == 'admin' ? 'Dashboard Admin' : 'Dashboard User'])

    @if (Auth::user()->role == 'admin')
        <div class="flex min-h-screen bg-gray-100">  
            {{-- Main Content Admin --}}
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
                    <p>Selamat datang di <span class="text-blue-600">Website Aplikasi Pelayanan Surat Kelurahan Cikundul.</span></p>
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

            {{-- Tabel Data Surat Permintaan User Login --}}
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
                                    <form action="{{ route('surat_permintaan.destroy', $item->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus?');">
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
@endsection
