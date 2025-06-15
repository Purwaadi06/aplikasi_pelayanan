@extends('layouts.app', ['title' => 'Data Pengajuan Surat', 'activeMenu' => 'permintaan', 'icon' => 'fa6-solid:envelope'])

@section('content')
    <div class="grid grid-cols-1 xl:grid-cols-12 gap-6 mt-6">

        <div class="xl:col-span-12 2xl:col-span-12">
            <div class="card h-full border-0">
                <div class="card-body p-6">


                    {{-- <h2 class="text-xl font-semibold mb-4 mt-10 text-gray-700">Data Penduduk</h2> --}}
                    <div class="p-6 rounded shadow">
                        <a href="{{ route('surat_permintaan.create') }}"
                            class="mb-5 bg-blue-600 hover:bg-blue-700 text-white font-medium px-4 py-1 rounded transition duration-300 flex items-center gap-2 w-[155px]">
                            <iconify-icon icon="fa6-solid:plus" class="icon"></iconify-icon>
                            <span>Tambah Data</span>
                        </a>


                        <table class="table-auto w-full border border-gray-300 text-sm" id="table-surat">
                            <thead class="bg-gray-200 text-left">
                                <tr>
                                    <th
                                        class="!bg-white dark:!bg-neutral-700 border-b border-neutral-200 dark:border-neutral-600">
                                        No</th>
                                    <th
                                        class="!bg-white dark:!bg-neutral-700 border-b border-neutral-200 dark:border-neutral-600">
                                        Nama Warga</th>
                                    <th
                                        class="!bg-white dark:!bg-neutral-700 border-b border-neutral-200 dark:border-neutral-600">
                                        Diajukan Oleh</th>
                                    <th
                                        class="!bg-white dark:!bg-neutral-700 border-b border-neutral-200 dark:border-neutral-600">
                                        Jenis Surat</th>
                                    <th
                                        class="!bg-white dark:!bg-neutral-700 border-b border-neutral-200 dark:border-neutral-600">
                                        Keperluan</th>
                                    <th
                                        class="!bg-white dark:!bg-neutral-700 border-b border-neutral-200 dark:border-neutral-600">
                                        Status</th>
                                    <th
                                        class="!bg-white dark:!bg-neutral-700 border-b border-neutral-200 dark:border-neutral-600">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody>


                                @foreach ($pengajuanSurat as $index => $item)
                                    <tr class="odd:bg-neutral-100 dark:odd:bg-neutral-600">
                                        <td class="border px-4 py-2">{{ $index + 1 }}</td>
                                        <td class="border px-4 py-2"></td>
                                        <td class="border px-4 py-2"></td>
                                        <td class="border px-4 py-2 capitalize"> /
                                        </td>

                                        <td class="border px-4 py-2">
                                            <a href="{{ route('penduduk.show', $item->hashid) }}"
                                                class="w-8 h-8 bg-info-100 dark:bg-info-600/25 text-info-600 dark:text-info-400 rounded-full inline-flex items-center justify-center">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                            <a href="{{ route('penduduk.edit', $item->hashid) }}"
                                                class="w-8 h-8 bg-success-100 dark:bg-success-600/25 text-success-600 dark:text-success-400 rounded-full inline-flex items-center justify-center">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>

                                            <button data-delete-url="{{ route('penduduk.destroy', $item->hashid) }}"
                                                data-modal-target="global-delete-modal"
                                                data-modal-toggle="global-delete-modal"
                                                class="w-8 h-8 bg-danger-100 dark:bg-danger-600/25 text-danger-600 dark:text-danger-400 rounded-full inline-flex items-center justify-center">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>

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
    <div id="global-delete-modal" tabindex="-1"
        class="hidden fixed top-0 left-0 right-0 z-50 justify-center items-center w-full overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button"
                    class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="global-delete-modal">
                    <svg class="w-3 h-3" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1L13 13M13 1L1 13"></path>
                    </svg>
                    <span class="sr-only">Close</span>
                </button>
                <div class="p-4 md:p-5 text-center">
                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"></path>
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                        Apakah Anda yakin ingin menghapus data ini?</h3>
                    <form method="POST" id="delete-form" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                            Ya, hapus
                        </button>
                    </form>
                    <button data-modal-hide="global-delete-modal" type="button"
                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                        Batal
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        let table = null
        table = $('#table-surat').DataTable()

        $(document).on('click', '[data-delete-url]', function(e) {
            e.preventDefault();
            const deleteUrl = $(this).data('delete-url');
            document.getElementById('delete-form').setAttribute('action', deleteUrl);


            const modal = FlowbiteInstances.getInstance('Modal', 'global-delete-modal');
            modal.show();
        });
    </script>
@endsection
