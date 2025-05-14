@extends('sidebar-admin')
@section('content')
    @include('topbar', ['title' => 'Dashboard User'])
    <div class="bg-gray-100 items-center justify-center mt-6 w-full">
        <div class="bg-white p-6 rounded-lg w-full max-w-none text-center">
            <h1 class="text-3xl font-semibold text-gray-800 mb-4">Ajukan Surat</h1>
            <p class="text-gray-600 mb-6">
                Silakan ajukan permintaan surat yang Anda butuhkan melalui tombol di bawah ini.
            </p>
    
            <a href="{{ route('surat_permintaan.create') }}"
               class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-medium px-6 py-2 rounded transition duration-300">
                Ajukan Surat
            </a>
        </div>
    </div>
@endsection
