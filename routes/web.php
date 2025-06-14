<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

use App\Models\Artikel;
use App\Models\Berita;

use App\Http\Controllers\DonasiController;
use App\Http\Controllers\KonsultasiController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SholatController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\ZakatController;
use App\Http\Controllers\AdminArtikelController;
use App\Http\Controllers\AdminBeritaController;
use App\Http\Controllers\AdminKeuanganController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\MualafController;
use App\Http\Controllers\UserKeuanganController;
use App\Http\Controllers\UserController;
// Route home page
Route::get('/home', function () {
    return view('layouts.home');
})->name('home');

Route::get('/agenda', function () {
    return view('layouts.agenda');
})->name('agenda');

Route::get('/', function () {
    return view('layouts.home');
});

// ====== Halaman Utama ======
Route::get('/', function () {
    return view('layouts.home');
})->name('home');
Route::get('/home', function () {
    return view('layouts.home');
});
Route::get('/agenda', function () {
    return view('layouts.agenda');
})->name('agenda');

// ====== Login ======
use App\Http\Controllers\Auth\AuthenticatedSessionController;
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// ====== Dashboard Umum ======
Route::get('/profile/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// ====== Dashboard & Fitur Admin ======
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');
Route::resource('/admin/artikel', App\Http\Controllers\AdminArtikelController::class)->names('admin.artikel');
Route::resource('/admin/konsultasi', App\Http\Controllers\AdminKonsultasiController::class)->only(['index'])->names('admin.konsultasi');
Route::resource('admin/berita', App\Http\Controllers\AdminBeritaController::class)->names('admin.berita');
Route::resource('admin/reservasi', App\Http\Controllers\AdminReservasiController::class)->names('admin.reservasi');
Route::resource('/admin/galeri', App\Http\Controllers\GaleriController::class)->names('admin.galeri');
Route::resource('/admin/mualaf', App\Http\Controllers\AdminMualafController::class)->names('admin.mualaf');
Route::get('/admin/pengurus', [App\Http\Controllers\AdminPengurusController::class, 'index'])->name('admin.pengurus.index');
Route::get('/admin/mualaf', [App\Http\Controllers\AdminMualafController::class, 'index'])->name('admin.mualaf.index');
Route::get('/admin/galeri', [App\Http\Controllers\AdminGaleriController::class, 'index'])->name('admin.galeri.index');
Route::get('/galeri', [App\Http\Controllers\GaleriController::class, 'index'])->name('galeri.index'); // untuk user
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::resource('keuangan', AdminKeuanganController::class)->names('admin.keuangan');

});

// ====== Dashboard & Fitur User ======;
Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

    Route::view('/home', 'layouts.home')->name('home');


// Route untuk halaman artikel
Route::get('/artikel', function () {
    $artikels = Artikel::orderBy('created_at', 'desc')->get();
    return view('layouts.artikel', compact('artikels'));
})->name('artikel');

// Route untuk halaman mualaf
Route::get('/mualaf', [MualafController::class, 'create'])->name('mualaf');
Route::post('/mualaf', [MualafController::class, 'store'])->name('mualaf.store');

// Route untuk halaman informasi
Route::get('/informasi', [InformasiController::class, 'index'])->name('informasi');

// Route untuk halaman reservasi
Route::get('/reservasi', [ReservasiController::class, 'create'])->name('reservasi');
Route::post('/reservasi', [ReservasiController::class, 'store'])->name('reservasi.store');

// Route untuk halaman zakat
Route::get('/zakat', [ZakatController::class, 'index'])->name('zakat');

// Route untuk halaman berita
Route::get('/berita', function () {
    $beritas = Berita::orderBy('created_at', 'desc')->get();
    return view('layouts.berita', compact('beritas'));
})->name('berita');

// Route untuk halaman sholat
Route::get('/sholat', [SholatController::class, 'jadwal'])->name('sholat');

// Route untuk halaman donasi
Route::get('/donasi', [DonasiController::class, 'index'])->name('donasi');
Route::post('/donasi', [DonasiController::class, 'store'])->name('donasi.store');

// Route untuk halaman konsultasi
Route::get('/konsultasi', [KonsultasiController::class, 'index'])->name('konsultasi');
Route::post('/konsultasi', [KonsultasiController::class, 'store'])->name('konsultasi.store');

// Route untuk halaman galeri
Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri');

Route::get('/laporan-keuangan', [UserKeuanganController::class, 'index']);



// API Kalkulator Zakat
Route::post('/api/zakat/hitung', function(Request $request) {
    $jenis = $request->input('jenis');
    $result = null;
    switch($jenis) {
        case 'penghasilan':
            $penghasilan = floatval($request->input('penghasilan', 0));
            $result = [
                'zakat' => round($penghasilan * 0.025, 2),
                'persen' => 2.5,
                'keterangan' => '2.5% dari penghasilan bulanan'
            ];
            break;
        case 'perusahaan':
            $laba = floatval($request->input('laba', 0));
            $result = [
                'zakat' => round($laba * 0.025, 2),
                'persen' => 2.5,
                'keterangan' => '2.5% dari laba bersih perusahaan'
            ];
            break;
        case 'perdagangan':
            $modal = floatval($request->input('modal', 0));
            $keuntungan = floatval($request->input('keuntungan', 0));
            $utang = floatval($request->input('utang', 0));
            $hasil = $modal + $keuntungan - $utang;
            $result = [
                'zakat' => round($hasil * 0.025, 2),
                'persen' => 2.5,
                'keterangan' => '2.5% dari (modal + keuntungan - utang)'
            ];
            break;
        case 'emas':
            $berat = floatval($request->input('berat', 0));
            $harga = floatval($request->input('harga', 0));
            $total = $berat * $harga;
            $nisab = 85 * $harga;
            $kena = $berat >= 85;
            $result = [
                'zakat' => $kena ? round($total * 0.025, 2) : 0,
                'persen' => 2.5,
                'nisab' => $nisab,
                'kena_nisab' => $kena,
                'keterangan' => '2.5% dari nilai emas jika berat ≥ 85 gram'
            ];
            break;
        default:
            $result = ['error' => 'Jenis zakat tidak dikenali'];
    }
    return response()->json($result);
});

require __DIR__.'/auth.php';

Route::prefix('admin/galeri')->name('admin.galeri.')->group(function () {
    Route::get('/', [\App\Http\Controllers\AdminGaleriController::class, 'index'])->name('index');
    Route::get('/create', [\App\Http\Controllers\AdminGaleriController::class, 'create'])->name('create');
    Route::post('/', [\App\Http\Controllers\AdminGaleriController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [\App\Http\Controllers\AdminGaleriController::class, 'edit'])->name('edit');
    Route::put('/{id}', [\App\Http\Controllers\AdminGaleriController::class, 'update'])->name('update');
    Route::get('/{id}', [\App\Http\Controllers\AdminGaleriController::class, 'show'])->name('show');
});
