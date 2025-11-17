@extends('layouts.master')
@section('title', $berita->judul)
@section('meta_description', $berita->isi)
@section('page-title')
@component('components.page-title')
@slot('title', $berita->judul)
@slot('description', 'Baca detail berita terbaru dari Desa Ajakkang.')
@endcomponent
@endsection
@section('content')
<section class="detail-berita section">
  <div class="container" data-aos="fade-up">
    <div class="row">
      <!-- Kolom Detail Berita -->
      <div class="col-md-8">
        <div class="card berita-detail-card">
          <img src="{{ asset('storage/' . $berita->gambar) }}" class="card-img-top" alt="{{ $berita->judul }}">
          <div class="card-body">
            <h3 class="card-title">{{ $berita->judul }}</h3>
            <div class="d-flex align-items-center mb-3">
              <img src="{{ asset('storage/' . $berita->admin->foto) }}" class="rounded-circle me-2" alt="Admin">
              <div>
                <p class="card-admin mb-0">{{ $berita->admin->nama }}</p>
                <p class="card-date mb-0">{{ $berita->tanggal_upload->format('d F Y') }}</p>
              </div>
            </div>
            <p class="card-text">
              {!! $berita->isi !!}
            </p>
          </div>
        </div>
      </div>
      <!-- Kolom Sidebar Berita Lain -->
      <div class="col-md-4">
        <div class="card berita-sidebar-card">
          <div class="card-body">
            <h5 class="card-title">Berita Lainnya</h5>
            @foreach($beritaLainnya as $beritaLain)
            <div class="berita-sidebar-item">
              <div class="row">
                <div class="col-4">
                  <img src="{{ asset('storage/' . $beritaLain->gambar) }}" class="img-fluid" alt="{{ $beritaLain->judul }}">
                </div>
                <div class="col-8">
                  <h6>{{ $beritaLain->judul }}</h6>
                  <p class="card-date">{{ $beritaLain->tanggal_upload->format('d F Y') }}</p>
                  <a href="{{ route('pages.berita.show', $beritaLain->id) }}" class="read-more">Baca Selengkapnya <i class="bi bi-arrow-right"></i></a>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
