@extends('sidebar')
@section('content')
@include('topbar', ['title' => 'Tambah Surat Keterangan'])

<div class="py-6">
    <div class="mx-auto">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">

                <h2 class="text-xl font-bold mb-4">Tambah Surat Keterangan</h2>

                <form action="{{ route('surat_keterangan.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="no_surat" class="block text-sm font-medium text-gray-700">Nomor Surat</label>
                        <input type="text" id="no_surat" name="no_surat" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>

                    <div class="mb-4">
                        <label for="jenis_surat" class="block text-sm font-medium text-gray-700">Jenis Surat</label>
                        <select id="jenis_surat" name="jenis_surat" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            <option value="domisili">Domisili</option>
                            <option value="tidak_mampu">Tidak Mampu</option>
                            <option value="kematian">Kematian</option>
                            <option value="belum_menikah">Belum Menikah</option>
                            <option value="pindah">Pindah Domisili</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="nik" class="block text-sm font-medium text-gray-700">NIK</label>
                        <input type="text" id="nik" name="nik" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>

                    <div class="mb-4">
                        <label for="keperluan" class="block text-sm font-medium text-gray-700">Keperluan</label>
                        <textarea id="keperluan" name="keperluan" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" rows="3" required></textarea>
                    </div>

                    <div class="mb-4">
                        <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal Surat</label>
                        <input type="date" id="tanggal" name="tanggal" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>

                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Simpan Surat
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
