@extends('layouts.master')
@section('title', 'Galeri Desa Ajakkang')
@section('meta_description', 'Galeri foto pariwisata dan kegiatan Desa Ajakkang, Kecamatan Soppeng Riaja, Kabupaten Barru')
@section('page-title')
@component('components.page-title')
@slot('title', 'Galeri Desa')
@slot('description', 'Jelajahi keindahan pariwisata dan kegiatan masyarakat Desa Ajakkang melalui galeri foto.')
@endcomponent
@endsection

@php
use App\Http\Controllers\GaleriController;

Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri');
@endphp

@section('content')
<section class="galeri-details section">
  <div class="container" data-aos="fade-up">

    <!-- TAB -->
    <div class="d-flex justify-content-center mb-4">
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#pariwisata">Pariwisata</button>
        </li>
        <li class="nav-item">
          <button class="nav-link" data-bs-toggle="tab" data-bs-target="#kegiatan">Foto Kegiatan Desa</button>
        </li>
      </ul>
    </div>

    <div class="tab-content">

      <!-- ================= PARIWISATA ================= -->
      <div class="tab-pane fade show active" id="pariwisata">

        @php
        $perPage = 6;
        $chunks = $pariwisata->chunk($perPage);
        @endphp

        @foreach ($chunks as $index => $items)
        <div class="row g-4 {{ $index !== 0 ? 'd-none' : '' }}"
          id="pariwisata-page-{{ $index + 1 }}">
          @foreach ($items as $item)
          <div class="col-md-4">
            <div class="card galeri-card">
              <img src="{{ asset('storage/' . $item->foto) }}" class="card-img-top">
              <div class="card-body">
                <h5>{{ $item->nama }}</h5>
                <p>{{ $item->alamat_wisata }}</p>

                @if($item->maps_url)
                <a href="{{ $item->maps_url }}" target="_blank" class="read-more">
                  Lihat di Maps <i class="bi bi-arrow-right"></i>
                </a>
                @endif
              </div>
            </div>
          </div>
          @endforeach
        </div>
        @endforeach

        <!-- Pagination Pariwisata -->
        <nav class="mt-4">
          <ul class="pagination justify-content-center">
            @foreach ($chunks as $index => $items)
            <li class="page-item {{ $index === 0 ? 'active' : '' }}" id="pariwisata-page-{{ $index + 1 }}-btn">
              <a class="page-link"
                href="javascript:void(0)"
                data-page="{{ $index + 1 }}"
                data-total="{{ $chunks->count() }}"
                onclick="showPariwisataPage(this)">
                {{ $index + 1 }}
              </a>
            </li>
            @endforeach
          </ul>
        </nav>
      </div>

      <!-- ================= KEGIATAN ================= -->
      <div class="tab-pane fade" id="kegiatan">

        @php
        $perPageKegiatan = 6;
        $chunksKegiatan = $kegiatan->chunk($perPageKegiatan);
        @endphp

        @foreach ($chunksKegiatan as $index => $items)
        <div class="row g-4 {{ $index !== 0 ? 'd-none' : '' }}"
          id="kegiatan-page-{{ $index + 1 }}">
          @foreach ($items as $item)
          <div class="col-md-4">
            <div class="card galeri-card">
              <img src="{{ asset('storage/' . $item->foto) }}" class="card-img-top">
              <div class="card-body">
                <h5>{{ $item->nama }}</h5>
                <p>{{ $item->deskripsi }}</p>

                @if($item->tanggal_kegiatan)
                <p class="card-date">
                  {{ \Carbon\Carbon::parse($item->tanggal_kegiatan)->translatedFormat('d F Y') }}
                </p>
                @endif
              </div>
            </div>
          </div>
          @endforeach
        </div>
        @endforeach

        <!-- Pagination Kegiatan -->
        <nav class="mt-4">
          <ul class="pagination justify-content-center">
            @foreach ($chunksKegiatan as $index => $items)
            <li class="page-item {{ $index === 0 ? 'active' : '' }}" id="kegiatan-page-{{ $index + 1 }}-btn">
              <a class="page-link"
                href="javascript:void(0)"
                data-page="{{ $index + 1 }}"
                data-total="{{ $chunksKegiatan->count() }}"
                onclick="showKegiatanPage(this)">
                {{ $index + 1 }}
              </a>
            </li>
            @endforeach
          </ul>
        </nav>
      </div>

    </div>
  </div>
</section>


@endsection

@push('scripts')
<script>
  // ================= PARIWISATA =================
  function showPariwisataPage(el) {
    const page = el.dataset.page;

    // Hide semua row pariwisata
    document.querySelectorAll('[id^="pariwisata-page-"]:not([id$="-btn"])')
      .forEach(row => row.classList.add('d-none'));

    // Show row aktif
    const target = document.getElementById(`pariwisata-page-${page}`);
    if (target) target.classList.remove('d-none');

    // Reset active button
    document.querySelectorAll('[id^="pariwisata-page-"][id$="-btn"]')
      .forEach(btn => btn.classList.remove('active'));

    // Set active button
    el.closest('.page-item').classList.add('active');
  }

  // ================= KEGIATAN =================
  function showKegiatanPage(el) {
    const page = el.dataset.page;

    // Hide semua row kegiatan
    document.querySelectorAll('[id^="kegiatan-page-"]:not([id$="-btn"])')
      .forEach(row => row.classList.add('d-none'));

    // Show row aktif
    const target = document.getElementById(`kegiatan-page-${page}`);
    if (target) target.classList.remove('d-none');

    // Reset active button
    document.querySelectorAll('[id^="kegiatan-page-"][id$="-btn"]')
      .forEach(btn => btn.classList.remove('active'));

    // Set active button
    el.closest('.page-item').classList.add('active');
  }

  // ================= TAB EVENT =================
  document.addEventListener('DOMContentLoaded', function () {

    // Saat tab pariwisata dibuka
    document.querySelector('[data-bs-target="#pariwisata"]')
      .addEventListener('shown.bs.tab', function () {
        const first = document.querySelector('#pariwisata-page-1-btn a');
        if (first) showPariwisataPage(first);
      });

    // Saat tab kegiatan dibuka
    document.querySelector('[data-bs-target="#kegiatan"]')
      .addEventListener('shown.bs.tab', function () {
        const first = document.querySelector('#kegiatan-page-1-btn a');
        if (first) showKegiatanPage(first);
      });

  });
</script>
@endpush



@push('styles')
<style>
  :root {
    --primary: #28a745;
    --primary-light: #4dd08a;
    --primary-dark: #1e7e34;
    --text: #212529;
    --text-light: #6c757d;
    --border: #e9ecef;
    --radius: 14px;
    --shadow: 0 6px 20px rgba(0, 0, 0, 0.06);
    --shadow-hover: 0 12px 30px rgba(0, 0, 0, 0.1);
  }

  .galeri-details {
    padding-top: 0px;
    margin-top: 0px;
  }

  .galeri-card {
    border: 1.5px solid var(--border);
    border-radius: var(--radius);
    overflow: hidden;
    box-shadow: var(--shadow);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    height: 100%;
  }

  .galeri-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-hover);
  }

  .galeri-card img {
    height: 200px;
    object-fit: cover;
  }

  .card-body {
    text-align: left;
  }

  .card-date {
    color: var(--text-light);
    font-size: 0.9rem;
    margin-bottom: 0;
  }

  .nav-tabs {
    padding-top: 0;
    padding-bottom: 50px;
    border: none;
  }

  .nav-tabs .nav-link {
    border: none;
    color: var(--text-light);
    font-weight: 600;
    padding: 12px 24px;
    margin: 0 4px;
    border-radius: var(--radius);
    background-color: #f8f9fa;
  }

  .nav-tabs .nav-link.active {
    color: white;
    background-color: var(--primary);
  }

  .pagination .page-item.active .page-link {
    background-color: var(--primary-dark);
    border-color: var(--primary);
  }

  .btn-outline-success {
    border-color: var(--primary);
    color: var(--primary);
  }

  .btn-outline-success:hover {
    background-color: var(--primary);
    color: white;
  }
</style>
@endpush