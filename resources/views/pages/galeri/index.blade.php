@extends('layouts.master')
@section('title', 'Galeri Desa Ajakkang')
@section('meta_description', 'Galeri foto pariwisata dan kegiatan Desa Ajakkang, Kecamatan Soppeng Riaja, Kabupaten Barru')
@section('page-title')
@component('components.page-title')
@slot('title', 'Galeri Desa')
@slot('description', 'Jelajahi keindahan pariwisata dan kegiatan masyarakat Desa Ajakkang melalui galeri foto.')
@endcomponent
@endsection
@section('content')
<section class="galeri-details section">
  <div class="container" data-aos="fade-up">
    <div class="section-header text-center">
      <div class="title-divider"></div>
    </div>

    <!-- Tab Navigation (Centered) -->
    <div class="d-flex justify-content-center mb-4">
      <ul class="nav nav-tabs" id="galeriTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="pariwisata-tab" data-bs-toggle="tab" data-bs-target="#pariwisata" type="button" role="tab" aria-controls="pariwisata" aria-selected="true">Pariwisata</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="kegiatan-tab" data-bs-toggle="tab" data-bs-target="#kegiatan" type="button" role="tab" aria-controls="kegiatan" aria-selected="false">Foto Kegiatan Desa</button>
        </li>
      </ul>
    </div>

    <!-- Tab Content -->
    <div class="tab-content" id="galeriTabContent">
      <!-- Tab Pariwisata -->
      <div class="tab-pane fade show active" id="pariwisata" role="tabpanel" aria-labelledby="pariwisata-tab">
        <!-- Halaman 1 -->
        <div class="row g-4" id="pariwisata-page-1">
          <div class="col-md-4">
            <div class="card galeri-card">
              <img src="https://mistralaichatupprodswe.blob.core.windows.net/chat-images/assistant/a3/23/d1/a323d12b-1cbb-496e-a70e-29ee33450081/730da982-7fad-47a6-b9f8-423b93cced72/6b872e79-f33c-4d50-9dda-e9ee1fb88c51/67d852d2-3060-4144-b665-41290ebe6d0d.jpg" class="card-img-top" alt="Rumah Tradisional">
              <div class="card-body">
                <h5 class="card-title">Rumah Tradisional</h5>
                <p class="card-text">Rumah adat dengan pemandangan sawah.</p>
                <a href="https://maps.app.goo.gl/..." target="_blank" class="read-more">Kunjungi Wisata <i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card galeri-card">
              <img src="https://mistralaichatupprodswe.blob.core.windows.net/chat-images/assistant/a3/23/d1/a323d12b-1cbb-496e-a70e-29ee33450081/730da982-7fad-47a6-b9f8-423b93cced72/97b750eb-9634-434e-8b0c-067f631d63fd/1c509d1f-f5c9-4dde-a74b-d81a19b73034.jpg" class="card-img-top" alt="Pantai Indah">
              <div class="card-body">
                <h5 class="card-title">Pantai Indah</h5>
                <p class="card-text">Pantai dengan pasir putih dan air jernih.</p>
                <a href="https://maps.app.goo.gl/..." target="_blank" class="read-more">Kunjungi Wisata <i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card galeri-card">
              <img src="https://mistralaichatupprodswe.blob.core.windows.net/chat-images/assistant/a3/23/d1/a323d12b-1cbb-496e-a70e-29ee33450081/730da982-7fad-47a6-b9f8-423b93cced72/c81be36d-31a2-4ff0-b4ef-31891b6b0b4f/b40e9f57-bb20-4d69-803d-a8ea5cd26c1f.jpg" class="card-img-top" alt="Sawah Hijau">
              <div class="card-body">
                <h5 class="card-title">Sawah Hijau</h5>
                <p class="card-text">Hamparan sawah yang luas dan subur.</p>
                <a href="https://maps.app.goo.gl/..." target="_blank" class="read-more">Kunjungi Wisata <i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card galeri-card">
              <img src="https://mistralaichatupprodswe.blob.core.windows.net/chat-images/assistant/a3/23/d1/a323d12b-1cbb-496e-a70e-29ee33450081/730da982-7fad-47a6-b9f8-423b93cced72/bad713dd-2315-4dea-a99e-98e852e90e65/14893db9-d1af-4950-b522-20f6ad9690d0.jpg" class="card-img-top" alt="Pegunungan">
              <div class="card-body">
                <h5 class="card-title">Pegunungan</h5>
                <p class="card-text">Pemandangan pegunungan yang menakjubkan.</p>
                <a href="https://maps.app.goo.gl/..." target="_blank" class="read-more">Kunjungi Wisata <i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card galeri-card">
              <img src="https://example.com/path-to-image6.jpg" class="card-img-top" alt="Danau">
              <div class="card-body">
                <h5 class="card-title">Danau</h5>
                <p class="card-text">Danau yang tenang dan damai.</p>
                <a href="https://maps.app.goo.gl/..." target="_blank" class="read-more">Kunjungi Wisata <i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card galeri-card">
              <img src="https://example.com/path-to-image7.jpg" class="card-img-top" alt="Hutan">
              <div class="card-body">
                <h5 class="card-title">Hutan</h5>
                <p class="card-text">Hutan yang rindang dan asri.</p>
                <a href="https://maps.app.goo.gl/..." target="_blank" class="read-more">Kunjungi Wisata <i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
          </div>
        </div>
        <!-- Halaman 2 (disembunyikan awalnya) -->
        <div class="row g-4 d-none" id="pariwisata-page-2">
          <div class="col-md-4">
            <div class="card galeri-card">
              <img src="https://example.com/path-to-image8.jpg" class="card-img-top" alt="Pesisir">
              <div class="card-body">
                <h5 class="card-title">Pesisir</h5>
                <p class="card-text">Pesisir pantai yang menawan.</p>
                <a href="https://maps.app.goo.gl/..." target="_blank" class="read-more">Kunjungi Wisata <i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card galeri-card">
              <img src="https://example.com/path-to-image9.jpg" class="card-img-top" alt="Sunset">
              <div class="card-body">
                <h5 class="card-title">Sunset</h5>
                <p class="card-text">Sunset yang memukau di pantai.</p>
                <a href="https://maps.app.goo.gl/..." target="_blank" class="read-more">Kunjungi Wisata <i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
          </div>
        </div>
        <!-- Paginasi Pariwisata -->
        <nav aria-label="Page navigation" class="mt-4">
          <ul class="pagination justify-content-center">
            <li class="page-item active" id="pariwisata-page-1-btn"><a class="page-link" href="#" onclick="showPariwisataPage(1)">1</a></li>
            <li class="page-item" id="pariwisata-page-2-btn"><a class="page-link" href="#" onclick="showPariwisataPage(2)">2</a></li>
          </ul>
        </nav>
      </div>

      <!-- Tab Foto Kegiatan Desa -->
      <div class="tab-pane fade" id="kegiatan" role="tabpanel" aria-labelledby="kegiatan-tab">
        <!-- Halaman 1 -->
        <div class="row g-4" id="kegiatan-page-1">
          <div class="col-md-4">
            <div class="card galeri-card">
              <img src="https://mistralaichatupprodswe.blob.core.windows.net/chat-images/assistant/a3/23/d1/a323d12b-1cbb-496e-a70e-29ee33450081/730da982-7fad-47a6-b9f8-423b93cced72/5336abee-5af8-4bd4-bf40-990779da2150/f0bda1ba-d126-4252-99df-d05b0c8f733a.jpg" class="card-img-top" alt="Festival Desa">
              <div class="card-body">
                <h5 class="card-title">Festival Desa</h5>
                <p class="card-text">Festival budaya tahunan yang diadakan untuk merayakan kekayaan budaya lokal.</p>
                <p class="card-date">Tanggal: 15 November 2025</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card galeri-card">
              <img src="https://example.com/path-to-kegiatan2.jpg" class="card-img-top" alt="Gotong Royong">
              <div class="card-body">
                <h5 class="card-title">Gotong Royong</h5>
                <p class="card-text">Kegiatan membersihkan desa bersama warga untuk menjaga kebersihan lingkungan.</p>
                <p class="card-date">Tanggal: 10 November 2025</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card galeri-card">
              <img src="https://example.com/path-to-kegiatan3.jpg" class="card-img-top" alt="Upacara Adat">
              <div class="card-body">
                <h5 class="card-title">Upacara Adat</h5>
                <p class="card-text">Upacara adat yang dilakukan untuk memohon keselamatan dan kemakmuran desa.</p>
                <p class="card-date">Tanggal: 5 November 2025</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card galeri-card">
              <img src="https://example.com/path-to-kegiatan4.jpg" class="card-img-top" alt="Pertanian">
              <div class="card-body">
                <h5 class="card-title">Pertanian</h5>
                <p class="card-text">Kegiatan panen raya yang dilakukan bersama-sama oleh petani desa.</p>
                <p class="card-date">Tanggal: 20 Oktober 2025</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card galeri-card">
              <img src="https://example.com/path-to-kegiatan5.jpg" class="card-img-top" alt="Pembelajaran">
              <div class="card-body">
                <h5 class="card-title">Pembelajaran</h5>
                <p class="card-text">Kegiatan belajar mengajar di balai desa untuk meningkatkan pengetahuan warga.</p>
                <p class="card-date">Tanggal: 1 November 2025</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card galeri-card">
              <img src="https://example.com/path-to-kegiatan6.jpg" class="card-img-top" alt="Olahraga">
              <div class="card-body">
                <h5 class="card-title">Olahraga</h5>
                <p class="card-text">Turnamen olahraga antar-warga untuk mempererat hubungan sosial.</p>
                <p class="card-date">Tanggal: 25 Oktober 2025</p>
              </div>
            </div>
          </div>
        </div>
        <!-- Halaman 2 (disembunyikan awalnya) -->
        <div class="row g-4 d-none" id="kegiatan-page-2">
          <div class="col-md-4">
            <div class="card galeri-card">
              <img src="https://example.com/path-to-kegiatan7.jpg" class="card-img-top" alt="Kerajinan">
              <div class="card-body">
                <h5 class="card-title">Kerajinan</h5>
                <p class="card-text">Pembuatan kerajinan tangan oleh ibu-ibu desa.</p>
                <p class="card-date">Tanggal: 18 November 2025</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card galeri-card">
              <img src="https://example.com/path-to-kegiatan8.jpg" class="card-img-top" alt="Pertemuan">
              <div class="card-body">
                <h5 class="card-title">Pertemuan</h5>
                <p class="card-text">Pertemuan warga desa untuk membahas rencana pembangunan.</p>
                <p class="card-date">Tanggal: 12 November 2025</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card galeri-card">
              <img src="https://example.com/path-to-kegiatan9.jpg" class="card-img-top" alt="Senam">
              <div class="card-body">
                <h5 class="card-title">Senam</h5>
                <p class="card-text">Senam pagi bersama untuk menjaga kesehatan warga.</p>
                <p class="card-date">Tanggal: 8 November 2025</p>
              </div>
            </div>
          </div>
        </div>
        <!-- Paginasi Kegiatan -->
        <nav aria-label="Page navigation" class="mt-4">
          <ul class="pagination justify-content-center">
            <li class="page-item active" id="kegiatan-page-1-btn"><a class="page-link" href="#" onclick="showKegiatanPage(1)">1</a></li>
            <li class="page-item" id="kegiatan-page-2-btn"><a class="page-link" href="#" onclick="showKegiatanPage(2)">2</a></li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</section>

<script>
   
function showPariwisataPage(page) {
  if (page === 1) {
    document.getElementById('pariwisata-page-1').classList.remove('d-none');
    document.getElementById('pariwisata-page-2').classList.add('d-none');
    document.getElementById('pariwisata-page-1-btn').classList.add('active');
    document.getElementById('pariwisata-page-2-btn').classList.remove('active');
  } else {
    document.getElementById('pariwisata-page-1').classList.add('d-none');
    document.getElementById('pariwisata-page-2').classList.remove('d-none');
    document.getElementById('pariwisata-page-1-btn').classList.remove('active');
    document.getElementById('pariwisata-page-2-btn').classList.add('active');
  }
}

function showKegiatanPage(page) {
  if (page === 1) {
    document.getElementById('kegiatan-page-1').classList.remove('d-none');
    document.getElementById('kegiatan-page-2').classList.add('d-none');
    document.getElementById('kegiatan-page-1-btn').classList.add('active');
    document.getElementById('kegiatan-page-2-btn').classList.remove('active');
  } else {
    document.getElementById('kegiatan-page-1').classList.add('d-none');
    document.getElementById('kegiatan-page-2').classList.remove('d-none');
    document.getElementById('kegiatan-page-1-btn').classList.remove('active');
    document.getElementById('kegiatan-page-2-btn').classList.add('active');
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
  .galeri-details {
    padding-top: 0px;
    margin-top: 0px;
  }
  .galeri-card {
    border: none;
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
