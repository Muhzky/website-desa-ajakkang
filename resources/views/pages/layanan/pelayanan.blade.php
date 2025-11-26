@extends('layouts.master')
@section('title', 'Layanan Pelayanan - Desa Batupute')
@section('meta_description', 'Informasi layanan pelayanan pemerintahan di Desa Batupute: SKTM, Pengantar Nikah, Surat Kepemilikan Rumah, dan lainnya.')
@section('page-title')
@component('components.page-title')
@slot('title', 'Layanan Pelayanan')
@slot('description', 'Pilih jenis layanan untuk melihat informasi.')
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
        <img src="{{ asset('assets/img/icon/undraw_add-files_d04y.svg') }}"
             alt="Ilustrasi Layanan Pelayanan Desa Batupute"
             class="img-fluid rounded shadow-sm layanan-illustration"
             style="width: 60%; height: auto;">
      </div>
      <!-- Layanan: di bawah di HP, di kanan di desktop -->
      <div class="col-12 col-lg-7">
        <div class="service-selector">
          <!-- Tombol utama untuk membuka daftar layanan -->
          <button id="toggleLayananBtn" class="btn btn-outline-primary w-100 text-start d-flex justify-content-between align-items-center"
                  type="button">
            <span id="selectedLayananLabel">Pilih Jenis Layanan</span>
            <i class="bi bi-chevron-down"></i>
          </button>
          <!-- Daftar Layanan (sembunyi secara default) -->
          <ul id="layananList" class="layanan-options mt-2" style="display: none;">
            <li data-key="sktm" class="layanan-item">SKTM</li>
            <li data-key="pengantar_nikah" class="layanan-item">PENGANTAR NIKAH</li>
            <li data-key="surat_kepemilikan_rumah" class="layanan-item">SURAT KEPEMILIKAN RUMAH</li>
            <li data-key="surat_kepemilikan_tanah" class="layanan-item">SURAT KEPEMILIKAN TANAH</li>
            <li data-key="surat_pengangkutan" class="layanan-item">SURAT PENGANGKUTAN</li>
            <li data-key="surat_izin_keramaian" class="layanan-item">SURAT IZIN KERAMAIAN</li>
            <li data-key="surat_keterangan_hilang" class="layanan-item">SURAT KETERANGAN HILANG</li>
          </ul>
          <!-- Area Konten Dinamis -->
          <div id="layananContent" class="mt-4" style="display: none;">
            <div class="service-content">
              <h4 id="layananTitle"></h4>
              <div class="row mt-3">
                <div class="col-md-12 text-start">
                  <div id="deskripsiLayanan"></div>
                </div>
              </div>
              <div class="info-callout mt-4">
                <i class="bi bi-info-circle"></i>
                <div>
                  Silakan datang ke kantor Desa Batupute pada jam kerja (Senin–Jumat, 08.00–14.00 WITA) untuk informasi lebih lanjut dan pengajuan layanan.
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
  #deskripsiLayanan {
    font-size: 0.95rem;
    line-height: 1.6;
    color: var(--text-light);
  }
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
  document.addEventListener('DOMContentLoaded', function () {
    const toggleBtn = document.getElementById('toggleLayananBtn');
    const layananList = document.getElementById('layananList');
    const layananItems = document.querySelectorAll('.layanan-item');
    const layananContent = document.getElementById('layananContent');
    const layananTitle = document.getElementById('layananTitle');
    const deskripsiLayanan = document.getElementById('deskripsiLayanan');
    const selectedLabel = document.getElementById('selectedLayananLabel');

    // Data deskripsi layanan
    const layananData = {
      'sktm': {
        'nama': 'SKTM',
        'deskripsi': `
          <p><strong>Surat Keterangan Tidak Mampu (SKTM)</strong></p>
          <p>Surat ini digunakan untuk keperluan administrasi yang membutuhkan bukti ketidakmampuan ekonomi.</p>
          <ul>
            <li><strong>Persyaratan:</strong> KTP, KK, Surat Pengantar RT/RW</li>
            <li><strong>Proses:</strong> Pengajuan di kantor desa, verifikasi data, pencetakan surat.</li>
          </ul>
        `
      },
      'pengantar_nikah': {
        'nama': 'PENGANTAR NIKAH',
        'deskripsi': `
          <p><strong>Surat Pengantar Nikah</strong></p>
          <p>Surat ini digunakan sebagai persyaratan untuk melangsungkan pernikahan di KUA.</p>
          <ul>
            <li><strong>Persyaratan:</strong> KTP, KK, Surat Pengantar RT/RW, Akta Kelahiran</li>
            <li><strong>Proses:</strong> Pengajuan di kantor desa, verifikasi data, pencetakan surat.</li>
          </ul>
        `
      },
      'surat_kepemilikan_rumah': {
        'nama': 'SURAT KEPEMILIKAN RUMAH',
        'deskripsi': `
          <p><strong>Surat Kepemilikan Rumah</strong></p>
          <p>Surat ini digunakan sebagai bukti kepemilikan rumah bagi warga desa.</p>
          <ul>
            <li><strong>Persyaratan:</strong> KTP, KK, Bukti Pembayaran Pajak, Surat Pengantar RT/RW</li>
            <li><strong>Proses:</strong> Pengajuan di kantor desa, verifikasi data, pencetakan surat.</li>
          </ul>
        `
      },
      'surat_kepemilikan_tanah': {
        'nama': 'SURAT KEPEMILIKAN TANAH',
        'deskripsi': `
          <p><strong>Surat Kepemilikan Tanah</strong></p>
          <p>Surat ini digunakan sebagai bukti kepemilikan tanah bagi warga desa.</p>
          <ul>
            <li><strong>Persyaratan:</strong> KTP, KK, Sertifikat Tanah, Surat Pengantar RT/RW</li>
            <li><strong>Proses:</strong> Pengajuan di kantor desa, verifikasi data, pencetakan surat.</li>
          </ul>
        `
      },
      'surat_pengangkutan': {
        'nama': 'SURAT PENGANGKUTAN',
        'deskripsi': `
          <p><strong>Surat Pengangkutan</strong></p>
          <p>Surat ini digunakan untuk keperluan pengangkutan barang atau hewan.</p>
          <ul>
            <li><strong>Persyaratan:</strong> KTP, KK, Surat Pengantar RT/RW, Surat Keterangan Barang/Hewan</li>
            <li><strong>Proses:</strong> Pengajuan di kantor desa, verifikasi data, pencetakan surat.</li>
          </ul>
        `
      },
      'surat_izin_keramaian': {
        'nama': 'SURAT IZIN KERAMAIAN',
        'deskripsi': `
          <p><strong>Surat Izin Keramaian</strong></p>
          <p>Surat ini digunakan untuk mengadakan acara atau keramaian di wilayah desa.</p>
          <ul>
            <li><strong>Persyaratan:</strong> KTP, KK, Surat Pengantar RT/RW, Surat Permohonan Izin</li>
            <li><strong>Proses:</strong> Pengajuan di kantor desa, verifikasi data, pencetakan surat.</li>
          </ul>
        `
      },
      'surat_keterangan_hilang': {
        'nama': 'SURAT KETERANGAN HILANG',
        'deskripsi': `
          <p><strong>Surat Keterangan Hilang</strong></p>
          <p>Surat ini digunakan untuk melaporkan kehilangan barang atau dokumen penting.</p>
          <ul>
            <li><strong>Persyaratan:</strong> KTP, KK, Surat Pengantar RT/RW, Kronologi Kehilangan</li>
            <li><strong>Proses:</strong> Pengajuan di kantor desa, verifikasi data, pencetakan surat.</li>
          </ul>
        `
      }
    };

    // Toggle tampil/sembunyi daftar layanan
    toggleBtn.addEventListener('click', function () {
      const isVisible = layananList.style.display === 'block';
      layananList.style.display = isVisible ? 'none' : 'block';
    });

    // Pilih layanan
    layananItems.forEach(item => {
      item.addEventListener('click', function () {
        const key = this.getAttribute('data-key');
        const data = layananData[key];
        // Update tampilan
        selectedLabel.textContent = data.nama;
        layananTitle.textContent = data.nama;
        deskripsiLayanan.innerHTML = data.deskripsi;
        layananList.style.display = 'none';
        layananContent.style.display = 'block';
      });
    });

    // Tutup daftar jika klik di luar
    document.addEventListener('click', function (e) {
      if (!toggleBtn.contains(e.target) && !layananList.contains(e.target)) {
        layananList.style.display = 'none';
      }
    });
  });
</script>
@endpush
