@extends('layouts.app')

@section('title', 'Dashboard SIMASET')

@section('content')
    <div class="container">

        <h3 class="mt-3 mb-4">Dashboard SIMASET</h3>

        <div class="row">

            <!-- Tanah -->
            <div class="col-md-3">
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h4>{{ $totalTanah }}</h4>
                        <p>Total Tanah</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-map"></i>
                    </div>
                    <a href="{{ route('tanah.index') }}" class="small-box-footer">
                        Lihat Detail <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <!-- Bangunan -->
            <div class="col-md-3">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h4>{{ $totalBangunan }}</h4>
                        <p>Total Bangunan</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-building"></i>
                    </div>
                    <a href="{{ route('bangunan.index') }}" class="small-box-footer">
                        Lihat Detail <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <!-- Ruangan -->
            <div class="col-md-3">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h4>{{ $totalRuangan }}</h4>
                        <p>Total Ruangan</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-door-open"></i>
                    </div>
                    <a href="{{ route('ruangan.index') }}" class="small-box-footer">
                        Lihat Detail <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <!-- Barang -->
            <div class="col-md-3">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h4>{{ $totalBarang }}</h4>
                        <p>Total Barang</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-cubes"></i>
                    </div>
                    <a href="{{ route('barang.index') }}" class="small-box-footer">
                        Lihat Detail <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Grafik -->
        <div class="card mt-4">
            <div class="card-header bg-info text-white">
                Statistik Aset
            </div>
            <div class="card-body">
                <canvas id="chartAset"></canvas>
            </div>
        </div>

    </div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('chartAset').getContext('2d');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Tanah', 'Bangunan', 'Ruangan', 'Barang'],
            datasets: [{
                label: 'Jumlah Aset',
                backgroundColor: ['#007bff', '#28a745', '#ffc107', '#dc3545'],
                data: [
                    {{ $totalTanah ?? 0 }},
                    {{ $totalBangunan ?? 0 }},
                    {{ $totalRuangan ?? 0 }},
                    {{ $totalBarang ?? 0 }}
                ]
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: true }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});
</script>
@endpush


