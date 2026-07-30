@extends('layouts.master')

@section('title', 'Administrasi Penduduk - Desa Ajakkang')
@section('meta_description', 'Data lengkap administrasi penduduk Desa Ajakkang.')

@section('page-title')
@component('components.page-title')
    @slot('title', 'Administrasi Penduduk')
    @slot('description', 'Statistik lengkap administrasi penduduk Desa Ajakkang.')
    @slot('parent', 'Administrasi')
    @slot('parentUrl', Request::is('/') ? '#administrasi-penduduk' : url('/#administrasi-penduduk'))
@endcomponent
@endsection

@section('content')
<section class="administrasi-section section">
    <div class="container" data-aos="fade-up">

        {{-- ================== GRAFIK UMUR ================== --}}
        <div class="card p-4 mb-5 shadow-sm">
            <h4 class="mb-4 text-center">1. Grafik Umur Penduduk</h4>
            <canvas id="umurChart" style="max-height:400px"></canvas>
        </div>

        {{-- ================== PIE + TABEL USIA ================== --}}
        <div class="row mb-5">
            <div class="col-md-6 mb-4">
                <div class="card p-4 shadow-sm h-100">
                    <h5 class="text-center mb-3">2. Distribusi Usia</h5>
                    <canvas id="umurPieChart" style="max-height:350px"></canvas>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card p-4 shadow-sm h-100">
                    <h5 class="text-center mb-3">3. Tabel Jumlah Penduduk</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th class="bg-success text-white">Kategori Usia</th>
                                    <th class="bg-success text-white">Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Usia 0-17 Tahun</td>
                                    <td>{{ $usia['anak'] }} Jiwa</td>
                                </tr>
                                <tr>
                                    <td>Usia 18-55 Tahun</td>
                                    <td>{{ $usia['dewasa'] }} Jiwa</td>
                                </tr>
                                <tr>
                                    <td>Usia 55+ Tahun</td>
                                    <td>{{ $usia['lansia'] }} Jiwa</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- ================== TABEL PEKERJAAN + LINE CHART ================== --}}
        <div class="row mb-5">
            <div class="col-md-4 mb-4">
                <div class="card p-4 shadow-sm h-100">
                    <h5 class="text-center mb-3">4. Tabel Pekerjaan</h5>
                    <div class="table-responsive" style="max-height:350px; overflow-y:auto">
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th class="bg-success text-white">Pekerjaan</th>
                                    <th class="bg-success text-white">Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pekerjaan as $item)
                                <tr>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->total }} Jiwa</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-8 mb-4">
                <div class="card p-4 shadow-sm h-100">
                    <h5 class="text-center mb-3">5. Grafik Pekerjaan</h5>
                    <canvas id="pekerjaanLineChart" style="max-height:350px"></canvas>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection

{{-- ================== CHART JS ================== --}}
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
/* ================= UMUR BAR CHART ================= */
new Chart(document.getElementById('umurChart'), {
    type: 'bar',
    data: {
        labels: ['0-17', '18-55', '55+'],
        datasets: [{
            label: 'Jumlah Penduduk',
            data: [
                {{ $usia['anak'] }},
                {{ $usia['dewasa'] }},
                {{ $usia['lansia'] }}
            ],
            backgroundColor: '#05833F'
        }]
    }
});

/* ================= PIE CHART ================= */
new Chart(document.getElementById('umurPieChart'), {
    type: 'pie',
    data: {
        labels: ['0-17', '18-55', '55+'],
        datasets: [{
            data: [
                {{ $usia['anak'] }},
                {{ $usia['dewasa'] }},
                {{ $usia['lansia'] }}
            ],
            backgroundColor: ['#0d6efd','#198754','#ffc107']
        }]
    }
});

/* ================= LINE CHART PEKERJAAN ================= */
new Chart(document.getElementById('pekerjaanLineChart'), {
    type: 'line',
    data: {
        labels: {!! json_encode($pekerjaan->pluck('nama')) !!},
        datasets: [{
            label: 'Jumlah',
            data: {!! json_encode($pekerjaan->pluck('total')) !!},
            borderColor: '#05833F',
            tension: 0.3,
            fill: false
        }]
    }
});
</script>
@endpush
