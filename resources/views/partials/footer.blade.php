<footer id="footer" class="footer dark-background">
    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-2 col-md-4 col-sm-6 text-center text-md-start footer-about">
          <img src="{{ asset('assets/img/Logo-Desa-Ajakkang.png') }}" alt="" width="160" class="img-fluid mx-auto mx-md-0">
        </div>

        <div class="col-lg-3 col-md-8 col-sm-12 text-center text-md-start footer-about">
          <a href="#" class="d-block">
            <span class="sitename h2 fw-bold">Desa Ajakkang</span><br>
            <span class="h5 fw-bold">Kabupaten Barru</span>
          </a>
          <p class="mt-3">
            <strong>Desa Ajakkang</strong> adalah desa yang terletak di Kecamatan Barru, Kabupaten Barru, Sulawesi
            Selatan.
          </p>
          <div class="social-links d-flex justify-content-center justify-content-md-start mt-3">
            <a href="https://www.facebook.com/share/1C87gmukTa/"><i class="bi bi-facebook"></i></a>
            <a href="https://www.instagram.com/desaajakkang250103?igsh=ZHdlb3R1dXJrenAz"><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-youtube"></i></a>
            <a href="https://www.tiktok.com/@ajakkang.membangun?_r=1&_t=ZS-91Im8L4cfX2"><i class="bi bi-tiktok"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Akses Cepat</h4>
          <ul>
            <li><a href="{{ route('pages.profil.index') }}">Profil Desa</a></li>
            <li><a href="{{ route('pages.galeri.index') }}">Galeri</a></li>
            <li><a href="{{ route('pages.transparansi.anggaran') }}">Transparansi</a></li>
            <li><a href="{{ route('pages.berita.index') }}">Berita</a></li>
            <li><a href="{{ route('pages.struktur.pemerintahdesa') }}">Struktur</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Layanan Kami</h4>
          <ul>
            <li><a href="{{ route('pages.layanan.pemdes') }}">Bagian Pemerintahan</a></li>
            <li><a href="{{ route('pages.layanan.pelayanan') }}">Bagian Pelayanan</a></li>
            <li><a href="{{ route('pages.layanan.kesra') }}">Layanan Kesra</a></li>
            <li><a href="{{ route('pages.layanan.posyandu') }}">Pelayanan Kesehatan &amp; Posyandu</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-12 text-center text-md-start footer-contact">
          <h4>Alamat</h4>
          <p>Desa Ajakkang</p>
          <p>Kecamatan Soppeng Riaja</p>
          <p>Kabupaten Barru</p>
          <p>Sulawesi Selatan, ID 90752</p>
          <p class="mt-3">
            <strong>Hotline :</strong> <span>+62 815-2591-1191</span>
          </p>
          <p><strong>Email :</strong> <span>desaajakkang2023@gmail.com</span></p>
          <br>
        </div>
      </div>
    </div>

 <!-- Copyright Full Width -->
<div class="copyright-full">
  <div class="container">
    <div class="d-flex flex-column flex-md-row align-items-center justify-content-center gap-3 text-center">
      
      <!-- Logo berdempetan -->
      <div class="d-flex gap-3">
        <a>
          <img src="{{ asset('assets/img/LogoUndipa.png') }}" alt="Logo Universitas Dipa" width="48" class="img-fluid">
        </a>
        <a>
          <img src="{{ asset('assets/img/KKNT-DESA-AJAKKANG.png') }}" alt="Logo KKN Desa Ajakkang" width="50" class="img-fluid">
        </a>
      </div>

      <!-- Teks copyright -->
      <div>
        <p class="mb-0">
          &copy; <span>Copyright </span>
          <strong class="px-1 sitename">Desa Ajakkang</strong>
          <span>2025. All Rights Reserved.</span>
        </p>
        <p class="mt-1 small mb-0">
          Dikembangkan oleh 
          <a href="https://www.instagram.com/kknt.undipa_desajakkang25?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" 
             target="_blank" class="text-decoration-none">
            KKN Tematik Universitas Dipa Makassar 2025
          </a>
        </p>
      </div>

    </div>
  </div>
</div>
  </footer>