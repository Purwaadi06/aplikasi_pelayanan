<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SuratPermintaan; // Sesuaikan dengan nama model kamu

class UserDashboardController extends Controller
{
    public function index()
    {
        // Ambil semua data SuratPermintaan beserta relasi penduduk
        $userNik = Auth::user()->nik;

        $data = SuratPermintaan::with('penduduk')
        ->where('nik', $userNik)
        ->get();

    return view('user-dashboard', compact('data'));
    }
    public function userDashboard()
    {
        $nik = Auth::user()->nik; // Asumsikan kolom nik ada di tabel users
        $suratUser = SuratPermintaan::where('nik', $nik)->get();

        return view('user-dashboard', compact('suratUser'));
    }
}

