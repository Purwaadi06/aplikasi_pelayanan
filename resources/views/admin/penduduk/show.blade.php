<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Detail Penduduk
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-800 dark:text-gray-200">Informasi Penduduk</h3>
                <div class="mt-4">
                    <p><strong>NIK:</strong> {{ $penduduk->FNIK }}</p>
                    <p><strong>Nama:</strong> {{ $penduduk->FNAMA }}</p>
                    <p><strong>No. KK:</strong> {{ $penduduk->FNO_KK }}</p>
                    <p><strong>Tempat Lahir:</strong> {{ $penduduk->FTMP_LAHIR }}</p>
                    <p><strong>Tanggal Lahir:</strong> {{ $penduduk->FTGL_LAHIR }}</p>
                    <p><strong>Jenis Kelamin:</strong> {{ $penduduk->FKEL }}</p>
                    <p><strong>Alamat:</strong> {{ $penduduk->FALAMAT }}</p>
                    <p><strong>Pendidikan:</strong> {{ $penduduk->FPENDIDIKAN }}</p>
                    <p><strong>Pekerjaan:</strong> {{ $penduduk->FPEKERJAAN }}</p>
                    <p><strong>Status Perkawinan:</strong> {{ $penduduk->FSTATUS }}</p>
                    <p><strong>Nama Ayah:</strong> {{ $penduduk->FNAMA_AYAH }}</p>
                    <p><strong>Nama Ibu:</strong> {{ $penduduk->FNAMA_IBU }}</p>
                </div>
                <div class="mt-6">
                    <a href="{{ route('penduduk.index') }}" class="text-gray-600 dark:text-gray-300 hover:underline">Kembali ke Daftar Penduduk</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
