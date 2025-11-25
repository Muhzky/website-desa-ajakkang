@extends('layouts.master')

@section('title', 'Struktur Kepengurusan Posyandu Desa Ajakkang')
@section('meta_description', 'Struktur organisasi Posyandu di Desa Ajakkang, Kecamatan Soppeng Riaja, Kabupaten Barru.')

@section('page-title')
@component('components.page-title')
    @slot('title', 'Struktur Posyandu')
    @slot('description', 'Berikut adalah struktur organisasi Posyandu di Desa Ajakkang.')
    @slot('parent', 'Struktur')
    @slot('parentUrl', Request::is('/') ? '' : url(''))
@endcomponent
@endsection

@section('content')
<section class="struktur-kepengurusan section">
  <div class="container" data-aos="fade-up">
    <div class="row justify-content-center mb-5">
      <div class="col-lg-10">
        <div id="posyanduCarousel" class="carousel slide position-relative" data-bs-ride="carousel">
          <div class="carousel-inner rounded-3 overflow-hidden shadow-sm">
            <div class="carousel-item active">
              <img src="{{ asset('assets/img/struktur-pemdes.jpg') }}" alt="Struktur Posyandu 1 Desa Ajakkang" class="d-block w-100 GLightbox posyandu" style="max-height: 600px; object-fit: contain;">
            </div>
            <div class="carousel-item">
              <img src="{{ asset('assets/img/struktur-pemdes.jpg') }}" alt="Struktur Posyandu 2 Desa Ajakkang" class="d-block w-100 GLightbox posyandu" style="max-height: 600px; object-fit: contain;">
            </div>
            <div class="carousel-item">
              <img src="{{ asset('assets/img/struktur-pemdes.jpg') }}" alt="Struktur Posyandu 3 Desa Ajakkang" class="d-block w-100 GLightbox posyandu" style="max-height: 600px; object-fit: contain;">
            </div>
            <div class="carousel-item">
              <img src="{{ asset('assets/img/struktur-pemdes.jpg') }}" alt="Struktur Posyandu 4 Desa Ajakkang" class="d-block w-100 GLightbox posyandu" style="max-height: 600px; object-fit: contain;">
            </div>
          </div>

          <!-- Tombol Prev - di dalam gambar -->
          <button class="carousel-control-prev carousel-control-inside" type="button" data-bs-target="#posyanduCarousel" data-bs-slide="prev">
            <span class="visually-hidden">Previous</span>
          </button>

          <!-- Tombol Next - di dalam gambar -->
          <button class="carousel-control-next carousel-control-inside" type="button" data-bs-target="#posyanduCarousel" data-bs-slide="next">
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push('styles')
<style>
  :root {
    --primary: #28a745;
    --primary-dark: #218838;
  }

  .struktur-kepengurusan {
    padding: 40px 0 100px;
  }

  /* Pastikan carousel relatif agar tombol bisa diposisikan absolut di dalamnya */
  #posyanduCarousel {
    position: relative;
  }

  /* Sembunyikan ikon bawaan Bootstrap */
  .carousel-control-prev-icon,
  .carousel-control-next-icon {
    display: none;
    overflow: hidden;
  }

  /* Gaya tombol kustom di dalam gambar */
  .carousel-control-inside {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 48px;
    height: 48px;
    background-color: var(--primary);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.25);
    border: none;
    outline: none;
    z-index: 10;
    transition: all 0.25s ease;
    opacity: 0.9;
    overflow: hidden;
  }

  .carousel-control-inside:hover {
    background-color: var(--primary-dark);
    opacity: 1;
    transform: translateY(-50%) scale(1.05);
    overflow: hidden;
  }



  /* Ikon SVG sebagai background */
  .carousel-control-prev::after {
    content: "";
    display: block;
    width: 20px;
    height: 20px;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23fff' viewBox='0 0 16 16'%3E%3Cpath d='M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z'/%3E%3C/svg%3E");
    background-size: contain;
    background-repeat: no-repeat;
    overflow: hidden;
  }

  .carousel-control-next::after {
    content: "";
    display: block;
    width: 20px;
    height: 20px;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23fff' viewBox='0 0 16 16'%3E%3Cpath d='M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z'/%3E%3C/svg%3E");
    background-size: contain;
    background-repeat: no-repeat;
    overflow: hidden;
  }

  /* Responsif untuk mobile */
  @media (max-width: 768px) {
    .carousel-control-inside {
      width: 40px;
      height: 40px;
    }

    .carousel-control-prev::after,
    .carousel-control-next::after {
      width: 16px;
      height: 16px;
    }

    .carousel-control-prev {
      left: 12px;
    }

    .carousel-control-next {
      right: 12px;
    }
  }
</style>
@endpush

@push('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const lightbox = GLightbox({
      selector: '.posyandu'
    });
  });
</script>
@endpush


...
