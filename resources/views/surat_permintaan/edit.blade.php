
@extends('sidebar')

@section('content')
@include('topbar', ['title' => 'Edit Surat Permintaan'])

<div class="py-6">
    <div class="mx-auto max-w-4xl">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">

                <h2 class="text-xl font-semibold mb-4">Edit Formulir Surat Permintaan</h2>

                @if ($errors->any())
                    <div class="mb-4 text-red-600 dark:text-red-400">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('surat_permintaan.update', $data->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="nik" class="block font-medium">NIK</label>
                        <select name="nik" id="nik" class="w-full mt-1 p-2 border rounded dark:bg-gray-700 dark:text-white">
                            <option value="">-- Pilih NIK --</option>
                            @foreach($penduduks as $p)
                                <option value="{{ $p->FNIK }}" {{ $data->nik == $p->FNIK ? 'selected' : '' }}>
                                    {{ $p->FNIK }} - {{ $p->FNAMA }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="jenis_surat" class="block font-medium">Jenis Surat</label>
                        <select name="jenis_surat" id="jenis_surat" 
                                class="w-full mt-1 p-2 border rounded dark:bg-gray-700 dark:text-white">
                            <option value="">-- Pilih Jenis Surat --</option>
                            <option value="Surat Pengantar" {{ old('jenis_surat', $data->jenis_surat) == 'Surat Pengantar' ? 'selected' : '' }}>
                                Surat Pengantar
                            </option>
                            <option value="Surat Keterangan" {{ old('jenis_surat', $data->jenis_surat) == 'Surat Keterangan' ? 'selected' : '' }}>
                                Surat Keterangan
                            </option>
                        </select>
                    </div>

                    <div>
                        <label for="keperluan" class="block font-medium">Keperluan</label>
                        <textarea name="keperluan" id="keperluan" rows="4"
                                  class="w-full mt-1 p-2 border rounded dark:bg-gray-700 dark:text-white">{{ old('keperluan', $data->keperluan) }}</textarea>
                    </div>

                    <div>
                        <label for="status" class="block font-medium">Status</label>
                        <select name="status" id="status" class="w-full mt-1 p-2 border rounded dark:bg-gray-700 dark:text-white">
                            <option value="diproses" {{ $data->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
                            <option value="selesai" {{ $data->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                        </select>
                    </div>

                    <div class="flex justify-end gap-4">
                        <a href="/user-dashboard"
                           class="bg-gray-600 hover:bg-gray-700 text-white font-semibold px-4 py-2 rounded">
                            Batal
                        </a>
                        <button type="submit"
                                class="bg-green-600 hover:bg-green-700 text-white font-semibold px-4 py-2 rounded">
                            Update
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
