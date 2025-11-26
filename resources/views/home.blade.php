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

        <!-- Button -->
        <div class="d-flex justify-content-center gap-3 mt-4">
          <a href="#sambutan" class="btn btn-primary px-4 py-2">Sambutan Kepala Desa</a>
          <a href="#call-to-action" class="btn btn-primary px-4 py-2">Jelajahi Desa</a>
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
                    <p class="mb-0 fw-medium">
                      Terwujudnya Desa Ajakkang sebagai desa mandiri yang istiqamah menjalankan amar ma'ruf nahi munkar menuju keridhaan Allah Subhanahu Wata'ala.
                    </p>
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
                  <div class="accordion-body bg-light rounded-2 p-3">
                    <ol class="mb-0 ps-3">
                      <li>Mewujudkan penduduk Desa Ajakkang menjadi insan yang bertaqwa kepada Allah SWT, patuh dan taat terhadap segala peraturan yang berlaku.</li>
                      <li>Mewujudkan SDM mandiri dan optimalisasi sumber daya alam secara berkelanjutan.</li>
                      <li>Mewujudkan pelayanan prima melalui kelembagaan pemerintahan yang bersih, transparan, akuntabel, dan profesional.</li>
                      <li>Mewujudkan perekonomian desa yang mandiri dan pemberdayaan masyarakat dalam mengentaskan kemiskinan.</li>
                      <li>Mewujudkan layanan kesehatan dan lingkungan hidup yang sehat serta berkelanjutan.</li>
                    </ol>
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
              <h3 class="counter" data-target="3394">0</h3>
              <p class="mb-0">Jumlah Penduduk</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="data-item text-center">
              <div class="data-icon mx-auto mb-2">
                <i class="bi bi-gender-male fs-3"></i>
              </div>
              <h3 class="counter" data-target="1676">0</h3>
              <p class="mb-0">Laki-laki</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="data-item text-center">
              <div class="data-icon mx-auto mb-2">
                <i class="bi bi-gender-female fs-3"></i>
              </div>
              <h3 class="counter" data-target="1718">0</h3>
              <p class="mb-0">Perempuan</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="data-item text-center">
              <div class="data-icon mx-auto mb-2">
                <i class="bi bi-house-door fs-3"></i>
              </div>
              <h3 class="counter" data-target="995">0</h3>
              <p class="mb-0">Kepala Keluarga</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="data-item text-center">
              <div class="data-icon mx-auto mb-2">
                <i class="bi bi-person-check fs-3"></i>
              </div>
              <h3 class="counter" data-target="56">0</h3>
              <p class="mb-0">Mobilitas nonpermanen</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="data-item text-center">
              <div class="data-icon mx-auto mb-2">
                <i class="bi bi-arrow-left-right fs-3"></i>
              </div>
              <h3 class="counter" data-target="67">0</h3>
              <p class="mb-0">Mutasi Penduduk</p>
            </div>
          </div>
        </div>
      </div>
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
          <a href="https://youtu.be/Edv5SVckIR8?si=ntMxWYRjoXokzc0c" class="glightbox play-btn"></a>
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
      </div>
    </div>
  </div>
</section><!-- /Layanan Kami Section -->

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
        <!-- Kepala Desa -->
        <div class="swiper-slide">
          <div class="struktur-item">
            <div class="struktur-header">
              <img src="{{ asset('assets/img/kepala-desa.jpg') }}" alt="Kepala Desa" loading="lazy">
            </div>
            <div class="struktur-body">
              <h5>Bapak Agus Santoso</h5>
              <span>Kepala Desa</span>
            </div>
          </div>
        </div>

        <!-- Sekretaris Desa -->
        <div class="swiper-slide">
          <div class="struktur-item">
            <div class="struktur-header">
              <img src="{{ asset('assets/img/kepala-desa.jpg') }}" alt="Sekretaris Desa" loading="lazy">
            </div>
            <div class="struktur-body">
              <h5>Ibu Siti Aminah</h5>
              <span>Sekretaris Desa</span>
            </div>
          </div>
        </div>

        <!-- Kaur Keuangan -->
        <div class="swiper-slide">
          <div class="struktur-item">
            <div class="struktur-header">
              <img src="{{ asset('assets/img/kepala-desa.jpg') }}" alt="Kaur Keuangan" loading="lazy">
            </div>
            <div class="struktur-body">
              <h5>Bapak Budi Hartono</h5>
              <span>Kaur Keuangan</span>
            </div>
          </div>
        </div>

        <!-- Kaur Umum -->
        <div class="swiper-slide">
          <div class="struktur-item">
            <div class="struktur-header">
              <img src="{{ asset('assets/img/kepala-desa.jpg') }}" alt="Kaur Umum" loading="lazy">
            </div>
            <div class="struktur-body">
              <h5>Ibu Rina Wati</h5>
              <span>Kaur Umum</span>
            </div>
          </div>
        </div>

        <!-- Kasi Pemerintahan -->
        <div class="swiper-slide">
          <div class="struktur-item">
            <div class="struktur-header">
              <img src="{{ asset('assets/img/person/person-m-5.webp') }}" alt="Kasi Pemerintahan" loading="lazy">
            </div>
            <div class="struktur-body">
              <h5>Bapak Joko Susilo</h5>
              <span>Kasi Pemerintahan</span>
            </div>
          </div>
        </div>

        <!-- Kasi Kesejahteraan -->
        <div class="swiper-slide">
          <div class="struktur-item">
            <div class="struktur-header">
              <img src="{{ asset('assets/img/person/person-f-6.webp') }}" alt="Kasi Kesejahteraan" loading="lazy">
            </div>
            <div class="struktur-body">
              <h5>Ibu Lina Marlina</h5>
              <span>Kasi Kesejahteraan</span>
            </div>
          </div>
        </div>

        <!-- Kasi Pelayanan -->
        <div class="swiper-slide">
          <div class="struktur-item">
            <div class="struktur-header">
              <img src="{{ asset('assets/img/person/person-m-7.webp') }}" alt="Kasi Pelayanan" loading="lazy">
            </div>
            <div class="struktur-body">
              <h5>Bapak Dedi Purwanto</h5>
              <span>Kasi Pelayanan</span>
            </div>
          </div>
        </div>

        <!-- Staf Keuangan 1 -->
        <div class="swiper-slide">
          <div class="struktur-item">
            <div class="struktur-header">
              <img src="{{ asset('assets/img/person/person-f-8.webp') }}" alt="Staf Keuangan" loading="lazy">
            </div>
            <div class="struktur-body">
              <h5>Ibu Dewi Sartika</h5>
              <span>Staf Keuangan</span>
            </div>
          </div>
        </div>

        <!-- Staf Keuangan 2 -->
        <div class="swiper-slide">
          <div class="struktur-item">
            <div class="struktur-header">
              <img src="{{ asset('assets/img/person/person-m-9.webp') }}" alt="Staf Keuangan" loading="lazy">
            </div>
            <div class="struktur-body">
              <h5>Bapak Eko Prasetyo</h5>
              <span>Staf Keuangan</span>
            </div>
          </div>
        </div>

        <!-- Staf Umum 1 -->
        <div class="swiper-slide">
          <div class="struktur-item">
            <div class="struktur-header">
              <img src="{{ asset('assets/img/person/person-f-10.webp') }}" alt="Staf Umum" loading="lazy">
            </div>
            <div class="struktur-body">
              <h5>Ibu Tuti Alawiyah</h5>
              <span>Staf Umum</span>
            </div>
          </div>
        </div>

        <!-- Staf Umum 2 -->
        <div class="swiper-slide">
          <div class="struktur-item">
            <div class="struktur-header">
              <img src="{{ asset('assets/img/person/person-m-10.webp') }}" alt="Staf Umum" loading="lazy">
            </div>
            <div class="struktur-body">
              <h5>Bapak Fajar Nugroho</h5>
              <span>Staf Umum</span>
            </div>
          </div>
        </div>

        <!-- Staf Pemerintahan 1 -->
        <div class="swiper-slide">
          <div class="struktur-item">
            <div class="struktur-header">
              <img src="{{ asset('assets/img/person/person-f-11.webp') }}" alt="Staf Pemerintahan" loading="lazy">
            </div>
            <div class="struktur-body">
              <h5>Ibu Nia Kurnia</h5>
              <span>Staf Pemerintahan</span>
            </div>
          </div>
        </div>

        <!-- Staf Pemerintahan 2 -->
        <div class="swiper-slide">
          <div class="struktur-item">
            <div class="struktur-header">
              <img src="{{ asset('assets/img/person/person-m-11.webp') }}" alt="Staf Pemerintahan" loading="lazy">
            </div>
            <div class="struktur-body">
              <h5>Bapak Hadi Wijaya</h5>
              <span>Staf Pemerintahan</span>
            </div>
          </div>
        </div>

        <!-- Staf Kesejahteraan 1 -->
        <div class="swiper-slide">
          <div class="struktur-item">
            <div class="struktur-header">
              <img src="{{ asset('assets/img/person/') }}" alt="Staf Kesejahteraan" loading="lazy">
            </div>
            <div class="struktur-body">
              <h5>Ibu Riri Andini</h5>
              <span>Staf Kesejahteraan</span>
            </div>
          </div>
        </div>

        <!-- Staf Kesejahteraan 2 -->
        <div class="swiper-slide">
          <div class="struktur-item">
            <div class="struktur-header">
              <img src="{{ asset('assets/img/person/person-m-12.webp') }}" alt="Staf Kesejahteraan" loading="lazy">
            </div>
            <div class="struktur-body">
              <h5>Bapak Rudi Hartanto</h5>
              <span>Staf Kesejahteraan</span>
            </div>
          </div>
        </div>

        <!-- Staf Pelayanan 1 -->
        <div class="swiper-slide">
          <div class="struktur-item">
            <div class="struktur-header">
              <img src="{{ asset('assets/img/person/person-f-13.webp') }}" alt="Staf Pelayanan" loading="lazy">
            </div>
            <div class="struktur-body">
              <h5>Ibu Sari Melati</h5>
              <span>Staf Pelayanan</span>
            </div>
          </div>
        </div>

        <!-- Staf Pelayanan 2 -->
        <div class="swiper-slide">
          <div class="struktur-item">
            <div class="struktur-header">
              <img src="{{ asset('assets/img/person/person-m-13.webp') }}" alt="Staf Pelayanan" loading="lazy">
            </div>
            <div class="struktur-body">
              <h5>Bapak Bambang Sutrisno</h5>
              <span>Staf Pelayanan</span>
            </div>
          </div>
        </div>
      </div>

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

      <!-- Kolom Form Kotak Saran -->
      <div class="col-lg-6">
        <div class="form-wrapper">
          <form action="{{ route('pages.contact.store') }}" method="post" class="php-email-form" data-aos="fade" data-aos-delay="100">
            @csrf
            <div class="row gy-3">
              <div class="col-md-6 col-12">
                <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Lengkap" required>
              </div>

              <div class="col-md-6 col-12">
                <input type="email" class="form-control" name="email" placeholder="Masukkan Email" required>
              </div>

              <div class="col-md-12">
                <input type="text" class="form-control" name="subject" placeholder="Subjek" required>
              </div>

              <div class="col-md-12">
                <textarea class="form-control" name="message" rows="6" placeholder="Pesan" required></textarea>
              </div>

              <div class="col-md-12 text-center">
                <div class="my-3">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Pesan Anda telah dikirim. Terima kasih!</div>
                </div>
                <button type="submit">Kirim</button>
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