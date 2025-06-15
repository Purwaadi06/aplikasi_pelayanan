@extends('layouts.app', ['title' => 'Detail Penduduk', 'activeMenu' => 'penduduk', 'icon' => 'fa6-solid:users-line'])

@section('content')
    <div class="grid grid-cols-1 xl:grid-cols-12 gap-6 mt-6">
        <div class="xl:col-span-12 2xl:col-span-12">
            <div class="card h-full border-0">
                <div class="card-body p-6">

                    <h2 class="text-xl font-semibold mb-4 text-gray-700">Detail Data Penduduk</h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-gray-700">
                        <div>
                            <span class="font-semibold">Nama:</span>
                            <div>{{ $penduduk->nama }}</div>
                        </div>
                        <div>
                            <span class="font-semibold">NIK:</span>
                            <div>{{ $penduduk->nik }}</div>
                        </div>
                        <div>
                            <span class="font-semibold">No KK:</span>
                            <div>{{ $penduduk->no_kk }}</div>
                        </div>
                        <div>
                            <span class="font-semibold">Tempat Lahir:</span>
                            <div>{{ $penduduk->tempat_lahir }}</div>
                        </div>
                        <div>
                            <span class="font-semibold">Tanggal Lahir:</span>
                            <div>{{ $penduduk->tanggal_lahir->format('d-m-Y') }}</div>
                        </div>
                        <div>
                            <span class="font-semibold">Jenis Kelamin:</span>
                            <div>{{ $penduduk->jenis_kelamin }}</div>
                        </div>
                        <div>
                            <span class="font-semibold">Alamat:</span>
                            <div>{{ $penduduk->alamat }}</div>
                        </div>
                        <div>
                            <span class="font-semibold">RT/RW:</span>
                            <div>{{ $penduduk->rt->nama_rt ?? '-' }} / {{ $penduduk->rt->rw->nama_rw ?? '-' }}</div>
                        </div>
                        <div>
                            <span class="font-semibold">Agama:</span>
                            <div>{{ $penduduk->agama }}</div>
                        </div>
                        <div>
                            <span class="font-semibold">Pekerjaan:</span>
                            <div>{{ $penduduk->pekerjaan }}</div>
                        </div>
                        <!-- Tambahkan field lainnya sesuai kebutuhan -->
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('penduduk.index') }}" class="text-blue-600 hover:underline">← Kembali ke
                            daftar</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
