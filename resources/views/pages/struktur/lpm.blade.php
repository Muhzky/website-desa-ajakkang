@extends('layouts.master')
@section('title', 'Struktur Kepengurusan LPM Desa Ajakkang')
@section('meta_description', 'Struktur organisasi Lembaga Pemberdayaan Masyarakat (LPM) Desa Ajakkang, Kecamatan Soppeng Riaja, Kabupaten Barru.')
@section('page-title')
@component('components.page-title')
    @slot('title', 'Struktur LPM')
    @slot('description', 'Berikut adalah struktur organisasi Lembaga Pemberdayaan Masyarakat (LPM) Desa Ajakkang.')
    @slot('parent', 'Struktur')
    @slot('parentUrl', Request::is('/') ? '' : url(''))
@endcomponent
@endsection
@section('content')
<section class="struktur-kepengurusan section">
  <div class="container" data-aos="fade-up">
    <!-- Struktur Organisasi LPM -->
    <div class="row justify-content-center mb-5">
      <div class="col-lg-10">
        <div class="struktur-img-container text-center">
          <img src="{{ asset('assets/img/struktur-pemdes.jpg') }}" alt="Struktur Organisasi LPM Desa Ajakkang" class="img-fluid border rounded shadow-sm GLightbox lpm" style="max-height: 600px; object-fit: contain; padding-bottom: 20px;">
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
</style>
@endpush

@push('scripts')
<script>
  const lightbox = GLightbox({
    selector: '.lpm'
  });
</script>
@endpush
