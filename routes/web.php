<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\RTController;
use App\Http\Controllers\SuratKeteranganController;
use App\Http\Controllers\SuratPermintaanController;
use App\Http\Controllers\SuratSelesaiController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Middleware\RoleMiddleware;

/*
|----------------------------------------------------------------------
| Web Routes
|----------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
})->middleware('guest')->name('index');

// Rute untuk Admin (dashboard admin)
Route::get('/dashboard', [AdminController::class, 'index'])->middleware(['auth', 'verified', 'role:admin,rw'])->name('dashboard');

// // Rute untuk User (user dashboard)
// Route::get('/user-dashboard', [UserDashboardController::class, 'index'])
//     ->middleware(['auth', 'verified', 'role:user'])
//     ->name('user.dashboard');
// Rute Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/penduduk',  PendudukController::class)->middleware(['role:admin'])->except(['index', 'show']);
    Route::resource('/penduduk',  PendudukController::class)->middleware(['role:admin'])->only(['index', 'show']);
    Route::resource('/rt',  RTController::class)->middleware(['role:admin'])->except(['index', 'show']);
    Route::resource('/rt',  RTController::class)->middleware(['role:admin'])->only(['index', 'show']);
    Route::resource('surat_keterangan', SuratKeteranganController::class);
    Route::get('surat_keterangan/cetak/{id}', [SuratKeteranganController::class, 'cetak'])->name('surat_keterangan.cetak');

    Route::get('/surat_permintaan', [SuratPermintaanController::class, 'index'])->name('surat_permintaan.index');
    Route::resource('surat_permintaan', SuratPermintaanController::class);

    Route::resource('surat_selesai', SuratSelesaiController::class);
});

require __DIR__ . '/auth.php';

// use App\Http\Controllers\ProfileController;
// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\PendudukController;
// use App\Http\Controllers\SuratKeteranganController;
// use App\Http\Controllers\SuratPermintaanController;
// use App\Http\Controllers\SuratSelesaiController;
// /*
// |--------------------------------------------------------------------------
// | Web Routes
// |--------------------------------------------------------------------------
// |
// | Here is where you can register web routes for your application. These
// | routes are loaded by the RouteServiceProvider and all of them will
// | be assigned to the "web" middleware group. Make something great!
// |
// */

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';

// Route::get('/penduduk', [PendudukController::class, 'index'])->name('penduduk.index');
// Route::get('/penduduk/create', [PendudukController::class, 'create'])->name('penduduk.create');
// Route::post('/penduduk', [PendudukController::class, 'store'])->name('penduduk.store');
// Route::get('/penduduk/{FNIK}/edit', [PendudukController::class, 'edit'])->name('penduduk.edit');
// Route::put('/penduduk/{FNIK}', [PendudukController::class, 'update'])->name('penduduk.update');
// Route::delete('/penduduk/{FNIK}', [PendudukController::class, 'destroy'])->name('penduduk.destroy');
// Route::resource('penduduk', PendudukController::class);
// Route::resource('penduduk', PendudukController::class)->except(['show']);
// Route::get('/penduduk/{FNIK}', [PendudukController::class, 'show'])->name('penduduk.show');

// //surat keterangan
// // Route::resource('surat_keterangan', SuratKeteranganController::class);
// // Route::get('surat_keterangan/cetak/{id}', [SuratKeteranganController::class, 'cetak'])->name('surat_keterangan.cetak');

// //surat permintaan
// Route::resource('surat_permintaan', SuratPermintaanController::class);
// // Route::resource('surat_permintaan', SuratPermintaanController::class);
// // Route::get('/surat_permintaan/{id}', [SuratPermintaanController::class, 'show'])->name('surat_permintaan.show');

// Route::resource('surat_selesai', SuratSelesaiController::class);
