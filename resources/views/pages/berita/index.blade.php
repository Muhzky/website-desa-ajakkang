@extends('layouts.master')
@section('title', 'Berita Desa Ajakkang')
@section('meta_description', 'Berita terbaru seputar pembangunan, kegiatan, dan informasi penting Desa Ajakkang, Kecamatan Soppeng Riaja, Kabupaten Barru')
@section('page-title')
@component('components.page-title')
@slot('title', 'Berita Desa')
@slot('description', 'Temukan berita terbaru seputar pembangunan, kegiatan, dan informasi penting dari Desa Ajakkang.')
@endcomponent
@endsection
@section('content')
<section class="berita-details section">
  <div class="container" data-aos="fade-up">
    <div class="section-header text-center">
      <div class="title-divider"></div>
    </div>

    <!-- Halaman 1 -->
    <div class="row g-4" id="berita-page-1">
      <!-- Kartu Berita 1 -->
      <div class="col-md-6 col-lg-4">
        <article class="berita-card">
          <img src="https://mistralaichatupprodswe.blob.core.windows.net/chat-images/assistant/a3/23/d1/a323d12b-1cbb-496e-a70e-29ee33450081/730da982-7fad-47a6-b9f8-423b93cced72/6b872e79-f33c-4d50-9dda-e9ee1fb88c51/67d852d2-3060-4144-b665-41290ebe6d0d.jpg" alt="Pembangunan Jalan Baru" class="berita-img">
          <div class="berita-content">
            <h3 class="berita-title"><a href="/berita/detail/1">Pembangunan Jalan Baru</a></h3>
            <p class="berita-excerpt">Pembangunan jalan baru di Desa Ajakkang untuk meningkatkan aksesibilitas warga.</p>
            <div class="berita-meta">
              <div class="meta-item">
                <i class="bi bi-person-circle text-muted me-1"></i>
                <span class="text-muted">Administrator</span>
              </div>
              <div class="meta-item">
                <i class="bi bi-calendar text-muted me-1"></i>
                <span class="text-muted">10 Nov 2025</span>
              </div>
            </div>
            <a href="/berita/detail/1" class="berita-read-more">Baca selengkapnya →</a>
          </div>
        </article>
      </div>
      <!-- Kartu Berita 2 -->
      <div class="col-md-6 col-lg-4">
        <article class="berita-card">
          <img src="https://mistralaichatupprodswe.blob.core.windows.net/chat-images/assistant/a3/23/d1/a323d12b-1cbb-496e-a70e-29ee33450081/730da982-7fad-47a6-b9f8-423b93cced72/97b750eb-9634-434e-8b0c-067f631d63fd/1c509d1f-f5c9-4dde-a74b-d81a19b73034.jpg" alt="Festival Budaya" class="berita-img">
          <div class="berita-content">
            <h3 class="berita-title"><a href="/berita/detail/2">Festival Budaya Desa Ajakkang</a></h3>
            <p class="berita-excerpt">Festival budaya tahunan yang diadakan untuk merayakan kekayaan budaya lokal.</p>
            <div class="berita-meta">
              <div class="meta-item">
                <i class="bi bi-person-circle text-muted me-1"></i>
                <span class="text-muted">Administrator</span>
              </div>
              <div class="meta-item">
                <i class="bi bi-calendar text-muted me-1"></i>
                <span class="text-muted">15 Nov 2025</span>
              </div>
            </div>
            <a href="/berita/detail/2" class="berita-read-more">Baca selengkapnya →</a>
          </div>
        </article>
      </div>
      <!-- Kartu Berita 3 -->
      <div class="col-md-6 col-lg-4">
        <article class="berita-card">
          <img src="https://mistralaichatupprodswe.blob.core.windows.net/chat-images/assistant/a3/23/d1/a323d12b-1cbb-496e-a70e-29ee33450081/730da982-7fad-47a6-b9f8-423b93cced72/c81be36d-31a2-4ff0-b4ef-31891b6b0b4f/b40e9f57-bb20-4d69-803d-a8ea5cd26c1f.jpg" alt="Gotong Royong" class="berita-img">
          <div class="berita-content">
            <h3 class="berita-title"><a href="/berita/detail/3">Gotong Royong Bersih Desa</a></h3>
            <p class="berita-excerpt">Kegiatan membersihkan desa bersama warga untuk menjaga kebersihan lingkungan.</p>
            <div class="berita-meta">
              <div class="meta-item">
                <i class="bi bi-person-circle text-muted me-1"></i>
                <span class="text-muted">Administrator</span>
              </div>
              <div class="meta-item">
                <i class="bi bi-calendar text-muted me-1"></i>
                <span class="text-muted">10 Nov 2025</span>
              </div>
            </div>
            <a href="/berita/detail/3" class="berita-read-more">Baca selengkapnya →</a>
          </div>
        </article>
      </div>
      <!-- Kartu Berita 4 -->
      <div class="col-md-6 col-lg-4">
        <article class="berita-card">
          <img src="https://example.com/path-to-kegiatan4.jpg" alt="Upacara Adat" class="berita-img">
          <div class="berita-content">
            <h3 class="berita-title"><a href="/berita/detail/4">Upacara Adat Desa</a></h3>
            <p class="berita-excerpt">Upacara adat yang dilakukan untuk memohon keselamatan dan kemakmuran desa.</p>
            <div class="berita-meta">
              <div class="meta-item">
                <i class="bi bi-person-circle text-muted me-1"></i>
                <span class="text-muted">Administrator</span>
              </div>
              <div class="meta-item">
                <i class="bi bi-calendar text-muted me-1"></i>
                <span class="text-muted">5 Nov 2025</span>
              </div>
            </div>
            <a href="/berita/detail/4" class="berita-read-more">Baca selengkapnya →</a>
          </div>
        </article>
      </div>
      <!-- Kartu Berita 5 -->
      <div class="col-md-6 col-lg-4">
        <article class="berita-card">
          <img src="https://example.com/path-to-kegiatan5.jpg" alt="Pertanian" class="berita-img">
          <div class="berita-content">
            <h3 class="berita-title"><a href="/berita/detail/5">Panen Raya 2025</a></h3>
            <p class="berita-excerpt">Kegiatan panen raya yang dilakukan bersama-sama oleh petani desa.</p>
            <div class="berita-meta">
              <div class="meta-item">
                <i class="bi bi-person-circle text-muted me-1"></i>
                <span class="text-muted">Administrator</span>
              </div>
              <div class="meta-item">
                <i class="bi bi-calendar text-muted me-1"></i>
                <span class="text-muted">20 Okt 2025</span>
              </div>
            </div>
            <a href="/berita/detail/5" class="berita-read-more">Baca selengkapnya →</a>
          </div>
        </article>
      </div>
      <!-- Kartu Berita 6 -->
      <div class="col-md-6 col-lg-4">
        <article class="berita-card">
          <img src="https://example.com/path-to-kegiatan6.jpg" alt="Olahraga" class="berita-img">
          <div class="berita-content">
            <h3 class="berita-title"><a href="/berita/detail/6">Turnamen Olahraga Antar-Warga</a></h3>
            <p class="berita-excerpt">Turnamen olahraga antar-warga untuk mempererat hubungan sosial.</p>
            <div class="berita-meta">
              <div class="meta-item">
                <i class="bi bi-person-circle text-muted me-1"></i>
                <span class="text-muted">Administrator</span>
              </div>
              <div class="meta-item">
                <i class="bi bi-calendar text-muted me-1"></i>
                <span class="text-muted">25 Okt 2025</span>
              </div>
            </div>
            <a href="/berita/detail/6" class="berita-read-more">Baca selengkapnya →</a>
          </div>
        </article>
      </div>
    </div>

    <!-- Halaman 2 (disembunyikan awalnya) -->
    <div class="row g-4 d-none" id="berita-page-2">
      <!-- Kartu Berita 7 -->
      <div class="col-md-6 col-lg-4">
        <article class="berita-card">
          <img src="https://example.com/path-to-kegiatan7.jpg" alt="Kerajinan" class="berita-img">
          <div class="berita-content">
            <h3 class="berita-title"><a href="/berita/detail/7">Pelatihan Kerajinan Tangan</a></h3>
            <p class="berita-excerpt">Pembuatan kerajinan tangan oleh ibu-ibu desa untuk meningkatkan perekonomian keluarga.</p>
            <div class="berita-meta">
              <div class="meta-item">
                <i class="bi bi-person-circle text-muted me-1"></i>
                <span class="text-muted">Administrator</span>
              </div>
              <div class="meta-item">
                <i class="bi bi-calendar text-muted me-1"></i>
                <span class="text-muted">18 Nov 2025</span>
              </div>
            </div>
            <a href="/berita/detail/7" class="berita-read-more">Baca selengkapnya →</a>
          </div>
        </article>
      </div>
      <!-- Kartu Berita 8 -->
      <div class="col-md-6 col-lg-4">
        <article class="berita-card">
          <img src="https://example.com/path-to-kegiatan8.jpg" alt="Pertemuan" class="berita-img">
          <div class="berita-content">
            <h3 class="berita-title"><a href="/berita/detail/8">Pertemuan Pembangunan Desa</a></h3>
            <p class="berita-excerpt">Pertemuan warga desa untuk membahas rencana pembangunan tahun 2026.</p>
            <div class="berita-meta">
              <div class="meta-item">
                <i class="bi bi-person-circle text-muted me-1"></i>
                <span class="text-muted">Administrator</span>
              </div>
              <div class="meta-item">
                <i class="bi bi-calendar text-muted me-1"></i>
                <span class="text-muted">12 Nov 2025</span>
              </div>
            </div>
            <a href="/berita/detail/8" class="berita-read-more">Baca selengkapnya →</a>
          </div>
        </article>
      </div>
      <!-- Kartu Berita 9 -->
      <div class="col-md-6 col-lg-4">
        <article class="berita-card">
          <img src="https://example.com/path-to-kegiatan9.jpg" alt="Senam" class="berita-img">
          <div class="berita-content">
            <h3 class="berita-title"><a href="/berita/detail/9">Senam Pagi Bersama</a></h3>
            <p class="berita-excerpt">Senam pagi bersama untuk menjaga kesehatan warga desa.</p>
            <div class="berita-meta">
              <div class="meta-item">
                <i class="bi bi-person-circle text-muted me-1"></i>
                <span class="text-muted">Administrator</span>
              </div>
              <div class="meta-item">
                <i class="bi bi-calendar text-muted me-1"></i>
                <span class="text-muted">8 Nov 2025</span>
              </div>
            </div>
            <a href="/berita/detail/9" class="berita-read-more">Baca selengkapnya →</a>
          </div>
        </article>
      </div>
    </div>

    <!-- Paginasi Berita -->
    <nav aria-label="Page navigation" class="mt-4">
      <ul class="pagination justify-content-center">
        <li class="page-item active" id="berita-page-1-btn"><a class="page-link" href="#" onclick="showBeritaPage(1)">1</a></li>
        <li class="page-item" id="berita-page-2-btn"><a class="page-link" href="#" onclick="showBeritaPage(2)">2</a></li>
      </ul>
    </nav>
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
    border: none;
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
