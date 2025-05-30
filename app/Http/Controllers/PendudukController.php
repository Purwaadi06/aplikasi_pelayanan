<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PendudukController extends Controller
{
    // Menampilkan semua data penduduk
    public function index()
    {
        $penduduks = DB::table('tb_penduduk')->get();
        return view('penduduk.index', compact('penduduks'));
    }

    // Menampilkan form tambah data penduduk
    public function create()
    {
        return view('penduduk.create');
    }

    // Menyimpan data penduduk ke database
    public function store(Request $request)
    {
        $request->validate([
            'FNIK' => 'required|unique:tb_penduduk,FNIK',
            'FNO_KK' => 'required',
            'FNAMA' => 'required',
            'FTMP_LAHIR' => 'required',
            'FTGL_LAHIR' => 'required|date',
            'FKEL' => 'required',
            'FAGAMA' => 'required',
            'FALAMAT' => 'required',
            'FPENDIDIKAN' => 'required',
            'FPEKERJAAN' => 'required',
            'FSTATUS' => 'required',
            'FSTATUS_KEL' => 'required',
            'FKEWARGANEGARAAN' => 'required',
            'FNAMA_AYAH' => 'required',
            'FNAMA_IBU' => 'required',
        ]);

        DB::table('tb_penduduk')->insert($request->except('_token'));

        return redirect()->route('penduduk.index')->with('success', 'Data penduduk berhasil ditambahkan!');
    }

    // Menampilkan form edit data penduduk
    public function edit($FNIK)
    {
        $penduduk = DB::table('tb_penduduk')->where('FNIK', $FNIK)->first();
        return view('penduduk.edit', compact('penduduk'));
    }

    // Mengupdate data penduduk
    public function update(Request $request, $FNIK)
{
    $request->validate([
        'FNIK' => 'required|unique:tb_penduduk,FNIK,' . $FNIK . ',FNIK',
        'FNO_KK' => 'required',
        'FNAMA' => 'required',
        'FTMP_LAHIR' => 'required',
        'FTGL_LAHIR' => 'required|date',
        'FKEL' => 'required',
        'FAGAMA' => 'required',
        'FALAMAT' => 'required',
        'FPENDIDIKAN' => 'required',
        'FPEKERJAAN' => 'required',
        'FSTATUS' => 'required',
        'FSTATUS_KEL' => 'required',
        'FKEWARGANEGARAAN' => 'required',
        'FNAMA_AYAH' => 'required',
        'FNAMA_IBU' => 'required',
    ]);

    DB::table('tb_penduduk')->where('FNIK', $FNIK)->update($request->except('_token', '_method'));

    return redirect()->route('penduduk.index')->with('success', 'Data penduduk berhasil diperbarui!');
}
    // Menghapus data penduduk
    public function destroy($FNIK)
    {
        DB::table('tb_penduduk')->where('FNIK', $FNIK)->delete();

        return redirect()->route('penduduk.index')->with('success', 'Data penduduk berhasil dihapus!');
    }

    // Menampilkan detail data penduduk
    public function show($FNIK)
    {
        $penduduk = DB::table('tb_penduduk')->where('FNIK', $FNIK)->first();

        if (!$penduduk) {
            return redirect()->route('penduduk.index')->with('error', 'Data tidak ditemukan.');
        }

        return view('penduduk.show', compact('penduduk'));
    }
}
