<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penduduk;
use App\Models\Surat;

class AdminController extends Controller
{
    public function index()
    {

        $totalPenduduk = auth()->user()->role == 'rw' ? Penduduk::where('rw_id', auth()->user()->rw_id)->count() : Penduduk::count();
        $totalPermintaanSurat = auth()->user()->role == 'rw' ? Surat::where('status', 'diproses')->where('rw_user_id', auth()->user()->rw->id)->count() : Surat::where('status', 'diproses')->count();
        $data = auth()->user()->role == 'rw' ? Surat::where('status', 'diproses')->where('rw_user_id', auth()->user()->rw->id)->get() : Surat::where('status', 'diproses')->get();
        $totalSuratSelesai = auth()->user()->role == 'rw' ? Surat::where('status', 'disetujui')->where('rw_user_id', auth()->user()->rw->id)->count() : Surat::where('status', 'disetujui')->count();


        return view('admin.dashboard', [
            'totalPenduduk' => $totalPenduduk,
            'totalPermintaanSurat' => $totalPermintaanSurat,
            'data' => $data,
            'totalSuratSelesai' => $totalSuratSelesai,
        ]);
    }
}
