@extends('layouts.master')
@section('title', 'Dokumen Perencanaan - Desa Ajakkang')
@section('meta_description', 'Dokumen perencanaan Desa Ajakkang, Kecamatan Soppeng Riaja, Kabupaten Barru')
@section('page-title')
    @component('components.page-title')
        @slot('title', 'Dokumen Perencanaan')
        @slot('description', 'Halaman ini menyajikan informasi lengkap mengenai dokumen perencanaan Desa Ajakkang yang dapat diakses oleh masyarakat.')
        @slot('parent', 'Transparansi')
        @slot('parentUrl', Request::is('/') ? '' : url(''))
    @endcomponent
@endsection
@section('content')
<!-- Dokumen Perencanaan Section -->
<section id="dokumen-perencanaan" class="section py-5">
    <div class="container section-title aos-init aos-animate" data-aos="fade-up">
        <div class="row justify-content-center">
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
            <!-- Daftar Dokumen Perencanaan - 2 Kolom Layout -->
            <div class="dokumen-perencanaan col-12 col-lg-10">
                <div class="row g-4">
                    @php
                        $documents = [
                            [
                                'title' => 'RPJM DESA AJAKKANG PERIODE 2023-2029 2025',
                                'category' => 'UMUM',
                                'date' => 'Jumat, 25/07/2025',
                                'file' => '1753421467_RPJMDesa_2023-2029_BAB_Ajakkang_-pdf_cam.pdf',
                                'icon' => 'bi-filetype-pdf',
                                'color' => 'text-danger'
                            ],
                            [
                                'title' => 'LAMPIRAN RPJM DESA AJAKKANG PERIODE 2023-2029 2025',
                                'category' => 'UMUM',
                                'date' => 'Jumat, 25/07/2025',
                                'file' => '1753421584_RPJM_Desa_Ajakkang_2023-2029_-_ACC.xlsx',
                                'icon' => 'bi-filetype-xlsx',
                                'color' => 'text-success'
                            ],
                            [
                                'title' => 'Dokumen RKPDesa Tahun 2025 2025',
                                'category' => 'UMUM',
                                'date' => 'Rabu, 20/08/2025',
                                'file' => '1755654927_Dokumen_RKP_Desa_Thn_2025_Acc.docx',
                                'icon' => 'bi-filetype-docx',
                                'color' => 'text-primary'
                            ],
                            [
                                'title' => 'Perdes RKPDesa Tahun 2025 2025',
                                'category' => 'UMUM',
                                'date' => 'Rabu, 20/08/2025',
                                'file' => '1755655052_Perdes_RKPDesa_2025.pdf',
                                'icon' => 'bi-filetype-pdf',
                                'color' => 'text-danger'
                            ],
                            [
                                'title' => 'Lampiran RKPDesa Tahun 2025 2025',
                                'category' => 'UMUM',
                                'date' => 'Rabu, 20/08/2025',
                                'file' => '1755655117_lampiran_RKPDesa_Ajakkang_2025_Acc.xlsx',
                                'icon' => 'bi-filetype-xlsx',
                                'color' => 'text-success'
                            ],
                            [
                                'title' => 'Perdes APBDesa tahun 2025 2025',
                                'category' => 'UMUM',
                                'date' => 'Rabu, 20/08/2025',
                                'file' => '1755655704_Perdes_APBDes_2025_compressed.pdf',
                                'icon' => 'bi-filetype-pdf',
                                'color' => 'text-danger'
                            ],
                        ];
                    @endphp
                    @foreach ($documents as $doc)
                    <div class="col-12 col-md-6">
                        <div class="card card-custom h-100">
                            <div class="card-body p-4">
                                <h6 class="fw-semibold mb-2">{{ $doc['title'] }}</h6>
                                <div class="d-flex align-items-center text-muted mb-1">
                                    <i class="bi bi-file-earmark-text fs-6 me-2"></i>
                                    <small>{{ $doc['category'] }}</small>
                                </div>
                                <div class="d-flex align-items-center text-muted mb-3">
                                    <i class="bi bi-clock fs-6 me-2"></i>
                                    <small>{{ $doc['date'] }}</small>
                                </div>
                                <div class="d-flex gap-2 mt-2">
                                    <a href="javascript:void(0);" onclick="openModal('{{ $doc['file'] }}')" class="btn btn-outline-secondary btn-sm d-flex align-items-center justify-content-center flex-fill">
                                        <i class="{{ $doc['icon'] }} {{ $doc['color'] }} me-1"></i> Lihat
                                    </a>
                                    <a href="/transparansi/dokumen-publik/download/{{ $doc['file'] }}" class="btn btn-outline-primary btn-sm d-flex align-items-center justify-content-center flex-fill">
                                        <i class="bi bi-download me-1"></i> Unduh
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <!-- Pagination -->
            <div class="col-12 col-lg-10 mt-5">
                <div class="d-flex justify-content-center">
                    <ul class="pagination pagination-sm">
                        <li class="page-item disabled">
                            <a class="page-link" href="#"><i class="bi bi-chevron-left"></i></a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="/transparansi/dokumen-publik?page=1">1</a></li>
                        <li class="page-item"><a class="page-link" href="/transparansi/dokumen-publik?page=2">2</a></li>
                        <li class="page-item disabled"><span class="page-link">...</span></li>
                        <li class="page-item"><a class="page-link" href="/transparansi/dokumen-publik?page=4">4</a></li>
                        <li class="page-item">
                            <a class="page-link" href="/transparansi/dokumen-publik?page=2"><i class="bi bi-chevron-right"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('styles')
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
    .section {
        padding-bottom: 5rem;
    }
    .subsection-title {
        font-weight: 600;
        color: var(--dark-text);
        font-size: 1.4rem;
        margin-bottom: 1.5rem;
        padding-left: 1rem;
        border-left: 4px solid var(--primary-color);
    }
    .text-muted {
        font-size: 1.1rem;
        padding-left: 1.3rem;
        color: var(--muted-text);
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
    .card-custom h6 {
        font-size: 1.1rem;
        line-height: 1.4;
        color: var(--primary-light);
    }
    .card-custom .text-muted small {
        font-size: 0.875rem;
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
    /* File icons */
    .bi-filetype-pdf {
        color: var(--danger-color);
    }
    .bi-filetype-xlsx {
        color: var(--success-color);
    }
    .bi-filetype-docx {
        color: var(--info-color);
    }
    /* Pagination */
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
            frame.src = '/transparansi/dokumen-publik/preview/' + encodeURIComponent(filename);
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
