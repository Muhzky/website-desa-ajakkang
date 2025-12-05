@extends('layouts.master')

@section('title', 'Profil Desa Ajakkang')
@section('meta_description', 'Profil lengkap Desa Ajakkang, Kecamatan Soppeng Riaja, Kabupaten Barru')

@section('page-title')
@component('components.page-title')
@slot('title', 'Profil Desa')
@slot('description', 'Mengenal lebih dekat Desa Ajakkang, sejarah, struktur wilayah, demografi, dan potensi desa.')
@endcomponent
@endsection

@section('content')

<section class="portfolio-details section">
  <div class="container" data-aos="fade-up">
    <div class="container">
    <img class="glightbox petdes" src="{{ asset('assets/img/peta-desa-ajakkang(1).jpg') }}" alt="Peta Desa Ajakkang" style="width: 100%; height: auto; padding: 0 100px 0 100px;">
</div>
    <div class="row justify-content-between gy-4 mt-4">
      <!-- Kolom Informasi (kiri pada layar besar) -->
      <div class="col-lg-4 order-lg-first" data-aos="fade-up">
        <div class="portfolio-info">
          <h3>Informasi Desa</h3>
          <ul class="mb-2">
            <li><strong>Nama Desa:</strong> Desa Ajakkang</li>
            <li><strong>Kecamatan:</strong> Kec. Soppeng Riaja</li>
            <li><strong>Kabupaten:</strong> Kab. Barru</li>
          </ul>
        </div>

        <div class="portfolio-info mt-3">
          <h3>Batas Wilayah</h3>
          <ul class="mb-2">
            <li><strong>Utara:</strong> Desa Lompo Riaja</li>
            <li><strong>Selatan:</strong> Desa Sumpang Binangae</li>
            <li><strong>Timur:</strong> Desa Kading</li>
            <li><strong>Barat:</strong> Teluk Bone</li>
          </ul>
        </div>

        <div class="portfolio-info mt-3">
          <h3>Lokasi Desa</h3>
          <div class="map-container">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31805.94400929207!2d119.77123512270505!3d-4.42554460670407!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbeb01b6c0759f9%3A0x8633f572889260d!2sAjakkang%2C%20Kec.%20Soppeng%20Riaja%2C%20Kabupaten%20Barru%2C%20Sulawesi%20Selatan!5e1!3m2!1sid!2sid!4v1731320078209!5m2!1sid!2sid"
              width="100%"
              height="220"
              allowfullscreen=""
              loading="lazy"
              referrerpolicy="no-referrer-when-downgrade">
            </iframe>
          </div>
        </div>
      </div>

      <div class="col-lg-8 order-lg-last" data-aos="fade-up">
        <div class="card-modern portfolio-description">
  <h3>Sejarah Desa</h3>
  <ol type="1">
    <li>
      <p>
        Desa Ajakkang berada di Kecamatan Soppeng Riaja, yang dulunya bagian dari Kerajaan Ajatappareng—wilayah berbasis pertanian dan perikanan.
      </p>
    </li>
    <li>
      <p>
        Pada abad ke-15, Ajatappareng dikuasai Gowa, lalu dibebaskan oleh Arung Palakka (Raja Bone) pada awal abad ke-16. Sebagai balas jasa, wilayah antara Sungai Batu Pute dan Sungai Takkalasi diserahkan kepada Bone.
      </p>
    </li>
    <li>
      <p>
        Wilayah itu kemudian diawasi Soppeng, namun konflik antara Bone, Soppeng, dan Ajatappareng/Nepo di pertengahan abad ke-16 membuat Soppeng menguasai seluruh wilayah tersebut, termasuk pesisir barat.
      </p>
    </li>
    <li>
      <p>
        Untuk keseluruhan wilayah antara sungai Batu Pute dengan sungai Takkalasi, oleh Raja Soppeng diberi nama Soppeng Riaja yang artinya Soppeng Bagian Barat.
      </p>
    </li>
    <li>
      <p>
        Nama “Ajakkang” berasal dari kata “jakka” (sisir), terkait legenda putra Kerajaan Luwu’ yang kehilangan sisir di tempat ini. Nama ini juga melambangkan musyawarah—seperti menyisir benang kusut—untuk menyelesaikan masalah bersama.
      </p>
    </li>
    <li>
      <p>
        Pada tahun 1900 terbentuklah Kampung Ajakkang dan dikepalai oleh Anre Guru. Berikut adalah daftar nama Anre Guru yang pernah menjabat sebagai Kepala Kampung Ajakkang:
        <ol type="a">
          <li>Anre Guru Laikki pada tahun 1880 – 1900</li>
          <li>Anre Guru Lagala pada tahun 1900 – 1910</li>
          <li>Anre Guru Lakenta pada tahun 1910 – 1920</li>
          <li>Anre Guru Abd. Rahim pada tahun 1920 – 1930</li>
        </ol>
      </p>
    </li>
    <li>
      <p>
        Pada Tahun 1954 Kampung Ajakkang dimekarkan menjadi 2 Kampung yaitu Kampung Baru dan Kampung Ajakkang. Pada Tahun itu juga dipilih Kepala Dusun dan masing-masing mengepalai dusun tersebut selama kurang lebih 15 tahun lamanya.
      </p>
    </li>
    <li>
      <p>
        Setelah diberlakukannya UU Nomor 5 Tahun 1979 tentang Pemerintahan Desa, maka Ajakkang dibentuk menjadi Desa berdasarkan SK Gubernur Provinsi Sulawesi Selatan Nomor 450/XII/1965, tanggal 20 Desember 1965.
      </p>
    </li>
    <li>
      <p>
        Pada Tahun 1995 Desa Ajakkang kembali dimekarkan menjadi 5 Dusun yaitu:
        <ol type="a">
          <li>Dusun Ajakkang, Kepala Dusunnya M. Nasar</li>
          <li>Dusun Latappareng, Kepala Dusunnya Buhari</li>
          <li>Dusun Kamp. Baru, Kepala Dusunnya Abd. Muttalib</li>
          <li>Dusun Minangatoa, Kepala Dusunnya M. Nuh</li>
          <li>Dusun Paccekke, Kepala Dusunnya La Tahe</li>
        </ol>
      </p>
    </li>
    <li>
      <p>
        Akan tetapi pada tahun 2000 Dusun Paccekke berubah menjadi Desa, sehingga sampai sekarang Desa Ajakkang hanya terdiri menjadi 4 Dusun.
      </p>
    </li>
    <li>
      <p>
        Dengan diberlakukannya Undang-undang Nomor 22 Tahun 1999 dan Undang-undang Nomor 32 Tahun 2004 sebagai pengganti Undang-undang sebelumnya, tentang Pemerintahan Desa, maka Desa Ajakkang memposisikan diri sebagai Desa otonom dengan mengedepankan partisipasi dan peran serta masyarakat dalam proses pembangunan.
      </p>
    </li>
  </ol>
</div>
      </div>
    </div>
  </div>
  
</section>

<section id="demografi" class="profil-section">
  <div class="container" data-aos="fade-up">
    <div class="section-header text-center mb-5">
      <h2 class="section-title">Data Kependudukan</h2>
      <div class="title-divider"></div>
      <p class="section-subtitle">Statistik jumlah penduduk Desa Ajakkang</p>
    </div>
    <div class="demografi-grid">
      <div class="card-modern demografi-card" data-aos="zoom-in" data-aos-delay="100">
        <div class="demografi-icon"><i class="bi bi-people-fill"></i></div>
        <h3 class="demografi-number counter" data-target="3394">0</h3>
        <p class="demografi-label">Total Penduduk</p>
      </div>
      <div class="card-modern demografi-card" data-aos="zoom-in" data-aos-delay="200">
        <div class="demografi-icon male"><i class="bi bi-gender-male"></i></div>
        <h3 class="demografi-number counter" data-target="1676">0</h3>
        <p class="demografi-label">Laki-laki</p>
      </div>
      <div class="card-modern demografi-card" data-aos="zoom-in" data-aos-delay="300">
        <div class="demografi-icon female"><i class="bi bi-gender-female"></i></div>
        <h3 class="demografi-number counter" data-target="1718">0</h3>
        <p class="demografi-label">Perempuan</p>
      </div>
      <div class="card-modern demografi-card" data-aos="zoom-in" data-aos-delay="400">
        <div class="demografi-icon"><i class="bi bi-house-door-fill"></i></div>
        <h3 class="demografi-number counter" data-target="995">0</h3>
        <p class="demografi-label">Kepala Keluarga</p>
      </div>
    </div>
  </div>
</section>

<section id="potensi-desa" class="profil-section bg-transparent">
  <div class="container" data-aos="fade-up">
    <div class="section-header text-center mb-5">
      <h2 class="section-title">Potensi Desa</h2>
      <div class="title-divider"></div>
      <p class="section-subtitle">Berbagai potensi dan kekayaan yang dimiliki Desa Ajakkang</p>
    </div>
    <div class="potensi-grid">
      <div class="card-modern potensi-card" data-aos="fade-up" data-aos-delay="100">
        <div class="potensi-icon"><i class="bi bi-tree-fill"></i></div>
        <h4 class="potensi-title">Pertanian</h4>
        <p class="potensi-desc">Lahan pertanian yang luas dengan hasil panen padi, jagung, dan sayuran sebagai komoditas utama desa.</p>
      </div>
      <div class="card-modern potensi-card" data-aos="fade-up" data-aos-delay="200">
        <div class="potensi-icon"><i class="fas fa-water"></i></div>
        <h4 class="potensi-title">Perikanan</h4>
        <p class="potensi-desc">Budidaya ikan air tawar dan perikanan tangkap di pesisir pantai menjadi sumber ekonomi masyarakat.</p>
      </div>
      <div class="card-modern potensi-card" data-aos="fade-up" data-aos-delay="300">
        <div class="potensi-icon"><i class="bi bi-shop"></i></div>
        <h4 class="potensi-title">UMKM</h4>
        <p class="potensi-desc">Berbagai usaha mikro, kecil dan menengah berkembang di bidang kuliner dan kerajinan tangan.</p>
      </div>
      <div class="card-modern potensi-card" data-aos="fade-up" data-aos-delay="400">
        <div class="potensi-icon"><i class="bi bi-camera-reels"></i></div>
        <h4 class="potensi-title">Pariwisata</h4>
        <p class="potensi-desc">Keindahan alam pantai dan perbukitan menjadi daya tarik wisata yang potensial untuk dikembangkan.</p>
      </div>
      <div class="card-modern potensi-card" data-aos="fade-up" data-aos-delay="500">
        <div class="potensi-icon"><i class="bi bi-palette2"></i></div>
        <h4 class="potensi-title">Budaya</h4>
        <p class="potensi-desc">Kekayaan budaya Bugis yang masih terjaga dengan berbagai tradisi dan upacara adat yang lestari.</p>
      </div>
      <div class="card-modern potensi-card" data-aos="fade-up" data-aos-delay="600">
        <div class="potensi-icon"><i class="bi bi-award"></i></div>
        <h4 class="potensi-title">Sumber Daya Manusia</h4>
        <p class="potensi-desc">Generasi muda yang terdidik dan siap mengembangkan desa dengan semangat inovasi dan kreativitas.</p>
      </div>
    </div>
  </div>
</section>

<!-- 
<section id="peta-wilayah" class="profil-section">
  <div class="container" data-aos="fade-up">
    <div class="section-header text-center mb-5">
      <h2 class="section-title">Peta Wilayah Desa</h2>
      <div class="title-divider"></div>
      <p class="section-subtitle">Pembagian wilayah administratif dan peta per dusun</p>
    </div>
    <div class="peta-wrapper" data-aos="fade-up" data-aos-delay="100">
      <div class="peta-slider swiper">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="peta-card">
              <div class="peta-image">
                <img src="/assets/img/peta/peta-desa-ajakkang.jpg" alt="Peta Desa Ajakkang" loading="lazy">
              </div>
              <div class="peta-caption">
                <h5>Peta Desa Ajakkang</h5>
                <p>Peta wilayah administratif keseluruhan</p>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="peta-card">
              <div class="peta-image">
                <img src="/assets/img/peta/peta-dusun-1.jpg" alt="Peta Dusun 1" loading="lazy">
              </div>
              <div class="peta-caption">
                <h5>Dusun 1</h5>
                <p>Kepala Dusun: Bapak Ahmad</p>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="peta-card">
              <div class="peta-image">
                <img src="/assets/img/peta/peta-dusun-2.jpg" alt="Peta Dusun 2" loading="lazy">
              </div>
              <div class="peta-caption">
                <h5>Dusun 2</h5>
                <p>Kepala Dusun: Bapak Ibrahim</p>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="peta-card">
              <div class="peta-image">
                <img src="/assets/img/peta/peta-dusun-3.jpg" alt="Peta Dusun 3" loading="lazy">
              </div>
              <div class="peta-caption">
                <h5>Dusun 3</h5>
                <p>Kepala Dusun: Bapak Muhammad</p>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="peta-card">
              <div class="peta-image">
                <img src="/assets/img/peta/peta-dusun-4.jpg" alt="Peta Dusun 4" loading="lazy">
              </div>
              <div class="peta-caption">
                <h5>Dusun 4</h5>
                <p>Kepala Dusun: Bapak Hasan</p>
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-pagination""></div>
      </div>
    </div>
  </div>
</section> -->
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
    --radius: 14px;
    --shadow: 0 6px 20px rgba(0, 0, 0, 0.06);
    --shadow-hover: 0 12px 30px rgba(0, 0, 0, 0.1);
  }

  body {
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
    color: var(--text);
  }

  h2,
  h3,
  h5 {
    font-weight: 700;
    color: var(--text);
  }

  /* Section */
  .profil-section {
    padding: 60px 0;
  }

  .section-header {
    margin-bottom: 50px;
  }

  .section-title {
    font-size: 2.25rem;
    margin-bottom: 1rem;
  }

  .section-subtitle {
    color: var(--text-light);
    font-size: 1.125rem;
    max-width: 650px;
    margin: 0 auto 2rem;
    line-height: 1.6;
  }

  .title-divider {
    width: 60px;
    height: 4px;
    background: var(--primary);
    margin: 0 auto 2rem;
    border-radius: 2px;
  }

  /* Card Modern */
  .card-modern {
    padding: 24px;
    height: 100%;
  }

  /* Portfolio Info Sidebar */
  .portfolio-details{
    padding-top: 0;
    margin-top: 0;
  }
  
  .portfolio-info {
    background: white;
    border-radius: var(--radius);
    padding: 24px;
    margin-bottom: 24px;
    box-shadow: var(--shadow);
  }

  .portfolio-info ul {
    list-style: none;
    padding: 0;
    margin: 0;
  }

  .portfolio-info li {
    padding: 8px 0;
    display: flex;
    justify-content: space-between;
    font-size: 0.95rem;
  }

  .portfolio-info li strong {
    margin-right: 8px;
    color: var(--text);
  }

  .map-container {
    padding: 0;
    overflow: hidden;
  }

  /* Demografi */
  .demografi-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
    gap: 24px;
  }

  .demografi-card {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
  }

  .demografi-icon {
    width: 72px;
    height: 72px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 20px;
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    color: white;
    font-size: 2rem;
  }

  .demografi-icon.male {
    background: linear-gradient(135deg, #3b82f6, #2563eb);
  }

  .demografi-icon.female {
    background: linear-gradient(135deg, #ec4899, #db2777);
  }

  .demografi-number {
    font-size: 2.25rem;
    font-weight: 800;
    margin: 0;
    color: var(--text);
  }

  .demografi-label {
    margin-top: 8px;
    color: var(--text-light);
    font-size: 1rem;
  }

  /* Potensi Desa */
  .potensi-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 28px;
  }

  .potensi-card .potensi-icon {
    width: 68px;
    height: 68px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 20px;
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    color: white;
    font-size: 1.8rem;
    transition: transform 0.3s ease;
  }

  .potensi-card:hover .potensi-icon {
    transform: scale(1.15) rotate(8deg);
  }

  .potensi-title {
    margin-bottom: 14px;
    font-size: 1.25rem;
  }

  .potensi-desc {
    color: var(--text-light);
    line-height: 1.6;
    margin: 0;
    font-size: 1rem;
  }

  /* Peta Slider */
  .peta-wrapper {
    position: relative;
    padding: 20px 0;
  }

  .peta-slider .swiper-slide {
    padding-bottom: 50px;
    display: flex;
    justify-content: center;
  }

  .peta-card {
    width: 100%;
    max-width: 500px;
    background: white;
    border-radius: var(--radius);
    overflow: hidden;
    box-shadow: var(--shadow);
  }

  .peta-image {
    height: 360px;
    width: 100%;
    overflow: hidden;
  }
 

  .peta-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s ease;
  }

  .peta-card:hover .peta-image img {
    transform: scale(1.03);
  }

  .peta-caption {
    padding: 30px;
    text-align: center;
  }

  .peta-caption h5 {
    margin-bottom: 8px;
  }

  .peta-caption p {
    color: var(--text-light);
    margin: 0;
  }

  /* Swiper Navigation */
  .peta-slider .swiper-button-prev,
  .peta-slider .swiper-button-next {
    color: #28a745 !important;
    background-color: #fff;
    width: 44px;
    height: 44px;
    border-radius: 50%;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background 0.3s ease;
  }


  .peta-slider .swiper-pagination-bullet {
    width: 10px;
    height: 10px;
    opacity: 0.5;
    background: var(--text-light);
  }

  .peta-slider .swiper-pagination-bullet-active {
    opacity: 1;
    background: var(--primary);
    transform: scale(1.3);
  }

  /* Responsive */
  @media (max-width: 991px) {
    .profil-section {
      padding: 70px 0;
    }

    .section-title {
      font-size: 2rem;
    }
  }

  @media (max-width: 768px) {
    .section-title {
      font-size: 1.875rem;
    }

    .section-subtitle {
      font-size: 1rem;
    }

    .demografi-number {
      font-size: 2rem;
    }

    .peta-image {
      height: 280px;
    }
  }

  @media (min-width: 320px) and (max-width: 767px){
    .petdes {
      padding: 0 !important;
    }
    .petdes img {
      width: 100% !important;
      height: auto !important;
      object-fit: contain !important;
    }

    .profil-section {
      padding: 60px 0;
    }

    .card-modern {
      padding: 24px;
    }

    .portfolio-info {
      padding: 20px;
    }

    .peta-image {
      height: 220px;
    }

    .potensi-grid,
    .demografi-grid {
      gap: 16px;
    }
  }
</style>
@endpush

@push('scripts')
<script>
   const lightbox = GLightbox({
    selector: '.petdes'
  });

  (function() {
    "use strict";

    // Counter Animation
    const counters = document.querySelectorAll('.counter');
    const speed = 200;

    const animateCounters = () => {
      counters.forEach(counter => {
        const updateCount = () => {
          const target = +counter.getAttribute('data-target');
          const count = +counter.innerText;
          const inc = target / speed;

          if (count < target) {
            counter.innerText = Math.ceil(count + inc);
            setTimeout(updateCount, 1);
          } else {
            counter.innerText = target;
          }
        };
        updateCount();
      });
    };

    // Trigger counter on scroll into view
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          animateCounters();
          observer.unobserve(entry.target);
        }
      });
    }, {
      threshold: 0.5
    });

    if (counters.length > 0) {
      observer.observe(document.querySelector('#demografi'));
    }

    // Peta Wilayah Swiper
    const petaSlider = document.querySelector('.peta-slider');
    if (petaSlider && typeof Swiper !== 'undefined') {
      new Swiper('.peta-slider', {
        loop: true,
        speed: 600,
        slidesPerView: 1,
        spaceBetween: 30,
        autoplay: {
          delay: 4000,
          disableOnInteraction: false,
        },
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
        },
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
        breakpoints: {
          640: {
            slidesPerView: 1
          },
          768: {
            slidesPerView: 2
          },
          1024: {
            slidesPerView: 3
          },
        },
      });
    }
  })();
</script>
@endpush