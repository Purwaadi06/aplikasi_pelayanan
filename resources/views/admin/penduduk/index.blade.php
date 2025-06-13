@extends('layouts.app', ['title' => 'Data Penduduk', 'activeMenu' => 'penduduk', 'icon' => 'fa6-solid:users-line'])

@section('content')
    <div class="grid grid-cols-1 xl:grid-cols-12 gap-6 mt-6">

        <div class="xl:col-span-12 2xl:col-span-12">
            <div class="card h-full border-0">
                <div class="card-body p-6">



                    <div class="p-6 rounded shadow">
                        <a href="{{ route('surat_permintaan.create') }}"
                            class=" bg-blue-600 hover:bg-blue-700 text-white font-medium px-4 py-1 rounded transition duration-300 flex items-center gap-2 w-[155px]">
                            <iconify-icon icon="fa6-solid:plus" class="icon"></iconify-icon>
                            <span>Tambah Data</span>
                        </a>

                        <h2 class="text-xl font-semibold mb-4 mt-10 text-gray-700">Data Penduduk</h2>
                        <table class="table-auto w-full border border-gray-300 text-sm" id="table-surat">
                            <thead class="bg-gray-200 text-left">
                                <tr>
                                    <th class="border px-4 py-2">No</th>
                                    <th class="border px-4 py-2">NIK</th>
                                    <th class="border px-4 py-2">Nama</th>
                                    <th class="border px-4 py-2">RT / RW</th>

                                    <th class="border px-4 py-2">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    // Filter data surat hanya milik user yang login
                                    $userSurat = $penduduks;
                                @endphp

                                @foreach ($userSurat as $index => $item)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $index + 1 }}</td>
                                        <td class="border px-4 py-2"></td>
                                        <td class="border px-4 py-2"></td>
                                        <td class="border px-4 py-2 capitalize"></td>

                                        <td class="border px-4 py-2">
                                            <a href="{{ route('surat_permintaan.edit', $item->id) }}"
                                                class="bg-yellow-500 hover:bg-yellow-600 text-black font-semibold px-3 py-1 rounded">
                                                Edit
                                            </a>
                                            <form action="{{ route('surat_permintaan.destroy', $item->id) }}" method="POST"
                                                class="inline-block" onsubmit="return confirm('Yakin ingin menghapus?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="bg-red-600 hover:bg-red-700 text-white font-semibold px-3 py-1 rounded ml-1">
                                                    Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection

@section('js')
    <script>
        if (typeof simpleDatatables.DataTable !== 'undefined') {
            let table = null
            table = new simpleDatatables.DataTable("#table-surat", options);

        }
    </script>
@endsection
