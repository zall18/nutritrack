@extends('layouts.app')

@section('title', 'Menu Planner - NutriTrack')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="fw-bold py-3 mb-0">🗓️ Menu Planner</h4>
                    <div class="btn-group">
                        <form action="{{ route('menu-planner.generate') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-primary">
                                <i class="bx bx-brain"></i> Generate AI Menu
                            </button>
                        </form>
                        <button class="btn btn-outline-secondary">
                            <i class="bx bx-download"></i> Export
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Weekly Menu -->
        <div class="row">
            @foreach($weeklyMenu as $day => $meals)
                <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-header">
                            <h5 class="card-title mb-0">{{ $day }}</h5>
                            <small class="text-muted">Total:
                                @php
                                    $totalCalories = array_sum(array_column($meals, 'calories'));
                                    $totalProtein = array_sum(array_column($meals, 'protein'));
                                @endphp
                                {{ $totalCalories }} kkal | {{ $totalProtein }}g protein
                            </small>
                        </div>
                        <div class="card-body">
                            @foreach($meals as $mealType => $meal)
                                <div class="mb-3 pb-3 border-bottom">
                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                        <span class="badge bg-label-info">{{ $mealType }}</span>
                                        <small class="text-muted">{{ $meal['calories'] }} kkal</small>
                                    </div>
                                    <h6 class="mb-1">{{ $meal['name'] }}</h6>
                                    <div class="small text-muted">
                                        P: {{ $meal['protein'] }}g | K: {{ $meal['carbs'] }}g | L: {{ $meal['fat'] }}g
                                    </div>
                                    <button class="btn btn-sm btn-outline-primary mt-2 w-100">
                                        <i class="bx bx-food-menu"></i> Tambah ke Journal
                                    </button>
                                </div>
                            @endforeach

                            <!-- Daily Summary -->
                            <div class="mt-3">
                                <small class="text-muted d-block">Progress Harian:</small>
                                <div class="d-flex justify-content-between small mb-1">
                                    <span>Kalori</span>
                                    <span>{{ $totalCalories }}/{{ $dailyTargets['calories'] }}</span>
                                </div>
                                <div class="progress mb-2" style="height: 6px;">
                                    @php $progress = ($totalCalories / $dailyTargets['calories']) * 100 @endphp
                                    <div class="progress-bar bg-{{ $progress > 100 ? 'danger' : 'success' }}"
                                         style="width: {{ min($progress, 100) }}%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Nutrition Summary -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Ringkasan Nutrisi Mingguan</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 text-center">
                                <div class="mb-3">
                                    <h3 class="text-primary">12,600</h3>
                                    <small class="text-muted">Total Kalori</small>
                                </div>
                            </div>
                            <div class="col-md-3 text-center">
                                <div class="mb-3">
                                    <h3 class="text-info">420g</h3>
                                    <small class="text-muted">Total Protein</small>
                                </div>
                            </div>
                            <div class="col-md-3 text-center">
                                <div class="mb-3">
                                    <h3 class="text-warning">1,750g</h3>
                                    <small class="text-muted">Total Karbohidrat</small>
                                </div>
                            </div>
                            <div class="col-md-3 text-center">
                                <div class="mb-3">
                                    <h3 class="text-danger">350g</h3>
                                    <small class="text-muted">Total Lemak</small>
                                </div>
                            </div>
                        </div>

                        <!-- Weekly Chart -->
                        <div id="weeklyNutritionChart" style="min-height: 300px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Weekly Nutrition Chart
            const chartOptions = {
                series: [{
                    name: 'Kalori',
                    data: [1800, 1750, 1820, 1780, 1850, 1700, 1750]
                }],
                chart: {
                    type: 'line',
                    height: 300,
                    toolbar: { show: false }
                },
                colors: ['#00d4b8'],
                xaxis: {
                    categories: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min']
                },
                yaxis: {
                    title: { text: 'Kalori' }
                },
                markers: {
                    size: 5,
                }
            };

            const chart = new ApexCharts(document.querySelector("#weeklyNutritionChart"), chartOptions);
            chart.render();
        });
    </script>
@endsection
