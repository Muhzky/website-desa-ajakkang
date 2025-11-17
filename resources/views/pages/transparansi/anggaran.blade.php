@extends('layouts.master')
@section('title', 'Transparansi Anggaran - Desa Ajakkang')
@section('meta_description', 'Transparansi anggaran Desa Ajakkang, Kecamatan Soppeng Riaja, Kabupaten Barru')
@section('page-title')
    @component('components.page-title')
        @slot('title', 'Transparansi Anggaran')
        @slot('description', 'Halaman ini menyajikan informasi lengkap mengenai transparansi anggaran yang dikelola oleh Desa Ajakkang.')
        @slot('parent', 'Transparansi')
        @slot('parentUrl', Request::is('/') ? '' : url(''))
    @endcomponent
@endsection
@section('content')
<!-- Transparansi Anggaran Section -->
<section id="transparansi-anggaran" class="transparansi-anggaran section">
    <div class="container" data-aos="fade-up">
        <!-- Header Section: Judul dipusatkan -->
        

        <!-- === 1. Transparansi Anggaran (Rekap Keuangan) === -->
        <div class="row mb-5">
            <div class="col-12">
                <h4 class="subsection-title">Rekap Keuangan <span id="judulTahun"></span></h4>
                <p class="text-muted mb-4">Berikut ini adalah data-data mengenai transparansi anggaran yang dikelola oleh pemerintah Desa Ajakkang.</p>
                <div class="row mb-4">
            <div class="col-12 text-center">
                <div class="mt-3" style="max-width: 150px; margin: 0 auto; padding: 0;">
                    <select id="tahunSelect" class="form-select form-select-lg">
                        <option value="2025">Tahun 2025</option>
                        <option value="2024">Tahun 2024</option>
                        <option value="2023">Tahun 2023</option>
                    </select>
                </div>
            </div>
        </div>
                <div class="rekap-keuangan-card">
                    <div class="rekap-item">
                        <div class="rekap-icon text-success">
                            <i class="bi bi-cash-stack"></i>
                        </div>
                        <div class="rekap-info">
                            <p class="rekap-label">Pemasukan</p>
                            <h3 class="rekap-value text-success" id="pemasukan">Rp0,00</h3>
                        </div>
                    </div>
                    <div class="rekap-divider"></div>
                    <div class="rekap-item">
                        <div class="rekap-icon text-danger">
                            <i class="bi bi-cash-coin"></i>
                        </div>
                        <div class="rekap-info">
                            <p class="rekap-label">Pengeluaran</p>
                            <h3 class="rekap-value text-danger" id="pengeluaran">Rp0,00</h3>
                        </div>
                    </div>
                    <div class="rekap-divider"></div>
                    <div class="rekap-item">
                        <div class="rekap-icon text-primary">
                            <i class="bi bi-bar-chart-line"></i>
                        </div>
                        <div class="rekap-info">
                            <p class="rekap-label">Surplus/Defisit</p>
                            <h3 class="rekap-value text-primary" id="surplus">Rp0,00</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Preview File (ditempatkan di sini, sejajar dengan rekap) -->
        <div class="modal fade" id="fileModal" tabindex="-1" aria-labelledby="fileModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header border-0 pb-0">
                        <h4 class="modal-title fw-bold text-center flex-grow-1" id="fileModalLabel">Pratinjau Berkas</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body p-0 position-relative" style="min-height: 60vh;">
                        <div id="loadingIndicator" class="d-flex justify-content-center align-items-center position-absolute w-100 h-100" style="background: rgba(248, 249, 250, 0.8); z-index: 10; display: none;">
                            <div class="text-center">
                                <div class="spinner-border text-primary" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                                <p class="mt-2 mb-0">Memuat dokumen...</p>
                            </div>
                        </div>
                        <iframe
                            id="fileFrame"
                            src=""
                            style="width:100%; height: 100%; min-height: 60vh; border: none;"
                            frameborder="0"
                            onload="hideLoading()"
                            onerror="showError()"
                        ></iframe>
                    </div>
                    <div class="modal-footer justify-content-center border-0 pt-2">
                        <small class="text-muted">Pastikan browser mendukung tampilan PDF.</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- === 2. Grafik Transparansi Anggaran === -->
        <div class="row mb-5">
            <div class="col-12">
                <h4 class="subsection-title">Grafik Transparansi Anggaran</h4>
                <p class="text-muted mb-4">Berikut ini adalah data-data mengenai transparansi anggaran yang dikelola oleh pemerintah Desa Ajakkang yang ditampilkan dalam bentuk grafik batang.</p>
                <div class="card">
                    <div class="card-body">
                        <div class="chart-container">
                            <canvas id="chartAnggaran"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- === 3. Daftar Transparansi Anggaran === -->
        <div class="row">
            <div class="col-12">
                <h4 class="subsection-title">Daftar Transparansi Anggaran</h4>
                <p class="text-muted mb-4">Berikut ini adalah data-data mengenai transparansi anggaran yang dikelola oleh pemerintah Desa Ajakkang.</p>
                @forelse($transparansi ?? [] as $item)
                    <div class="transparansi-item">
                        <div class="transparansi-icon">
                            <i class="bi bi-file-earmark-pdf"></i>
                        </div>
                        <div class="transparansi-details">
                            <h5>{{ $item->judul ?? 'APBDes 2025' }}</h5>
                            <div class="transparansi-meta">
                                <span><i class="bi bi-tag"></i> {{ $item->kategori ?? 'APBDes POKOK' }}</span>
                                <span><i class="bi bi-calendar"></i> {{ isset($item->tanggal) ? \Carbon\Carbon::parse($item->tanggal)->isoFormat('DD MMMM YYYY') : '01 Januari 2025' }}</span>
                            </div>
                        </div>
                        <div class="transparansi-actions">
                            <a href="javascript:void(0);" onclick="openModal('{{ $item->file ?? '' }}')" class="btn btn-sm btn-outline-secondary">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('transparansi.download', $item->file ?? '') }}" class="btn btn-sm btn-primary">
                                <i class="bi bi-download"></i>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-info">
                        <i class="bi bi-info-circle me-2"></i>
                        Belum ada data transparansi anggaran.
                    </div>
                @endforelse

                <!-- Pagination -->
                @if(isset($transparansi) && $transparansi->hasPages())
                    <div class="d-flex justify-content-center mt-4">
                        {{ $transparansi->links('pagination::bootstrap-5') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection

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
    }x
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

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    (function () {
        'use strict';
        // Data dari backend
        const chartLabels = {!! json_encode($chartLabels ?? [2023, 2024, 2025]) !!};
        const chartPendapatan = {!! json_encode($chartPendapatan ?? [0, 0, 0]) !!};
        const chartPengeluaran = {!! json_encode($chartPengeluaran ?? [0, 0, 0]) !!};
        // Format Rupiah
        function formatRupiah(angka) {
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            }).format(angka || 0);
        }
        // Fetch data keuangan berdasarkan tahun
        function fetchKeuangan(tahun) {
            const loading = document.getElementById('loadingIndicator');
            if (loading) loading.style.display = 'flex';
            fetch("{{ route('transparansi.anggaran.data') }}?tahun=" + tahun)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('pemasukan').textContent = formatRupiah(data.pemasukan);
                    document.getElementById('pengeluaran').textContent = formatRupiah(data.pengeluaran);
                    document.getElementById('surplus').textContent = formatRupiah(data.surplus);
                    document.getElementById('judulTahun').textContent = tahun;
                })
                .catch(error => {
                    console.error('Gagal mengambil data keuangan:', error);
                    document.getElementById('pemasukan').textContent = 'Rp0,00';
                    document.getElementById('pengeluaran').textContent = 'Rp0,00';
                    document.getElementById('surplus').textContent = 'Rp0,00';
                })
                .finally(() => {
                    if (loading) loading.style.display = 'none';
                });
        }
        // Chart initialization
        function initChart() {
            const ctx = document.getElementById('chartAnggaran');
            if (!ctx) return;
            new Chart(ctx.getContext('2d'), {
                type: 'bar',
                data: {
                    labels: chartLabels,
                    datasets: [
                        {
                            label: 'Pendapatan',
                            data: chartPendapatan,
                            backgroundColor: 'rgba(25, 135, 84, 0.6)',
                            borderColor: 'rgba(25, 135, 84, 1)',
                            borderWidth: 1
                        },
                        {
                            label: 'Pengeluaran',
                            data: chartPengeluaran,
                            backgroundColor: 'rgba(220, 53, 69, 0.6)',
                            borderColor: 'rgba(220, 53, 69, 1)',
                            borderWidth: 1
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function (value) {
                                    return 'Rp ' + value.toLocaleString('id-ID');
                                }
                            }
                        }
                    },
                    plugins: {
                        legend: { position: 'top' },
                        tooltip: {
                            callbacks: {
                                label: function (context) {
                                    const label = context.dataset.label || '';
                                    const value = 'Rp ' + context.parsed.y.toLocaleString('id-ID');
                                    return `${label}: ${value}`;
                                }
                            }
                        }
                    }
                }
            });
        }
        // Modal functions
        window.openModal = function (filename) {
            if (!filename) {
                alert('File tidak tersedia.');
                return;
            }
            const modal = new bootstrap.Modal(document.getElementById('fileModal'));
            const frame = document.getElementById('fileFrame');
            const loading = document.getElementById('loadingIndicator');
            loading.style.display = 'flex';
            frame.src = '/transparansi/preview/' + encodeURIComponent(filename);
            modal.show();
        };
        window.hideLoading = function () {
            const loading = document.getElementById('loadingIndicator');
            if (loading) loading.style.display = 'none';
        };
        window.showError = function () {
            const loading = document.getElementById('loadingIndicator');
            if (loading) {
                loading.innerHTML = '<div class="text-center text-danger"><i class="bi bi-exclamation-triangle fs-1"></i><p class="mt-2">Gagal memuat file PDF.</p></div>';
                loading.style.display = 'flex';
            }
        };
        // DOM Ready
        document.addEventListener('DOMContentLoaded', function () {
            const tahunSelect = document.getElementById('tahunSelect');
            if (tahunSelect) {
                fetchKeuangan(tahunSelect.value);
                tahunSelect.addEventListener('change', () => fetchKeuangan(tahunSelect.value));
            }
            initChart();
        });
    })(;
</script>
@endpush