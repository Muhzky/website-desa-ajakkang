@extends('layouts.master')

@section('title', 'Struktur Kepengurusan Desa Ajakkang')
@section('meta_description', 'Struktur organisasi dan daftar pejabat pemerintahan Desa Ajakkang, Kecamatan Soppeng Riaja, Kabupaten Barru.')

@section('page-title')
@component('components.page-title')
    @slot('title', 'Struktur Pemerintah Desa')
    @slot('description', 'Berikut adalah struktur organisasi dan daftar pejabat pemerintahan Desa Ajakkang.')
@slot('parent', 'Struktur')
@slot('parentUrl', Request::is('/') ? '' : url(''))
@endcomponent
@endsection

@section('content')
<section class="struktur-kepengurusan section">
  <div class="container" data-aos="fade-up">
    <!-- Struktur Organisasi -->
    <div class="row justify-content-center mb-5">
      <div class="col-lg-10">
        <div class="struktur-img-container text-center">
          <img src="{{ asset('assets/img/struktur-pemdes.jpg') }}" alt="Struktur Organisasi Desa Ajakkang" class="img-fluid border rounded shadow-sm glightbox pemdes" style="max-height: 600px; object-fit: contain; padding-bottom: 20px;">
        </div>
      </div>
    </div>

    <!-- Daftar Pejabat Desa -->
    <div class="row justify-content-center">
      <div class="col-lg-12">
        <h4 class="fw-bold text-center mb-4">Daftar Pejabat dan Staff Desa</h4>
        <div class="row g-4">
          @foreach([
            ['nama' => 'Andi Baso', 'jabatan' => 'Kepala Desa', 'foto' => 'assets/img/kepala-desa.jpg'],
            ['nama' => 'Sitti Nurhalima', 'jabatan' => 'Sekretaris Desa', 'foto' => 'images/sekretaris-desa.jpg'],
            ['nama' => 'Muhammad Idris', 'jabatan' => 'Kaur Umum & Perencanaan', 'foto' => 'images/kaur-umum.jpg'],
            ['nama' => 'Dewi Sartika', 'jabatan' => 'Kaur Keuangan', 'foto' => 'images/kaur-keuangan.jpg'],
            ['nama' => 'Ahmad Fauzi', 'jabatan' => 'Kasi Pemerintahan', 'foto' => 'images/kasi-pem.jpg'],
            ['nama' => 'Nurul Hikmah', 'jabatan' => 'Kasi Kesejahteraan', 'foto' => 'images/kasi-kesra.jpg'],
          ] as $staff)
          <div class="col-md-6 col-lg-3">
            <div class="staff-card text-center p-4 bg-white rounded shadow-sm h-100 d-flex flex-column align-items-center">
              <div class="staff-photo mb-3">
                <img src="{{ asset($staff['foto']) }}" alt="{{ $staff['jabatan'] }}" class="staff-img">
              </div>
              <h5 class="mb-1 fw-bold">{{ $staff['nama'] }}</h5>
              <p class="text-muted mb-0">{{ $staff['jabatan'] }}</p>
            </div>
          </div>
          @endforeach
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
    --text: #212529;
    --border: #e9ecef;
    --radius: 12px;
    --shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
  }

  .struktur-kepengurusan {
    padding: 20px 0 100px 0;
  }

  .struktur-img-container img {
    max-height: 600px;
    object-fit: contain;
    border: 1px solid var(--border);
    border-radius: var(--radius);
  }

  .staff-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }

  .staff-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
  }

  .staff-img {
    width: 180px;
    height: auto; /* Rasio 3:4 → 140 / 187 ≈ 0.75 */
    object-fit: cover;
    border-radius: 4px;
    background-color: #f8f9fa;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
  }
</style>
@endpush

@push('scripts')
<script>
     const lightbox = GLightbox({
    selector: '.pemdes'
  });
</script>
@endpush