@extends('layouts.master')
@section('title', 'Bumdes dan Kopdes MP - Desa Ajakkang')
@section('meta_description', 'Laporan Bumdes dan Kopdes MP Desa Ajakkang, Kecamatan Soppeng Riaja, Kabupaten Barru')
@section('page-title')
@component('components.page-title')
@slot('title', 'Bumdes dan Kopdes MP')
@slot('description', 'Halaman ini menyajikan laporan bulanan Bumdes dan Kopdes MP Desa Ajakkang yang dapat diakses oleh masyarakat.')
@slot('parent', 'Transparansi')
@slot('parentUrl', Request::is('/') ? '' : url(''))
@endcomponent
@endsection

@section('content')

<!-- =======================
   BUMDES & KOPDES MP
======================= -->
<section id="bumdes-kopdes" class="section py-5">
    <div class="container" data-aos="fade-up">

        <!-- ================= MODAL PREVIEW FILE ================= -->
        <div class="modal fade" id="fileModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-header border-0 pb-0">
                        <h4 class="modal-title fw-bold w-100 text-center">
                            Pratinjau Berkas
                        </h4>
                        <button type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>

                    <div class="modal-body p-0">
                        <iframe id="fileFrame"
                            src=""
                            style="width:100%; height:70vh; border:none;">
                        </iframe>
                    </div>

                    <div class="modal-footer border-0 justify-content-center">
                        <small class="text-muted">
                            Pastikan browser mendukung tampilan PDF.
                        </small>
                    </div>

                </div>
            </div>
        </div>
        <!-- ================= END MODAL ================= -->

        <!-- ================= LIST DOKUMEN ================= -->
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">

                <div class="row g-4">

                    @forelse ($documents as $item)
                    <div class="col-12 col-md-6">
                        <div class="card h-100 border-0">
                            <div class="card-custom shadow-sm card-body p-4">

                                <!-- Judul -->
                                <h6 class="fw-semibold mb-2">
                                    {{ $item->nama_dokumen }}
                                </h6>

                                <!-- Tipe -->
                                <div class="d-flex align-items-center text-muted mb-1">
                                    <i class="bi bi-tag me-2"></i>
                                    <small>{{ strtoupper($item->tipe) }}</small>
                                </div>

                                <!-- Tanggal -->
                                <div class="d-flex align-items-center text-muted mb-3">
                                    <i class="bi bi-clock me-2"></i>
                                    <small>
                                        {{ $item->tanggal->translatedFormat('d/m/Y') }}
                                    </small>
                                </div>

                                @php
                                $isPdf = Str::endsWith(strtolower($item->file_url), '.pdf');
                                @endphp

                                <div class="d-flex gap-2">
                                    @if ($isPdf)
                                    <button
                                        onclick="openModal('{{ $item->file_url }}')"
                                        class="btn btn-outline-secondary btn-sm flex-fill">
                                        <i class="bi-filetype-pdf text-danger me-1"></i> Lihat
                                    </button>
                                    @endif


                                    <a href="{{ $item->file_url }}"
                                        download
                                        class="btn btn-outline-primary btn-sm flex-fill">
                                        <i class="bi bi-download me-1"></i> Unduh
                                    </a>

                                </div>

                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12">
                        <div class="alert alert-warning text-center">
                            Belum ada dokumen Bumdes & Kopdes MP.
                        </div>
                    </div>
                    @endforelse

                </div>

                <!-- ================= PAGINATION ================= -->
                <div class="mt-5 d-flex justify-content-center">
                    {{ $documents->links() }}
                </div>

            </div>
        </div>
        <!-- ================= END LIST ================= -->

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
        border: 2px solid var(--border-color);
        border-radius: 10px;
        box-shadow: var(--card-shadow);
        transition: var(--transition);
        background: #fff;
    }

    .card-custom:hover {
        box-shadow: var(--card-hover-shadow);
        transform: translateY(-5px);
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
        color: var(--danger-color);
        border-color: var(--danger-color);
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
    /* ================= MODAL ================= */
    function openModal(url) {
        const frame = document.getElementById('fileFrame');
        frame.src = url;

        const modal = new bootstrap.Modal(
            document.getElementById('fileModal')
        );
        modal.show();

        document.getElementById('fileModal')
            .addEventListener('hidden.bs.modal', () => {
                frame.src = '';
            }, {
                once: true
            });
    }
</script>

@endpush