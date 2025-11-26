<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\TransparansiController;
use App\Http\Controllers\StrukturController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home.index');

/*
| Profil Desa
*/
Route::get('/profil', [ProfilController::class, 'index'])
    ->name('pages.profil.index');

/*
| Galeri
*/
Route::get('/galeri', [GaleriController::class, 'index'])
    ->name('pages.galeri.index');

/*
| Berita
*/
Route::get('/berita', [BeritaController::class, 'index'])
    ->name('pages.berita.index');

// Tambahkan route detail berita
Route::get('/berita/{id}', [BeritaController::class, 'show'])
    ->name('pages.berita.show');

// POST: terima pengaduan (nama route sesuai error)
Route::post('/pengaduan/store', [PengaduanController::class, 'store'])
    ->name('pengaduan.store');


//layanan pemerintahan
Route::get('/layanan/layanan-pemerintahan', function () {
    return view('pages.layanan.pemdes');
})->name('pages.layanan.pemdes');

//layanan pengaduan
Route::get('/layanan/layanan-pengaduan', function () {
    return view('pages.layanan.pengaduan');
})->name('pages.layanan.pengaduan');

//layanan posyandu
Route::get('/layanan/layanan-posyandu', function () {
    return view('pages.layanan.posyandu');
})->name('pages.layanan.posyandu');


/*
| Transparansi (group)
*/
Route::prefix('transparansi')->name('pages.transparansi.')->group(function () {
    Route::get('/anggaran', [TransparansiController::class, 'anggaran'])
        ->name('anggaran');
    Route::get('/laporan-kegiatan', [TransparansiController::class, 'laporan'])
        ->name('laporan-kegiatan');
    Route::get('/perencanaan', [TransparansiController::class, 'perencanaan'])
        ->name('perencanaan');
    Route::get('/bumdesa', [TransparansiController::class, 'bumdesa'])
        ->name('bumdesa');
});

Route::get('/transparansi/anggaran/data', [TransparansiController::class, 'getData'])->name('transparansi.anggaran.data');
Route::get('/transparansi/download/{file}', [TransparansiController::class, 'download'])->name('transparansi.download');
Route::get('/transparansi/preview/{file}', [TransparansiController::class, 'preview'])->name('transparansi.preview');

/*
| Struktur (group)
*/
Route::prefix('struktur')->name('pages.struktur.')->group(function () {
    Route::get('/pemerintahdesa', [StrukturController::class, 'pemerintahDesa'])
        ->name('pemerintahdesa');
    Route::get('/bpd', [StrukturController::class, 'bpd'])
        ->name('bpd');
    Route::get('/pkk', [StrukturController::class, 'pkk'])
        ->name('pkk');
    Route::get('/lpm', [StrukturController::class, 'lpm'])
        ->name('lpm');
    Route::get('/karang-taruna', [StrukturController::class, 'karangTaruna'])
        ->name('karang-taruna');
    Route::get('/posyandu', [StrukturController::class, 'posyandu'])
        ->name('posyandu');
});

/*
| Contact (form)
*/
Route::post('/contact/store', [ContactController::class, 'store'])
    ->name('pages.contact.store');

/*
| Catatan: Filament/admin routes di-handle oleh Filament sendiri (tidak perlu didefinisikan di sini).
*/
