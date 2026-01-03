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

@php
use App\Models\StrukturOrganisasi;
$strukturLpm = StrukturOrganisasi::where('slug', 'lpm')->first();
@endphp

@section('content')
<section class="struktur-kepengurusan section">
  <div class="container" data-aos="fade-up">
    <!-- Struktur Organisasi LPM -->
    <div class="row justify-content-center mb-5">
      <div class="col-lg-10">
        <div class="struktur-img-container text-center">

          @if($strukturLpm)
          <a href="{{ asset('storage/' . $strukturLpm->gambar) }}"
            class="glightbox"
            data-gallery="struktur-lpm">

            <img src="{{ asset('storage/' . $strukturLpm->gambar) }}"
              alt="{{ $strukturLpm->nama }}"
              class="img-fluid border rounded shadow-sm"
              style="max-height: 600px; object-fit: contain;">
          </a>
          @else
          <p class="text-muted">Struktur LPM belum tersedia.</p>
          @endif

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