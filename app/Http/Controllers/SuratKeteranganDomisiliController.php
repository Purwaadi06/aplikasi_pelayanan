<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratKeteranganDomisili;
use App\Models\Penduduk;

class SuratKeteranganDomisiliController extends Controller
{
    public function index()
    {
        $suratDomisili = SuratKeteranganDomisili::all();
        return view('surat_domisili.index', compact('suratDomisili'));
    }

    public function create()
    {
        $penduduks = Penduduk::all(); // jika kamu ingin memilih NIK dari data penduduk
        return view('surat_domisili.create', compact('penduduks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Fjenis_Surat' => 'required|string',
            'FNO_Surat' => 'required|string|unique:tb_surat_keterangan_domisili,FNO_Surat',
            'FNIK' => 'required|string|exists:tb_penduduk,FNIK',
            'FTGL_Surat' => 'required|date',
            'FSTATUS_Surat' => 'required|string',
        ]);

        SuratKeteranganDomisili::create([
            'Fjenis_Surat' => $request->Fjenis_Surat,
            'FNO_Surat' => $request->FNO_Surat,
            'FNIK' => $request->FNIK,
            'FTGL_Surat' => $request->FTGL_Surat,
            'FSTATUS_Surat' => $request->FSTATUS_Surat,
        ]);

        return redirect()->route('suratdomisili.index')->with('success', 'Surat berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $surat = SuratKeteranganDomisili::findOrFail($id);
        $penduduks = Penduduk::all();
        return view('surat_domisili.edit', compact('surat', 'penduduks'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Fjenis_Surat' => 'required|string',
            'FNO_Surat' => 'required|string|unique:tb_surat_keterangan_domisili,FNO_Surat,' . $id . ',FK_id_Surat',
            'FNIK' => 'required|string|exists:tb_penduduk,FNIK',
            'FTGL_Surat' => 'required|date',
            'FSTATUS_Surat' => 'required|string',
        ]);

        $surat = SuratKeteranganDomisili::findOrFail($id);

        $surat->update([
            'Fjenis_Surat' => $request->Fjenis_Surat,
            'FNO_Surat' => $request->FNO_Surat,
            'FNIK' => $request->FNIK,
            'FTGL_Surat' => $request->FTGL_Surat,
            'FSTATUS_Surat' => $request->FSTATUS_Surat,
        ]);

        return redirect()->route('suratdomisili.index')->with('success', 'Surat berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $surat = SuratKeteranganDomisili::findOrFail($id);
        $surat->delete();

        return redirect()->route('suratdomisili.index')->with('success', 'Surat berhasil dihapus.');
    }
}
