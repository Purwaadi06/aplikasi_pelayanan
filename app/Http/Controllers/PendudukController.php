<?php

namespace App\Http\Controllers;

use App\Models\RT;
use App\Models\RW;
use App\Models\Penduduk;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class PendudukController extends Controller
{
    // Menampilkan semua data penduduk
    public function index()
    {

        $penduduks = null;
        if (auth()->user()->role == 'admin') {

            $penduduks = Penduduk::whereHas('rt.rw')->get();
        } else {
            $penduduks = Penduduk::whereHas('rt.rw')->where('rw_id', auth()->user()->rw_id)->get();
        }
        return view('admin.penduduk.index', compact('penduduks'));
    }

    // Menampilkan form tambah data penduduk
    public function create()
    {
        $rw = RW::all();
        $rt = RT::all();
        return view('admin.penduduk.create', compact('rw', 'rt'));
    }

    // Menyimpan data penduduk ke database
    public function store(Request $request)
    {
        $request->merge([
            'tanggal_lahir' => \Carbon\Carbon::createFromFormat('d-m-Y', $request->tanggal_lahir)->format('Y-m-d'),
        ]);
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|numeric|digits:16|unique:tb_penduduk,nik',
            'no_kk' => 'required|numeric|digits:16',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date|before:today',
            'agama' => 'required|string|max:50',
            'pekerjaan' => 'required|string|max:100',
            'status_perkawinan' => 'required|string|max:100',
            'alamat' => 'required|string|max:255',
            'rw_id' => 'required|exists:tb_rw,id',
            'rt_id' => 'required|exists:tb_rt,id',
        ]);


        Penduduk::create($validated);

        return redirect()->route('penduduk.index')->with('toast_success', 'Data penduduk berhasil ditambahkan!');
    }

    // Menampilkan form edit data penduduk
    public function edit(Penduduk $penduduk)
    {
        $rw = RW::all();
        $rt = RT::all();
        return view('admin.penduduk.edit', compact('penduduk', 'rw', 'rt'));
    }

    // Mengupdate data penduduk
    public function update(Request $request, Penduduk $penduduk)
    {

        $request->merge([
            'tanggal_lahir' => \Carbon\Carbon::createFromFormat('d-m-Y', $request->tanggal_lahir)->format('Y-m-d'),
        ]);
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => [
                'required',
                'numeric',
                'digits_between:8,20',
                Rule::unique('tb_penduduk', 'nik')->ignore($penduduk->id), // ini kuncinya
            ],
            'no_kk' => 'required|numeric|digits:16',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date|before:today',
            'agama' => 'required|string|max:50',
            'pekerjaan' => 'required|string|max:100',
            'status_perkawinan' => 'required|string|max:100',
            'alamat' => 'required|string|max:255',
            'rw_id' => 'required|exists:tb_rw,id',
            'rt_id' => 'required|exists:tb_rt,id',
        ]);
        $penduduk->update($validated);

        return redirect()->route('penduduk.index')->with('toast_success', 'Data penduduk berhasil diperbarui!');
    }
    // Menghapus data penduduk
    public function destroy(Penduduk $penduduk)
    {
        $penduduk->delete();

        return redirect()->route('penduduk.index')->with('toast_success', 'Data penduduk berhasil dihapus!');
    }

    // Menampilkan detail data penduduk
    public function show(Penduduk $penduduk)
    {
        // $penduduk->load('rt.rw');
        // dd($penduduk);
        if (!$penduduk) {
            return redirect()->route('admin.penduduk.index')->with('error', 'Data tidak ditemukan.');
        }

        return view('admin.penduduk.show', compact('penduduk'));
    }
}
