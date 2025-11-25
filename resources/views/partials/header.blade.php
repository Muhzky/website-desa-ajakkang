<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center">
            <a href="{{ url('/') }}">
                <img src="{{ asset('assets/img/logo/logo-barru.png') }}" alt="Logo" width="50" height="auto" class="me-2">
            </a>
            <div class="text">
                <h3 class="title-desa sitename mb-0 fw-bold">
                    DESA AJAKKANG
                </h3>
                <p class="subtitle-desa sitename mb-0 fw-bold">
                    Kabupaten Barru
            </div>
        </div>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ route('pages.profil.index') }}">Profil Desa</a></li>
                <li><a href="{{ route('pages.galeri.index') }}">Galeri</a></li>
                <li class="dropdown">
                    <a href=""><span>Transparansi</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="{{ route('pages.transparansi.anggaran') }}">Transparansi Anggaran</a></li>
                        <li><a href="{{ route('pages.transparansi.laporan-kegiatan') }}">Laporan Kegiatan</a></li>
                        <li><a href="#">Dokumen Perencanaan</a></li>
                        <li><a href="#">Bumdesa dan Kopdes MP</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('pages.berita.index') }}">Berita</a></li>
                <li class="dropdown">
                    <a href=""><span>Struktur</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="{{ route('pages.struktur.pemerintahdesa') }}">Pemerintah Desa</a></li>
                        <li><a href="{{ route('pages.struktur.bpd') }}">BPD</a></li>
                        <li><a href="{{ route('pages.struktur.pkk') }}">PKK</a></li>
                        <li><a href="{{ route('pages.struktur.lpm') }}">LPM</a></li>
                        <li><a href="{{ route('pages.struktur.karang-taruna') }}">Karang Taruna</a></li>
                        <li><a href="{{ route('pages.struktur.posyandu') }}">Posyandu</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('pages.layanan.pengaduan') }}">Pengaduan</a></li>
                <li>
                    <a href="{{ Request::is('/') ? '#contact' : url('/#contact') }}">Kontak</a>
                </li>
                <li><a href="{{ route('filament.admin.auth.login') }}" class="btn-login">Login</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
    </div>
</header>