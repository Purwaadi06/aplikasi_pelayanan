<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penduduk;
use App\Models\Surat;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'totalPenduduk' => Penduduk::count(),
            'totalPermintaanSurat' => Surat::where('status', 'diproses')->count(),
            'data' => Surat::all(),
            'totalSuratSelesai' => Surat::where('status', 'selesai')->count(),
        ]);
    }
}
