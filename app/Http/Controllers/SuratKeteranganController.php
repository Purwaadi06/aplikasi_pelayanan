<?php

// app/Http/Controllers/SuratKeteranganController.php

namespace App\Http\Controllers;

use App\Models\SuratKeterangan;
use Illuminate\Http\Request;

class SuratKeteranganController extends Controller
{
    // Menampilkan daftar surat
    public function index()
    {
        $surats = SuratKeterangan::all();
        return view('surat_keterangan.index', compact('surats'));
    }

    // Menampilkan form untuk membuat surat
    public function create()
    {
        return view('surat_keterangan.create');
    }

    // Menyimpan surat yang baru
    public function store(Request $request)
    {
        $request->validate([
            'no_surat' => 'required',
            'jenis_surat' => 'required',
            'nik' => 'required',
            'keperluan' => 'required',
            'tanggal' => 'required|date',
        ]);

        SuratKeterangan::create($request->all());

        return redirect()->route('surat_keterangan.index')->with('success', 'Surat keterangan berhasil dibuat');
    }

    // Menampilkan form edit surat
    public function edit($id)
    {
        $surat = SuratKeterangan::findOrFail($id);
        return view('surat_keterangan.edit', compact('surat'));
    }

    // Mengupdate surat yang ada
    public function update(Request $request, $id)
    {
        $request->validate([
            'no_surat' => 'required',
            'jenis_surat' => 'required',
            'nik' => 'required',
            'keperluan' => 'required',
            'tanggal' => 'required|date',
        ]);

        $surat = SuratKeterangan::findOrFail($id);
        $surat->update($request->all());

        return redirect()->route('surat_keterangan.index')->with('success', 'Surat keterangan berhasil diperbarui');
    }

    // Menghapus surat
    public function destroy($id)
    {
        $surat = SuratKeterangan::findOrFail($id);
        $surat->delete();

        return redirect()->route('surat_keterangan.index')->with('success', 'Surat keterangan berhasil dihapus');
    }

    // Menampilkan surat untuk dicetak
    public function cetak($id)
    {
        $surat = SuratKeterangan::findOrFail($id);
        $viewName = $this->getPrintView($surat->jenis_surat);

        return view($viewName, compact('surat'));
    }

    // Menentukan view yang sesuai berdasarkan jenis surat
    private function getPrintView($jenisSurat)
    {
        $views = [
            'domisili' => 'surat_keterangan.cetak.domisili',
            'tidak_mampu' => 'surat_keterangan.cetak.tidak_mampu',
            'kematian' => 'surat_keterangan.cetak.kematian',
            'belum_menikah' => 'surat_keterangan.cetak.belum_menikah',
            'pindah' => 'surat_keterangan.cetak.pindah_domisili',
        ];

        return $views[$jenisSurat] ?? 'surat_keterangan.cetak.domisili'; // Default ke domisili jika jenis surat tidak dikenali
    }
}


