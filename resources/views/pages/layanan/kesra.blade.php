@extends('layouts.master')
@section('title', 'Layanan Kesra - Desa Batupute')
@section('meta_description', 'Informasi bantuan sosial (Kesra) di Desa Batupute: BLT, bantuan bibit, dan program lainnya.')
@section('page-title')
@component('components.page-title')
@slot('title', 'Layanan Kesra')
@slot('description', 'Pilih jenis bantuan untuk melihat informasi dan mengunduh dokumen.')
@slot('parent', 'Layanan')
@slot('parentUrl', Request::is('/') ? '#layanan-kami' : url('/#layanan-kami'))
@endcomponent
@endsection
@section('content')
<section class="layanan-pemerintahan section">
  <div class="container" data-aos="fade-up">
    <div class="row g-4">
      <!-- Gambar: di atas di HP, di kiri di desktop -->
      <div class="col-12 col-lg-5 d-flex justify-content-center">
        <img src="{{ asset('assets/img/icon/undraw_document-ready_o5d5.svg') }}"
             alt="Ilustrasi Layanan Kesra Desa Batupute"
             class="img-fluid rounded shadow-sm layanan-illustration"
             style="width: 60%; height: auto;">
      </div>
      <!-- Layanan: di bawah di HP, di kanan di desktop -->
      <div class="col-12 col-lg-7">
        <div class="service-selector">
          <!-- Tombol utama untuk membuka daftar bantuan -->
          <button id="toggleLayananBtn" class="btn btn-outline-primary w-100 text-start d-flex justify-content-between align-items-center"
                  type="button">
            <span id="selectedLayananLabel">Pilih Jenis Bantuan</span>
            <i class="bi bi-chevron-down"></i>
          </button>
          <!-- Daftar Bantuan (sembunyi secara default) -->
          <ul id="layananList" class="layanan-options mt-2" style="display: none;">
            <li data-key="blt_september_2025" class="layanan-item">
              <div class="d-flex justify-content-between align-items-center">
                <span>BLT Bulan September 2025</span>
                <i class="bi bi-file-earmark-pdf text-danger"></i>
              </div>
            </li>
            <li data-key="blt_agustus_2025" class="layanan-item">
              <div class="d-flex justify-content-between align-items-center">
                <span>BLT Bulan Agustus 2025</span>
                <i class="bi bi-clock-history text-muted"></i>
              </div>
            </li>
            <li data-key="blt_juli_2025" class="layanan-item">
              <div class="d-flex justify-content-between align-items-center">
                <span>BLT Bulan Juli 2025</span>
                <i class="bi bi-clock-history text-muted"></i>
              </div>
            </li>
            <li data-key="blt_juni_2025" class="layanan-item">
              <div class="d-flex justify-content-between align-items-center">
                <span>BLT Bulan Juni 2025</span>
                <i class="bi bi-clock-history text-muted"></i>
              </div>
            </li>
            <li data-key="blt_mei_2025" class="layanan-item">
              <div class="d-flex justify-content-between align-items-center">
                <span>BLT Bulan Mei 2025</span>
                <i class="bi bi-clock-history text-muted"></i>
              </div>
            </li>
            <li data-key="blt_jan_mar_2025" class="layanan-item">
              <div class="d-flex justify-content-between align-items-center">
                <span>BLT Bulan Januari-Maret 2025</span>
                <i class="bi bi-clock-history text-muted"></i>
              </div>
            </li>
            <li data-key="bantuan_bibit_padi_2025" class="layanan-item">
              <div class="d-flex justify-content-between align-items-center">
                <span>Bantuan Bibit Padi 2025</span>
                <i class="bi bi-clock-history text-muted"></i>
              </div>
            </li>
            <li data-key="blt_2025" class="layanan-item">
              <div class="d-flex justify-content-between align-items-center">
                <span>BLT 2025 (Umum)</span>
                <i class="bi bi-clock-history text-muted"></i>
              </div>
            </li>
          </ul>
          <!-- Area Konten Dinamis -->
          <div id="layananContent" class="mt-4" style="display: none;">
            <div class="service-content">
              <h4 id="layananTitle"></h4>
              <h5 class="mt-3">Deskripsi:</h5>
              <div id="deskripsiKesra" class="mt-2"></div>
              <div class="d-flex gap-2 mt-3">
                <a id="downloadDokumenBtn" class="btn btn-primary" style="display: none;" download>
                  <i class="bi bi-download me-2"></i>Unduh
                </a>
                <button id="dokumenPendingBtn" class="btn btn-outline-secondary" style="display: none;" disabled>
                  <i class="bi bi-clock me-2"></i>Dokumen Sedang Disiapkan
                </button>
              </div>
              <div class="info-callout mt-4">
                <i class="bi bi-info-circle"></i>
                <div>
                  Silakan hubungi Kantor Desa Batupute pada jam kerja (Senin–Jumat, 08.00–14.00 WITA) untuk informasi lebih lanjut.
                </div>
              </div>
            </div>
          </div>
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
    --primary-light: #4dd08a;
    --primary-dark: #1e7e34;
    --text: #212529;
    --text-light: #6c757d;
    --border: #e9ecef;
    --radius: 8px;
    --shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
  }
  .layanan-pemerintahan {
    padding-top: 2rem;
    padding-bottom: 7rem;
  }
  .layanan-illustration {
    max-width: 100%;
    border-radius: var(--radius);
    box-shadow: var(--shadow);
    height: auto;
  }
  .service-selector .btn {
    font-weight: 500;
    padding: 0.75rem 1rem;
    border-radius: var(--radius);
    box-shadow: var(--shadow);
    transition: box-shadow 0.2s;
  }
  .service-selector .btn:hover {
    box-shadow: 0 6px 14px rgba(0, 0, 0, 0.08);
  }
  .layanan-options {
    list-style: none;
    padding: 0.5rem 0;
    margin: 0;
    background: white;
    border: 1px solid var(--border);
    border-radius: var(--radius);
    max-height: 300px;
    overflow-y: auto;
    box-shadow: var(--shadow);
    z-index: 10;
  }
  .layanan-options .layanan-item {
    padding: 0.75rem 1rem;
    cursor: pointer;
    color: var(--text);
    transition: background 0.2s;
  }
  .layanan-options .layanan-item:hover {
    background-color: #f8f9fa;
    color: var(--primary);
  }
  #layananContent {
    background: white;
    padding: 1.25rem;
    border-radius: var(--radius);
    box-shadow: var(--shadow);
  }
  .service-content h4 {
    font-size: 1.25rem;
    font-weight: 600;
    color: var(--text);
  }
  .info-callout {
    display: flex;
    align-items: flex-start;
    gap: 0.75rem;
    padding: 1rem;
    background-color: #f8f9fa;
    border-left: 3px solid var(--primary);
    border-radius: 0 var(--radius) var(--radius) 0;
    margin-top: 1.25rem;
  }
  .info-callout i {
    color: var(--primary);
    font-size: 1.1rem;
    flex-shrink: 0;
  }
  .info-callout div {
    color: var(--text-light);
    font-size: 0.9rem;
    line-height: 1.5;
  }
  /* Konten Bantuan */
  #layananContent {
    background: white;
    padding: 1.25rem;
    border-radius: var(--radius);
    box-shadow: var(--shadow);
  }

  .service-content h4 {
    font-size: 1.25rem;
    font-weight: 600;
    color: var(--text);
  }

  .service-content h5 {
    font-size: 0.9rem;
    font-weight: 600;
    color: var(--text);
    margin-top: 1rem;
  }

  #deskripsiKesra {
    text-align: left;
    font-size: 0.95rem;
    line-height: 1.6;
    color: var(--text-light);
                                                                                                                                                                                                                                                                              }


  /* Tombol Unduh Dokumen */
  #downloadDokumenBtn {
    padding: 4px 12px;
    background-color: #f8f9fa;
    border-color: var(--primary);
    color: var(--primary);
  }

  #downloadDokumenBtn:hover {
    background-color: var(--primary);
    border-color: var(--primary);
    color: #f8f9fa;
  }

  /* Mobile: Gambar di atas, layanan di bawah */
  @media (min-width: 320px) and (max-width: 767px) {
    .layanan-pemerintahan .row {
      flex-direction: column;
    }
    .service-selector {
      padding-top: 20px;
      position: relative;
    }
  }
</style>
@endpush

@push('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const toggleBtn = document.getElementById('toggleLayananBtn');
    const layananList = document.getElementById('layananList');
    const layananItems = document.querySelectorAll('.layanan-item');
    const layananContent = document.getElementById('layananContent');
    const layananTitle = document.getElementById('layananTitle');
    const deskripsiKesra = document.getElementById('deskripsiKesra');
    const downloadDokumenBtn = document.getElementById('downloadDokumenBtn');
    const dokumenPendingBtn = document.getElementById('dokumenPendingBtn');
    const selectedLabel = document.getElementById('selectedLayananLabel');

    // Data bantuan Kesra
    const kesraData = {
      'blt_september_2025': {
        'deskripsi': `
          <p><strong>Bantuan Langsung Tunai (BLT) September 2025</strong></p>
          <p>Program bantuan sosial berupa uang tunai bagi 35 Keluarga Penerima Manfaat (KPM) di Desa Batupute.</p>
          <ul>
            <li><strong>Jumlah Penerima:</strong> 35 KPM</li>
            <li><strong>Total Anggaran:</strong> Rp10.500.000,-</li>
            <li><strong>Periode:</strong> September 2025</li>
            <li><strong>Tujuan:</strong> Meringankan beban ekonomi masyarakat terdampak.</li>
          </ul>
          <p>Silakan unduh dokumen resmi untuk informasi lebih lanjut.</p>
        `,
        'dokumenUrl': '/layanan/kesra/download/1757567069_WhatsApp_Image_2025-09-11_at_12.56.47.pdf',
        'status': 'available'
      },
      'blt_agustus_2025': {
        'deskripsi': `
          <p><strong>Bantuan Langsung Tunai (BLT) Agustus 2025</strong></p>
          <p>Program bantuan sosial berupa uang tunai bagi 35 Keluarga Penerima Manfaat (KPM) di Desa Batupute.</p>
          <ul>
            <li><strong>Jumlah Penerima:</strong> 35 KPM</li>
            <li><strong>Total Anggaran:</strong> Rp10.500.000,-</li>
            <li><strong>Periode:</strong> Agustus 2025</li>
            <li><strong>Tujuan:</strong> Mendukung pemulihan ekonomi masyarakat.</li>
          </ul>
          <p>Dokumen resmi sedang dipersiapkan.</p>
        `,
        'dokumenUrl': '#',
        'status': 'pending'
      },
      'blt_juli_2025': {
        'deskripsi': `
          <p><strong>Bantuan Langsung Tunai (BLT) Juli 2025</strong></p>
          <p>Program bantuan sosial berupa uang tunai bagi 35 Keluarga Penerima Manfaat (KPM) di Desa Batupute.</p>
          <ul>
            <li><strong>Jumlah Penerima:</strong> 35 KPM</li>
            <li><strong>Total Anggaran:</strong> Rp10.500.000,-</li>
            <li><strong>Periode:</strong> Juli 2025</li>
            <li><strong>Tujuan:</strong> Membantu masyarakat memenuhi kebutuhan dasar.</li>
          </ul>
          <p>Dokumen resmi sedang dipersiapkan.</p>
        `,
        'dokumenUrl': '#',
        'status': 'pending'
      },
      'blt_juni_2025': {
        'deskripsi': `
          <p><strong>Bantuan Langsung Tunai (BLT) Juni 2025</strong></p>
          <p>Program bantuan sosial berupa uang tunai bagi 35 Keluarga Penerima Manfaat (KPM) di Desa Batupute.</p>
          <ul>
            <li><strong>Jumlah Penerima:</strong> 35 KPM</li>
            <li><strong>Total Anggaran:</strong> Rp10.500.000,-</li>
            <li><strong>Periode:</strong> Juni 2025</li>
            <li><strong>Tujuan:</strong> Meningkatkan kesejahteraan masyarakat.</li>
          </ul>
          <p>Dokumen resmi sedang dipersiapkan.</p>
        `,
        'dokumenUrl': '#',
        'status': 'pending'
      },
      'blt_mei_2025': {
        'deskripsi': `
          <p><strong>Bantuan Langsung Tunai (BLT) Mei 2025</strong></p>
          <p>Program bantuan sosial berupa uang tunai bagi 35 Keluarga Penerima Manfaat (KPM) di Desa Batupute.</p>
          <ul>
            <li><strong>Jumlah Penerima:</strong> 35 KPM</li>
            <li><strong>Total Anggaran:</strong> Rp10.500.000,-</li>
            <li><strong>Periode:</strong> Mei 2025</li>
            <li><strong>Tujuan:</strong> Mengurangi dampak ekonomi akibat pandemi.</li>
          </ul>
          <p>Dokumen resmi sedang dipersiapkan.</p>
        `,
        'dokumenUrl': '#',
        'status': 'pending'
      },
      'blt_jan_mar_2025': {
        'deskripsi': `
          <p><strong>Bantuan Langsung Tunai (BLT) Januari-Maret 2025</strong></p>
          <p>Program bantuan sosial berupa uang tunai bagi 35 Keluarga Penerima Manfaat (KPM) di Desa Batupute.</p>
          <ul>
            <li><strong>Jumlah Penerima:</strong> 35 KPM</li>
            <li><strong>Total Anggaran:</strong> Rp10.500.000,-</li>
            <li><strong>Periode:</strong> Januari-Maret 2025</li>
            <li><strong>Tujuan:</strong> Mendukung pemulihan ekonomi masyarakat.</li>
          </ul>
          <p>Dokumen resmi sedang dipersiapkan.</p>
        `,
        'dokumenUrl': '#',
        'status': 'pending'
      },
      'bantuan_bibit_padi_2025': {
        'deskripsi': `
          <p><strong>Bantuan Bibit Padi 2025</strong></p>
          <p>Program bantuan berupa bibit padi berkualitas untuk petani di Desa Batupute.</p>
          <ul>
            <li><strong>Sasaran:</strong> Seluruh petani terdaftar di Desa Batupute</li>
            <li><strong>Tujuan:</strong> Meningkatkan produktivitas pertanian dan kesejahteraan petani.</li>
            <li><strong>Periode:</strong> Tahun 2025</li>
          </ul>
          <p>Dokumen resmi sedang dipersiapkan.</p>
        `,
        'dokumenUrl': '#',
        'status': 'pending'
      },
      'blt_2025': {
        'deskripsi': `
          <p><strong>Bantuan Langsung Tunai (BLT) Umum 2025</strong></p>
          <p>Program bantuan sosial berupa uang tunai bagi masyarakat Desa Batupute yang memenuhi kriteria.</p>
          <ul>
            <li><strong>Sasaran:</strong> Keluarga Penerima Manfaat (KPM) terdaftar</li>
            <li><strong>Tujuan:</strong> Meningkatkan kesejahteraan masyarakat.</li>
            <li><strong>Periode:</strong> Tahun 2025</li>
          </ul>
          <p>Dokumen resmi sedang dipersiapkan.</p>
        `,
        'dokumenUrl': '#',
        'status': 'pending'
      }
    };

    // Toggle tampil/sembunyi daftar bantuan
    toggleBtn.addEventListener('click', function(e) {
      e.stopPropagation();
      const isVisible = layananList.style.display === 'block';
      layananList.style.display = isVisible ? 'none' : 'block';
    });

    // Pilih bantuan
    layananItems.forEach(item => {
      item.addEventListener('click', function() {
        const key = this.getAttribute('data-key');
        const label = this.textContent.trim();

        // Update tampilan
        selectedLabel.textContent = label;
        layananTitle.textContent = label;
        layananList.style.display = 'none';

        // Isi deskripsi
        deskripsiKesra.innerHTML = kesraData[key].deskripsi;

        // Update tombol download berdasarkan status
        if (kesraData[key].status === 'available') {
          downloadDokumenBtn.href = kesraData[key].dokumenUrl;
          downloadDokumenBtn.style.display = 'inline-block';
          dokumenPendingBtn.style.display = 'none';
        } else {
          downloadDokumenBtn.style.display = 'none';
          dokumenPendingBtn.style.display = 'inline-block';
        }

        // Tampilkan konten
        layananContent.style.display = 'block';
      });
    });

    // Tutup daftar jika klik di luar
    document.addEventListener('click', function(e) {
      if (!toggleBtn.contains(e.target) && !layananList.contains(e.target)) {
        layananList.style.display = 'none';
      }
    });
  });
</script>
@endpush