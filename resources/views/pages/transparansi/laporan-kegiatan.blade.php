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



        <!-- ================= DAFTAR LAPORAN ================= -->
        <div class="row">

            @forelse ($laporans as $item)
            <div class="laporan-card col-lg-4 col-md-6 col-sm-12 mb-4">
                <article class="card card-custom h-100" data-aos="fade-up">

                    <img src="{{ $item->foto_url }}"
                        alt="{{ $item->judul }}"
                        class="card-img-top"
                        loading="lazy">

                    <div class="card-body d-flex flex-column">
                        <h4 class="card-title fw-bold">
                            {{ $item->judul }}
                        </h4>

                        <div class="post-meta mb-3 mt-2">
                            <p class="mb-1">
                                <i class="bi bi-geo-alt-fill me-1"></i>
                                <strong>Lokasi:</strong> {{ $item->lokasi }}
                            </p>

                            <p class="mb-1">
                                <i class="bi bi-cash-stack me-1"></i>
                                <strong>Anggaran:</strong>
                                Rp {{ number_format($item->anggaran, 0, ',', '.') }}
                            </p>

                            <p class="mb-0">
                                <i class="bi bi-calendar-event me-1"></i>
                                <strong>Tanggal:</strong>
                                {{ $item->tanggal->format('d M Y') }}
                            </p>
                        </div>

                        @php
                        $isPdf = Str::endsWith(strtolower($item->file_url), '.pdf');
                        @endphp

                        <div class="d-flex gap-2 mt-auto">
                            @if ($isPdf)
                            <button
                                onclick="openModal('{{ $item->file_url }}')"
                                class="btn btn-sm btn-outline-secondary w-100">
                                <i class="bi bi-eye me-1"></i> Lihat
                            </button>
                            @endif

                            <a href="{{ $item->file_url }}"
                                download
                                class="btn btn-sm btn-outline-primary w-100">
                                <i class="bi bi-download me-1"></i> Unduh
                            </a>
                        </div>


                    </div>
                </article>
            </div>
            @empty
            <div class="col-12">
                <div class="alert alert-warning text-center">
                    Belum ada laporan kegiatan.
                </div>
            </div>
            @endforelse

        </div>

        <!-- ================= PAGINATION ================= -->
        <!-- ================= PAGINATION ================= -->
        @if ($laporans->lastPage() > 1)
        <div class="d-flex justify-content-center mt-4">
            <nav>
                <ul class="pagination pagination-sm custom-pagination mb-0">

                    {{-- PREV --}}
                    <li class="page-item {{ $laporans->onFirstPage() ? 'disabled' : '' }}">
                        <a class="page-link"
                            href="{{ $laporans->previousPageUrl() ?? 'javascript:void(0)' }}">
                            ‹
                        </a>
                    </li>

                    @php
                    $current = $laporans->currentPage();
                    $last = $laporans->lastPage();

                    // tentukan halaman yang ditampilkan
                    $pages = [$current];

                    if ($current < $last) {
                        $pages[]=$current + 1;
                        }
                        @endphp

                        {{-- PAGE NUMBERS --}}
                        @foreach ($pages as $page)
                        <li class="page-item {{ $page == $current ? 'active' : '' }}">
                        <a class="page-link" href="{{ $laporans->url($page) }}">
                            {{ $page }}
                        </a>
                        </li>
                        @endforeach

                        {{-- NEXT --}}
                        <li class="page-item {{ $laporans->hasMorePages() ? '' : 'disabled' }}">
                            <a class="page-link"
                                href="{{ $laporans->nextPageUrl() ?? 'javascript:void(0)' }}">
                                ›
                            </a>
                        </li>

                </ul>
            </nav>
        </div>
        @endif
        <!-- ================= END PAGINATION ================= -->

        <!-- ================= END PAGINATION ================= -->


    </div>
</section>

@endsection

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





@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>
    /* ================= ROOT VARIABLES ================= */
    :root {
        --primary-color: #05833F;
        --primary-dark: #046c34;
        --secondary-color: #6c757d;
        --text-color: #333333;
        --text-muted: #6c757d;
        --light-bg: #f8f9fa;
        --border-color: #e9ecef;
        --radius: 8px;

        --card-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
        --card-hover-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
        --transition: all 0.25s ease;
    }

    /* ================= GLOBAL ================= */
    body {
        font-family: 'Poppins', sans-serif;
        color: var(--text-color);
    }

    .section {
        padding-bottom: 5rem;
    }

    /* ================= CARD ================= */

    .card-custom {
        border: 1px solid var(--border-color);
        border-radius: 10px;
        box-shadow: var(--card-shadow);
        transition: var(--transition);
        background: #fff;
    }

    .card-custom:hover {
        box-shadow: var(--card-hover-shadow);
        transform: translateY(-10px);
    }

    .card-custom img {
        height: 200px;
        object-fit: cover;
        border-radius: 10px 10px 0 0;
    }

    .card-body {
        padding: 1.5rem;
    }

    .card-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--text-color);
    }

    .post-meta p {
        margin-bottom: 0.4rem;
        font-size: 0.9rem;
        color: var(--text-muted);
    }

    /* ================= BUTTON ================= */
    .btn-sm {
        font-size: 0.875rem;
        padding: 0.45rem 0.75rem;
    }

    .btn-outline-secondary {
        color: var(--secondary-color);
        border-color: var(--border-color);
    }

    .btn-outline-secondary:hover {
        background-color: #f1f3f5;
        color: var(--text-color);
    }

    .btn-outline-primary {
        color: var(--primary-color);
        border-color: var(--primary-color);
    }

    .btn-outline-primary:hover {
        background-color: var(--primary-color);
        color: #fff;
    }

    /* ================= NAV TABS ================= */
    .nav-tabs {
        padding-bottom: 50px;
        border: none;
    }

    .nav-tabs .nav-link {
        border: none;
        font-weight: 600;
        padding: 12px 24px;
        margin: 0 4px;
        border-radius: var(--radius);
        background-color: var(--light-bg);
        color: var(--text-muted);
        transition: var(--transition);
    }

    .nav-tabs .nav-link.active {
        background-color: var(--primary-color);
        color: #fff;
    }

    /* ================= PAGINATION (GLOBAL) ================= */

    .custom-pagination .page-link {
        border-radius: 6px;
        padding: 6px 10px;
        margin: 0 2px;
        font-weight: 500;
        color: var(--text-color);
    }

    .custom-pagination .page-link:hover {
        background-color: var(--primary-color);
        color: #fff;
    }

    /* ACTIVE */
    .custom-pagination .page-item.active .page-link {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
        color: #fff;
    }

    /* DISABLED */
    .custom-pagination .page-item.disabled .page-link {
        opacity: 0.45;
        pointer-events: none;
    }



    /* ================= RESPONSIVE ================= */
    @media (max-width: 768px) {
        .card-custom .btn {
            width: 100%;
            margin-bottom: 0.35rem;
        }

        .card-custom .d-flex.gap-2 {
            flex-direction: column;
        }
    }
</style>
@endpush