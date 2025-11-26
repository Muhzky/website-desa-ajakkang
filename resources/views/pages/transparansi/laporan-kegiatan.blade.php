@extends('layouts.master')
@section('title', 'Laporan Kegiatan - Desa Batupute')
@section('meta_description', 'Laporan kegiatan Desa Batupute, Kecamatan Soppeng Riaja, Kabupaten Barru')
@section('page-title')
    @component('components.page-title')
        @slot('title', 'Laporan Kegiatan')
        @slot('description', 'Halaman ini menyajikan informasi lengkap mengenai laporan kegiatan yang dilakukan oleh pemerintah Desa Batupute.')
        @slot('parent', 'Transparansi')
        @slot('parentUrl', Request::is('/') ? '' : url(''))
    @endcomponent
@endsection

@section('content')
<!-- Laporan Kegiatan Section -->
<section id="laporan-kegiatan" class="laporan-kegiatan section">
    <div class="container" data-aos="fade-up">
        <!-- Modal Preview File -->
        <div class="modal fade" id="fileModal" tabindex="-1" aria-labelledby="fileModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header border-0 pb-0">
                        <h4 class="modal-title fw-bold text-center flex-grow-1" id="fileModalLabel">Pratinjau Berkas</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body p-0 position-relative" style="min-height: 60vh;">
                        <div id="loadingIndicator" class="d-flex justify-content-center align-items-center position-absolute w-100 h-100" style="background: rgba(255, 255, 255, 0.9); z-index: 10; display: none;">
                            <div class="text-center">
                                <div class="spinner-border text-primary" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                                <p class="mt-2 mb-0 text-muted">Memuat dokumen...</p>
                            </div>
                        </div>
                        <iframe
                            id="fileFrame"
                            src=""
                            style="width:100%; height: 100%; min-height: 60vh; border: none;"
                            frameborder="0"
                            onload="hideLoading()"
                            onerror="showError()">
                        </iframe>
                    </div>
                    <div class="modal-footer justify-content-center border-0 pt-2">
                        <small class="text-muted">Pastikan browser mendukung tampilan PDF.</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Daftar Laporan Kegiatan -->
        <div class="row justify-content-center">
            <!-- Kegiatan 1 -->
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <article class="card card-custom h-100" data-aos="fade-up">
                    <a href="" class="glightbox card-image-wrap">
                        <img src="{{ asset('assets/img/ibu-anak.png') }}" alt="Foto Kegiatan" loading="lazy" class="card-img-top">
                    </a>
                    <div class="card-body d-flex flex-column">
                        <h4 class="card-title fw-bold">Penanganan Stunting (PMT IBU HAMIL KEK HARI KE 11-HARI KE 20)</h4>
                        <div class="post-meta mb-3 mt-2">
                            <p class="mb-1"><i class="bi bi-geo-alt-fill me-1"></i><strong>Lokasi:</strong> Desa Batupute</p>
                            <p class="mb-1"><i class="bi bi-cash-stack me-1"></i><strong>Anggaran:</strong> Rp. 500.000</p>
                            <p class="mb-0"><i class="bi bi-calendar-event me-1"></i><strong>Tanggal:</strong> 04 November 2025</p>
                        </div>
                        <div class="mt-auto d-flex gap-2">
                            <a href="javascript:void(0);" class="btn btn-outline-secondary btn-sm d-flex align-items-center justify-content-center flex-fill" onclick="openModal('1762323935_DAFTAR_NAMA_SASARAN_IBU_HAMIL_KEK.xlsx')">
                                <i class="bi bi-file-earmark-fill me-1"></i> Lihat
                            </a>
                            <a href="https://website.desa-batupute.com/transparansi/laporan-kegiatan/download/1762323935_DAFTAR_NAMA_SASARAN_IBU_HAMIL_KEK.xlsx" class="btn btn-outline-primary btn-sm d-flex align-items-center justify-content-center flex-fill">
                                <i class="bi bi-download me-1"></i> Unduh
                            </a>
                        </div>
                    </div>
                </article>
            </div>

            <!-- Kegiatan 2 -->
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <article class="card card-custom h-100" data-aos="fade-up">
                    <a href="" class="glightbox card-image-wrap">
                        <img src="{{ asset('assets/img/makanan-stunting.png') }}" alt="Foto Kegiatan" loading="lazy" class="card-img-top">
                    </a>
                    <div class="card-body d-flex flex-column">
                        <h4 class="card-title fw-bold">Penanganan Stunting/ PMT Sasaran Stunting, Gizi Kurang, BB K</h4>
                        <div class="post-meta mb-3 mt-2">
                            <p class="mb-1"><i class="bi bi-geo-alt-fill me-1"></i><strong>Lokasi:</strong> Desa Batupute</p>
                            <p class="mb-1"><i class="bi bi-cash-stack me-1"></i><strong>Anggaran:</strong> Rp. 12.300.000</p>
                            <p class="mb-0"><i class="bi bi-calendar-event me-1"></i><strong>Tanggal:</strong> 04 November 2025</p>
                        </div>
                        <div class="mt-auto d-flex gap-2">
                            <a href="javascript:void(0);" class="btn btn-outline-secondary btn-sm d-flex align-items-center justify-content-center flex-fill" onclick="openModal('1762324227_DAFTAR_NAMA_SASARAN_DAN_DAFTAR_TERIMA_TRANSPORT.xlsx')">
                                <i class="bi bi-file-earmark-fill me-1"></i> Lihat
                            </a>
                            <a href="https://website.desa-batupute.com/transparansi/laporan-kegiatan/download/1762324227_DAFTAR_NAMA_SASARAN_DAN_DAFTAR_TERIMA_TRANSPORT.xlsx" class="btn btn-outline-primary btn-sm d-flex align-items-center justify-content-center flex-fill">
                                <i class="bi bi-download me-1"></i> Unduh
                            </a>
                        </div>
                    </div>
                </article>
            </div>

            <!-- Kegiatan 3 -->
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <article class="card card-custom h-100" data-aos="fade-up">
                    <a href="" class="glightbox card-image-wrap">
                        <img src="{{ asset('assets/img/pengajian.png') }}" alt="Foto Kegiatan" loading="lazy" class="card-img-top">
                    </a>
                    <div class="card-body d-flex flex-column">
                        <h4 class="card-title fw-bold">PENGAJIAN RUTIN</h4>
                        <div class="post-meta mb-3 mt-2">
                            <p class="mb-1"><i class="bi bi-geo-alt-fill me-1"></i><strong>Lokasi:</strong> Masid Nurul Huda Dusun Ujunge</p>
                            <p class="mb-1"><i class="bi bi-cash-stack me-1"></i><strong>Anggaran:</strong> Rp. 3.600.000</p>
                            <p class="mb-0"><i class="bi bi-calendar-event me-1"></i><strong>Tanggal:</strong> 31 Oktober 2025</p>
                        </div>
                        <div class="mt-auto d-flex gap-2">
                            <a href="javascript:void(0);" class="btn btn-outline-secondary btn-sm d-flex align-items-center justify-content-center flex-fill" onclick="openModal('1762325520_CamScanner_05-11-2025_14.49.pdf')">
                                <i class="bi bi-file-earmark-fill me-1"></i> Lihat
                            </a>
                            <a href="https://website.desa-batupute.com/transparansi/laporan-kegiatan/download/1762325520_CamScanner_05-11-2025_14.49.pdf" class="btn btn-outline-primary btn-sm d-flex align-items-center justify-content-center flex-fill">
                                <i class="bi bi-download me-1"></i> Unduh
                            </a>
                        </div>
                    </div>
                </article>
            </div>
        </div>

        <!-- Pagination -->
        <div class="col-12 col-lg-10 mt-5">
            <div class="d-flex justify-content-center">
                <ul class="pagination pagination-sm">
                    <li class="page-item disabled">
                        <a class="page-link" href="#"><i class="bi bi-chevron-left"></i></a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="/transparansi/laporan-kegiatan?page=1">1</a></li>
                    <li class="page-item"><a class="page-link" href="/transparansi/laporan-kegiatan?page=2">2</a></li>
                    <li class="page-item disabled"><span class="page-link">...</span></li>
                    <li class="page-item"><a class="page-link" href="/transparansi/laporan-kegiatan?page=8">8</a></li>
                    <li class="page-item">
                        <a class="page-link" href="/transparansi/laporan-kegiatan?page=2"><i class="bi bi-chevron-right"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
    :root {
        --primary-color: #000000;
        --primary-light: #333333;
        --secondary-color: #6c757d;
        --success-color: #198754;
        --danger-color: #dc3545;
        --info-color: #198754;
        --light-bg: #f8f9fa;
        --border-color: #e9ecef;
        --card-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
        --card-hover-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
        --transition: all 0.25s ease;
    }
    body {
        font-family: 'Poppins', sans-serif;
    }
    .section {
        padding-bottom: 5rem;
    }
    .card-custom {
        border: 1px solid var(--border-color);
        border-radius: 10px;
        box-shadow: var(--card-shadow);
        transition: var(--transition);
        background: #fff;
    }
    .card-custom:hover {
        box-shadow: var(--card-hover-shadow);
        transform: translateY(-2px);
    }
    .card-custom img {
        height: 200px;
        object-fit: cover;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }
    .card-body {
        padding: 1.5rem;
    }
    .card-title {
        font-size: 1.1rem;
        color: var(--primary-light);
    }
    .post-meta p {
        margin-bottom: 0.5rem;
        font-size: 0.9rem;
        color: var(--muted-text);
    }
    .btn-sm {
        font-size: 0.875rem;
        padding: 0.4rem 0.75rem;
    }
    .btn-outline-secondary {
        color: var(--secondary-color);
        border-color: var(--border-color);
    }
    .btn-outline-secondary:hover {
        background-color: #f1f3f5;
        color: var(--primary-light);
    }
    .btn-outline-primary {
        color: var(--info-color);
        border-color: var(--info-color);
    }
    .btn-outline-primary:hover {
        background-color: var(--info-color);
        color: white;
    }
    .pagination-sm .page-link {
        padding: 0.375rem 0.5rem;
        font-size: 0.875rem;
    }
    .pagination .page-item.active .page-link {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
    }
    @media (max-width: 768px) {
        .card-custom .btn {
            width: 100%;
            margin-bottom: 0.35rem;
        }
        .card-custom .d-flex.gap-2 {
            flex-direction: column;
        }
        .card-custom h6 {
            font-size: 1rem;
        }
    }
</style>
@endpush

@push('scripts')
<script>
    (function() {
        'use strict';
        window.openModal = function(filename) {
            if (!filename) {
                alert('File tidak tersedia.');
                return;
            }
            const modal = new bootstrap.Modal(document.getElementById('fileModal'));
            const frame = document.getElementById('fileFrame');
            const loading = document.getElementById('loadingIndicator');
            loading.style.display = 'flex';
            frame.src = '/transparansi/laporan-kegiatan/preview/' + encodeURIComponent(filename);
            modal.show();
        };
        window.hideLoading = function() {
            const loading = document.getElementById('loadingIndicator');
            if (loading) loading.style.display = 'none';
        };
        window.showError = function() {
            const loading = document.getElementById('loadingIndicator');
            if (loading) {
                loading.innerHTML = `
                    <div class="text-center text-danger">
                        <i class="bi bi-exclamation-triangle fs-1"></i>
                        <p class="mt-2 mb-0">Gagal memuat dokumen.</p>
                    </div>
                `;
            }
        };
    })();
</script>
@endpush
