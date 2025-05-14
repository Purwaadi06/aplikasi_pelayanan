@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto py-8 px-4">
    <h2 class="text-2xl font-bold mb-6">Daftar Permintaan Surat</h2>

    <a href="{{ route('surat_permintaan.create') }}" class="inline-block mb-4 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        Buat Permintaan Baru
    </a>

    <div class="overflow-x-auto">
        <table class="w-full table-auto border border-gray-300 rounded-md shadow-sm">
            <thead class="bg-gray-100">
                <tr class="text-left">
                    <th class="border px-4 py-2">No</th>
                    <th class="border px-4 py-2">NIK</th>
                    <th class="border px-4 py-2">Jenis Surat</th>
                    <th class="border px-4 py-2">Keperluan</th>
                    <th class="border px-4 py-2">Status</th>
                    <th class="border px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $index => $item)
                <tr class="hover:bg-gray-50 transition duration-300">
                    <td class="border px-4 py-2">{{ $index + 1 }}</td>
                    <td class="border px-4 py-2">{{ $item->nik }}</td>
                    <td class="border px-4 py-2">{{ $item->jenis_surat }}</td>
                    <td class="border px-4 py-2">{{ $item->keperluan }}</td>
                    <td class="border px-4 py-2 capitalize">{{ $item->status }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('surat_permintaan.show', $item->id) }}"
                            class="text-white bg-indigo-600 px-3 py-1 rounded hover:bg-indigo-700 text-sm">
                            Lihat
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-4 text-gray-500">Belum ada permintaan surat.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
