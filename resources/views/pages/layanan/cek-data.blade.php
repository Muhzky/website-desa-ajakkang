@extends('layouts.master')

@section('title', 'Cek Data Masyarakat')
@section('meta_description', 'Cek data kependudukan masyarakat Desa Ajakkang berdasarkan NIK atau identitas lainnya.')

@section('page-title')
@component('components.page-title')
@slot('title', 'Cek Data Masyarakat')
@slot('description', 'Masukkan NIK atau Nama Lengkap untuk memastikan data kependudukan Anda terdaftar
sebagai warga Desa Ajakkang.')
@slot('parent', 'Layanan')
@slot('parentUrl', Request::is('/') ? '#layanan-kami' : url('/#layanan-kami'))
@endcomponent
@endsection

@section('content')
<section class="cekdata-section section">
    <div class="container" data-aos="fade-up">

        <!-- ================= FORM CEK DATA ================= -->
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="card cekdata-card">
                    <div class="card-body text-center">

                        <form method="GET" action="{{ route('pages.layanan.cek-data') }}">
                            <div class="row g-3 justify-content-center">

                                <div class="col-12 position-relative">
                                    <i class="bi bi-person-vcard cekdata-icon"></i>
                                    <input type="text"
                                        name="keyword"
                                        value="{{ request('keyword') }}"
                                        class="form-control cekdata-input ps-5"
                                        placeholder="Masukkan NIK / Nama Lengkap"
                                        required>
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-success cekdata-btn w-100">
                                        <i class="bi bi-search"></i> Cek Data
                                    </button>
                                </div>

                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>

        <!-- ================= HASIL DATA ================= -->
        @isset($penduduk)
        <div class="row justify-content-center mt-4">
            <div class="col-lg-8">

                <div class="card cekdata-result-card">
                    <div class="card-header bg-success text-white">
                        <i class="bi bi-person-check"></i> Data Kependudukan Ditemukan
                    </div>

                    <div class="card-body p-4">
                        <table class="table table-borderless cekdata-table mb-0">
                            <tr>
                                <th>NIK</th>
                                <td>{{ $penduduk->nik }}</td>
                            </tr>
                            <tr>
                                <th>Nama Lengkap</th>
                                <td>{{ $penduduk->nama }}</td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td>{{ $penduduk->jenis_kelamin }}</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>
                                    {{ $penduduk->keluarga->alamat ?? '-' }},
                                </td>
                            </tr>

                            <tr>
                                <th>Status</th>
                                <td>
                                    <span class="badge cekdata-badge">
                                        Terdaftar
                                    </span>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

            </div>
        </div>
        @endisset

        <!-- ================= DATA TIDAK DITEMUKAN ================= -->
        @if(request('keyword') && !isset($penduduk))
        <div class="row justify-content-center mt-4">
            <div class="col-lg-8">
                <div class="alert alert-warning cekdata-alert text-center">
                    <i class="bi bi-exclamation-circle me-1"></i>
                    Data tidak ditemukan. Silakan periksa kembali NIK atau nama yang Anda masukkan.
                </div>
            </div>
        </div>
        @endif

    </div>
</section>
@endsection

@push('styles')
<style>
    /* ===============================
       CEK DATA – COMPACT & CLEAN
    ================================ */
    .cekdata-section {
        padding: 40px 0;
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    }

    .cekdata-card {
        border-radius: 14px;
        background: #ffffff;
        box-shadow: 0 4px 18px rgba(0, 0, 0, 0.06);
        padding: 20px;
        max-width: 580px;
        margin: 0 auto;
        border: 1px solid #f1f3f5;
    }

    .cekdata-title {
        font-weight: 700;
        font-size: 22px;
        color: #1a1a1a;
        margin-bottom: 6px;
    }

    .cekdata-desc {
        font-size: 13px;
        color: #64748b;
        line-height: 1.45;
        margin-bottom: 20px;
    }

    /* Input dengan ikon */
    .input-wrapper {
        position: relative;
        margin-bottom: 16px;
    }

    .cekdata-input {
        width: 100%;
        padding: 11px 14px 11px 42px;
        font-size: 13px;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        background: #fafafa;
        transition: all 0.2s ease;
        color: #1e293b;
    }

    .cekdata-input:focus {
        outline: none;
        border-color: #05833F;
        box-shadow: 0 0 0 3px rgba(5, 131, 63, 0.1);
    }

    .cekdata-icon {
        position: absolute;
        left: 14px;
        top: 50%;
        transform: translateY(-50%);
        color: #94a3b8;
        font-size: 16px;
    }

    /* Tombol */
    .cekdata-btn {
        width: 100%;
        padding: 10px;
        background: linear-gradient(135deg, #05833F, #046b34);
        color: white;
        font-weight: 600;
        font-size: 14px;
        border: none;
        border-radius: 12px;
        cursor: pointer;
        transition: all 0.2s ease;
        box-shadow: 0 2px 8px rgba(5, 131, 63, 0.2);
    }

    .cekdata-btn:hover {
        background: linear-gradient(135deg, #047036, #035a2c);
        transform: translateY(-1px);
        box-shadow: 0 3px 10px rgba(5, 131, 63, 0.25);
    }

    /* Hasil */
    .cekdata-result-card {
        max-width: 580px;
        border-radius: 14px;
        overflow: hidden;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.05);
        margin: 20px auto 0;
        border: 1px solid #f1f3f5;
    }

    .card-header.bg-success {
        background: linear-gradient(135deg, #05833F, #046b34) !important;
        color: #fff;
        font-weight: 600;
        padding: 12px 16px;
        font-size: 14px;
    }

    /* Tabel */
    .cekdata-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 13px;
    }

    .cekdata-table th,
    .cekdata-table td {
        padding: 8px 14px;
        text-align: left;
        border-bottom: 1px solid #f1f3f5;
    }

    .cekdata-table th {
        width: 35%;
        font-weight: 600;
        color: #475569;
    }

    .cekdata-table td {
        color: #1e293b;
    }

    .cekdata-table tr:last-child td {
        border-bottom: none;
    }

    /* Badge */
    .cekdata-badge {
        background: #e8f5f0;
        color: #05833F;
        padding: 4px 12px;
        border-radius: 16px;
        font-size: 12px;
        font-weight: 600;
    }

    /* Alert */
    .cekdata-alert {
        background: #fff9db;
        border-left: 3px solid #e6ad00;
        border-radius: 12px;
        padding: 14px;
        color: #856404;
        font-size: 13px;
    max-width: 580px;
    margin: 20px auto 0;
    }

    /* Responsif */
    @media (max-width: 576px) {
        .cekdata-card {
            padding: 16px;
        }

        .cekdata-table th {
            width: 40%;
        }

        .cekdata-title {
            font-size: 20px;
        }

        .cekdata-input {
            padding: 10px 12px 10px 40px;
            font-size: 13px;
        }

        .cekdata-btn {
            padding: 9px;
            font-size: 13px;
        }

        .cekdata-table th,
        .cekdata-table td {
            padding: 8px 12px;
            font-size: 12px;
        }

        .card-header.bg-success {
            padding: 10px 14px;
            font-size: 13px;
        }
    }
</style>
@endpush