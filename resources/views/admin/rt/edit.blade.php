@extends('layouts.app', ['title' => 'Data RT', 'activeMenu' => 'rt', 'icon' => 'fa6-solid:users-line'])

@section('content')
    <div class="grid grid-cols-1 xl:grid-cols-12 gap-6 mt-6">

        <div class="xl:col-span-12 2xl:col-span-12">
            <div class="card h-full border-0">
                <div class="card-body p-6">



                    <div class="p-6 rounded shadow">

                        <h5>Tambah Data RT</h5>
                        </a>

                        <form action="{{ route('rt.update', $rt->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="form-label block mb-1">RT</label>
                                    <input type="text" class="form-control w-full" placeholder="Contoh : RT 001"
                                        name="nama_rt" value="{{ $rt->nama_rt }}">
                                </div>
                                <div>
                                    <label class="form-label block mb-1">RW</label>
                                    @if (auth()->user()->role == 'rw' && auth()->user()->rw_id == null)
                                        <input type="text" class="form-control" name="rw_id"
                                            value="{{ auth()->user()->rw->nama_rw }}">
                                    @else
                                        <select name="rw_id" id="" class="form-control">
                                            <option value="" disabled selected>Pilih RW</option>
                                            @foreach ($rw as $item)
                                                <option value="{{ $item->id }} "
                                                    @if ($rt->rw_id == $item->id) selected @endif>
                                                    {{ $item->nama_rw }}</option>
                                            @endforeach
                                        </select>
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
