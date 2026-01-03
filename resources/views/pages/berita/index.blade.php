@extends('layouts.master')
@section('title', 'Informasi Desa Ajakkang')
@section('meta_description', 'Berita terbaru seputar pembangunan, kegiatan, dan informasi penting Desa Ajakkang, Kecamatan Soppeng Riaja, Kabupaten Barru')
@section('page-title')
@component('components.page-title')
@slot('title', 'Informasi Desa')
@slot('description', 'Temukan Informasi terbaru seputar pembangunan, kegiatan, dan info penting dari Desa Ajakkang.')
@endcomponent
@endsection

@section('content')
<section class="berita-details section">
  <div class="container" data-aos="fade-up">
    <div class="section-header text-center">
      <div class="title-divider"></div>
    </div>

    <div class="row g-4">

      @foreach ($beritas as $berita)
      <div class="col-md-6 col-lg-4">
        <article class="berita-card">
          <img
            src="{{ asset('storage/' . $berita->foto) }}"
            alt="{{ $berita->judul }}"
            class="berita-img">

          <div class="berita-content">
            <h3 class="berita-title">
              <a href="/berita/detail/{{ $berita->id }}">
                {{ $berita->judul }}
              </a>
            </h3>

            <p class="berita-excerpt">
              {{ Str::limit($berita->deskripsi, 120) }}
            </p>

            <div class="berita-meta">
              <div class="meta-item">
                <i class="bi bi-person-circle text-muted me-1"></i>
                <span class="text-muted">Administrator</span>
              </div>

              <div class="meta-item">
                <i class="bi bi-calendar text-muted me-1"></i>
                <span class="text-muted">
                  {{ \Carbon\Carbon::parse($berita->tanggal)->format('d M Y') }}
                </span>
              </div>
            </div>

            <a href="{{ route('pages.berita.detail', $berita->id) }}" class="berita-read-more">
              Baca selengkapnya →
            </a>
          </div>
        </article>
      </div>
      @endforeach

    </div>


    <!-- Paginasi Berita -->
    <div class="mt-5 d-flex justify-content-center align-items-center ">
      {{ $beritas->links('pagination::bootstrap-5') }}
    </div>

  </div>
</section>

<script>
  function showBeritaPage(page) {
    if (page === 1) {
      document.getElementById('berita-page-1').classList.remove('d-none');
      document.getElementById('berita-page-2').classList.add('d-none');
      document.getElementById('berita-page-1-btn').classList.add('active');
      document.getElementById('berita-page-2-btn').classList.remove('active');
    } else {
      document.getElementById('berita-page-1').classList.add('d-none');
      document.getElementById('berita-page-2').classList.remove('d-none');
      document.getElementById('berita-page-1-btn').classList.remove('active');
      document.getElementById('berita-page-2-btn').classList.add('active');
    }
  }
</script>
@endsection

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

  .berita-details {
    padding-top: 0px;
    margin-top: 0px;
  }

  .berita-card {
    border: 1.5px solid var(--border);
    border-radius: var(--radius);
    overflow: hidden;
    box-shadow: var(--shadow);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    height: 100%;
    display: flex;
    flex-direction: column;
  }

  .berita-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-hover);
  }

  .berita-img {
    height: 200px;
    object-fit: cover;
    width: 100%;
  }

  .berita-content {
    padding: 1.25rem;
    flex: 1;
    display: flex;
    flex-direction: column;
  }

  .berita-title {
    font-size: 1.25rem;
    margin-bottom: 0.75rem;
  }

  .berita-title a {
    color: var(--text);
    text-decoration: none;
  }

  .berita-title a:hover {
    color: var(--primary);
  }

  .berita-excerpt {
    color: var(--text-light);
    margin-bottom: 1rem;
    flex: 1;
  }

  .berita-meta {
    display: flex;
    justify-content: space-between;
    margin-bottom: 1rem;
    font-size: 0.9rem;
  }

  .meta-item {
    display: flex;
    align-items: center;
  }

  .berita-read-more {
    color: var(--primary);
    text-decoration: none;
    font-weight: 600;
    align-self: flex-start;
  }

  .berita-read-more:hover {
    text-decoration: underline;
  }

  .pagination .page-item.active .page-link {
    background-color: var(--primary-dark);
    border-color: var(--primary);
  }
</style>
@endpush