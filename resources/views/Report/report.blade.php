@extends('layouts.app')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">📊 Laporan & Analisis</h5>
                        <div>
                            <button class="btn btn-outline-primary me-2" onclick="exportPDF()">
                                <i class="bx bx-download"></i> Export PDF
                            </button>
                            <select class="form-select" id="reportPeriod" onchange="loadReports()">
                                <option value="week">Minggu Ini</option>
                                <option value="month">Bulan Ini</option>
                                <option value="quarter">3 Bulan</option>
                                <option value="year">Tahun Ini</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Filter Section -->
                        <div class="row mb-4">
                            <div class="col-md-4">
                                <label class="form-label">Dari Tanggal</label>
                                <input type="date" class="form-control" id="startDate" value="{{ date('Y-m-01') }}">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Sampai Tanggal</label>
                                <input type="date" class="form-control" id="endDate" value="{{ date('Y-m-d') }}">
                            </div>
                            <div class="col-md-4 d-flex align-items-end">
                                <button class="btn btn-primary w-100" onclick="loadReports()">
                                    <i class="bx bx-filter"></i> Terapkan Filter
                                </button>
                            </div>
                        </div>

                        <!-- Summary Cards -->
                        <div class="row mb-4">
                            <div class="col-md-3 mb-3">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <h6>Rata-rata Kalori/Hari</h6>
                                        <h3 class="text-primary">1,420</h3>
                                        <small class="text-success">+2% dari target</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <h6>Hari Pencatatan</h6>
                                        <h3 class="text-success">28/30</h3>
                                        <small class="text-success">93% konsisten</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <h6>Perubahan Berat</h6>
                                        <h3 class="text-info">-2.5kg</h3>
                                        <small class="text-success">dalam 30 hari</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <h6>Nilai Gizi</h6>
                                        <h3 class="text-warning">B+</h3>
                                        <small class="text-success">Sangat Baik</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Charts Section -->
                        <div class="row">
                            <!-- Calorie Trend -->
                            <div class="col-md-6 mb-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h6 class="mb-0">📈 Tren Kalori Harian</h6>
                                    </div>
                                    <div class="card-body">
                                        <div id="calorieTrendChart" style="min-height: 300px;"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Nutrition Distribution -->
                            <div class="col-md-6 mb-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h6 class="mb-0">🥗 Distribusi Makronutrien</h6>
                                    </div>
                                    <div class="card-body">
                                        <div id="nutritionPieChart" style="min-height: 300px;"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Weekly Comparison -->
                            <div class="col-md-6 mb-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h6 class="mb-0">📋 Perbandingan Mingguan</h6>
                                    </div>
                                    <div class="card-body">
                                        <div id="weeklyComparisonChart" style="min-height: 300px;"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Food Frequency -->
                            <div class="col-md-6 mb-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h6 class="mb-0">🍽️ Frekuensi Makanan</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="food-frequency">
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <span>Nasi Putih</span>
                                                <div class="d-flex align-items-center">
                                                    <div class="progress me-2" style="width: 100px; height: 8px;">
                                                        <div class="progress-bar bg-primary" style="width: 85%"></div>
                                                    </div>
                                                    <small>85%</small>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <span>Sayur Bayam</span>
                                                <div class="d-flex align-items-center">
                                                    <div class="progress me-2" style="width: 100px; height: 8px;">
                                                        <div class="progress-bar bg-success" style="width: 65%"></div>
                                                    </div>
                                                    <small>65%</small>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <span>Ayam Goreng</span>
                                                <div class="d-flex align-items-center">
                                                    <div class="progress me-2" style="width: 100px; height: 8px;">
                                                        <div class="progress-bar bg-warning" style="width: 45%"></div>
                                                    </div>
                                                    <small>45%</small>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <span>Buah Pisang</span>
                                                <div class="d-flex align-items-center">
                                                    <div class="progress me-2" style="width: 100px; height: 8px;">
                                                        <div class="progress-bar bg-info" style="width: 70%"></div>
                                                    </div>
                                                    <small>70%</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- AI Recommendations -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h6 class="mb-0">🤖 Rekomendasi AI Berdasarkan Data</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="alert alert-warning">
                                            <h6>💡 Area Perbaikan</h6>
                                            <ul class="mb-0">
                                                <li>Asupan serat masih 20% di bawah rekomendasi</li>
                                                <li>Konsumsi gula tambahan perlu dikurangi 15%</li>
                                                <li>Tingkatkan variasi protein nabati</li>
                                            </ul>
                                        </div>
                                        <div class="alert alert-success">
                                            <h6>✅ Pencapaian Baik</h6>
                                            <ul class="mb-0">
                                                <li>Konsumsi air putih konsisten di atas target</li>
                                                <li>Asupan vitamin C sangat baik dari buah lokal</li>
                                                <li>Pola makan teratur dengan jarak 4-5 jam</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            loadCharts();
        });

        function loadReports() {
            const period = document.getElementById('reportPeriod').value;
            const startDate = document.getElementById('startDate').value;
            const endDate = document.getElementById('endDate').value;

            // AJAX call to load reports
            console.log('Loading reports for:', { period, startDate, endDate });
            loadCharts();
        }

        function loadCharts() {
            // Calorie Trend Chart
            const calorieTrend = new ApexCharts(document.querySelector("#calorieTrendChart"), {
                series: [{
                    name: 'Kalori',
                    data: [1450, 1320, 1480, 1390, 1560, 1420, 1380, 1450, 1520, 1410]
                }],
                chart: {
                    type: 'line',
                    height: 300,
                    toolbar: { show: false }
                },
                colors: ['#00d4b8'],
                xaxis: {
                    categories: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10']
                }
            });
            calorieTrend.render();

            // Nutrition Pie Chart
            const nutritionPie = new ApexCharts(document.querySelector("#nutritionPieChart"), {
                series: [45, 30, 25],
                chart: {
                    type: 'pie',
                    height: 300
                },
                labels: ['Protein', 'Karbohidrat', 'Lemak'],
                colors: ['#00d4b8', '#ffb800', '#ff3e1d']
            });
            nutritionPie.render();

            // Weekly Comparison
            const weeklyComparison = new ApexCharts(document.querySelector("#weeklyComparisonChart"), {
                series: [
                    { name: 'Minggu Lalu', data: [1400, 1350, 1420, 1380, 1450, 1320, 1400] },
                    { name: 'Minggu Ini', data: [1450, 1420, 1480, 1390, 1520, 1410, 1380] }
                ],
                chart: {
                    type: 'bar',
                    height: 300
                },
                colors: ['#ffb800', '#00d4b8'],
                xaxis: {
                    categories: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min']
                }
            });
            weeklyComparison.render();
        }

        function exportPDF() {
            alert('Exporting PDF report...');
            // PDF export logic
        }
    </script>
@endsection
