@extends('layouts.master')
@section('title', 'UMKM Desa - Desa Ajakkang')
@section('meta_description', 'Daftar produk UMKM Desa Ajakkang. Dukung usaha lokal masyarakat desa.')
@section('page-title')
@component('components.page-title')
@slot('title', 'UMKM Desa')
@slot('description', 'Temukan dan dukung produk UMKM masyarakat Desa Ajakkang.')
@slot('parent', 'Potensi Desa')
@slot('parentUrl', Request::is('/') ? '#potensi-desa' : url('/#potensi-desa'))
@endcomponent
@endsection

@section('content')
<section class="umkm-section section">
    <div class="container" data-aos="fade-up">

        <!-- ================= FILTER ================= -->
        <div class="card p-3 mb-4 shadow-sm">
            <form method="GET" action="{{ route('pages.umkm.index') }}">
                <div class="row g-3 align-items-end">
                    <div class="col-md-4">
                        <label class="form-label">Nama Produk</label>
                        <input type="text"
                            name="q"
                            value="{{ request('q') }}"
                            class="form-control"
                            placeholder="Cari produk...">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Kategori</label>
                        <select name="kategori" class="form-select">
                            <option value="">- Semua Kategori -</option>
                            <option value="Makanan" {{ request('kategori')=='Makanan'?'selected':'' }}>Makanan</option>
                            <option value="Minuman" {{ request('kategori')=='Minuman'?'selected':'' }}>Minuman</option>
                            <option value="Kerajinan" {{ request('kategori')=='Kerajinan'?'selected':'' }}>Kerajinan</option>
                            <option value="Fashion" {{ request('kategori')=='Fashion'?'selected':'' }}>Fashion</option>
                        </select>
                    </div>

                    <div class="col-md-4 d-flex gap-2">
                        <button class="btn btn-success w-100">
                            <i class="bi bi-search"></i> Filter
                        </button>
                        <a href="{{ route('pages.umkm.index') }}" class="btn btn-outline-secondary w-100">
                            Reset
                        </a>
                    </div>
                </div>
            </form>
        </div>

        <!-- ================= LIST PRODUK ================= -->
        <div class="row g-4">

            @forelse ($produks as $item)
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">

                <div class="card umkm-card-compact h-100">

                    <!-- FOTO -->
                    <div class="umkm-thumb">
                        <img
                            src="{{ asset('storage/'.$item->foto_produk) }}"
                            alt="{{ $item->nama_produk }}">
                    </div>

                    <!-- BODY -->
                    <div class="umkm-body">

                        <span class="umkm-category">
                            {{ $item->kategori }}
                        </span>

                        <h6 class="umkm-name">
                            {{ $item->nama_produk }}
                        </h6>

                        <div class="umkm-price">
                            Rp {{ number_format($item->harga,0,',','.') }}
                        </div>

                        <div class="umkm-store">
                            {{ $item->umkm->nama_toko }}
                        </div>

                        <div class="umkm-owner">
                            Owner : {{ $item->umkm->pemilik }}
                        </div>


                        @php
                        $waNumber = preg_replace('/[^0-9]/', '', $item->umkm->nomor_whatsapp);
                        $message = urlencode("Halo kak, apakah stok masih ada? {$item->nama_produk}");
                        @endphp

                        <a
                            href="https://wa.me/{{ $waNumber }}?text={{ $message }}"
                            target="_blank"
                            class="btn btn-outline-success btn-sm w-100 mt-2">
                            <i class="bi bi-whatsapp"></i> Hubungi
                        </a>


                    </div>
                </div>


            </div>
            @empty
            <div class="col-12 text-center">
                <p class="text-muted">Produk UMKM belum tersedia.</p>
            </div>
            @endforelse


        </div>

        <!-- ================= PAGINATION ================= -->
        @if ($produks->lastPage() > 1)
        <div class="d-flex justify-content-center mt-4">
            <nav>
                <ul class="pagination pagination-sm custom-pagination mb-0">

                    {{-- PREV --}}
                    <li class="page-item {{ $produks->onFirstPage() ? 'disabled' : '' }}">
                        <a class="page-link"
                            href="{{ $produks->previousPageUrl() ? $produks->previousPageUrl().'&'.http_build_query(request()->except('page')) : 'javascript:void(0)' }}">
                            ‹
                        </a>
                    </li>

                    @php
                    $start = max($produks->currentPage() - 2, 1);
                    $end = min($produks->currentPage() + 2, $produks->lastPage());
                    @endphp

                    {{-- PAGE NUMBERS --}}
                    @for ($i = $start; $i <= $end; $i++)
                        <li class="page-item {{ $i == $produks->currentPage() ? 'active' : '' }}">
                        <a class="page-link"
                            href="{{ $produks->url($i).'&'.http_build_query(request()->except('page')) }}">
                            {{ $i }}
                        </a>
                        </li>
                        @endfor

                        {{-- NEXT --}}
                        <li class="page-item {{ $produks->hasMorePages() ? '' : 'disabled' }}">
                            <a class="page-link"
                                href="{{ $produks->nextPageUrl() ? $produks->nextPageUrl().'&'.http_build_query(request()->except('page')) : 'javascript:void(0)' }}">
                                ›
                            </a>
                        </li>

                </ul>
            </nav>
        </div>
        @endif
        <!-- ================= END PAGINATION ================= -->


    </div>
</section>
@endsection

@push('styles')
<style>
    /* ===============================
   UMKM COMPACT CARD STYLE
   Green + Black Theme
================================ */

    .umkm-card-compact {
        border: 1px solid #e5e5e5;
        border-radius: 12px;
        overflow: hidden;
        background: #fff;
        transition: .25s ease;
    }

    .umkm-card-compact:hover {
        transform: translateY(-4px);
        box-shadow: 0 10px 24px rgba(0, 0, 0, .08);
    }

    /* ===============================
   IMAGE
================================ */

    .umkm-thumb {
        width: 100%;
        height: 150px;
        /* 🔽 lebih kecil */
        background: #f2f2f2;
        overflow: hidden;
    }

    .umkm-thumb img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: .4s ease;
    }

    .umkm-card-compact:hover img {
        transform: scale(1.06);
    }

    /* ===============================
   BODY
================================ */

    .umkm-body {
        padding: 10px 12px 12px;
    }

    /* Kategori */
    .umkm-category {
        display: inline-block;
        font-size: 10px;
        font-weight: 600;
        background: #05833F;
        /* hijau desa */
        color: #fff;
        padding: 3px 8px;
        border-radius: 20px;
        margin-bottom: 6px;
    }

    /* Nama Produk */
    .umkm-name {
        font-size: 13px;
        font-weight: 600;
        color: #111;
        line-height: 1.4;
        margin-bottom: 4px;
        min-height: 34px;
    }

    /* Harga */
    .umkm-price {
        font-size: 14px;
        font-weight: 700;
        color: #05833F;
        margin-bottom: 2px;
    }

    /* Toko */
    .umkm-store {
        font-size: 13px;
        color: #555;
        margin: 3px 0px;
        font-weight: 800;
    }

    /* Button */
    .umkm-card-compact .btn {
        font-size: 12px;
        border-radius: 8px;
        padding: 6px;
    }

    .custom-pagination .page-link {
        color: #05833F;
        border-radius: 6px;
        padding: 6px 10px;
        margin: 0 2px;
        font-weight: 500;
    }

    .custom-pagination .page-item.active .page-link {
        background-color: #05833F;
        border-color: #05833F;
        color: #fff;
    }

    .custom-pagination .page-item.disabled .page-link {
        opacity: .5;
    }


    

    /* ===============================
   RESPONSIVE
================================ */

    @media (max-width: 575px) {
        .umkm-thumb {
            height: 140px;
        }
    }
</style>
@endpush