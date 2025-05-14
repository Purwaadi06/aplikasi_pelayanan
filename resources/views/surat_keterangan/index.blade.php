@extends('sidebar')
@section('content')
@include('topbar', ['title' => 'Surat Keterangan'])

<div class="py-6">
    <div class="mx-auto">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">

                @if (session('success'))
                    <div class="mb-4 text-green-600 dark:text-green-400">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="mb-4">
                    <a href="{{ route('surat_keterangan.create') }}"
                       class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        + Tambah Surat
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="table-auto w-full border border-gray-700 text-sm">
                        <thead class="bg-gray-200 dark:bg-gray-700 text-left">
                            <tr>
                                <th class="border px-4 py-2">No</th>
                                <th class="border px-4 py-2">Nomor Surat</th>
                                <th class="border px-4 py-2">NIK</th>
                                <th class="border px-4 py-2">Tanggal Surat</th>
                                <th class="border px-4 py-2">Jenis Surat</th>
                                <th class="border px-4 py-2">Status</th>
                                <th class="border px-4 py-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($surats as $index => $surat)
                                <tr>
                                    <td class="border px-4 py-2">{{ $index + 1 }}</td>
                                    <td class="border px-4 py-2">{{ $surat->no_surat }}</td>
                                    <td class="border px-4 py-2">{{ $surat->nik }}</td>
                                    <td class="border px-4 py-2">{{ \Carbon\Carbon::parse($surat->tanggal)->format('d-m-Y') }}</td>
                                    <td class="border px-4 py-2">{{ ucfirst($surat->jenis_surat) }}</td>
                                    <td class="border px-4 py-2">{{ $surat->status }}</td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('surat_keterangan.edit', $surat->id) }}" class="text-yellow-500 hover:text-yellow-600">
                                            Edit
                                        </a> |
                                        <form action="{{ route('surat_keterangan.destroy', $surat->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-600"
                                                    onclick="return confirm('Yakin ingin menghapus surat ini?')">
                                                Hapus
                                            </button>
                                        </form> |
                                        <a href="{{ route('surat_keterangan.cetak', $surat->id) }}" class="text-blue-500 hover:text-blue-600">
                                            Cetak
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="border px-4 py-2 text-center">Belum ada data.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
