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
use App\Http\Controllers\PemerintahDesaController;
use App\Models\RekapKeuangan;

Route::get('/api/rekap-keuangan/{tahun}', function ($tahun) {
    $rekap = RekapKeuangan::where('tahun', $tahun)->first();

    return response()->json([
        'pemasukan'   => $rekap?->pemasukan ?? 0,
        'pengeluaran' => $rekap?->pengeluaran ?? 0,
        'surplus'     => ($rekap?->pemasukan ?? 0) - ($rekap?->pengeluaran ?? 0),
    ]);
});


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
| Informasi
*/
Route::get('/informasi', [BeritaController::class, 'index'])
    ->name('pages.berita.index');

// Tambahkan route detail berita
Route::get('/informasi/detail/{id}', [BeritaController::class, 'detail'])
    ->name('pages.berita.detail');

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

//layanan kesra
Route::get('/layanan/layanan-kesra', function () {
    return view('pages.layanan.kesra');
})->name('pages.layanan.kesra');

//layanan kesra
Route::get('/layanan/layanan-pelayanan', function () {
    return view('pages.layanan.pelayanan');
})->name('pages.layanan.pelayanan');


/*
| Transparansi (group)
*/
Route::prefix('transparansi')->group(function () {
    Route::get('/anggaran', [TransparansiController::class, 'anggaran'])
        ->name('pages.transparansi.anggaran');

    Route::get('/laporan-kegiatan', [TransparansiController::class, 'laporan'])
        ->name('pages.transparansi.laporan-kegiatan');

    Route::get('/perencanaan', [TransparansiController::class, 'perencanaan'])
        ->name('pages.transparansi.perencanaan');

    Route::get('/bumdesa', [TransparansiController::class, 'bumdesa'])
        ->name('pages.transparansi.bumdesa');
});
Route::get('/transparansi/anggaran/data', [TransparansiController::class, 'getData'])->name('pages.transparansi.anggaran.data');
Route::get('/transparansi/download/{file}', [TransparansiController::class, 'download'])->name('pages.transparansi.download');
Route::get('/transparansi/preview/{file}', [TransparansiController::class, 'preview'])->name('pages.transparansi.preview');
/*
|--------------------------------------------------------------------------
| LAPORAN KEGIATAN – PREVIEW & DOWNLOAD
|--------------------------------------------------------------------------
*/

Route::get(
    '/transparansi/laporan-kegiatan/preview/{filename}',
    [TransparansiController::class, 'previewLaporan']
)->name('laporan.kegiatan.preview');

Route::get(
    '/transparansi/laporan-kegiatan/download/{filename}',
    [TransparansiController::class, 'downloadLaporan']
)->name('laporan.kegiatan.download');

Route::get(
    '/transparansi/dokumen-perencanaan/preview/{filename}',
    [TransparansiController::class, 'previewPerencanaan']
)->name('perencanaan.preview');

Route::get(
    '/transparansi/dokumen-perencanaan/download/{filename}',
    [TransparansiController::class, 'downloadPerencanaan']
)->name('perencanaan.download');

Route::get(
    '/transparansi/bumdes/preview/{filename}',
    [TransparansiController::class, 'previewBumdes']
)->name('bumdes.preview');

Route::get(
    '/transparansi/bumdes/download/{filename}',
    [TransparansiController::class, 'downloadBumdes']
)->name('bumdes.download');





/*
| Struktur (group)
*/

Route::get('/struktur/pemerintahdesa', [StrukturController::class, 'pemerintahDesa']);



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

use App\Http\Controllers\UmkmController;

Route::get('/umkm', [UmkmController::class, 'index'])
    ->name('pages.umkm.index');

use App\Http\Controllers\CekDataController;

Route::get('/cek-data', [CekDataController::class, 'index'])
    ->name('pages.layanan.cek-data');




/*
| Contact (form)
*/
Route::post('/contact/store', [ContactController::class, 'store'])
    ->name('pages.contact.store');

/*
| Catatan: Filament/admin routes di-handle oleh Filament sendiri (tidak perlu didefinisikan di sini).
*/
