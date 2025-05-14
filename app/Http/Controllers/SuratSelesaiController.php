<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\SuratSelesai;
use App\Models\SuratPermintaan;

class SuratSelesaiController extends Controller
{
    public function index()
    {
        $data = SuratSelesai::with('permintaan')->get();
        return view('surat_selesai.index', compact('data'));
    }

    public function create()
    {
        $permintaan = SuratPermintaan::where('status', 'diproses')->get();
        return view('surat_selesai.create', compact('permintaan'));
    }

    public function store(Request $request)
    {
        $selesai = SuratSelesai::create($request->all());

        // Update status permintaan
        $selesai->permintaan->update(['status' => 'selesai']);

        return redirect()->route('surat_selesai.index');
    }
}
