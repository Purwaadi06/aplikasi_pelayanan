<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratPermintaan;
use App\Models\Penduduk;

class SuratPermintaanController extends Controller
{
    // Tampilkan semua data surat permintaan
    public function index()
    {
        $data = SuratPermintaan::with('penduduk')->get();
        return view('surat_permintaan.index', compact('data'));
    }

    // Form create
    public function create()
    {
    $penduduks = Penduduk::all(); // Ambil semua data dari tabel tb_penduduk
    return view('surat_permintaan.create', compact('penduduks'));
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

        return redirect()->route('surat_permintaan.index')->with('success', 'Surat berhasil disimpan.');
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
}

