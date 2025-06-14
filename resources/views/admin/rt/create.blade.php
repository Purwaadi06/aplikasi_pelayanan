@extends('layouts.app', ['title' => 'Tambah Data RT', 'activeMenu' => 'rt', 'icon' => 'fa6-solid:users-line'])

@section('content')
    <div class="grid grid-cols-1 xl:grid-cols-12 gap-6 mt-6">

        <div class="xl:col-span-12 2xl:col-span-12">
            <div class="card h-full border-0">
                <div class="card-body p-6">



                    <div class="p-6 rounded shadow">

                        {{-- <h5>Tambah Data RT</h5> --}}
                        </a>

                        <form action="{{ route('rt.store') }}" method="post">
                            @csrf
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <div class="relative">
                                        <input type="text" id="nama_rt" name="nama_rt"
                                            class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 appearance-none dark:text-white @error('nama_rt') dark:border-red-500 !border-red-600 dark:focus:border-red-500 focus:border-red-600 @else border-gray-300 dark:border-gray-600 focus:border-blue-600 dark:focus:border-blue-500 @enderror focus:outline-none focus:ring-0 peer"
                                            placeholder=" " />
                                        <label for="nama_rt"
                                            class="absolute text-sm @error('nama_rt') text-red-600 dark:text-red-500 @else text-gray-500 dark:text-gray-400 @enderror duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-[rgb(39_49_66/_var(--tw-bg-opacity))] px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
                                            RT
                                        </label>
                                    </div>
                                    @error('nama_rt')
                                        <p class="mt-2 text-xs text-red-600 dark:text-red-400">
                                            <span class="font-medium">Error!</span> {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div>

                                    @if (auth()->user()->role == 'rw' && auth()->user()->rw_id == null)
                                        <div>
                                            <div class="relative">
                                                <input type="text" id="rw_id" name="rw_id"
                                                    class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 appearance-none dark:text-white @error('rw_id') dark:border-red-500 !border-red-600 dark:focus:border-red-500 focus:border-red-600 @else border-gray-300 dark:border-gray-600 focus:border-blue-600 dark:focus:border-blue-500 @enderror focus:outline-none focus:ring-0 peer"
                                                    placeholder=" " value="{{ auth()->user()->rw->nama_rw }}" />
                                                <label for="rw_id"
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
                                    @else
                                        <div>
                                            <div class="relative">
                                                <select id="rw" name="rw_id"
                                                    class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 appearance-none dark:bg-[rgb(39_49_66/_var(--tw-bg-opacity))] dark:text-white @error('rw_id') dark:border-red-500 !border-red-600 dark:focus:border-red-500 focus:border-red-600 @else border-gray-300 dark:border-gray-600 focus:border-blue-600 dark:focus:border-blue-500 @enderror focus:outline-none focus:ring-0 peer">
                                                    <option value="" disabled selected>--Pilih RW--</option>
                                                    @foreach ($rw as $item)
                                                        <option value="{{ $item->id }}"
                                                            {{ old('rw_id') == $item->id ? 'selected' : '' }}>
                                                            {{ $item->nama_rw }}
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
                                    @endif
                                </div>
                            </div>
                            <div class="col-span-12">

                                <button type="submit" class="btn btn-primary-600 mt-5">Simpan</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection
