@extends('sidebar-admin')
@section('content')
    @include('topbar', ['title' => 'Dashboard User'])
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
        <div class="overflow-x-auto w-full">
                        <table class="table-auto w-full border border-gray-700 text-sm">
                            <thead class="bg-gray-200 dark:bg-gray-700 text-left">
                                <tr>
                                    <th class="border px-4 py-2">No</th>
                                    <th class="border px-4 py-2">Jenis Surat</th>
                                    <th class="border px-4 py-2">Keperluan</th>
                                    <th class="border px-4 py-2">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse ($data as $index => $item)
                            <tr class="bg-green-50 dark:bg-green-900">
                                <td class="border px-4 py-2">{{ $index + 1 }}</td>
                                <td class="border px-4 py-2">{{ $item->nik }}</td>
                                <td class="border px-4 py-2">{{ $item->penduduk->FNAMA ?? '-' }}</td>
                                <td class="border px-4 py-2">{{ $item->jenis_surat }}</td>
                                <td class="border px-4 py-2">{{ $item->keperluan }}</td>
                                <td class="border px-4 py-2 capitalize">{{ $item->status }}</td>
                                <td class="border px-4 py-2">
                                    <div class="flex gap-2">
                                        <a href="{{ route('surat_permintaan.edit', $item->id) }}"
                                        class="bg-yellow-500 hover:bg-yellow-600 text-black font-semibold px-4 py-2 rounded h-9 flex items-center justify-center">
                                            Edit
                                        </a>
                                        <form action="{{ route('surat_permintaan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="bg-red-600 hover:bg-red-700 text-white font-semibold px-4 py-2 rounded h-9 flex items-center justify-center">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center py-4 text-gray-500">Belum ada pengajuan surat.</td>
                            </tr>

                    </div>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
