@extends('layouts.master')
@section('title', 'Posyandu - Desa Ajakkang')
@section('meta_description', 'Informasi Posyandu di Desa Ajakkang: Jadwal, lokasi, dan pelayanan kesehatan dasar.')
@section('page-title')
@component('components.page-title')
@slot('title', 'Posyandu')
@slot('description', 'Pilih lokasi Posyandu untuk melihat jadwal dan informasi pelayanan.')
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
        <img src="{{ asset('assets/img/icon/undraw_doctors_djoj.svg') }}"
             alt="Ilustrasi Posyandu Desa Ajakkang"
             class="img-fluid rounded shadow-sm layanan-illustration"
             style="width: 60%; height: auto;">
      </div>
      <!-- Layanan: di bawah di HP, di kanan di desktop -->
      <div class="col-12 col-lg-7">
        <div class="service-selector">
          <!-- Tombol utama untuk membuka daftar posyandu -->
          <button id="toggleLayananBtn" class="btn btn-outline-primary w-100 text-start d-flex justify-content-between align-items-center"
                  type="button">
            <span id="selectedLayananLabel">Pilih Lokasi Posyandu</span>
            <i class="bi bi-chevron-down"></i>
          </button>
          <!-- Daftar Posyandu (sembunyi secara default) -->
          <ul id="layananList" class="layanan-options mt-2" style="display: none;">
            <!-- Nama posyandu ini disesuaikan berdasarkan sumber lokal Desa Ajakkang -->
            <li data-key="posyandu_semangka" class="layanan-item">Posyandu Semangka (Lacaulu)</li>
            <li data-key="posyandu_lengkuas" class="layanan-item">Posyandu Lengkuas (Kampung Baru)</li>
            <li data-key="posyandu_lainnya" class="layanan-item">Posyandu Lainnya / Jadwal Puskesmas</li>
          </ul>

          <!-- Area Konten Dinamis -->
          <div id="layananContent" class="mt-4" style="display: none;">
            <div class="service-content">
              <h4 id="layananTitle"></h4>
              <div class="row mt-3">
                <div class="col-md-7 text-start">
                  <ul>
                    <li>Nama Pelayanan: <span id="namaPelayanan"></span></li>
                    <li>Kategori: <span id="kategoriPelayanan"></span></li>
                    <li>Tanggal: <span id="tanggalPelayanan"></span></li>
                    <li>Lokasi: <span id="lokasiPelayanan"></span></li>
                  </ul>
                </div>
                <div class="col-md-5 text-start">
                  <ul>
                    <li>Jam Mulai: <span id="jamMulai"></span></li>
                    <li>Jam Selesai: <span id="jamSelesai"></span></li>
                    <li>Kader / Kontak: <span id="kontakPelayanan"></span></li>
                  </ul>
                </div>
              </div>
              <div class="info-callout mt-4">
                <i class="bi bi-info-circle"></i>
                <div>
                  Silakan datang ke lokasi Posyandu pada jam yang ditentukan dengan membawa Kartu Keluarga (KK) dan Kartu Identitas Anak (KIA) jika ada.
                </div>
              </div>
              <div class="mt-3">
                <a id="hubungiKaderBtn" class="btn btn-sm btn-success" href="#" target="_blank" style="display:none;">
                  <i class="bi bi-telephone"></i> Hubungi Kader / Puskesmas
                </a>
              </div>
              <small class="d-block mt-3 text-muted">
                Catatan: daftar posyandu diambil dari dokumen & pemberitaan lokal; untuk konfirmasi jadwal terkini hubungi Puskesmas setempat.
              </small>
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
  @media (min-width: 320px) and (max-width: 767px) {
    .layanan-pemerintahan .row {
      flex-direction: column;
    }
    .service-selector{
        padding-top: 20px;
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
    const namaPelayanan = document.getElementById('namaPelayanan');
    const kategoriPelayanan = document.getElementById('kategoriPelayanan');
    const tanggalPelayanan = document.getElementById('tanggalPelayanan');
    const jamMulai = document.getElementById('jamMulai');
    const jamSelesai = document.getElementById('jamSelesai');
    const lokasiPelayanan = document.getElementById('lokasiPelayanan');
    const kontakPelayanan = document.getElementById('kontakPelayanan');
    const selectedLabel = document.getElementById('selectedLayananLabel');
    const hubungiKaderBtn = document.getElementById('hubungiKaderBtn');

    // Data informasi Posyandu (sesuaikan jika Anda punya info jadwal/kontak terbarukan)
    const posyanduData = {
      'posyandu_semangka': {
        'nama': 'Posyandu Semangka (Lacaulu)',
        'kategori': 'Pelayanan Kesehatan Ibu & Anak, Imunisasi, Timbang Balita',
        'tanggal': 'Setiap minggu ke-1 (konfirmasi ke kader)',
        'jamMulai': '08:00',
        'jamSelesai': '11:00',
        'lokasi': 'Dusun Lacaulu, Desa Ajakkang',
        'kontak': 'Kader: Rusmi (cek di kantor desa / puskesmas)'
      },
      'posyandu_lengkuas': {
        'nama': 'Posyandu Lengkuas (Kampung Baru)',
        'kategori': 'Pelayanan Kesehatan Ibu & Anak, Konseling Gizi',
        'tanggal': 'Setiap minggu ke-2 (konfirmasi ke kader)',
        'jamMulai': '08:00',
        'jamSelesai': '11:00',
        'lokasi': 'Kampung Baru, Desa Ajakkang',
        'kontak': 'Kader: Mastura (cek di kantor desa / puskesmas)'
      },
      'posyandu_lainnya': {
        'nama': 'Jadwal Puskesmas / Posyandu Lainnya',
        'kategori': 'Informasi jadwal lengkap Puskesmas Mangkoso',
        'tanggal': 'Silakan hubungi Puskesmas',
        'jamMulai': '-',
        'jamSelesai': '-',
        'lokasi': 'Puskesmas Mangkoso / lokasi layanan keliling',
        'kontak': 'Hubungi Puskesmas Mangkoso'
      }
    };

    // Toggle tampil/sembunyi daftar posyandu
    toggleBtn.addEventListener('click', function () {
      const isVisible = layananList.style.display === 'block';
      layananList.style.display = isVisible ? 'none' : 'block';
    });

    // Pilih posyandu
    layananItems.forEach(item => {
      item.addEventListener('click', function () {
        const key = this.getAttribute('data-key');
        const data = posyanduData[key];

        // Update tampilan
        selectedLabel.textContent = data.nama;
        layananTitle.textContent = data.nama;
        namaPelayanan.textContent = 'PELAYANAN POSYANDU';
        kategoriPelayanan.textContent = data.kategori;
        tanggalPelayanan.textContent = data.tanggal;
        jamMulai.textContent = data.jamMulai;
        jamSelesai.textContent = data.jamSelesai;
        lokasiPelayanan.textContent = data.lokasi;
        kontakPelayanan.textContent = data.kontak;

        // update tombol hubungi (jika Anda punya nomor, pasang di sini)
        // contoh: hubungiKaderBtn.href = 'tel:+628xxxxxxxxxx';
        hubungiKaderBtn.style.display = 'inline-block';
        hubungiKaderBtn.href = '#';

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
