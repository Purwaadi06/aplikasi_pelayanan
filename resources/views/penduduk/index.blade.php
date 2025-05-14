@extends('sidebar')
@section('content')
    @include('topbar', ['title' => 'Data Penduduk'])
        <div class="py-6">
            <div class=" mx-auto">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
    
                        @if (session('success'))
                            <div class="mb-4 text-green-600 dark:text-green-400">
                                {{ session('success') }}
                            </div>
                        @endif
    
                        <div class="mb-4">
                            <a href="{{ route('penduduk.create') }}"
                               class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                + Tambah Penduduk
                            </a>
                        </div>
    
                        <div class="overflow-x-auto w-full">
                            <table class="table-auto w-full border border-gray-700 text-sm">
                                <thead class="bg-gray-200 dark:bg-gray-700 text-left">
                                    <tr> 
                                        <th class="border px-4 py-2">NIK</th>
                                        <th class="border px-4 py-2">No. KTP</th>
                                        <th class="border px-4 py-2">Nama</th>
                                        <th class="border px-4 py-2">TTL</th>
                                        <th class="border px-4 py-2">Jenis Kelamin</th>
                                        <th class="border px-4 py-2">Agama</th>
                                        <th class="border px-4 py-2">Alamat</th>
                                        <th class="border px-4 py-2">Pendidikan</th>
                                        <th class="border px-4 py-2">Pekerjaan</th>
                                        <th class="border px-4 py-2">Status</th>
                                        <th class="border px-4 py-2">Status Keluarga</th>
                                        <th class="border px-4 py-2">Kewarganegaraan</th>
                                        <th class="border px-4 py-2">Ayah</th>
                                        <th class="border px-4 py-2">Ibu</th>
                                        <th class="border px-4 py-2">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($penduduks as $p)
                                        <tr>
                                            <td class="border px-4 py-2">{{ $p->FNIK }}</td>
                                            <td class="border px-4 py-2">{{ $p->FNO_KTP }}</td>
                                            <td class="border px-4 py-2">{{ $p->FNAMA }}</td>
                                            <td class="border px-4 py-2">
                                                {{ $p->FTMP_LAHIR }},
                                                {{ \Carbon\Carbon::parse($p->FTGL_LAHIR)->format('d-m-Y') }}
                                            </td>
                                            <td class="border px-4 py-2">{{ $p->FKEL }}</td>
                                            <td class="border px-4 py-2">{{ $p->FAGAMA }}</td>
                                            <td class="border px-4 py-2">{{ $p->FALAMAT }}</td>
                                            <td class="border px-4 py-2">{{ $p->FPENDIDIKAN }}</td>
                                            <td class="border px-4 py-2">{{ $p->FPEKERJAAN }}</td>
                                            <td class="border px-4 py-2">{{ $p->FSTATUS }}</td>
                                            <td class="border px-4 py-2">{{ $p->FSTATUS_KEL }}</td>
                                            <td class="border px-4 py-2">{{ $p->FKEWARGANEGARAAN }}</td>
                                            <td class="border px-4 py-2">{{ $p->FNAMA_AYAH }}</td>
                                            <td class="border px-4 py-2">{{ $p->FNAMA_IBU }}</td>
                                            <td class="border px-4 py-2">
                                                <div class="flex">
                                                    <div class="flex gap-2">
                                                        <a href="{{ route('penduduk.edit', $p->FNIK) }}"
                                                           class="bg-yellow-500 hover:bg-yellow-600 text-black font-semibold px-4 py-2 rounded h-9 flex items-center justify-center">
                                                            Edit
                                                        </a>
                                                        
                                                        <form action="{{ route('penduduk.destroy', $p->FNIK) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                    class="bg-red-600 hover:bg-red-700 text-white font-semibold px-4 py-2 rounded h-9 flex items-center justify-center">
                                                                Hapus
                                                            </button>
                                                        </form>
                                                    </div>
                                                </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="14" class="border px-4 py-2 text-center">
                                                Belum ada data.
                                            </td>
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

