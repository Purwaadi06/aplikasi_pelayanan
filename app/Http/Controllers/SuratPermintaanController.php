<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratPermintaan;

class SuratPermintaanController extends Controller
{
    public function index()
    {
        $data = SuratPermintaan::all();
        return view('surat_permintaan.index', compact('data'));
    }

    public function create()
    {
        return view('surat_permintaan.create');
    }

    public function store(Request $request)
    {
        SuratPermintaan::create($request->all());
        return redirect()->route('surat_permintaan.index');
    }

    // public function show($id)
    // {
    //     $permintaan = SuratPermintaan::findOrFail($id);  // Mengambil data permintaan berdasarkan ID
    //     return view('surat_permintaan.show', compact('permintaan'));  // Menampilkan data ke view
    // }

    public function show($id)
{
    $permintaan = SuratPermintaan::findOrFail($id);
    return view('surat_permintaan.show', compact('permintaan'));
}

}
