@extends('sidebar')
@section('content')
    @include('topbar', ['title' => 'Dashboard Admin'])
    <div class="flex min-h-screen bg-gray-100">
        {{-- Sidebar --}}
        {{-- <aside class="w-64 bg-gray-800 text-white">
            <div class="p-4 text-lg font-bold border-b border-gray-600">
                <span class="inline-flex items-center">
                    <img src="{{ asset('img/logo.png') }}" class="w-6 h-6 mr-2" alt="logo">
                    e-SuratDesa
                </span>
            </div>
            <div class="p-4">
                <p class="text-sm">Administrator</p>
                <span class="text-green-400 text-xs">● Online</span>
            </div>
            <nav class="mt-4">
                <ul>
                    <li><a href="#" class="block py-2 px-4 hover:bg-gray-700">Dashboard</a></li>
                    <li><a href="#" class="block py-2 px-4 hover:bg-gray-700">Data Penduduk</a></li>
                    <li><a href="#" class="block py-2 px-4 hover:bg-gray-700">Surat</a></li>
                    <li><a href="#" class="block py-2 px-4 hover:bg-gray-700">Laporan</a></li>
                </ul>
            </nav>
        </aside> --}}
    
        {{-- Main Content --}}
        <main class="flex-1 p-6">
            {{-- <div class="flex justify-between items-center mb-4">
                <h1 class="text-2xl font-bold">Dashboard</h1>
                <a href="#" class="text-blue-500 hover:underline">Logout</a>
            </div> --}}
    
            {{-- Card Stats --}}
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
    
            {{-- Welcome Panel --}}
            <div class="bg-white p-6 rounded shadow text-center">
                <img src="/assets/logo_cikundul.png" alt="Logo Kelurahan" class="w-32 mb-4 mx-auto">

                <h2 class="text-xl font-bold mb-2">Halo, Administrator</h2>
                <p>Selamat datang di <span class="text-blue-600">Website Aplikasi Pelayanan Surat Kelurahan Cikundul.</span></p>
                <p class="mt-2 text-sm text-gray-600">{{ now()->translatedFormat('l, d F Y') }}</p>
            </div>
            
        </main>
    </div>
@endsection
