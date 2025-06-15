<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use App\Models\TipeSurat;
use Illuminate\Http\Request;
use App\Models\SuratPermintaan;
use Illuminate\Support\Facades\Auth;

class SuratPermintaanController extends Controller
{
    // Tampilkan semua data surat permintaan
    public function index()
    {
        $pengajuanSurat = SuratPermintaan::with('penduduk.rt.rw')->get();
        return view('admin.surat_permintaan.index', compact('pengajuanSurat'));
    }

    // Form create
    public function create()
    {
        $penduduk = null;
        if (auth()->user()->role == 'admin') {

            $penduduk = Penduduk::whereHas('rt.rw')->get();
        } else {
            $penduduk = Penduduk::whereHas('rt.rw')->where('rw_id', auth()->user()->rw_id)->get();
        }
        $tipeSurat = TipeSurat::all();
        return view('admin.surat_permintaan.create', compact('penduduk', 'tipeSurat'));
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|exists:tb_penduduk,FNIK',
            'jenis_surat' => 'required',
            'keperluan' => 'required',
        ]);

        SuratPermintaan::create($request->all());

        return redirect()->route('admin.surat_permintaan.index')->with('success', 'Surat berhasil disimpan.');
    }

    // Form edit
    public function edit($id)
    {
        $data = SuratPermintaan::findOrFail($id);
        $penduduks = Penduduk::all();
        return view('admin.surat_permintaan.edit', compact('data', 'penduduks'));
    }

    // API untuk ambil data penduduk berdasarkan NIK (dipakai AJAX)
    public function getPendudukByNIK($nik)
    {
        $penduduk = Penduduk::where('FNIK', $nik)->first();

        if (!$penduduk) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        return response()->json($penduduk);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nik' => 'required|exists:tb_penduduk,FNIK',
            'jenis_surat' => 'required',
            'keperluan' => 'required',
            'status' => 'required|in:diproses,selesai',
        ]);

        $surat = SuratPermintaan::findOrFail($id);
        $surat->update($request->all());

        return redirect()->route('admin.surat_permintaan.index')->with('success', 'Surat berhasil diperbarui.');
    }
    public function userDashboard()
    {
        $nik = Auth::user()->nik; // pastikan 'nik' ada di tabel users
        $suratUser = SuratPermintaan::where('nik', $nik)->get();

        return view('user-dashboard', compact('suratUser'));
    }
}
