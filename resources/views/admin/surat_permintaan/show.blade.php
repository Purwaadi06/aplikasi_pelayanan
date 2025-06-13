@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-8 px-4">
    <h2 class="text-2xl font-bold mb-6">Detail Permintaan Surat</h2>

    <div class="bg-white shadow rounded-lg p-6">
        <p><strong>NIK:</strong> {{ $permintaan->nik }}</p>
        <p><strong>Jenis Surat:</strong> {{ $permintaan->jenis_surat }}</p>
        <p><strong>Keperluan:</strong> {{ $permintaan->keperluan }}</p>
        <p><strong>Status:</strong> {{ $permintaan->status }}</p>

        <a href="{{ route('surat_permintaan.index') }}"
           class="mt-4 inline-block bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">
            Kembali
        </a>
    </div>
</div>
@endsection
