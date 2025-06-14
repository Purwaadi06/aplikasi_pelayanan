@extends('layouts.app', ['title' => 'Data Penduduk', 'activeMenu' => 'penduduk', 'icon' => 'fa6-solid:users-line'])

@section('content')
    <div class="grid grid-cols-1 xl:grid-cols-12 gap-6 mt-6">

        <div class="xl:col-span-12 2xl:col-span-12">
            <div class="card h-full border-0">
                <div class="card-body p-6">



                    <div class="p-6 rounded shadow">
                        <a href="{{ route('rt.create') }}"
                            class=" bg-blue-600 hover:bg-blue-700 text-white font-medium px-4 py-1 rounded transition duration-300 flex items-center gap-2 w-[155px]">
                            <iconify-icon icon="fa6-solid:plus" class="icon"></iconify-icon>
                            <span>Tambah Data</span>
                        </a>

                        <h2 class="text-xl font-semibold mb-4 mt-10 text-gray-700">Data RT</h2>
                        <table class="table-auto w-full border border-gray-300 text-sm" id="table-surat">
                            <thead class="bg-gray-200 text-left">
                                <tr>
                                    <th class="border px-4 py-2">No</th>
                                    <th class="border px-4 py-2">RT</th>
                                    <th class="border px-4 py-2">RW</th>
                                    <th class="border px-4 py-2">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($rt as $item)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                                        <td class="border px-4 py-2">{{ $item->nama_rt }}</td>
                                        <td class="border px-4 py-2">{{ $item->rw->nama_rw }}</td>
                                        <td class="border px-4 py-2">
                                            <a href="{{ route('rt.edit', $item->id) }}"
                                                class="w-8 h-8 bg-success-100 dark:bg-success-600/25 text-success-600 dark:text-success-400 rounded-full inline-flex items-center justify-center">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            {{-- <button onclick="openDeleteModal('{{ route('rt.destroy', $item->id) }}')"
                                                data-modal-target="global-delete-modal"
                                                data-modal-toggle="global-delete-modal"
                                                class="w-8 h-8 bg-danger-100 dark:bg-danger-600/25 text-danger-600 dark:text-danger-400 rounded-full inline-flex items-center justify-center">
                                                <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                            </button> --}}
                                            <a href="javascript:void(0)" data-modal-target="global-delete-modal"
                                                data-modal-toggle="global-delete-modal"
                                                class="w-8 h-8 bg-danger-100 dark:bg-danger-600/25 text-danger-600 dark:text-danger-400 rounded-full inline-flex items-center justify-center">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>
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
        $(document).ready(function() {
            let table = null
            table = $('#table-surat').DataTable()
        })

        function openDeleteModal(deleteUrl) {
            document.getElementById('delete-form').setAttribute('action', deleteUrl);
        }
        // if (document.getElementById("table-surat") && typeof simpleDatatables.DataTable !== 'undefined') {
        //     let table = null
        //     const dataTableOptions = {
        //         columns: [{
        //                 select: [0, 3],
        //                 sortable: false,
        //                 searchable: false
        //             } // Disable sorting on the first column (index 0 and 6)
        //         ],
        //     }
        //     table = new simpleDatatables.DataTable("#table-surat", dataTableOptions);
        //     console.log(table)
        // }
    </script>
@endsection
