@extends('layouts.master')

@section('title', $beritas->judul)
@section('meta_description', Str::limit(strip_tags($beritas->deskripsi), 150))

@section('page-title')
@component('components.page-title')
@slot('title', $beritas->judul)
@slot('description', 'Informasi Desa Ajakkang')
@slot('parent', 'Informasi')
@slot('parentUrl', Request::is('/') ? '' : url(''))
@endcomponent
@endsection

@section('content')

<style>
  /* =========================
   DETAIL BERITA DENGAN SIDEBAR
========================= */

  .berita-details-sidebar {
    padding: 60px 0;
    background-color: #f8f9fa;
  }

  .berita-image img {
    max-height: 420px;
    width: 100%;
    object-fit: cover;
    border-radius: 12px;
    box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
  }

  /* Meta */
  .berita-meta {
    display: flex;
    justify-content: space-between;
    font-size: 14px;
    color: #6c757d;
    margin-bottom: 20px;
  }

  .berita-meta i {
    margin-right: 6px;
    color: #198754;
  }

  /* Judul */
  .berita-title {
    font-size: 30px;
    font-weight: 700;
    margin-bottom: 24px;
    color: #212529;
  }

  /* Konten */
  .berita-content {
    font-size: 16px;
    line-height: 1.9;
    color: #343a40;
  }

  .berita-content p {
    margin-bottom: 16px;
  }

  /* Tombol kembali */
  .btn-back {
    display: inline-block;
    margin-top: 40px;
    padding: 10px 24px;
    border-radius: 50px;
    border: 1px solid #198754;
    color: #198754;
    text-decoration: none;
    transition: all 0.3s ease;
  }

  .btn-back:hover {
    background-color: #198754;
    color: #fff;
  }

  /* Sidebar */
  .sidebar {
    background-color: #fff;
    border-radius: 12px;
    padding: 24px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    height: fit-content;
  }

  .sidebar-title {
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 20px;
    color: #212529;
    border-bottom: 1px solid #eee;
    padding-bottom: 12px;
  }

  .sidebar-item {
    display: block;
    padding: 12px 0;
    border-bottom: 1px solid #f0f0f0;
    color: #343a40;
    text-decoration: none;
    transition: color 0.3s ease;
  }

  .sidebar-item:hover {
    color: #198754;
  }

  /* Thumbnail di sidebar */
  .sidebar-thumbnail {
    width: 80px;
    height: 60px;
    object-fit: cover;
    border-radius: 6px;
    margin-right: 12px;
  }

  /* Responsive */
  @media (max-width: 992px) {
    .berita-title {
      font-size: 24px;
    }

    .berita-meta {
      flex-direction: column;
      gap: 6px;
    }
  }

  @media (max-width: 768px) {
    .sidebar {
      margin-top: 40px;
    }
  }
</style>

<section class="berita-details-sidebar section">
  <div class="container" data-aos="fade-up">
    <div class="row justify-content-center">
      <!-- Kolom Utama: Konten Berita -->
      <div class="col-lg-8">
        <!-- Gambar -->
        <div class="berita-image mb-4 text-center">
          <img
            src="{{ asset('storage/' . $beritas->foto) }}"
            alt="{{ $beritas->judul }}">
        </div>

        <!-- Meta -->
        <div class="berita-meta">
          <span>
            <i class="bi bi-person-circle"></i> Administrator
          </span>
          <span>
            <i class="bi bi-calendar"></i>
            {{ \Carbon\Carbon::parse($beritas->tanggal)->format('d M Y') }}
          </span>
        </div>

        <!-- Judul -->
        <h1 class="berita-title">{{ $beritas->judul }}</h1>

        <!-- Konten -->
        <div class="berita-content">
          {!! nl2br(e($beritas->deskripsi)) !!}
        </div>

        <!-- Back -->
        <a href="{{ route('pages.berita.index') }}" class="btn-back">
          ← Kembali ke Informasi Desa
        </a>
      </div>

      <!-- Kolom Samping: Sidebar -->
      <div class="col-lg-4">
        <div class="sidebar">
          <h3 class="sidebar-title">Berita Terbaru</h3>
          @foreach($beritaTerbaru as $berita)
          <a href="{{ route('pages.berita.detail', $berita->id) }}" class="sidebar-item">
            <div class="d-flex align-items-center">
              <img
                src="{{ asset('storage/' . $berita->foto) }}"
                alt="{{ $berita->judul }}"
                class="sidebar-thumbnail">
              <div class="flex-grow-1">
                <div class="d-flex justify-content-between">
                  <span>{{ Str::limit($berita->judul, 30) }}</span>
                  <small class="text-muted">
                    {{ \Carbon\Carbon::parse($berita->tanggal)->format('d M') }}
                  </small>
                </div>
              </div>
            </div>
          </a>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>

@endsection