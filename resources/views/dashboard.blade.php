@extends('layouts.app')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <!-- Welcome Card -->
            <div class="col-lg-8 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title text-primary">Selamat Datang, Rofiif 🌱</h5>
                                <p class="mb-4">
                                    Progress harian Anda mencapai <span class="fw-bold">72%</span> dari target.
                                    Terus pertahankan pola makan sehat!
                                </p>
                                <a href="#" class="btn btn-sm btn-outline-primary">Lihat Profil</a>
                            </div>
                        </div>
                        <div class="col-sm-5 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                <img
                                    src="{{ asset('sneat-1.0.0') }}/assets/img/illustrations/healthy-life-light.png"
                                    height="140"
                                    alt="Healthy Life"
                                    data-app-dark-img="illustrations/healthy-life-dark.png"
                                    data-app-light-img="illustrations/healthy-life-light.png"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Stats -->
            <div class="col-lg-4 col-md-4 order-1">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <span class="avatar-initial rounded bg-label-success">
                                            <i class="bx bx-calorie"></i>
                                        </span>
                                    </div>
                                </div>
                                <span class="fw-semibold d-block mb-1">Kalori Hari Ini</span>
                                <h3 class="card-title mb-2">1,200</h3>
                                <small class="text-success fw-semibold">
                                    <i class="bx bx-up-arrow-alt"></i> 72% dari target
                                </small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <span class="avatar-initial rounded bg-label-info">
                                            <i class="bx bx-droplet"></i>
                                        </span>
                                    </div>
                                </div>
                                <span class="fw-semibold d-block mb-1">Air Minum</span>
                                <h3 class="card-title mb-2">1.5L</h3>
                                <small class="text-info fw-semibold">
                                    <i class="bx bx-up-arrow-alt"></i> 75% dari target
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Weekly Chart & AI Insights -->
            <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
                <div class="card">
                    <div class="row row-bordered g-0">
                        <div class="col-md-8">
                            <h5 class="card-header m-0 me-2 pb-3">Tren Asupan Kalori Mingguan</h5>
                            <div id="weeklyCalorieChart" class="px-2"></div>
                        </div>
                        <div class="col-md-4">
                            <div class="card-body">
                                <h6 class="mb-3">AI Insights</h6>
                                <div class="alert alert-warning">
                                    <h6 class="alert-heading">💡 Rekomendasi</h6>
                                    <p class="mb-0">Asupan protein Anda minggu ini baik, tapi kurangi gula 15%</p>
                                </div>
                                <div class="alert alert-info mt-2">
                                    <h6 class="alert-heading">🎯 Prediksi</h6>
                                    <p class="mb-0">Target berat 65kg dapat tercapai dalam 2 minggu</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side Stats -->
            <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
                <div class="row">
                    <div class="col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <span class="avatar-initial rounded bg-label-warning">
                                            <i class="bx bx-protein"></i>
                                        </span>
                                    </div>
                                </div>
                                <span class="d-block mb-1">Protein</span>
                                <h3 class="card-title text-nowrap mb-2">45g</h3>
                                <small class="text-success fw-semibold">
                                    <i class="bx bx-up-arrow-alt"></i> 90% target
                                </small>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <span class="avatar-initial rounded bg-label-danger">
                                            <i class="bx bx-candy"></i>
                                        </span>
                                    </div>
                                </div>
                                <span class="fw-semibold d-block mb-1">Gula</span>
                                <h3 class="card-title mb-2">30g</h3>
                                <small class="text-danger fw-semibold">
                                    <i class="bx bx-down-arrow-alt"></i> Kurangi 20%
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Today's Meals -->
            <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
                <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between pb-0">
                        <div class="card-title mb-0">
                            <h5 class="m-0 me-2">Makanan Hari Ini</h5>
                            <small class="text-muted">Total 3 makanan dicatat</small>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="p-0 m-0">
                            <li class="d-flex mb-4 pb-1">
                                <div class="avatar flex-shrink-0 me-3">
                                    <span class="avatar-initial rounded bg-label-success">
                                        <i class="bx bx-bowl-rice"></i>
                                    </span>
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">Sarapan</h6>
                                        <small class="text-muted">Nasi Goreng - 350 kkal</small>
                                    </div>
                                    <small class="text-success">07:30</small>
                                </div>
                            </li>
                            <li class="d-flex mb-4 pb-1">
                                <div class="avatar flex-shrink-0 me-3">
                                    <span class="avatar-initial rounded bg-label-warning">
                                        <i class="bx bx-bowl-hot"></i>
                                    </span>
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">Makan Siang</h6>
                                        <small class="text-muted">Soto Ayam - 420 kkal</small>
                                    </div>
                                    <small class="text-warning">12:15</small>
                                </div>
                            </li>
                            <li class="d-flex">
                                <div class="avatar flex-shrink-0 me-3">
                                    <span class="avatar-initial rounded bg-label-info">
                                        <i class="bx bx-restaurant"></i>
                                    </span>
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">Camilan</h6>
                                        <small class="text-muted">Pisang - 90 kkal</small>
                                    </div>
                                    <small class="text-info">15:45</small>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Nutrition Overview -->
            <div class="col-md-6 col-lg-4 order-1 mb-4">
                <div class="card h-100">
                    <div class="card-header">
                        <ul class="nav nav-pills" role="tablist">
                            <li class="nav-item">
                                <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                                        data-bs-target="#navs-tabs-nutrition-macro" aria-selected="true">
                                    Makro
                                </button>
                            </li>
                            <li class="nav-item">
                                <button type="button" class="nav-link" role="tab">Mikro</button>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body px-0">
                        <div class="tab-content p-0">
                            <div class="tab-pane fade show active" id="navs-tabs-nutrition-macro" role="tabpanel">
                                <div class="p-3">
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between mb-1">
                                            <span>Protein</span>
                                            <span>45g/60g</span>
                                        </div>
                                        <div class="progress" style="height: 8px;">
                                            <div class="progress-bar bg-success" style="width: 75%"></div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between mb-1">
                                            <span>Karbohidrat</span>
                                            <span>150g/250g</span>
                                        </div>
                                        <div class="progress" style="height: 8px;">
                                            <div class="progress-bar bg-warning" style="width: 60%"></div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between mb-1">
                                            <span>Lemak</span>
                                            <span>30g/50g</span>
                                        </div>
                                        <div class="progress" style="height: 8px;">
                                            <div class="progress-bar bg-danger" style="width: 60%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activities & Badges -->
            <div class="col-md-6 col-lg-4 order-2 mb-4">
                <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="card-title m-0 me-2">Pencapaian</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <h6 class="mb-2">Badge Terkini</h6>
                            <div class="d-flex gap-2">
                                <span class="badge bg-label-primary p-2" title="Ahli Serat">
                                    <i class="bx bx-leaf"></i>
                                </span>
                                <span class="badge bg-label-success p-2" title="Pecinta Air">
                                    <i class="bx bx-droplet"></i>
                                </span>
                                <span class="badge bg-label-warning p-2" title="Logger Konsisten">
                                    <i class="bx bx-check-circle"></i>
                                </span>
                            </div>
                        </div>

                        <h6 class="mb-2">Aktivitas Terbaru</h6>
                        <ul class="p-0 m-0">
                            <li class="d-flex mb-3">
                                <div class="avatar flex-shrink-0 me-3">
                                    <span class="avatar-initial rounded bg-label-info">
                                        <i class="bx bx-walk"></i>
                                    </span>
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <small class="text-muted d-block mb-1">Olahraga</small>
                                        <h6 class="mb-0">Jalan Pagi</h6>
                                    </div>
                                    <div class="user-progress d-flex align-items-center gap-1">
                                        <small class="text-muted">30 menit</small>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex">
                                <div class="avatar flex-shrink-0 me-3">
                                    <span class="avatar-initial rounded bg-label-success">
                                        <i class="bx bx-bed"></i>
                                    </span>
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <small class="text-muted d-block mb-1">Tidur</small>
                                        <h6 class="mb-0">Malam Ini</h6>
                                    </div>
                                    <div class="user-progress d-flex align-items-center gap-1">
                                        <small class="text-muted">7.5 jam</small>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Daily Tip -->
        <div class="row">
            <div class="col-12">
                <div class="alert alert-info">
                    <h6 class="alert-heading">💡 Tips Gizi Hari Ini</h6>
                    <p class="mb-0">Konsumsi buah lokal seperti pepaya dan jeruk untuk memenuhi kebutuhan vitamin C harian. Lebih murah dan segar!</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Sample chart initialization (you'll need to implement with real data)
        document.addEventListener('DOMContentLoaded', function() {
            // Weekly Calorie Chart
            const weeklyCalorieChart = new ApexCharts(document.querySelector("#weeklyCalorieChart"), {
                series: [{
                    name: 'Kalori',
                    data: [1200, 1350, 1100, 1400, 1250, 1300, 1200]
                }],
                chart: {
                    type: 'line',
                    height: 250,
                    toolbar: { show: false }
                },
                colors: ['#00d4b8'],
                xaxis: {
                    categories: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min']
                },
                yaxis: {
                    title: { text: 'Kalori' }
                }
            });
            weeklyCalorieChart.render();
        });
    </script>
@endsection
