@extends('layouts.master')
@section('title', 'Laporan Kegiatan - Desa Ajakkang')
@section('meta_description', 'Laporan kegiatan Desa Ajakkang, Kecamatan Soppeng Riaja, Kabupaten Barru')
@section('page-title')
    @component('components.page-title')
        @slot('title', 'Laporan Kegiatan')
        @slot('description', 'Halaman ini menyajikan informasi lengkap mengenai laporan kegiatan yang dilakukan oleh pemerintah Desa Ajakkang.')
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
                        <div id="loadingIndicator" class="d-flex justify-content-center align-items-center position-absolute w-100 h-100" style="background: rgba(248, 249, 250, 0.8); z-index: 10; display: none;">
                            <div class="text-center">
                                <div class="spinner-border text-primary" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                                <p class="mt-2 mb-0">Memuat dokumen...</p>
                            </div>
                        </div>
                        <iframe
                            id="fileFrame"
                            src=""
                            style="width:100%; height: 100%; min-height: 60vh; border: none;"
                            frameborder="0"
                            onload="hideLoading()"
                            onerror="showError()"
                        ></iframe>
                    </div>
                    <div class="modal-footer justify-content-center border-0 pt-2">
                        <small class="text-muted">Pastikan browser mendukung tampilan PDF.</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- === Daftar Laporan Kegiatan === -->
        <div class="row">
            <div class="col-12">
                <h4 class="subsection-title">Daftar Laporan Kegiatan</h4>
                <p class="text-muted mb-4">Berikut ini adalah data-data mengenai laporan kegiatan yang dilakukan oleh pemerintah Desa Ajakkang.</p>

                @forelse($laporanKegiatan ?? [] as $item)
                <div class="kegiatan-item">
                    <div class="kegiatan-icon">
                        <i class="bi bi-file-earmark-text"></i>
                    </div>
                    <div class="kegiatan-details">
                        <h5>{{ $item->nama_kegiatan ?? 'Kegiatan Desa' }}</h5>
                        <div class="kegiatan-meta">
                            <span><i class="bi bi-geo-alt"></i> {{ $item->lokasi ?? 'Desa Ajakkang' }}</span>
                            <span><i class="bi bi-cash-stack"></i> {{ isset($item->anggaran) ? 'Rp ' . number_format($item->anggaran, 0, ',', '.') : 'Rp 0' }}</span>
                            <span><i class="bi bi-calendar"></i> {{ isset($item->tanggal) ? \Carbon\Carbon::parse($item->tanggal)->isoFormat('DD MMMM YYYY') : '01 Januari 2025' }}</span>
                        </div>
                    </div>
                    <div class="kegiatan-actions">
                        <a href="javascript:void(0);" onclick="openModal('{{ $item->file ?? '' }}')" class="btn btn-sm btn-outline-secondary">
                            <i class="bi bi-eye"></i> Lihat Berkas
                        </a>
                        <a href="{{ route('laporan-kegiatan.download', $item->file ?? '') }}" class="btn btn-sm btn-primary">
                            <i class="bi bi-download"></i> Download Berkas
                        </a>
                    </div>
                </div>
                @empty
                <div class="alert alert-info">
                    <i class="bi bi-info-circle me-2"></i>
                    Belum ada data laporan kegiatan.
                </div>
                @endforelse

                <!-- Pagination -->
                @if(isset($laporanKegiatan) && $laporanKegiatan->hasPages())
                <div class="d-flex justify-content-center mt-4">
                    {{ $laporanKegiatan->links('pagination::bootstrap-5') }}
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
    :root {
        --primary-color: #000000ff;
        --success-color: #198754;
        --danger-color: #dc3545;
        --secondary-color: #6c757d;
        --light-bg: #f8f9fa;
        --white: #ffffff;
        --dark-text: #212529;
        --muted-text: #6c757d;
        --border-color: #dee2e6;
        --card-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        --card-hover-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
        --transition: all 0.3s ease;
    }
    body {
        font-family: 'Poppins', sans-serif;
    }
    .section {
        padding-bottom: 5rem;
    }
    .section-title {
        font-weight: 600;
        color: var(--dark-text);
        font-size: 2rem;
        margin-bottom: 0.5rem;
    }
    .section-description {
        color: var(--muted-text);
        font-size: 1rem;
    }
    .subsection-title {
        font-weight: 600;
        color: var(--dark-text);
        font-size: 1.4rem;
        margin-bottom: 1.5rem;
        padding-left: 1rem;
        border-left: 4px solid var(--primary-color);
    }
    .text-muted{
      font-size: 1.1rem;
      padding-left: 1.3rem;
    }

    /* Kartu Kegiatan */
    .kegiatan-item {
        display: flex;
        align-items: center;
        background: var(--white);
        padding: 1.5rem 2rem;
        border-radius: 12px;
        margin-bottom: 1rem;
        box-shadow: var(--card-shadow);
        transition: var(--transition);
    }
    .kegiatan-item:hover {
        box-shadow: var(--card-hover-shadow);
        transform: translateY(-2px);
    }
    .kegiatan-icon {
        font-size: 2rem;
        color: var(--primary-color);
        margin-right: 1.5rem;
        flex-shrink: 0;
    }
    .kegiatan-details {
        flex-grow: 1;
    }
    .kegiatan-details h5 {
        margin: 0 0 0.5rem 0;
        font-weight: 600;
        color: var(--dark-text);
    }
    .kegiatan-meta {
        font-size: 0.9rem;
        color: var(--muted-text);
    }
    .kegiatan-meta span {
        margin-right: 1.5rem;
    }
    .kegiatan-meta i {
        margin-right: 0.5rem;
    }
    .kegiatan-actions .btn {
        margin-left: 0.5rem;
    }

    @media (max-width: 768px) {
        .kegiatan-item {
            flex-direction: column;
            align-items: flex-start;
            text-align: left;
        }
        .kegiatan-icon {
            margin-bottom: 1rem;
        }
        .kegiatan-actions {
            margin-top: 1rem;
            align-self: flex-end;
        }
    }
</style>
@endpush

@push('scripts')
<script>
    (function () {
        'use strict';

        // Modal functions
        window.openModal = function (filename) {
            if (!filename) {
                alert('File tidak tersedia.');
                return;
            }
            const modal = new bootstrap.Modal(document.getElementById('fileModal'));
            const frame = document.getElementById('fileFrame');
            const loading = document.getElementById('loadingIndicator');
            loading.style.display = 'flex';
            frame.src = '/laporan-kegiatan/preview/' + encodeURIComponent(filename);
            modal.show();
        };

        window.hideLoading = function () {
            const loading = document.getElementById('loadingIndicator');
            if (loading) loading.style.display = 'none';
        };

        window.showError = function () {
            const loading = document.getElementById('loadingIndicator');
            if (loading) {
                loading.innerHTML = '<div class="text-center text-danger"><i class="bi bi-exclamation-triangle fs-1"></i><p class="mt-2">Gagal memuat file PDF.</p></div>';
                loading.style.display = 'flex';
            }
        };
    })();
</script>
@endpush
