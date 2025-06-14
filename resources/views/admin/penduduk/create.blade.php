@extends('layouts.app', ['title' => 'Data Penduduk', 'activeMenu' => 'penduduk', 'icon' => 'fa6-solid:users-line'])

@section('content')
    <div class="grid grid-cols-1 xl:grid-cols-12 gap-6 mt-6">

        <div class="xl:col-span-12 2xl:col-span-12">
            <div class="card h-full border-0">
                <div class="card-body p-6">



                    <div class="p-6 rounded shadow">

                        {{-- <h5>Tambah Data RT</h5> --}}


                        <form action="{{ route('penduduk.store') }}" method="POST">
                            @csrf

                            <div class="grid grid-cols-2 gap-4">
                                <!-- Nama -->
                                <div>
                                    <div class="relative">
                                        <input type="text" id="nama" name="nama"
                                            class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 appearance-none dark:text-white @error('nama') dark:border-red-500 !border-red-600 dark:focus:border-red-500 focus:border-red-600 @else border-gray-300 dark:border-gray-600 focus:border-blue-600 dark:focus:border-blue-500 @enderror focus:outline-none focus:ring-0 peer"
                                            placeholder=" " value="{{ old('nama') }}" />
                                        <label for="nama"
                                            class="absolute text-sm @error('nama') text-red-600 dark:text-red-500 @else text-gray-500 dark:text-gray-400 @enderror duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-[rgb(39_49_66/_var(--tw-bg-opacity))] px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
                                            Nama
                                        </label>
                                    </div>
                                    @error('nama')
                                        <p class="mt-2 text-xs text-red-600 dark:text-red-400">
                                            <span class="font-medium">Error!</span> {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <!-- NIK -->
                                <div>
                                    <div class="relative">
                                        <input type="text" inputmode="numeric" pattern="\d*" maxlength="16"
                                            id="nik" name="nik"
                                            class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 appearance-none dark:text-white @error('nik') dark:border-red-500 !border-red-600 dark:focus:border-red-500 focus:border-red-600 @else border-gray-300 dark:border-gray-600 focus:border-blue-600 dark:focus:border-blue-500 @enderror focus:outline-none focus:ring-0 peer"
                                            placeholder=" " value="{{ old('nik') }}" />
                                        <label for="nik"
                                            class="absolute text-sm @error('nik') text-red-600 dark:text-red-500 @else text-gray-500 dark:text-gray-400 @enderror duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-[rgb(39_49_66/_var(--tw-bg-opacity))] px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
                                            NIK
                                        </label>
                                    </div>

                                    <div id="check-nik" class="text-blue-500 mt-1 gap-2 hidden">
                                        <div role="status" id="loading">
                                            <svg aria-hidden="true"
                                                class="inline w-6 h-6 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
                                                viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                                    fill="currentColor" />
                                                <path
                                                    d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                                    fill="currentFill" />
                                            </svg>
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                        <span class="text-sm mt-1">Memeriksa NIK</span>
                                    </div>
                                    <div id="nik-error" class="text-sm text-red-500 mt-1 hidden"></div>
                                    @error('nik')
                                        <p class="mt-2 text-xs text-red-600 dark:text-red-400">
                                            <span class="font-medium">Error!</span> {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <!-- No KK -->
                                <div>
                                    <div class="relative">
                                        <input type="text" inputmode="numeric" pattern="\d*" maxlength="16"
                                            id="no_kk" name="no_kk"
                                            class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 appearance-none dark:text-white @error('no_kk') dark:border-red-500 !border-red-600 dark:focus:border-red-500 focus:border-red-600 @else border-gray-300 dark:border-gray-600 focus:border-blue-600 dark:focus:border-blue-500 @enderror focus:outline-none focus:ring-0 peer"
                                            placeholder=" " value="{{ old('no_kk') }}" />
                                        <label for="no_kk"
                                            class="absolute text-sm @error('no_kk') text-red-600 dark:text-red-500 @else text-gray-500 dark:text-gray-400 @enderror duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-[rgb(39_49_66/_var(--tw-bg-opacity))] px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
                                            No KK
                                        </label>
                                    </div>
                                    <div id="noKK-error" class="text-sm text-red-500 mt-1 hidden"></div>
                                    @error('no_kk')
                                        <p class="mt-2 text-xs text-red-600 dark:text-red-400">
                                            <span class="font-medium">Error!</span> {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <!-- Jenis Kelamin -->
                                <div>
                                    <div class="relative">
                                        <select id="jenis_kelamin" name="jenis_kelamin"
                                            class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 appearance-none dark:text-white @error('jenis_kelamin') dark:border-red-500 !border-red-600 dark:focus:border-red-500 focus:border-red-600 @else border-gray-300 dark:border-gray-600 focus:border-blue-600 dark:focus:border-blue-500 @enderror focus:outline-none focus:ring-0 peer">
                                            <option value="" disabled selected>--Pilih Jenis Kelamin--</option>
                                            <option value="Laki-laki"
                                                {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki
                                            </option>
                                            <option value="Perempuan"
                                                {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan
                                            </option>
                                        </select>
                                        <label for="jenis_kelamin"
                                            class="absolute text-sm @error('jenis_kelamin') text-red-600 dark:text-red-500 @else text-gray-500 dark:text-gray-400 @enderror duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-[rgb(39_49_66/_var(--tw-bg-opacity))] px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
                                            Jenis Kelamin
                                        </label>
                                    </div>
                                    @error('jenis_kelamin')
                                        <p class="mt-2 text-xs text-red-600 dark:text-red-400">
                                            <span class="font-medium">Error!</span> {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <!-- Tempat Lahir -->
                                <div>
                                    <div class="relative">
                                        <input type="text" id="tempat_lahir" name="tempat_lahir"
                                            class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 appearance-none dark:text-white @error('tempat_lahir') dark:border-red-500 !border-red-600 dark:focus:border-red-500 focus:border-red-600 @else border-gray-300 dark:border-gray-600 focus:border-blue-600 dark:focus:border-blue-500 @enderror focus:outline-none focus:ring-0 peer"
                                            placeholder=" " value="{{ old('tempat_lahir') }}" />
                                        <label for="tempat_lahir"
                                            class="absolute text-sm @error('tempat_lahir') text-red-600 dark:text-red-500 @else text-gray-500 dark:text-gray-400 @enderror duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-[rgb(39_49_66/_var(--tw-bg-opacity))] px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
                                            Tempat Lahir
                                        </label>
                                    </div>
                                    @error('tempat_lahir')
                                        <p class="mt-2 text-xs text-red-600 dark:text-red-400">
                                            <span class="font-medium">Error!</span> {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <!-- Tanggal Lahir -->
                                <div>
                                    <div class="relative">
                                        <input id="datepicker-autohide" datepicker datepicker-autohide type="text"
                                            name="tanggal_lahir"
                                            class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 appearance-none dark:text-white @error('tanggal_lahir') dark:border-red-500 !border-red-600 dark:focus:border-red-500 focus:border-red-600 @else border-gray-300 dark:border-gray-600 focus:border-blue-600 dark:focus:border-blue-500 @enderror focus:outline-none focus:ring-0 peer"
                                            placeholder=" " datepicker-format="dd-mm-yyyy"
                                            datepicker-max-date="{{ date('d-m-Y', strtotime(\Carbon\Carbon::yesterday())) }}" />
                                        <label for="datepicker-autohide"
                                            class="absolute text-sm @error('tanggal_lahir') text-red-600 dark:text-red-500 @else text-gray-500 dark:text-gray-400 @enderror duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-[rgb(39_49_66/_var(--tw-bg-opacity))] px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
                                            Tanggal Lahir
                                        </label>
                                    </div>
                                    @error('tanggal_lahir')
                                        <p class="mt-2 text-xs text-red-600 dark:text-red-400">
                                            <span class="font-medium">Error!</span> {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <!-- Agama -->
                                <div>
                                    <div class="relative">
                                        <select id="agama" name="agama"
                                            class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 appearance-none dark:bg-[rgb(39_49_66/_var(--tw-bg-opacity))] dark:text-white @error('agama') dark:border-red-500 !border-red-600 dark:focus:border-red-500 focus:border-red-600 @else border-gray-300 dark:border-gray-600 focus:border-blue-600 dark:focus:border-blue-500 @enderror focus:outline-none focus:ring-0 peer">
                                            <option value="" disabled selected>--Pilih Agama--</option>
                                            <option value="Islam" {{ old('agama') == 'Islam' ? 'selected' : '' }}>Islam
                                            </option>
                                            <option value="Protestan" {{ old('agama') == 'Protestan' ? 'selected' : '' }}>
                                                Protestan</option>
                                            <option value="Katolik" {{ old('agama') == 'Katolik' ? 'selected' : '' }}>
                                                Katolik</option>
                                            <option value="Hindu" {{ old('agama') == 'Hindu' ? 'selected' : '' }}>Hindu
                                            </option>
                                            <option value="Buddha" {{ old('agama') == 'Buddha' ? 'selected' : '' }}>Buddha
                                            </option>
                                            <option value="Konghucu" {{ old('agama') == 'Konghucu' ? 'selected' : '' }}>
                                                Konghucu</option>
                                        </select>
                                        <label for="agama"
                                            class="absolute text-sm @error('agama') text-red-600 dark:text-red-500 @else text-gray-500 dark:text-gray-400 @enderror duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-[rgb(39_49_66/_var(--tw-bg-opacity))] px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
                                            Agama
                                        </label>
                                    </div>
                                    @error('agama')
                                        <p class="mt-2 text-xs text-red-600 dark:text-red-400">
                                            <span class="font-medium">Error!</span> {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <!-- Pekerjaan -->
                                <div>
                                    <div class="relative">
                                        <input type="text" id="pekerjaan" name="pekerjaan"
                                            class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 appearance-none dark:text-white @error('pekerjaan') dark:border-red-500 !border-red-600 dark:focus:border-red-500 focus:border-red-600 @else border-gray-300 dark:border-gray-600 focus:border-blue-600 dark:focus:border-blue-500 @enderror focus:outline-none focus:ring-0 peer"
                                            placeholder=" " value="{{ old('pekerjaan') }}" />
                                        <label for="pekerjaan"
                                            class="absolute text-sm @error('pekerjaan') text-red-600 dark:text-red-500 @else text-gray-500 dark:text-gray-400 @enderror duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-[rgb(39_49_66/_var(--tw-bg-opacity))] px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
                                            Pekerjaan
                                        </label>
                                    </div>
                                    @error('pekerjaan')
                                        <p class="mt-2 text-xs text-red-600 dark:text-red-400">
                                            <span class="font-medium">Error!</span> {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <!-- Status Perkawinan -->
                                <div>
                                    <div class="relative">
                                        <select name="" id=""
                                            class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 appearance-none dark:bg-[rgb(39_49_66/_var(--tw-bg-opacity))] dark:text-white @error('rw_id') dark:border-red-500 !border-red-600 dark:focus:border-red-500 focus:border-red-600 @else border-gray-300 dark:border-gray-600 focus:border-blue-600 dark:focus:border-blue-500 @enderror focus:outline-none focus:ring-0 peer">>
                                            <option value="" disabled selected>--Pilih Status Perkawinan--</option>
                                            <option value="Belum Kawin"
                                                {{ old('status_perkawinan') == 'Belum Kawin' ? 'selected' : '' }}>Belum
                                                Kawin
                                            </option>
                                            <option value="Kawin"
                                                {{ old('status_perkawinan') == 'Kawin' ? 'selected' : '' }}>Kawin</option>
                                            <option value="Belum Tercatat"
                                                {{ old('status_perkawinan') == 'Belum Tercatat' ? 'selected' : '' }}>Belum
                                                Tercatat</option>
                                            <option value="Kawin Tercatat"
                                                {{ old('status_perkawinan') == 'Kawin Tercatat' ? 'selected' : '' }}>Kawin
                                                Tercatat</option>
                                            <option value="Cerai Hidup"
                                                {{ old('status_perkawinan') == 'Cerai Hidup' ? 'selected' : '' }}>Cerai
                                                Hidup
                                            </option>
                                            <option value="Cerai Mati"
                                                {{ old('status_perkawinan') == 'Cerai Mati' ? 'selected' : '' }}>Cerai Mati
                                            </option>
                                        </select>
                                        <label for="status_perkawinan"
                                            class="absolute text-sm @error('status_perkawinan') text-red-600 dark:text-red-500 @else text-gray-500 dark:text-gray-400 @enderror duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-[rgb(39_49_66/_var(--tw-bg-opacity))] px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
                                            Status Perkawinan
                                        </label>
                                    </div>
                                    @error('status_perkawinan')
                                        <p class="mt-2 text-xs text-red-600 dark:text-red-400">
                                            <span class="font-medium">Error!</span> {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <!-- RW -->
                                <div>
                                    <div class="relative">
                                        <select id="rw" name="rw_id"
                                            class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 appearance-none dark:bg-[rgb(39_49_66/_var(--tw-bg-opacity))] dark:text-white @error('rw_id') dark:border-red-500 !border-red-600 dark:focus:border-red-500 focus:border-red-600 @else border-gray-300 dark:border-gray-600 focus:border-blue-600 dark:focus:border-blue-500 @enderror focus:outline-none focus:ring-0 peer">
                                            <option value="" disabled selected>--Pilih RW--</option>
                                            @foreach ($rw as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ old('rw_id') == $item->id ? 'selected' : '' }}>{{ $item->nama_rw }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label for="rw"
                                            class="absolute text-sm @error('rw_id') text-red-600 dark:text-red-500 @else text-gray-500 dark:text-gray-400 @enderror duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-[rgb(39_49_66/_var(--tw-bg-opacity))] px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
                                            RW
                                        </label>
                                    </div>
                                    @error('rw_id')
                                        <p class="mt-2 text-xs text-red-600 dark:text-red-400">
                                            <span class="font-medium">Error!</span> {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <!-- RT -->
                                <div>
                                    <div class="relative">
                                        <select id="rt" name="rt_id"
                                            class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 appearance-none dark:bg-[rgb(39_49_66/_var(--tw-bg-opacity))] dark:text-white @error('rt_id') dark:border-red-500 !border-red-600 dark:focus:border-red-500 focus:border-red-600 @else border-gray-300 dark:border-gray-600 focus:border-blue-600 dark:focus:border-blue-500 @enderror focus:outline-none focus:ring-0 peer">
                                            <option value="" disabled selected>--Pilih RT--</option>
                                            @foreach ($rt as $item)
                                                <option value="{{ $item->id }}" data-chained="{{ $item->rw_id }}"
                                                    {{ old('rt_id') == $item->id ? 'selected' : '' }}>
                                                    {{ $item->nama_rt }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label for="rt"
                                            class="absolute text-sm @error('rt_id') text-red-600 dark:text-red-500 @else text-gray-500 dark:text-gray-400 @enderror duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-[rgb(39_49_66/_var(--tw-bg-opacity))] px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
                                            RT
                                        </label>
                                    </div>
                                    @error('rt_id')
                                        <p class="mt-2 text-xs text-red-600 dark:text-red-400">
                                            <span class="font-medium">Error!</span> {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <!-- Alamat -->
                                <div class="col-span-2">
                                    <div class="relative">
                                        <textarea id="alamat" name="alamat" rows="4"
                                            class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 appearance-none dark:text-white @error('alamat') dark:border-red-500 !border-red-600 dark:focus:border-red-500 focus:border-red-600 @else border-gray-300 dark:border-gray-600 focus:border-blue-600 dark:focus:border-blue-500 @enderror focus:outline-none focus:ring-0 peer resize-none"
                                            placeholder=" ">{{ old('alamat') }}</textarea>
                                        <label for="alamat"
                                            class="absolute text-sm @error('alamat') text-red-600 dark:text-red-500 @else text-gray-500 dark:text-gray-400 @enderror duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-[rgb(39_49_66/_var(--tw-bg-opacity))] px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
                                            Alamat
                                        </label>
                                    </div>
                                    @error('alamat')
                                        <p class="mt-2 text-xs text-red-600 dark:text-red-400">
                                            <span class="font-medium">Error!</span> {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>

                            <div class="flex justify-start pt-4 mt-4">
                                <button type="submit" id="submit-btn"
                                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-md shadow transition">
                                    Simpan
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection

@section('js')
    <script src="{{ asset('template/assets/js/lib/jquery.chained.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#rt').chained('#rw');
        })
        $('#no_kk').on('input', function() {
            let no_kk = $('#no_kk').val().trim();

            if (no_kk === '') {
                $('#noKK-error').text('No KK tidak boleh kosong').removeClass('hidden');
                $('#submit-btn').prop('disabled', true).addClass('cursor-not-allowed');
                return;
            }

            // Harus angka
            if (!/^\d+$/.test(no_kk)) {
                $('#noKK-error').text('No KK hanya boleh angka').removeClass('hidden');
                $('#submit-btn').prop('disabled', true).addClass('cursor-not-allowed');
                return;
            }

            // Harus 16 digit
            if (no_kk.length !== 16) {
                $('#noKK-error').text('No KK harus 16 angka').removeClass('hidden');
                $('#submit-btn').prop('disabled', true).addClass('cursor-not-allowed');
                return;
            }

            // Jika valid
            $('#noKK-error').addClass('hidden').text('');
            $('#submit-btn').prop('disabled', false).removeClass('cursor-not-allowed');


        })
        $('#nik').on('input', function() {
            var nik = $(this).val().trim();
            this.value = this.value.replace(/\D/g, '');
            console.log(nik)

            if (nik === '') {
                $('#nik-error').text('NIK tidak boleh kosong').removeClass('hidden');
                $('#submit-btn').prop('disabled', true).addClass('cursor-not-allowed');
                return;
            }

            // Harus angka
            if (!/^\d+$/.test(nik)) {
                $('#nik-error').text('NIK hanya boleh angka').removeClass('hidden');
                $('#submit-btn').prop('disabled', true).addClass('cursor-not-allowed');
                return;
            }

            // Harus 16 digit
            if (nik.length !== 16) {
                $('#nik-error').text('NIK harus 16 angka').removeClass('hidden');
                $('#submit-btn').prop('disabled', true).addClass('cursor-not-allowed');
                return;
            }

            if (nik.length === 16) {
                $.ajax({
                    url: `{{ url('api/cek-nik') }}`,
                    method: 'POST',
                    data: {
                        'filter[]': 'nik',
                        'filterValue[]': nik,
                        '_token': '{{ csrf_token() }}'
                    },
                    beforeSend: function() {
                        $('#nik-error').text('').addClass('hidden');

                        $('#check-nik').addClass('flex').removeClass('hidden');
                        $('#submit-btn').prop('disabled', true);
                    },
                    success: function(res) {
                        $('#check-nik').addClass('hidden').removeClass('flex');
                        if (res.data.length > 0) {
                            $('#nik-error').text('NIK sudah terdaftar!').removeClass('hidden');
                            $('#submit-btn').prop('disabled', true).addClass('cursor-not-allowed');
                        } else {
                            $('#nik-error').addClass('hidden').text('');
                            $('#submit-btn').prop('disabled', false).removeClass('cursor-not-allowed');
                        }
                    },
                    error: function() {
                        $('#nik-error').text('Terjadi kesalahan saat memeriksa NIK').removeClass(
                            'hidden');
                        $('#submit-btn').prop('disabled', true).addClass('cursor-not-allowed');
                    }
                });
            }
        });
    </script>
@endsection
