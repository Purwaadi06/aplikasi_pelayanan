@extends('layouts.app', ['title' => 'Data Penduduk', 'activeMenu' => 'penduduk', 'icon' => 'fa6-solid:users-line'])

@section('content')
    <div class="grid grid-cols-1 xl:grid-cols-12 gap-6 mt-6">

        <div class="xl:col-span-12 2xl:col-span-12">
            <div class="card h-full border-0">
                <div class="card-body p-6">



                    <div class="p-6 rounded shadow">




                        <form action="{{ route('surat_keterangan.store') }}" method="POST" id="form-surat">
                            @csrf

                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="form-label block mb-1">Pilih Penduduk</label>
                                    <select id="penduduk" name="penduduk_id" class="form-control">
                                        <option value="" disabled selected>--Pilih Warga--</option>
                                        @foreach ($penduduk as $item)
                                            <option value="{{ $item->id }}">{{ $item->nik }} - {{ $item->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div id="detail-penduduk"
                                class="mt-6 hidden p-6 border rounded-xl bg-gray-50 dark:bg-gray-800 text-[15px] leading-relaxed shadow-sm">
                                <h6
                                    class="text-lg font-bold mb-5 text-gray-800 dark:text-white border-b border-gray-300 dark:border-gray-600 pb-2">
                                    <i class="fa-solid fa-user"></i> Detail Penduduk
                                </h6>
                                <div
                                    class="grid grid-cols-1 md:grid-cols-2 gap-y-4 gap-x-6 text-gray-900 dark:text-gray-100">
                                    <div><span class="font-medium text-gray-600 dark:text-gray-300">NIK:</span> <span
                                            id="d-nik" class="font-semibold"></span></div>
                                    <div><span class="font-medium text-gray-600 dark:text-gray-300">Nama:</span> <span
                                            id="d-nama" class="font-semibold"></span></div>
                                    <div><span class="font-medium text-gray-600 dark:text-gray-300">No KK:</span> <span
                                            id="d-kk" class="font-semibold"></span></div>
                                    <div><span class="font-medium text-gray-600 dark:text-gray-300">Jenis Kelamin:</span>
                                        <span id="d-jk" class="font-semibold"></span>
                                    </div>
                                    <div><span class="font-medium text-gray-600 dark:text-gray-300">Tempat, Tanggal
                                            Lahir:</span> <span id="d-ttl" class="font-semibold"></span></div>
                                    <div><span class="font-medium text-gray-600 dark:text-gray-300">Agama:</span> <span
                                            id="d-agama" class="font-semibold"></span></div>
                                    <div><span class="font-medium text-gray-600 dark:text-gray-300">Pekerjaan:</span> <span
                                            id="d-pekerjaan" class="font-semibold"></span></div>
                                    <div><span class="font-medium text-gray-600 dark:text-gray-300">Status
                                            Perkawinan:</span> <span id="d-status" class="font-semibold"></span></div>
                                    <div class="md:col-span-2"><span
                                            class="font-medium text-gray-600 dark:text-gray-300">Alamat:</span> <span
                                            id="d-alamat" class="font-semibold"></span></div>
                                </div>
                            </div>


                            <div class="mt-4">
                                <label class="form-label block mb-1">Dibuat untuk</label>
                                <select id="dibuat-untuk" name="dibuat_untuk" class="form-control">
                                    <option value="diri-sendiri">Diri Sendiri</option>
                                    <option value="orang-lain">Orang Lain</option>
                                </select>
                            </div>


                            <div id="pilih-orang-lain" class="mt-4 hidden">
                                <label class="form-label block mb-1">Pilih Penduduk</label>
                                <select id="penduduk-lain" name="penduduk_lain_id" class="form-control">
                                    <option value="" disabled selected>--Pilih Warga--</option>
                                    @foreach ($penduduk as $item)
                                        <option value="{{ $item->id }}">{{ $item->nik }} - {{ $item->nama }}
                                        </option>
                                    @endforeach
                                </select>


                                <div id="detail-orang-lain"
                                    class="mt-6 hidden p-6 border rounded-xl bg-gray-50 dark:bg-gray-800 text-[15px] leading-relaxed shadow-sm">
                                    <h6
                                        class="text-lg font-bold mb-5 text-gray-800 dark:text-white border-b border-gray-300 dark:border-gray-600 pb-2">
                                        <i class="fa-solid fa-user"></i> Detail Penduduk Lain
                                    </h6>
                                    <div
                                        class="grid grid-cols-1 md:grid-cols-2 gap-y-4 gap-x-6 text-gray-900 dark:text-gray-100">
                                        <div><span class="font-medium text-gray-600 dark:text-gray-300">NIK:</span> <span
                                                id="ol-nik" class="font-semibold"></span></div>
                                        <div><span class="font-medium text-gray-600 dark:text-gray-300">Nama:</span> <span
                                                id="ol-nama" class="font-semibold"></span></div>
                                        <div><span class="font-medium text-gray-600 dark:text-gray-300">No KK:</span> <span
                                                id="ol-kk" class="font-semibold"></span></div>
                                        <div><span class="font-medium text-gray-600 dark:text-gray-300">Jenis
                                                Kelamin:</span>
                                            <span id="ol-jk" class="font-semibold"></span>
                                        </div>
                                        <div><span class="font-medium text-gray-600 dark:text-gray-300">Tempat, Tanggal
                                                Lahir:</span> <span id="ol-ttl" class="font-semibold"></span></div>
                                        <div><span class="font-medium text-gray-600 dark:text-gray-300">Agama:</span> <span
                                                id="ol-agama" class="font-semibold"></span></div>
                                        <div><span class="font-medium text-gray-600 dark:text-gray-300">Pekerjaan:</span>
                                            <span id="ol-pekerjaan" class="font-semibold"></span>
                                        </div>
                                        <div><span class="font-medium text-gray-600 dark:text-gray-300">Status
                                                Perkawinan:</span> <span id="ol-status" class="font-semibold"></span></div>
                                        <div class="md:col-span-2"><span
                                                class="font-medium text-gray-600 dark:text-gray-300">Alamat:</span> <span
                                                id="ol-alamat" class="font-semibold"></span></div>
                                    </div>
                                </div>
                            </div>


                            <div id="form-surat-lanjutan" class="mt-6 hidden">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-5">
                                    <div class="relative z-0 w-full mb-5 group">
                                        <select id="tipe_surat" name="tipe_surat"
                                            class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 appearance-none dark:bg-[rgb(39_49_66/_var(--tw-bg-opacity))] dark:text-white @error('jenis_surat_id') dark:border-red-500 !border-red-600 dark:focus:border-red-500 focus:border-red-600 @else border-gray-300 dark:border-gray-600 focus:border-blue-600 dark:focus:border-blue-500 @enderror focus:outline-none focus:ring-0 peer">
                                            <option value="" disabled selected>--Pilih Tipe Surat--</option>
                                            <option value="pengantar">Pengantar</option>
                                            <option value="keterangan">Keterangan</option>
                                        </select>
                                        <label for="rt"
                                            class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-[rgb(39_49_66/_var(--tw-bg-opacity))] px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
                                            Jenis Surat
                                        </label>
                                    </div>
                                    <div class="relative z-0 w-full mb-5 group">
                                        <select id="jenis_surat_id" name="jenis_surat_id"
                                            class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 appearance-none dark:bg-[rgb(39_49_66/_var(--tw-bg-opacity))] dark:text-white @error('jenis_surat_id') dark:border-red-500 !border-red-600 dark:focus:border-red-500 focus:border-red-600 @else border-gray-300 dark:border-gray-600 focus:border-blue-600 dark:focus:border-blue-500 @enderror focus:outline-none focus:ring-0 peer">
                                            <option value="" disabled selected>--Pilih Surat--</option>
                                            {{-- <option value="tes" data-chained="pengantar">Tes</option> --}}
                                            @foreach ($tipeSurat as $value)
                                                <option value="{{ $value->id }}" data-chained="{{ $value->kategori }}">
                                                    Surat {{ ucwords($value->kategori) . ' ' . $value->nama_surat }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label for="rt"
                                            class="absolute text-sm @error('jenis_surat_id') text-red-600 dark:text-red-500 @else text-gray-500 dark:text-gray-400 @enderror duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-[rgb(39_49_66/_var(--tw-bg-opacity))] px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
                                            Tipe Surat
                                        </label>
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-5">

                                    <div class="hidden" id="form-penghasilan">
                                        <div class="relative z-0 w-full mb-5 group">

                                            <label for="penghasilan_value"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Penghasilan</label>
                                            <div class="flex">
                                                <span
                                                    class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                                    Rp.
                                                </span>
                                                <input type="text" id="penghasila_value" name="penghasilan_value"
                                                    data-hidden-target="#penghasilan"
                                                    class="format-number rounded-none rounded-e-lg border-gray-300 px-2.5 pb-2.5 pt-4 w-full text-sm bg-white dark:bg-[rgb(39_49_66/_var(--tw-bg-opacity))] px-2 peer-focus:px-2 "
                                                    placeholder="1.000.000">
                                                <input type="hidden" name="penghasilan" id="penghasilan">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="relative z-0 w-full mb-5 group">
                                        <textarea name="keperluan" rows="3"
                                            class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 appearance-none dark:text-white @error('keperluan') dark:border-red-500 !border-red-600 dark:focus:border-red-500 focus:border-red-600 @else border-gray-300 dark:border-gray-600 focus:border-blue-600 dark:focus:border-blue-500 @enderror focus:outline-none focus:ring-0 peer"
                                            placeholder=" " required></textarea>
                                        <label
                                            class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-[rgb(39_49_66/_var(--tw-bg-opacity))] px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 start-1">
                                            Keperluan
                                        </label>
                                        @error('keperluan')
                                            <p class="mt-2 text-xs text-red-600 dark:text-red-400">
                                                <span class="font-medium">{{ $message }}</span>
                                            </p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-5">
                                    <div class="relative z-0 w-full mb-5 group">
                                        <label class="form-label block mb-1">Foto KTP</label>
                                        <input type="file" class="filepond" name="ktp">
                                    </div>
                                    <div class="relative z-0 w-full mb-5 group">

                                        <label class="form-label block mb-1">Foto Kartu Keluarga</label>
                                        <input type="file" class="filepond" name="kk">
                                    </div>
                                </div>

                                <div class="flex justify-start">
                                    <button type="submit"
                                        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-md shadow transition">
                                        Simpan
                                    </button>
                                </div>
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
            setupNumberFormatting()

            $('#penduduk').select2({
                theme: 'classic',
                dropdownAutoWidth: true,
                width: '100%',
            });
            $('#penduduk-lain').select2({
                theme: 'classic',
                dropdownAutoWidth: true,
                width: '100%',
            });
            $('#penduduk').on('select2:open', applyTailwindStyle);
            $('#penduduk-lain').on('select2:open', applyTailwindStyle);
            applyTailwindStyle();
            $('#jenis_surat_id').chained('#tipe_surat');
        });
    </script>
    <script>
        function tampilkanDetail(selectorPrefix, data) {
            $(`${selectorPrefix}-nik`).text(data.nik);
            $(`${selectorPrefix}-nama`).text(data.nama);
            $(`${selectorPrefix}-kk`).text(data.no_kk);
            $(`${selectorPrefix}-jk`).text(data.jenis_kelamin);
            $(`${selectorPrefix}-ttl`).text(`${data.tempat_lahir}, ${data.tanggal_lahir_format}`);
            $(`${selectorPrefix}-agama`).text(data.agama);
            $(`${selectorPrefix}-pekerjaan`).text(data.pekerjaan);
            $(`${selectorPrefix}-status`).text(data.status_perkawinan);
            $(`${selectorPrefix}-alamat`).text(data.alamat);
        }

        $(document).ready(function() {
            // $('#penduduk').select2();
            // $('#penduduk-lain').select2();

            $('#penduduk').on('change', function() {
                let id = $(this).val();
                // $('#penduduk-lain').val('');



                $('#penduduk-lain option').each(function() {
                    $(this).prop('disabled', false);
                });


                $('#penduduk-lain option').each(function() {
                    if ($(this).val() === '') {
                        $(this).prop('disabled', true);

                    }
                    if ($(this).val() === id) {
                        $(this).prop('disabled', true);
                    }
                });
                $.ajax({
                    url: `{{ url('api/cek-nik') }}`,
                    method: 'POST',
                    data: {
                        'filter[]': 'id',
                        'filterValue[]': id,
                        '_token': '{{ csrf_token() }}'
                    },
                    success: function(res) {
                        tampilkanDetail('#d', res.data[0]);
                        $('#detail-penduduk').removeClass('hidden');
                        $('#form-surat-lanjutan').removeClass('hidden');
                    }
                })

            });

            $('#jenis_surat_id').on('change', function() {
                let valId = $(this).val();

                if (valId == 1) {
                    $('#form-penghasilan').removeClass('hidden')
                } else {
                    $('#form-penghasilan').addClass('hidden')

                }
            })

            $('#dibuat-untuk').on('change', function() {
                let val = $(this).val();
                if (val === 'orang-lain') {
                    $('#pilih-orang-lain').removeClass('hidden');
                    $('#form-surat-lanjutan').addClass('hidden');
                } else {
                    $('#pilih-orang-lain').addClass('hidden');
                    $('#detail-orang-lain').addClass('hidden');
                    $('#form-surat-lanjutan').removeClass('hidden');
                }
            });

            $('#penduduk-lain').on('change', function() {
                let id = $(this).val();
                $.ajax({
                    url: `{{ url('api/cek-nik') }}`,
                    method: 'POST',
                    data: {
                        'filter[]': 'id',
                        'filterValue[]': id,
                        '_token': '{{ csrf_token() }}'
                    },
                    success: function(res) {
                        tampilkanDetail('#ol', res.data[0]);
                        $('#detail-orang-lain').removeClass('hidden');
                        $('#form-surat-lanjutan').removeClass('hidden');
                    }
                })
            });
        });
    </script>
@endsection
