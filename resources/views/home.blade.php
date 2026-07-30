@extends('layouts.master')

@section('title', 'Desa Ajakkang')
@section('meta_description', 'Selamat datang di website resmi Desa Ajakkang, Kecamatan Soppeng Riaja, Kabupaten Barru, Sulawesi Selatan')

@section('content')

<!-- Welcome Section -->
<section id="welcome" class="welcome section light-background">
  <img src="{{ asset('assets/img/background/kantor-desa.jpg') }}" alt="Pemandangan Desa Ajakkang" data-aos="fade-in">
  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row justify-content-center text-center" data-aos="fade-up" data-aos-delay="100">
      <div class="col-xl-6 col-lg-8">
        <div class="text-center mb-4">
          <h2 class="welcome-title">SELAMAT DATANG</h2>
          <h2 class="welcome-subtitle">DI <span id="typing-text"></span></h2>
        </div>
        <p class="motto">Menjelajahi keindahan, budaya, dan semangat gotong royong.</p>

        <!-- Button Group -->
        <div class="d-flex flex-column align-items-center gap-3 mt-4">

          <!-- Baris Atas -->
          <div class="d-flex justify-content-center gap-3">
            <a href="#sambutan" class="btn btn-primary px-4 py-2">
              Sambutan Kepala Desa
            </a>
            <a href="#call-to-action" class="btn btn-primary px-4 py-2">
              Jelajahi Desa
            </a>
          </div>

          <!-- Baris Bawah -->
          <div class="d-flex justify-content-center gap-3">
            <a href="{{ route('pages.umkm.index') }}" class="btn btn-primary px-4 py-2">
              UMKM Desa
            </a>
            <a href="{{ route('pages.layanan.cek-data') }}" class="btn btn-primary px-4 py-2">
              Cek Data
            </a>
          </div>

        </div>

      </div>
    </div>
  </div>
</section>
<!-- End Welcome Section -->

<!-- Sambutan Kepala Desa Section -->
<section id="sambutan" class="sambutan section">
  <div class="container">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <span class="subtitle">Sambutan</span>
      <h2 class="fw-bold text-dark">Sambutan Kepala Desa</h2>
    </div>

    <div class="row align-items-center g-5" data-aos="fade-up" data-aos-delay="100">
      <!-- Foto Profil -->
      <div class="col-lg-5 text-center" data-aos="fade-right" data-aos-delay="200">
        <div class="position-relative d-inline-block">
          <img
            src="{{ asset('assets/img/ibu-desa.jpg') }}"
            alt="Kepala Desa Ajakkang - Hatmawati Syam"
            class="img-fluid rounded-circle shadow-lg kepala-desa-img">
          <div class="mt-4">
            <h5 class="fw-bold text-dark mb-1">Hatmawati Syam</h5>
            <p class="text-muted mb-0">Kepala Desa Ajakkang</p>
          </div>
        </div>
      </div>

      <!-- Konten Sambutan -->
      <div class="col-lg-7" data-aos="fade-left" data-aos-delay="200">
        <div class="content ps-lg-4">
          <p class="fst-italic text-muted mb-3">Assalamu'alaikum Warahmatullahi Wabarakatuh.</p>

          <p class="mb-3">
            Puji syukur senantiasa kita panjatkan ke hadirat Allah SWT atas limpahan rahmat, kesehatan, dan kesempatan yang diberikan-Nya, sehingga kita masih diberi kekuatan untuk terus mengabdi sebagai pelayan masyarakat di Desa Ajakkang.
          </p>
          <p class="mb-3">
            Sebagai Kepala Desa, bersama seluruh perangkat desa dan Badan Permusyawaratan Desa (BPD), kami bertekad kuat untuk memajukan Desa Ajakkang melalui berbagai program yang inovatif, relevan, serta menyentuh langsung kebutuhan masyarakat.
          </p>
          <p class="mb-3">
            Salah satu wujud nyata komitmen tersebut adalah peluncuran website resmi Desa Ajakkang. Platform digital ini kami hadirkan sebagai upaya untuk meningkatkan transparansi penyelenggaraan pemerintahan desa sekaligus mempermudah akses informasi dan layanan administrasi bagi seluruh warga.
          </p>
          <p class="mb-4">
            Mari bersama kita bangun Desa Ajakkang yang lebih baik, maju, dan sejahtera. Dengan semangat gotong royong, tidak ada yang tidak mungkin kita wujudkan untuk kemajuan desa kita tercinta.
          </p>

          <p class="fst-italic text-muted">Wassalamu'alaikum Warahmatullahi Wabarakatuh.</p>

          <!-- Visi & Misi Accordion -->
          <div class="mt-5">
            <div class="accordion accordion-flush" id="visiMisiAccordion">

              <!-- Visi -->
              <div class="accordion-item border-bottom">
                <h3 class="accordion-header">
                  <button
                    class="accordion-button p-3 fw-bold text-dark bg-white rounded-2 shadow-none"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#visiCollapse"
                    aria-expanded="true"
                    aria-controls="visiCollapse">
                    <i class="bi bi-bullseye me-2 text-success"></i>Visi Desa Ajakkang
                  </button>
                </h3>

                <div id="visiCollapse" class="accordion-collapse collapse show" data-bs-parent="#visiMisiAccordion">
                  <div class="accordion-body bg-light rounded-2 p-3">

                    @if($profilDesa?->visi)
                    <div class="visi-content">
                      {!! $profilDesa->visi !!}
                    </div>
                    @else
                    <p class="text-muted fst-italic mb-0">
                      Visi desa belum tersedia.
                    </p>
                    @endif

                  </div>
                </div>
              </div>

              <!-- Misi -->
              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button
                    class="accordion-button p-3 fw-bold text-dark bg-white rounded-2 shadow-none collapsed"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#misiCollapse"
                    aria-expanded="false"
                    aria-controls="misiCollapse">
                    <i class="bi bi-check2-circle me-2 text-success"></i>Misi Desa Ajakkang
                  </button>
                </h3>

                <div id="misiCollapse" class="accordion-collapse collapse" data-bs-parent="#visiMisiAccordion">
                  <div class="accordion-body bg-light rounded-3 p-4">

                    @if($profilDesa?->misi)

                    @php
                    // Pecah misi per baris
                    $misiItems = preg_split('/\r\n|\r|\n/', strip_tags($profilDesa->misi));
                    @endphp

                    <ol class="misi-list">
                      @foreach($misiItems as $item)
                      @if(trim($item))
                      <li>{{ trim($item) }}</li>
                      @endif
                      @endforeach
                    </ol>

                    @else
                    <p class="text-muted fst-italic mb-0">
                      Misi desa belum tersedia.
                    </p>
                    @endif

                  </div>
                </div>
              </div>


            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>
<!-- /Sambutan Kepala Desa Section -->

<!-- Administrasi Penduduk Section -->
<section id="administrasi-penduduk" class="administrasi-penduduk section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <span class="subtitle">Administrasi</span>
    <h2 class="fw-bold text-dark">Administrasi Penduduk</h2>
    <p>Berikut ini adalah data administrasi penduduk Desa Ajakkang yang terdata.</p>
  </div>

  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row gy-5 align-items-center">
      <!-- Gambar Tren Data -->
      <div class="col-lg-6 d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">
        <div class="trend-data-image">
          <img src="{{ asset('assets/img/icon/undraw_visual-data_1eya.svg') }}" alt="Tren Data Penduduk" class="img-fluid">
        </div>
      </div>

      <!-- Data Penduduk -->
      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
        <div class="row gy-4">
          <div class="col-md-4">
            <div class="data-item text-center">
              <div class="data-icon mx-auto mb-2">
                <i class="bi bi-people fs-3"></i>
              </div>
              <h3 class="counter" data-target="{{ $data->total_penduduk }}">0</h3>
              <p class="mb-0">Jumlah Penduduk</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="data-item text-center">
              <div class="data-icon mx-auto mb-2">
                <i class="bi bi-gender-male fs-3"></i>
              </div>
              <h3 class="counter" data-target="{{ $data->laki_laki }}">0</h3>
              <p class="mb-0">Laki-laki</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="data-item text-center">
              <div class="data-icon mx-auto mb-2">
                <i class="bi bi-gender-female fs-3"></i>
              </div>
              <h3 class="counter" data-target="{{ $data->perempuan }}">0</h3>
              <p class="mb-0">Perempuan</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="data-item text-center">
              <div class="data-icon mx-auto mb-2">
                <i class="bi bi-house-door fs-3"></i>
              </div>
              <h3 class="counter" data-target="{{ $data->kepala_keluarga }}">0</h3>
              <p class="mb-0">Kepala Keluarga</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="data-item text-center">
              <div class="data-icon mx-auto mb-2">
                <i class="bi bi-person-check fs-3"></i>
              </div>
              <h3 class="counter" data-target="{{ $data->mobilitas_penduduk }}">0</h3>
              <p class="mb-0">Mobilitas Penduduk</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="data-item text-center">
              <div class="data-icon mx-auto mb-2">
                <i class="bi bi-arrow-left-right fs-3"></i>
              </div>
              <h3 class="counter" data-target="{{ $data->mutasi_penduduk }}">0</h3>
              <p class="mb-0">Mutasi Penduduk</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Link Selengkapnya -->
  <div class="container mt-5" data-aos="fade-up">
    <div class="text-end">
      <a href="{{ route('pages.administrasi.index') }}" class="lihat-selengkapnya">
        Lihat Selengkapnya <i class="bi bi-arrow-right"></i>
      </a>
    </div>
  </div>
</section>
<!-- End Administrasi Penduduk Section -->

<!-- Nonton Keindahan Desa -->
<section id="call-to-action" class="call-to-action section dark-background">

  <div class="container">
    <img src="{{ asset('assets/img/background/desa-2.png') }}" alt="">
    <div class="content row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
      <div class="col-xl-10">
        <div class="text-center">
          <a href="https://youtu.be/p6oqmoHsnTI?si=5MTnd5Ek1LRdHIvU" class="glightbox play-btn"></a>
          <h3>Keindahan Desa Ajakkang</h3>
          <p>Tak banyak yang tahu, Desa Ajakkang menyimpan keindahan luar biasa—dan semuanya bisa Anda saksikan dalam video berikut.</p>
        </div>
      </div>
    </div>
  </div>

</section>
<!-- End Nonton Keindahan Desa -->

<!-- Layanan Kami Section -->
<section id="layanan-kami" class="layanan-kami section">
  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <span class="subtitle">Layanan</span>
    <h2>Layanan Kami</h2>
    <p>Kami menyediakan berbagai layanan publik yang inovatif, efisien, dan berorientasi pada kepuasan masyarakat.</p>
  </div><!-- End Section Title -->

  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="features-grid" data-aos="fade-up" data-aos-delay="200">
      <div class="row g-4">
        <!-- Box 1: Bagian Pemerintahan -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
          <div class="feature-item-box">
            <div class="icon-wrapper">
              <i class="bi bi-buildings"></i>
            </div>
            <div class="feature-content">
              <h3>
                <span class="title-with-underline">Bagian Pemerintahan</span>
              </h3>
              <p>KTP, KK, KIA, akta kelahiran, akta kematian, surat pindah dan pertanahan.</p>
              <a href="{{ route('pages.layanan.pemdes') }}" class="read-more">
                Lihat Selengkapnya <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>
        </div><!-- End Feature Item -->

        <!-- Box 2: Bagian Pelayanan -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
          <div class="feature-item-box">
            <div class="icon-wrapper">
              <i class="bi bi-people"></i>
            </div>
            <div class="feature-content">
              <h3>
                <span class="title-with-underline">Bagian Pelayanan</span>
              </h3>
              <p>KTP, KK, KIA, akta kelahiran, akta kematian, surat pindah dan pertanahan.</p>
              <a href="{{ route('pages.layanan.pelayanan') }}" class="read-more">Lihat Selengkapnya <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
        </div><!-- End Feature Item -->

        <!-- Box 3: Bagian Kesra -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
          <div class="feature-item-box">
            <div class="icon-wrapper">
              <i class="bi bi-activity"></i>
            </div>
            <div class="feature-content">
              <h3>
                <span class="title-with-underline">Bagian Kesra</span>
              </h3>
              <p>Informasi dan pengajuan bantuan seperti BLT dan PKH.</p>
              <a href="{{ route('pages.layanan.kesra') }}" class="read-more">Lihat Selengkapnya <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
        </div><!-- End Feature Item -->

        <!-- Box 4: Pelayanan Kesehatan dan Posyandu -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
          <div class="feature-item-box">
            <div class="icon-wrapper">
              <i class="bi bi-heart-pulse"></i>
            </div>
            <div class="feature-content">
              <h3>
                <span class="title-with-underline">Pelayanan Kesehatan dan Posyandu</span>
              </h3>
              <p>Layanan pemeriksaan gratis dan jadwal posyandu.</p>
              <a href="{{ route('pages.layanan.posyandu') }}" class="read-more">Lihat Selengkapnya <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
        </div><!-- End Feature Item -->

        <!-- Box 5: Layanan Aspirasi dan Pengaduan Masyarakat -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
          <div class="feature-item-box">
            <div class="icon-wrapper">
              <i class="bi bi-megaphone"></i>
            </div>
            <div class="feature-content">
              <h3>
                <span class="title-with-underline">Layanan Aspirasi dan Pengaduan Masyarakat</span>
              </h3>
              <p>Sampaikan aspirasi, saran, atau keluhan Anda secara mudah.</p>
              <a href="{{ route('pages.layanan.pengaduan') }}" class="read-more">Lihat Selengkapnya <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
        </div><!-- End Feature Item -->

        <!-- Box 6: Cek Data Kependudukan -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
          <div class="feature-item-box">
            <div class="icon-wrapper">
              <i class="bi bi-search"></i>
            </div>
            <div class="feature-content">
              <h3>
                <span class="title-with-underline">Cek Data Kependudukan</span>
              </h3>
              <p>
                Periksa status data kependudukan Anda secara mandiri menggunakan NIK
                atau identitas lainnya.
              </p>
              <a href="{{ route('pages.layanan.cek-data') }}" class="read-more">
                Lihat Selengkapnya <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>
        <!-- End Feature Item -->

      </div>
    </div>
  </div>
</section>
<!-- /Layanan Kami Section -->

<!-- UMKM Produk Section -->
<section id="umkm-desa" class="umkm-section section light-background">

  <div class="container section-title" data-aos="fade-up">
    <span class="subtitle">UMKM</span>
    <h2>Produk UMKM Desa Ajakkang</h2>
    <p>Produk unggulan masyarakat Desa Ajakkang.</p>
  </div>

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <!-- ================= LIST PRODUK ================= -->
    <div class="row g-4">

      @forelse ($produkUmkm as $item)
      <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">

        <div class="card umkm-card-compact h-100">

          <!-- FOTO -->
          <div class="umkm-thumb">
            <img
              src="{{ $item->foto_produk ? asset('storage/'.$item->foto_produk) : asset('assets/img/default-umkm.jpg') }}"
              alt="{{ $item->nama_produk }}"
              loading="lazy">
          </div>

          <!-- BODY -->
          <div class="umkm-body">

            <span class="umkm-category">
              {{ $item->kategori }}
            </span>

            <h6 class="umkm-name">
              {{ $item->nama_produk }}
            </h6>

            <div class="umkm-price">
              Rp {{ number_format($item->harga,0,',','.') }}
            </div>

            <div class="umkm-store">
              {{ $item->umkm->nama_toko }}
            </div>

            <div class="umkm-owner">
              Owner : {{ $item->umkm->pemilik }}
            </div>

            @php
            $waNumber = preg_replace('/[^0-9]/', '', $item->umkm->nomor_whatsapp);
            $message = urlencode("Halo kak, apakah stok masih ada? {$item->nama_produk}");
            @endphp

            <a
              href="https://wa.me/{{ $waNumber }}?text={{ $message }}"
              target="_blank"
              class="btn btn-outline-success btn-sm w-100 mt-2">
              <i class="bi bi-whatsapp"></i> Hubungi
            </a>

          </div>
        </div>
      </div>
      @empty
      <div class="col-12 text-center">
        <p class="text-muted">Produk UMKM belum tersedia.</p>
      </div>
      @endforelse

    </div>

    <!-- LINK KE HALAMAN UMKM -->
    <div class="text-end mt-4">
      <a href="{{ route('pages.umkm.index') }}" class="lihat-selengkapnya">
        Lihat Semua Produk UMKM <i class="bi bi-arrow-right"></i>
      </a>
    </div>

  </div>
</section>
<!-- /UMKM Produk Section -->


<!-- Informasi Desa Section -->
<section id="informasi-desa" class="informasi-section section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <span class="subtitle">Informasi</span>
    <h2 class="fw-bold">Informasi & Berita Desa</h2>
    <p>Informasi terbaru seputar kegiatan dan pengumuman Desa Ajakkang.</p>
  </div>

  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row g-4">

      @forelse ($informasis as $berita)
      <div class="col-lg-4 col-md-6">
        <article class="card berita-card h-100 shadow-sm border-0">

          <!-- Thumbnail -->
          <div class="berita-thumb">
            <img
              src="{{ $berita->foto
                    ? asset('storage/' . $berita->foto)
                    : asset('assets/img/default-berita.jpg') }}"
              class="card-img-top"
              alt="{{ $berita->judul }}"
              loading="lazy">
          </div>

          <!-- Body -->
          <div class="card-body d-flex flex-column">

            <small class="text-muted mb-2">
              <i class="bi bi-calendar-event me-1"></i>
              {{ \Carbon\Carbon::parse($berita->tanggal)->format('d M Y') }}
            </small>

            <h5 class="card-title">
              {{ Str::limit($berita->judul, 70) }}
            </h5>

            <p class="card-text flex-grow-1">
              {{ Str::limit(strip_tags($berita->ringkasan ?? $berita->konten), 110) }}
            </p>

          </div>

          <!-- Footer -->
          <div class="card-footer bg-white border-0 pt-0">
            <a
              href="{{ route('pages.berita.detail', $berita->id) }}"
              class="read-more fw-semibold">
              Baca Selengkapnya <i class="bi bi-arrow-right"></i>
            </a>
          </div>

        </article>
      </div>
      @empty
      <div class="col-12">
        <div class="text-center py-5">
          <i class="bi bi-newspaper fs-1 text-muted mb-3 d-block"></i>
          <p class="text-muted mb-0">
            Belum ada informasi atau berita yang dipublikasikan.
          </p>
        </div>
      </div>
      @endforelse

    </div>

    <!-- CTA -->
    <div class="text-end mt-4">
      <a href="{{ route('pages.berita.index') }}" class="lihat-selengkapnya fw-semibold">
        Lihat Semua Informasi <i class="bi bi-arrow-right"></i>
      </a>
    </div>
  </div>

</section>
<!-- /Informasi Desa Section -->

<!-- Struktur Organisasi Section -->
<section id="struktur-organisasi" class="struktur-organisasi section">
  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <span class="subtitle">Struktur Organisasi</span>
    <h2>Struktur Pemerintahan Desa</h2>
    <p>Berikut adalah struktur organisasi pemerintahan desa kami.</p>
  </div>

  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="struktur-slider swiper">
      <div class="swiper-wrapper">
        @forelse($pemerintahDesa as $item)
        <div class="swiper-slide">
          <div class="struktur-item">
            <div class="struktur-header">
              @if($item->foto)
              <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama }}" loading="lazy">
              @else
              <!-- Gunakan placeholder default sesuai jenis kelamin atau umum -->
              @if(Str::contains(strtolower($item->nama), ['ibu', 'nyonya', 'bu']) || in_array(strtolower($item->jabatan), ['sekretaris desa', 'staf kesejahteraan', 'staf umum']))
              <img src="{{ asset('assets/img/person/person-f-default.webp') }}" alt="{{ $item->nama }}" loading="lazy">
              @else
              <img src="{{ asset('assets/img/person/person-m-default.webp') }}" alt="{{ $item->nama }}" loading="lazy">
              @endif
              @endif
            </div>
            <div class="struktur-body">
              <h5>{{ $item->nama }}</h5>
              <span>{{ $item->jabatan }}</span>
            </div>
          </div>
        </div>
        @empty
        <div class="swiper-slide">
          <div class="struktur-item">
            <div class="struktur-body text-center">
              <p>Belum ada data pemerintah desa</p>
            </div>
          </div>
        </div>
        @endforelse
      </div>

      <!-- Navigation -->
      <div class="swiper-navigation">
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
      </div>
    </div>
  </div>
</section>
<!-- /Struktur Organisasi Section -->


<!-- Kontak & Saran Section -->
<section id="contact" class="contact section light-background">
  <div class="container section-title" data-aos="fade-up">
    <span class="subtitle">Kontak & Saran</span>
    <h2>Hubungi Kami</h2>
    <p>Silakan kirimkan saran, masukan, atau pertanyaan Anda melalui form di bawah ini.</p>
  </div>

  <div class="container">
    <div class="row gy-4">
      <!-- Kolom Peta Desa Ajakkang -->
      <div class="col-lg-6">
        <div class="map-container">
          <h4>Lokasi Desa Ajakkang, Barru, Sulawesi Selatan</h4>
          <div class="google-map">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30257.17762742951!2d119.60813523934414!3d-4.2151407785506265!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d958e4a6dd7df3f%3A0x98fe1a5d4f985457!2sAjakkang%2C%20Kec.%20Soppeng%20Riaja%2C%20Kabupaten%20Barru%2C%20Sulawesi%20Selatan!5e1!3m2!1sid!2sid!4v1712345678901!5m2!1sid!2sid"
              allowfullscreen=""
              loading="lazy"
              referrerpolicy="no-referrer-when-downgrade">
            </iframe>
          </div>
        </div>
      </div>

      <!-- FORM -->
      <div class="col-lg-6">
        <div class="form-wrapper contact-form-card">

          {{-- SUCCESS --}}
          @if (session('success'))
          <div class="alert alert-success alert-soft">
            {{ session('success') }}
          </div>
          @endif

          {{-- ERROR --}}
          @if ($errors->any())
          <div class="alert alert-danger alert-soft">
            <ul class="mb-0 ps-3">
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif

          <form action="{{ route('pages.contact.store') }}" method="POST">
            @csrf

            <div class="row gy-3">

              <div class="col-md-6">
                <input
                  type="text"
                  name="nama"
                  class="form-control form-control-lg"
                  placeholder="Nama Lengkap"
                  value="{{ old('nama') }}"
                  required>
              </div>

              <div class="col-md-6">
                <input
                  type="email"
                  name="email"
                  class="form-control form-control-lg"
                  placeholder="Email"
                  value="{{ old('email') }}"
                  required>
              </div>

              <div class="col-md-12">
                <input
                  type="text"
                  name="subject"
                  class="form-control form-control-lg"
                  placeholder="Subjek"
                  value="{{ old('subject') }}"
                  required>
              </div>

              <div class="col-md-12">
                <textarea
                  name="message"
                  class="form-control form-control-lg"
                  rows="5"
                  placeholder="Tulis pesan Anda..."
                  required>{{ old('message') }}</textarea>
              </div>

              <div class="col-md-12 text-center mt-3">
                <button type="submit" class="btn btn-success btn-lg px-5">
                  Kirim Pesan
                </button>
              </div>

            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
</section>
<!-- /Kotak & Saran Section -->

@endsection

@push('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const swiper = new Swiper('.struktur-slider', {
      loop: true,
      autoplay: {
        delay: 3000,
        disableOnInteraction: false,
      },
      slidesPerView: 1,
      spaceBetween: 20,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      breakpoints: {
        640: {
          slidesPerView: 2,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 3,
          spaceBetween: 30,
        },
        1024: {
          slidesPerView: 4,
          spaceBetween: 30,
        },
      },
    });
  });
</script>
@endpush