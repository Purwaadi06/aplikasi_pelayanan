@extends('sidebar')

@section('content')
@include('topbar', ['title' => 'Surat Permintaan'])

<div class="py-6">
    <div class="mx-auto">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">

                @if(session('success'))
                    <div class="mb-4 text-green-600 dark:text-green-400">
                        {{ session('success') }}
                    </div>
                @endif

                @if(Auth::user()->role === 'admin')
                    <div class="mb-4">
                        <a href="{{ route('surat_permintaan.create') }}"
                           class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-sm">
                            + Buat Surat
                        </a>
                    </div>

                    <div class="overflow-x-auto w-full">
                        <table class="table-auto w-full border border-gray-700 text-sm">
                            <thead class="bg-gray-200 dark:bg-gray-700 text-left">
                                <tr>
                                    <th class="border px-4 py-2">No</th>
                                    <th class="border px-4 py-2">NIK</th>
                                    <th class="border px-4 py-2">Nama</th>
                                    <th class="border px-4 py-2">Jenis Surat</th>
                                    <th class="border px-4 py-2">Keperluan</th>
                                    <th class="border px-4 py-2">Status</th>
                                    <th class="border px-4 py-2">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $index => $item)
                                <tr>
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
                                    <td colspan="7" class="border px-4 py-4 text-center text-gray-500 dark:text-gray-400">
                                        Belum ada permintaan surat.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                @else
                    {{-- Jika user bukan admin, tampilkan data surat permintaan user tersebut --}}
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
                            <tr @if($item->nik === Auth::user()->nik) class="bg-green-50 dark:bg-green-900" @endif>
                                <td class="border px-4 py-2">{{ $index + 1 }}</td>
                                <td class="border px-4 py-2">{{ $item->nik }}</td>
                                <td class="border px-4 py-2">{{ $item->penduduk->FNAMA ?? '-' }}</td>
                                <td class="border px-4 py-2">{{ $item->jenis_surat }}</td>
                                <td class="border px-4 py-2">{{ $item->keperluan }}</td>
                                <td class="border px-4 py-2 capitalize">{{ $item->status }}</td>
                                <td class="border px-4 py-2">
                                    @if($item->nik === Auth::user()->nik || Auth::user()->role === 'admin')
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
                                    @else
                                        <span class="text-gray-500 italic">Tidak ada aksi</span>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="border px-4 py-4 text-center text-gray-500 dark:text-gray-400">
                                    Belum ada permintaan surat.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                        </table>
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>
@endsection
