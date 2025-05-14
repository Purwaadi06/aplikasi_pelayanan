@extends('sidebar')
@section('content')
    @include('topbar', ['title' => 'Tambah Data'])
    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('penduduk.store') }}" method="POST">
                    @csrf

                    @php
                        $fields = [
                            'FNIK' => 'NIK',
                            'FNO_KTP' => 'No. KTP',
                            'FNAMA' => 'Nama Lengkap',
                            'FTMP_LAHIR' => 'Tempat Lahir',
                            'FTGL_LAHIR' => 'Tanggal Lahir',
                            'FKEL' => 'Jenis Kelamin',
                            'FAGAMA' => 'Agama',
                            'FALAMAT' => 'Alamat',
                            'FPENDIDIKAN' => 'Pendidikan',
                            'FPEKERJAAN' => 'Pekerjaan',
                            'FSTATUS' => 'Status Perkawinan',
                            'FSTATUS_KEL' => 'Status Keluarga',
                            'FKEWARGANEGARAAN' => 'Kewarganegaraan',
                            'FNAMA_AYAH' => 'Nama Ayah',
                            'FNAMA_IBU' => 'Nama Ibu',
                        ];
                    @endphp

                    @foreach ($fields as $field => $label)
                        <div class="mb-4">
                            <label for="{{ $field }}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                {{ $label }}
                            </label>

                            @if ($field === 'FALAMAT')
                                <textarea name="{{ $field }}" id="{{ $field }}" rows="3"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:text-white">{{ old($field) }}</textarea>
                            @elseif ($field === 'FTGL_LAHIR')
                                <input type="date" name="{{ $field }}" id="{{ $field }} "
                                    value="{{ old($field) }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:text-white">
                            @elseif ($field === 'FKEL')
                                <select name="{{ $field }}" id="{{ $field }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:text-white">
                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                    <option value="Laki-laki" {{ old($field) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="Perempuan" {{ old($field) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            @elseif ($field === 'FPENDIDIKAN')
                                <select name="{{ $field }}" id="{{ $field }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:text-white">
                                    <option value="">-- Pilih Pendidikan --</option>
                                    <option value="SD" {{ old($field) == 'SLTA/Sederajat' ? 'selected' : '' }}>SLTA/Sederajat</option>
                                    <option value="SMP" {{ old($field) == 'SMP/Sederajat' ? 'selected' : '' }}>SMP/Sederajat</option>
                                    <option value="SMA" {{ old($field) == 'SMA/Sederajat' ? 'selected' : '' }}>SMA/Sederajat</option>
                                    <option value="D3" {{ old($field) == 'D3/D4' ? 'selected' : '' }}>D3/D4</option>
                                    <option value="S1" {{ old($field) == 'S1' ? 'selected' : '' }}>S1</option>
                                    <option value="S2" {{ old($field) == 'S2' ? 'selected' : '' }}>S2</option>
                                    <option value="S3" {{ old($field) == 'S3' ? 'selected' : '' }}>S3</option>
                                </select>
                            @elseif ($field === 'FSTATUS')
                                <select name="{{ $field }}" id="{{ $field }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:text-white">
                                    <option value="">-- Pilih Status Perkawinan --</option>
                                    <option value="Belum Menikah" {{ old($field) == 'Belum Menikah' ? 'selected' : '' }}>Belum Menikah</option>
                                    <option value="Menikah" {{ old($field) == 'Menikah' ? 'selected' : '' }}>Menikah</option>
                                    <option value="Janda/Duda" {{ old($field) == 'Janda/Duda' ? 'selected' : '' }}>Janda/Duda</option>
                                </select>
                            @else
                                <input type="text" name="{{ $field }}" id="{{ $field }}"
                                    value="{{ old($field) }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:text-white">
                            @endif

                            @error($field)
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    @endforeach

                    <div class="mt-6">
                        <button type="submit"
                            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
                        <a href="{{ route('penduduk.index') }}"
                            class="ml-2 text-gray-600 dark:text-gray-300 hover:underline">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
