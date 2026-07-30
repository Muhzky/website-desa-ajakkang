@extends('layouts.master')

@section('title', 'Perikanan Desa Ajakkang')
@section('meta_description', 'Data komoditas dan kelompok perikanan masyarakat Desa Ajakkang.')

@section('page-title')
@component('components.page-title')
    @slot('title', 'Perikanan Desa')
    @slot('description', 'Data komoditas dan kelompok perikanan masyarakat Desa Ajakkang.')
    @slot('parent', 'Potensi Desa')
    @slot('parentUrl', Request::is('/') ? '#potensi-desa' : url('/#potensi-desa'))
@endcomponent
@endsection

@section('content')
<section class="section py-3">
    <div class="container" data-aos="fade-up">

        <!-- ================= MODERN TAB NAVIGATION ================= -->
        <div class="modern-tabs-wrapper mb-3 tab">
            <div class="modern-tabs" id="perikananTab" role="tablist">
                <button class="modern-tab active" 
                        data-bs-toggle="tab" 
                        data-bs-target="#komoditas" 
                        type="button"
                        role="tab">
                    <i class="bi bi-water"></i>
                    <span>Komoditas</span>
                </button>

                <button class="modern-tab" 
                        data-bs-toggle="tab" 
                        data-bs-target="#kelompok" 
                        type="button"
                        role="tab">
                    <i class="bi bi-people"></i>
                    <span>Kelompok Nelayan</span>
                </button>
            </div>
        </div>

        <div class="tab-content tab-content-modern">

            <!-- ================= TAB KOMODITAS ================= -->
            <div class="tab-pane fade show active" id="komoditas" role="tabpanel">

                <!-- SEARCH -->
                <div class="modern-search-card mb-3" data-aos="fade-up">
                    <form method="GET" action="{{ route('pages.perikanan.index') }}">
                        <div class="row g-2">
                            <div class="col-lg-9">
                                <div class="search-input-wrapper">
                                    <i class="bi bi-search search-icon"></i>
                                    <input type="text"
                                           name="q"
                                           value="{{ request('q') }}"
                                           class="form-control modern-input"
                                           placeholder="Cari komoditas perikanan...">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <button type="submit" class="btn btn-success-modern w-100">
                                    <i class="bi bi-search"></i> Cari
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- KOMODITAS CARDS -->
                <div class="row g-2" data-aos="fade-up">
                    @forelse($komoditas as $item)
                    <div class="col-lg-6">
                        <div class="komoditas-card">
                            <div class="komoditas-header">
                                <div class="komoditas-icon">
                                    <i class="bi bi-water"></i>
                                </div>
                                <div class="komoditas-info">
                                    <h6 class="komoditas-name">{{ $item->nama_komoditas }}</h6>

                                    @php
                                        $badge = match($item->jenis) {
                                            'Air Tawar' => ['color' => 'success', 'icon' => 'droplet'],
                                            'Air Payau' => ['color' => 'warning', 'icon' => 'water'],
                                            'Air Laut'  => ['color' => 'info', 'icon' => 'tsunami'],
                                            default => ['color' => 'secondary', 'icon' => 'fish']
                                        };
                                    @endphp

                                    <span class="badge-xs badge-{{ $badge['color'] }}">
                                        <i class="bi bi-{{ $badge['icon'] }}"></i> {{ $item->jenis }}
                                    </span>
                                </div>
                            </div>

                            <div class="komoditas-body">

                                <div class="info-row">
                                    <div class="info-icon bg-primary-subtle">
                                        <i class="bi bi-water text-primary"></i>
                                    </div>
                                    <div class="info-text">
                                        <small class="text-muted">Nama Komoditas</small>
                                        <div class="fw-semibold">{{ $item->nama_komoditas }}</div>
                                    </div>
                                </div>

                                <div class="info-row">
                                    <div class="info-icon bg-success-subtle">
                                        <i class="bi bi-clock-history text-success"></i>
                                    </div>
                                    <div class="info-text">
                                        <small class="text-muted">Estimasi Panen</small>
                                        <div class="fw-semibold">
                                            {{ $item->estimasi_panen_hari ?? '-' }} Hari
                                        </div>
                                    </div>
                                </div>

                                <div class="info-row">
                                    <div class="info-icon bg-warning-subtle">
                                        <i class="bi bi-graph-up-arrow text-warning"></i>
                                    </div>
                                    <div class="info-text">
                                        <small class="text-muted">Rata-rata Hasil</small>
                                        <div class="fw-semibold">
                                            {{ number_format($item->rata_rata_hasil ?? 0) }} Kg
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12">
                        <div class="empty-state-sm">
                            <i class="bi bi-fish"></i>
                            <div>
                                <strong>Tidak Ada Data</strong>
                                <p>Data komoditas perikanan belum tersedia</p>
                            </div>
                        </div>
                    </div>
                    @endforelse
                </div>

                @if($komoditas->hasPages())
                <div class="mt-3 d-flex justify-content-center">
                    {{ $komoditas->withQueryString()->links() }}
                </div>
                @endif
            </div>

            <!-- ================= TAB KELOMPOK ================= -->
            <div class="tab-pane fade" id="kelompok" role="tabpanel">
                <div class="row g-2">
                    @forelse($kelompok as $item)
                    <div class="col-lg-6" data-aos="fade-up">
                        <div class="kelompok-card">
                            <div class="kelompok-header">
                                <div class="kelompok-icon">
                                    <i class="bi bi-people-fill"></i>
                                </div>
                                <div class="kelompok-info">
                                    <h6 class="kelompok-name">{{ $item->nama_kelompok }}</h6>
                                    <span class="badge-xs badge-light">
                                        <i class="bi bi-person-check"></i>
                                        {{ $item->anggota->count() }} Anggota
                                    </span>
                                </div>
                            </div>

                            <div class="kelompok-body">
                                <div class="ketua-box">
                                    <i class="bi bi-person-circle"></i>
                                    <div>
                                        <small class="text-muted">Ketua Kelompok</small>
                                        <div class="fw-semibold">
                                            {{ $item->ketua->nama ?? 'Belum Ditentukan' }}
                                        </div>
                                    </div>
                                </div>

                                <hr class="my-2">

                                <div class="anggota-box">
                                    <div class="box-title">
                                        <i class="bi bi-person-lines-fill"></i> Daftar Anggota
                                    </div>

                                    @if($item->anggota->count())
                                        <div class="anggota-list-sm">
                                            @foreach($item->anggota->take(3) as $anggota)
                                            <div class="anggota-row">
                                                <div class="anggota-avatar">
                                                    {{ substr($anggota->nama, 0, 1) }}
                                                </div>
                                                <div class="anggota-name">{{ $anggota->nama }}</div>
                                                <small class="anggota-role">{{ $anggota->jabatan ?? 'Anggota' }}</small>
                                            </div>
                                            @endforeach
                                            
                                            @if($item->anggota->count() > 3)
                                            <div class="more-count">
                                                +{{ $item->anggota->count() - 3 }} lainnya
                                            </div>
                                            @endif
                                        </div>
                                    @else
                                        <div class="empty-box">
                                            <i class="bi bi-people"></i>
                                            <small>Belum ada anggota</small>
                                        </div>
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12">
                        <div class="empty-state-sm">
                            <i class="bi bi-people"></i>
                            <div>
                                <strong>Tidak Ada Kelompok</strong>
                                <p>Data kelompok perikanan belum tersedia</p>
                            </div>
                        </div>
                    </div>
                    @endforelse
                </div>

                @if($kelompok->hasPages())
                <div class="mt-3 d-flex justify-content-center">
                    {{ $kelompok->withQueryString()->links() }}
                </div>
                @endif
            </div>

        </div>
    </div>
</section>

<style>
/* ==================== TABS ==================== */
.modern-tabs-wrapper {
    display: flex;
    justify-content: center;
}

.tab{
    padding-bottom: 20px
}

.modern-tabs {
    display: inline-flex;
    background: #fff;
    border-radius: 8px;
    padding: 4px;
    box-shadow: 0 1px 6px rgba(0, 0, 0, 0.08);
    gap: 4px;
}

.modern-tab {
    display: flex;
    align-items: center;
    gap: 6px;
    padding: 8px 14px;
    border: none;
    background: transparent;
    border-radius: 6px;
    transition: all 0.3s ease;
    cursor: pointer;
    font-size: 13px;
    font-weight: 600;
    color: #6b7280;
}

.modern-tab i {
    font-size: 16px;
}

.modern-tab:hover {
    background: #f3f4f6;
    color: #1f2937;
}

.modern-tab.active {
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    color: #fff;
    box-shadow: 0 2px 6px rgba(16, 185, 129, 0.25);
}

/* ==================== SEARCH ==================== */
.modern-search-card {
    background: #fff;
    border-radius: 10px;
    padding: 12px;
    box-shadow: 0 1px 4px rgba(0, 0, 0, 0.06);
}

.search-input-wrapper {
    position: relative;
}

.search-icon {
    position: absolute;
    left: 10px;
    top: 50%;
    transform: translateY(-50%);
    color: #9ca3af;
    font-size: 14px;
}

.modern-input {
    padding: 8px 10px 8px 34px;
    border: 1px solid #e5e7eb;
    border-radius: 8px;
    font-size: 13px;
    transition: all 0.3s ease;
}

.modern-input:focus {
    border-color: #10b981;
    box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
}

.btn-success-modern {
    padding: 8px 16px;
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    border: none;
    border-radius: 8px;
    font-weight: 600;
    font-size: 13px;
    transition: all 0.3s ease;
    box-shadow: 0 2px 6px rgba(16, 185, 129, 0.2);
}

.btn-success-modern:hover {
    transform: translateY(-1px);
    box-shadow: 0 3px 10px rgba(16, 185, 129, 0.3);
}

/* ==================== KOMODITAS CARD ==================== */
.komoditas-card {
    background: #fff;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 1px 4px rgba(0, 0, 0, 0.06);
    transition: all 0.3s ease;
    height: 100%;
}

.komoditas-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

.komoditas-header {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 12px;
    background: linear-gradient(135deg, #f9fafb 0%, #f3f4f6 100%);
    border-bottom: 1px solid #e5e7eb;
}

.komoditas-icon {
    width: 32px;
    height: 32px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    border-radius: 8px;
    flex-shrink: 0;
}

.komoditas-icon i {
    font-size: 16px;
    color: #fff;
}

.komoditas-info {
    flex: 1;
    min-width: 0;
}

.komoditas-name {
    font-size: 14px;
    font-weight: 700;
    color: #1f2937;
    margin: 0 0 4px 0;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.badge-xs {
    display: inline-flex;
    align-items: center;
    gap: 3px;
    padding: 2px 8px;
    border-radius: 5px;
    font-size: 10px;
    font-weight: 600;
}

.badge-success {
    background: #d1fae5;
    color: #065f46;
}

.badge-warning {
    background: #fef3c7;
    color: #92400e;
}

.badge-info {
    background: #dbeafe;
    color: #1e40af;
}

.badge-secondary {
    background: #e5e7eb;
    color: #374151;
}

.badge-light {
    background: rgba(255, 255, 255, 0.2);
    color: #fff;
}

.komoditas-body {
    padding: 10px;
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.info-row {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 8px;
    background: #f9fafb;
    border-radius: 8px;
}

.info-icon {
    width: 28px;
    height: 28px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 6px;
    flex-shrink: 0;
}

.info-icon i {
    font-size: 14px;
}

.info-text {
    flex: 1;
    min-width: 0;
}

.info-text small {
    font-size: 10px;
    display: block;
}

.info-text .fw-semibold {
    font-size: 12px;
    color: #1f2937;
}

/* ==================== KELOMPOK CARD ==================== */
.kelompok-card {
    background: #fff;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 1px 4px rgba(0, 0, 0, 0.06);
    transition: all 0.3s ease;
    height: 100%;
}

.kelompok-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

.kelompok-header {
    padding: 12px;
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    display: flex;
    align-items: center;
    gap: 10px;
}

.kelompok-icon {
    width: 32px;
    height: 32px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 8px;
    flex-shrink: 0;
}

.kelompok-icon i {
    font-size: 16px;
    color: #fff;
}

.kelompok-info {
    flex: 1;
    min-width: 0;
}

.kelompok-name {
    font-size: 14px;
    font-weight: 700;
    color: #fff;
    margin: 0 0 4px 0;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.kelompok-body {
    padding: 12px;
}

.ketua-box {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 10px;
    background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
    border-radius: 8px;
}

.ketua-box i {
    font-size: 24px;
    color: #10b981;
}

.ketua-box small {
    font-size: 10px;
    display: block;
}

.ketua-box .fw-semibold {
    font-size: 13px;
    color: #1f2937;
}

.anggota-box {
    margin-top: 8px;
}

.box-title {
    font-size: 12px;
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 8px;
}

.box-title i {
    font-size: 13px;
}

.anggota-list-sm {
    display: flex;
    flex-direction: column;
    gap: 6px;
}

.anggota-row {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 6px 8px;
    background: #f9fafb;
    border-radius: 6px;
    transition: all 0.2s;
}

.anggota-row:hover {
    background: #f3f4f6;
}

.anggota-avatar {
    width: 24px;
    height: 24px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    color: #fff;
    border-radius: 5px;
    font-weight: 700;
    font-size: 11px;
    flex-shrink: 0;
}

.anggota-name {
    flex: 1;
    font-size: 12px;
    font-weight: 600;
    color: #1f2937;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.anggota-role {
    font-size: 10px;
    color: #6b7280;
}

.more-count {
    text-align: center;
    padding: 6px;
    color: #10b981;
    font-size: 11px;
    font-weight: 600;
}

.empty-box {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 16px;
    color: #9ca3af;
    text-align: center;
}

.empty-box i {
    font-size: 28px;
    margin-bottom: 4px;
}

.empty-box small {
    font-size: 11px;
}

/* ==================== EMPTY STATE ==================== */
.empty-state-sm {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
    padding: 30px 20px;
    text-align: center;
    background: #f9fafb;
    border-radius: 10px;
}

.empty-state-sm i {
    font-size: 32px;
    color: #9ca3af;
}

.empty-state-sm strong {
    font-size: 14px;
    color: #1f2937;
    display: block;
    margin-bottom: 2px;
}

.empty-state-sm p {
    font-size: 12px;
    color: #6b7280;
    margin: 0;
}

.tab-content-modern {
    padding-bottom: 100px;
}

/* ==================== RESPONSIVE ==================== */
@media (max-width: 768px) {
    .modern-tabs {
        flex-direction: column;
        width: 100%;
    }
    
    .modern-tab {
        width: 100%;
        justify-content: center;
    }
    
    .empty-state-sm {
        flex-direction: column;
        gap: 8px;
    }
}
</style>
@endsection