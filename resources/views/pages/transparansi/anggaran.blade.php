@extends('layouts.master')
@section('title', 'Transparansi Anggaran - Desa Ajakkang')
@section('meta_description', 'Transparansi anggaran Desa Ajakkang, Kecamatan Soppeng Riaja, Kabupaten Barru')

@section('page-title')
@component('components.page-title')
    @slot('title', 'Transparansi Anggaran')
    @slot('description', 'Halaman ini menyajikan informasi lengkap mengenai transparansi anggaran yang dikelola oleh Desa Ajakkang.')
    @slot('parent', 'Transparansi')
    @slot('parentUrl', url('/'))
@endcomponent
@endsection


@section('content')
<section id="transparansi-anggaran" class="transparansi-anggaran section">
<div class="container" data-aos="fade-up">

{{-- ================= REKAP KEUANGAN ================= --}}
<div class="row mb-5">
    <div class="col-12">
        <h4 class="subsection-title">
            Rekap Keuangan Tahun {{ $tahun }}
        </h4>

        <p class="text-muted mb-4">
            Berikut ini adalah data-data mengenai transparansi anggaran yang dikelola oleh pemerintah Desa Ajakkang.
        </p>

        {{-- Dropdown Tahun --}}
        <div class="text-center mb-4">
            <div style="max-width:150px;margin:auto">
                <select id="tahunSelect" class="form-select form-select-lg">
                    @forelse ($daftarTahun as $thn)
                        <option value="{{ $thn }}" {{ $thn == $tahun ? 'selected' : '' }}>
                            Tahun {{ $thn }}
                        </option>
                    @empty
                        <option disabled>Tidak ada data</option>
                    @endforelse
                </select>
            </div>
        </div>

        {{-- Rekap Card --}}
        <div class="rekap-keuangan-card">
            <div class="rekap-item">
                <div class="rekap-icon text-success">
                    <i class="bi bi-cash-stack"></i>
                </div>
                <div class="rekap-info">
                    <p class="rekap-label">Pemasukan</p>
                    <h3 class="rekap-value text-success">
                        {{ $rekap?->pemasukan_formatted ?? 'Rp0' }}
                    </h3>
                </div>
            </div>

            <div class="rekap-divider"></div>

            <div class="rekap-item">
                <div class="rekap-icon text-danger">
                    <i class="bi bi-cash-coin"></i>
                </div>
                <div class="rekap-info">
                    <p class="rekap-label">Pengeluaran</p>
                    <h3 class="rekap-value text-danger">
                        {{ $rekap?->pengeluaran_formatted ?? 'Rp0' }}
                    </h3>
                </div>
            </div>

            <div class="rekap-divider"></div>

            <div class="rekap-item">
                <div class="rekap-icon text-primary">
                    <i class="bi bi-bar-chart-line"></i>
                </div>
                <div class="rekap-info">
                    <p class="rekap-label">Surplus / Defisit</p>
                    <h3 class="rekap-value {{ ($rekap?->surplus ?? 0) >= 0 ? 'text-primary' : 'text-danger' }}">
                        {{ $rekap?->surplus_formatted ?? 'Rp0' }}
                    </h3>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ================= GRAFIK ================= --}}
<div class="row mb-5">
    <div class="col-12">
        <h4 class="subsection-title">Grafik Transparansi Anggaran</h4>
        <p class="text-muted mb-4">
            Data transparansi anggaran ditampilkan dalam bentuk grafik batang.
        </p>

        <div class="card">
            <div class="card-body">
                <div class="chart-container">
                    <canvas id="chartAnggaran"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ================= DAFTAR TRANSPARANSI ================= --}}
<div class="row">
<div class="col-12">
    <h4 class="subsection-title">Daftar Transparansi Anggaran</h4>
    <p class="text-muted mb-4">
        Dokumen resmi transparansi anggaran Desa Ajakkang.
    </p>

    @forelse ($anggarans as $item)
        <div class="transparansi-item">
            <div class="transparansi-icon">
                <i class="bi bi-file-earmark-pdf"></i>
            </div>

            <div class="transparansi-details">
                <h5>{{ $item->judul }}</h5>
                <div class="transparansi-meta">
                    <span>
                        <i class="bi bi-tag"></i> {{ strtoupper($item->tipe) }}
                    </span>
                    <span>
                        <i class="bi bi-calendar"></i> {{ $item->tanggal_formatted }}
                    </span>
                </div>
            </div>

            <div class="transparansi-actions">
                <button
                    onclick="openModal('{{ $item->file_url }}')"
                    class="btn btn-sm btn-outline-secondary">
                    <i class="bi bi-eye me-1"></i> Lihat
                </button>

                <a href="{{ $item->file_url }}"
                   download
                   class="btn btn-sm btn-primary">
                    <i class="bi bi-download me-1"></i> Unduh
                </a>
            </div>
        </div>
    @empty
        <div class="alert alert-warning text-center">
            Tidak ada dokumen transparansi untuk tahun {{ $tahun }}.
        </div>
    @endforelse

    <div class="d-flex justify-content-center mt-4">
        {{ $anggarans->withQueryString()->links() }}
    </div>
</div>
</div>

</div>
</section>

{{-- ================= MODAL PREVIEW ================= --}}
<div class="modal fade" id="fileModal" tabindex="-1">
<div class="modal-dialog modal-xl modal-dialog-centered">
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Pratinjau Dokumen</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
    </div>
    <div class="modal-body p-0">
        <iframe id="fileFrame" style="width:100%;height:80vh;border:none"></iframe>
    </div>
</div>
</div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
/* ================= DROPDOWN TAHUN ================= */
document.getElementById('tahunSelect')?.addEventListener('change', function () {
    window.location.href = `?tahun=${this.value}`;
});

/* ================= MODAL ================= */
function openModal(url) {
    const frame = document.getElementById('fileFrame');
    frame.src = url;

    const modal = new bootstrap.Modal(document.getElementById('fileModal'));
    modal.show();

    document.getElementById('fileModal')
        .addEventListener('hidden.bs.modal', () => frame.src = '');
}

/* ================= GRAFIK ================= */
let chartInstance = null;

fetch(`/api/rekap-keuangan/{{ $tahun }}`)
    .then(res => res.json())
    .then(data => {
        const ctx = document.getElementById('chartAnggaran').getContext('2d');

        if (chartInstance) chartInstance.destroy();

        chartInstance = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Pemasukan', 'Pengeluaran', 'Surplus'],
                datasets: [{
                    data: [
                        data.pemasukan ?? 0,
                        data.pengeluaran ?? 0,
                        data.surplus ?? 0
                    ]
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        callbacks: {
                            label: ctx =>
                                'Rp' + Number(ctx.raw).toLocaleString('id-ID')
                        }
                    }
                },
                scales: {
                    y: {
                        ticks: {
                            callback: value =>
                                'Rp' + Number(value).toLocaleString('id-ID')
                        }
                    }
                }
            }
        });
    });
</script>
@endpush


@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
    :root {
        --primary-color: #000000ff;
        --success-color: #198754;
        --danger-color: #dc3545;
        --secondary-color: #6c757d;
        --light-bg: #f8f9fa;
        --white: #ffffff;
        --dark-text: #212529;
        --muted-text: #6c757d;
        --border-color: #dee2e6;
        --card-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        --card-hover-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
        --transition: all 0.3s ease;
    }
    body {
        font-family: 'Poppins', sans-serif;
    }
    .section {
        padding-bottom: 5rem;
    }
    .section-title {
        font-weight: 600;
        color: var(--dark-text);
        font-size: 2rem;
        margin-bottom: 0.5rem;
    }
    .section-description {
        color: var(--muted-text);
        font-size: 1rem;
    }
    .subsection-title {
        font-weight: 600;
        color: var(--dark-text);
        font-size: 1.4rem;
        margin-bottom: 1.5rem;
        padding-left: 1rem;
        border-left: 4px solid var(--primary-color);
    }
    .text-muted{
      font-size: 1.1rem;
      padding-left: 1.3rem;
    }
    /* Form Select */
    .form-select-lg {
        border-radius: 8px;
        border: 1px solid var(--border-color);
        padding: 0.75rem 1rem;
        font-weight: 500;
    }
    /* Rekap Keuangan Card */
    .rekap-keuangan-card {
        background: var(--white);
        border-radius: 12px;
        box-shadow: var(--card-shadow);
        padding: 2rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        transition: var(--transition);
    }
    .rekap-keuangan-card:hover {
        box-shadow: var(--card-hover-shadow);
    }
    .rekap-item {
        display: flex;
        align-items: center;
        flex-grow: 1;
        text-align: center;
    }
    .rekap-icon {
        font-size: 2.5rem;
        margin-right: 1.5rem;
        opacity: 0.8;
    }
    .rekap-info {
        text-align: left;
    }
    .rekap-label {
        font-size: 0.9rem;
        color: var(--muted-text);
        margin-bottom: 0.25rem;
        font-weight: 500;
    }
    .rekap-value {
        font-size: 1.75rem;
        font-weight: 600;
        margin: 0;
    }
    .rekap-divider {
        width: 1px;
        height: 60px;
        background-color: var(--border-color);
        margin: 0 2rem;
    }
    @media (max-width: 768px) {
        .rekap-keuangan-card {
            flex-direction: column;
        }
        .rekap-item {
            width: 100%;
            margin-bottom: 1.5rem;
        }
        .rekap-divider {
            width: 80%;
            height: 1px;
            margin: 0.5rem 0;
        }
        .rekap-icon {
            margin-right: 1rem;
        }
    }
    /* Kartu Standar */
    .card {
        border: none;
        border-radius: 12px;
        box-shadow: var(--card-shadow);
        transition: var(--transition);
        background: var(--white);
    }
    .card:hover {
        box-shadow: var(--card-hover-shadow);
    }
    .card-body {
        padding: 2rem;
    }
    /* Daftar Transparansi */
    .transparansi-item {
        display: flex;
        align-items: center;
        background: var(--white);
        padding: 1.5rem 2rem;
        border-radius: 12px;
        margin-bottom: 1rem;
        box-shadow: var(--card-shadow);
        transition: var(--transition);
    }
    .transparansi-item:hover {
        box-shadow: var(--card-hover-shadow);
        transform: translateY(-2px);
    }
    .transparansi-icon {
        font-size: 2rem;
        color: var(--danger-color);
        margin-right: 1.5rem;
        flex-shrink: 0;
    }
    .transparansi-details {
        flex-grow: 1;
    }
    .transparansi-details h5 {
        margin: 0 0 0.5rem 0;
        font-weight: 600;
        color: var(--dark-text);
    }
    .transparansi-meta {
        font-size: 0.9rem;
        color: var(--muted-text);
    }
    .transparansi-meta span {
        margin-right: 1.5rem;
    }
    .transparansi-meta i {
        margin-right: 0.5rem;
    }
    .transparansi-actions .btn {
        margin-left: 0.5rem;
    }
    @media (max-width: 768px) {
        .transparansi-item {
            flex-direction: column;
            align-items: flex-start;
            text-align: left;
        }
        .transparansi-icon {
            margin-bottom: 1rem;
        }
        .transparansi-actions {
            margin-top: 1rem;
            align-self: flex-end;
        }
    }
    .chart-container {
        position: relative;
        height: 400px;
        width: 100%;
    }
    @media (max-width: 768px) {
        .rekap-keuangan-card {
            flex-direction: column;
        }
        .rekap-item {
            width: 100%;
            margin-bottom: 1.5rem;
        }
        .rekap-divider {
            width: 80%;
            height: 1px;
            margin: 0.5rem 0;
        }
        .rekap-icon {
            margin-right: 1rem;
        }
    }
    /* Kartu Standar */
    .card {
        border: none;
        border-radius: 12px;
        box-shadow: var(--card-shadow);
        transition: var(--transition);
        background: white;
    }
    .card:hover {
        box-shadow: var(--card-hover-shadow);
    }
    .card-body {
        padding: 2rem;
    }
    /* Daftar Transparansi */
    .transparansi-item {
        display: flex;
        align-items: center;
        background: white;
        padding: 1.5rem 2rem;
        border-radius: 12px;
        margin-bottom: 1rem;
        box-shadow: var(--card-shadow);
        transition: var(--transition);
    }
    .transparansi-item:hover {
        box-shadow: var(--card-hover-shadow);
        transform: translateY(-2px);
    }
    .transparansi-icon {
        font-size: 2rem;
        color: var(--danger-color);
        margin-right: 1.5rem;
        flex-shrink: 0;
    }
    .transparansi-details {
        flex-grow: 1;
    }
    .transparansi-details h5 {
        margin: 0 0 0.5rem 0;
        font-weight: 600;
        color: var(--primary-light);
    }
    .transparansi-meta {
        font-size: 0.9rem;
        color: var(--secondary-color);
    }
    .transparansi-meta span {
        margin-right: 1.5rem;
    }
    .transparansi-meta i {
        margin-right: 0.5rem;
    }
    /* Tombol Lihat dan Unduh */
    .btn-sm {
        font-size: 0.875rem;
        padding: 0.4rem 0.75rem;
    }
    .btn-outline-secondary {
        color: var(--secondary-color);
        border-color: var(--border-color);
    }
    .btn-outline-secondary:hover {
        background-color: #f1f3f5;
        color: var(--primary-light);
    }
    .btn-outline-primary {
        color: var(--info-color);
        border-color: var(--info-color);
    }
    .btn-outline-primary:hover {
        background-color: var(--info-color);
        color: white;
    }
    @media (max-width: 768px) {
        .transparansi-item {
            flex-direction: column;
            align-items: flex-start;
            text-align: left;
        }
        .transparansi-icon {
            margin-bottom: 1rem;
        }
        .transparansi-actions {
            margin-top: 1rem;
            align-self: flex-end;
            width: 100%;
        }
        .transparansi-actions .d-flex.gap-2 {
            flex-direction: column;
        }
        .transparansi-actions .btn {
            width: 100%;
            margin-bottom: 0.35rem;
        }
    }
    .chart-container {
        position: relative;
        height: 400px;
        width: 100%;
    }
    @media (max-width: 767.98px) {
        .chart-container {
            height: 300px !important;
        }
    }
    @media (min-width: 320px) and (max-width: 767px) {
        #tahunSelect.form-select-lg {
            width: 100%;
            max-width: 200px;
            padding: 0.5rem 1rem;
            font-size: 1rem;
            border-radius: 8px;
            margin: 0 auto;
        }
        .form-select-lg{
          font-size: 1rem;
        }
    }
</style>
@endpush
