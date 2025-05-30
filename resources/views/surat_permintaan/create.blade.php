@extends('sidebar')

@section('content')
@include('topbar', ['title' => 'Buat Surat Permintaan'])

<div class="py-6">
    <div class="mx-auto">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">

                <h2 class="text-xl font-semibold mb-4">Formulir Surat Permintaan</h2>

                @if ($errors->any())
                    <div class="mb-4 text-red-600 dark:text-red-400">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('surat_permintaan.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <div>
                        <label for="nik" class="block font-medium">NIK</label>
                        <select name="nik" id="nik" class="w-full mt-1 p-2 border rounded dark:bg-gray-700 dark:text-white">
                            <option value="">-- Pilih NIK --</option>
                            @foreach($penduduks as $p)
                                <option value="{{ $p->FNIK }}" {{ old('nik') == $p->FNIK ? 'selected' : '' }}>
                                    {{ $p->FNIK }} - {{ $p->FNAMA }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="jenis_surat" class="block font-medium">Jenis Surat</label>
                        <input type="text" name="jenis_surat" id="jenis_surat" value="{{ old('jenis_surat') }}"
                               class="w-full mt-1 p-2 border rounded dark:bg-gray-700 dark:text-white">
                    </div>

                    <div>
                        <label for="keperluan" class="block font-medium">Keperluan</label>
                        <textarea name="keperluan" id="keperluan" rows="4"
                                  class="w-full mt-1 p-2 border rounded dark:bg-gray-700 dark:text-white">{{ old('keperluan') }}</textarea>
                    </div>

                    <div>
                        <label for="status" class="block font-medium">Status</label>
                        <select name="status" id="status" class="w-full mt-1 p-2 border rounded dark:bg-gray-700 dark:text-white">
                            <option value="diproses" {{ old('status') == 'diproses' ? 'selected' : '' }}>Diproses</option>
                            <option value="selesai" {{ old('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                        </select>
                    </div>

                    <div class="flex justify-end gap-4">
                        <a href="{{ route('surat_permintaan.index') }}"
                           class="bg-gray-600 hover:bg-gray-700 text-white font-semibold px-4 py-2 rounded">
                            Batal
                        </a>
                        <button type="submit"
                                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded">
                            Simpan
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
