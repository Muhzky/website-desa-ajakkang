@extends('layouts.master')

@section('title', 'Layanan Pemerintahan - Desa Ajakkang')
@section('meta_description', 'Layanan administrasi pemerintahan Desa Ajakkang: KTP, KK, KIA, akta kelahiran, akta kematian, surat pindah, dan pertanahan.')

@section('page-title')
@component('components.page-title')
@slot('title', 'Layanan Pemerintahan')
@slot('description', 'Pilih jenis layanan untuk melihat berkas yang harus dilengkapi.')
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
        <img src="{{ asset('assets/img/icon/undraw_files-uploading_qf8u.svg') }}" 
             alt="Ilustrasi Layanan Pemerintahan Desa Ajakkang" 
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
            @php
              $layananData = [
                'ktp-baru' => 'KTP Baru',
                'ktp-hilang' => 'KTP Hilang/Rusak',
                'kk-baru' => 'KK Baru',
                'kk-perubahan' => 'Perubahan Data KK',
                'kia' => 'Kartu Identitas Anak (KIA)',
                'akte-kelahiran' => 'Akta Kelahiran',
                'akte-kematian' => 'Akta Kematian',
                'surat-pindah' => 'Surat Pindah/Datang',
                'pertanahan' => 'Pertanahan',
              ];
            @endphp

            @foreach($layananData as $key => $label)
              <li data-key="{{ $key }}" class="layanan-item">{{ $label }}</li>
            @endforeach
          </ul>

          <!-- Area Konten Dinamis -->
          <div id="layananContent" class="mt-4" style="display: none;">
            <div class="service-content">
              <h4 id="layananTitle"></h4>
              <h5 class="mt-3">Berkas yang Harus Dilengkapi:</h5>
              <ul id="documentList" class="document-list mt-3"></ul>
              <div class="info-callout mt-4">
                <i class="bi bi-info-circle"></i>
                <div>
                  Silakan datang ke Kantor Desa Ajakkang pada jam kerja (Senin–Jumat, 08.00–14.00 WITA) dengan membawa berkas asli dan fotokopi.
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

  /* Tombol Pilih Layanan */
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

  /* Daftar Layanan */
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

  /* Konten Layanan */
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

  .document-list {
    list-style: none;
    padding-left: 0;
  }

  .document-list li {
    position: relative;
    padding-left: 1.5rem;
    margin-bottom: 0.6rem;
    color: var(--text-light);
    font-size: 0.95rem;
    line-height: 1.5;
  }

  .document-list li::before {
    content: "✓";
    position: absolute;
    left: 0;
    color: var(--primary);
    font-weight: bold;
    font-size: 0.9rem;
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

  /* Mobile: Gambar di atas, layanan di bawah */
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
    const documentList = document.getElementById('documentList');
    const selectedLabel = document.getElementById('selectedLayananLabel');

    // Data berkas per layanan
    const dokumen = {
      'ktp-baru': [
        'Fotokopi KK',
        'Surat Pengantar RT/RW',
        'Telah berusia 17 tahun atau sudah menikah',
        'Hadir langsung untuk rekam KTP'
      ],
      'ktp-hilang': [
        'Fotokopi KK',
        'Surat Keterangan Kehilangan dari Kepolisian',
        'Surat Pengantar RT/RW',
        'Pas Foto 3x4 (jika diminta)'
      ],
      'kk-baru': [
        'Surat Pengantar RT/RW',
        'Fotokopi KTP Kepala Keluarga',
        'Akta Nikah (jika berlaku)',
        'Dokumen pendukung lainnya (misal: surat pindah)'
      ],
      'kk-perubahan': [
        'KK Asli',
        'Fotokopi KTP yang bersangkutan',
        'Dokumen pendukung perubahan (misal: akta kelahiran, akta nikah, dll)',
        'Surat Pengantar RT/RW'
      ],
      'kia': [
        'Akta Kelahiran Anak',
        'Fotokopi KTP Orang Tua',
        'Fotokopi KK',
        'Pas Foto Anak ukuran 2x3'
      ],
      'akte-kelahiran': [
        'Surat Kelahiran dari Bidan/Rumah Sakit',
        'Fotokopi KTP Orang Tua',
        'Fotokopi KK',
        'Surat Nikah Orang Tua (jika ada)',
        'Surat Pengantar RT/RW'
      ],
      'akte-kematian': [
        'Surat Keterangan Kematian dari RT/RW',
        'Fotokopi KTP Almarhum/Almarhumah',
        'Fotokopi KK',
        'Surat Keterangan dari Rumah Sakit/Puskesmas (jika ada)'
      ],
      'surat-pindah': [
        'Surat Pengantar RT/RW',
        'Fotokopi KTP dan KK',
        'Alasan pindah (opsional, jika diminta)',
        'KK tujuan (jika pindah antar desa)'
      ],
      'pertanahan': [
        'Fotokopi KTP Pemohon',
        'Surat Keterangan Tanah dari RT/RW',
        'Dokumen kepemilikan (jika ada)',
        'Peta lokasi tanah (opsional)'
      ]
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
        const label = this.textContent;

        // Update tampilan
        selectedLabel.textContent = label;
        layananTitle.textContent = label;
        layananList.style.display = 'none';

        // Isi daftar dokumen
        documentList.innerHTML = '';
        dokumen[key].forEach(dok => {
          const li = document.createElement('li');
          li.textContent = dok;
          documentList.appendChild(li);
        });

        // Tampilkan konten
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