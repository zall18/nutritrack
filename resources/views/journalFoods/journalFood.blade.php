@extends('layouts.app')

@section('title', 'Food Journal - NutriTrack')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="fw-bold py-3 mb-0">📝 Food Journal</h4>
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addFoodModal">
                            <i class="bx bx-plus"></i> Tambah Makanan
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Daily Summary -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Ringkasan Hari Ini (15 Jan 2024)</h5>
                        <div class="row">
                            <div class="col-md-3 col-6 mb-3">
                                <div class="d-flex justify-content-between">
                                    <span>Kalori</span>
                                    <span>{{ $dailySummary['total_calories'] }}/{{ $dailySummary['target_calories'] }}</span>
                                </div>
                                <div class="progress" style="height: 8px;">
                                    @php $caloriePercent = ($dailySummary['total_calories'] / $dailySummary['target_calories']) * 100 @endphp
                                    <div class="progress-bar bg-success" style="width: {{ $caloriePercent }}%"></div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6 mb-3">
                                <div class="d-flex justify-content-between">
                                    <span>Protein</span>
                                    <span>{{ $dailySummary['total_protein'] }}g/{{ $dailySummary['target_protein'] }}g</span>
                                </div>
                                <div class="progress" style="height: 8px;">
                                    @php $proteinPercent = ($dailySummary['total_protein'] / $dailySummary['target_protein']) * 100 @endphp
                                    <div class="progress-bar bg-info" style="width: {{ $proteinPercent }}%"></div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6 mb-3">
                                <div class="d-flex justify-content-between">
                                    <span>Karbohidrat</span>
                                    <span>{{ $dailySummary['total_carbs'] }}g/{{ $dailySummary['target_carbs'] }}g</span>
                                </div>
                                <div class="progress" style="height: 8px;">
                                    @php $carbsPercent = ($dailySummary['total_carbs'] / $dailySummary['target_carbs']) * 100 @endphp
                                    <div class="progress-bar bg-warning" style="width: {{ $carbsPercent }}%"></div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6 mb-3">
                                <div class="d-flex justify-content-between">
                                    <span>Lemak</span>
                                    <span>{{ $dailySummary['total_fat'] }}g/{{ $dailySummary['target_fat'] }}g</span>
                                </div>
                                <div class="progress" style="height: 8px;">
                                    @php $fatPercent = ($dailySummary['total_fat'] / $dailySummary['target_fat']) * 100 @endphp
                                    <div class="progress-bar bg-danger" style="width: {{ $fatPercent }}%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Food Logs -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Riwayat Makanan Hari Ini</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Waktu</th>
                                    <th>Jenis Makanan</th>
                                    <th>Makanan</th>
                                    <th>Porsi</th>
                                    <th>Kalori</th>
                                    <th>Nutrisi</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($foodLogs as $log)
                                    <tr>
                                        <td>
                                            <small class="text-muted">{{ $log['meal_time'] }}</small><br>
                                            <span>{{ $log['time'] }}</span>
                                        </td>
                                        <td><span class="badge bg-label-primary">{{ $log['meal_time'] }}</span></td>
                                        <td>
                                            <strong>{{ $log['food_name'] }}</strong>
                                        </td>
                                        <td>{{ $log['quantity'] }}g</td>
                                        <td>
                                            <span class="fw-bold">{{ $log['calories'] }}</span> kkal
                                        </td>
                                        <td>
                                            <small>P: {{ $log['protein'] }}g</small><br>
                                            <small>K: {{ $log['carbs'] }}g</small><br>
                                            <small>L: {{ $log['fat'] }}g</small>
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-danger"
                                                    onclick="confirmDelete({{ $log['id'] }})">
                                                <i class="bx bx-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Food Modal -->
    <div class="modal fade" id="addFoodModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Makanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('food-journal.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Pilih Makanan</label>
                                <select class="form-select" name="food_id" required>
                                    <option value="">Pilih makanan...</option>
                                    @foreach($foods as $food)
                                        <option value="{{ $food['id'] }}"
                                                data-calories="{{ $food['calories'] }}"
                                                data-protein="{{ $food['protein'] }}"
                                                data-carbs="{{ $food['carbs'] }}"
                                                data-fat="{{ $food['fat'] }}">
                                            {{ $food['name'] }} ({{ $food['calories'] }} kkal/100g)
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Waktu Makan</label>
                                <select class="form-select" name="meal_time" required>
                                    <option value="Sarapan">Sarapan</option>
                                    <option value="Makan Siang">Makan Siang</option>
                                    <option value="Makan Malam">Makan Malam</option>
                                    <option value="Camilan">Camilan</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Jumlah (gram)</label>
                                <input type="number" class="form-control" name="quantity" value="100" min="1" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Tanggal</label>
                                <input type="date" class="form-control" name="date" value="{{ date('Y-m-d') }}" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-info">
                                    <h6>Estimasi Nutrisi:</h6>
                                    <div id="nutritionPreview">
                                        Pilih makanan untuk melihat estimasi nutrisi
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function confirmDelete(id) {
            if (confirm('Hapus catatan makanan ini?')) {
                // Simulasi delete request
                window.location.href = "{{ route('food-journal.destroy', '') }}/" + id;
            }
        }

        // Nutrition preview calculation
        document.addEventListener('DOMContentLoaded', function() {
            const foodSelect = document.querySelector('select[name="food_id"]');
            const quantityInput = document.querySelector('input[name="quantity"]');
            const nutritionPreview = document.getElementById('nutritionPreview');

            function updateNutritionPreview() {
                const selectedOption = foodSelect.options[foodSelect.selectedIndex];
                const quantity = quantityInput.value;

                if (selectedOption.value) {
                    const calories = (selectedOption.dataset.calories * quantity / 100).toFixed(0);
                    const protein = (selectedOption.dataset.protein * quantity / 100).toFixed(1);
                    const carbs = (selectedOption.dataset.carbs * quantity / 100).toFixed(1);
                    const fat = (selectedOption.dataset.fat * quantity / 100).toFixed(1);

                    nutritionPreview.innerHTML = `
                Kalori: <strong>${calories} kkal</strong> |
                Protein: <strong>${protein}g</strong> |
                Karbo: <strong>${carbs}g</strong> |
                Lemak: <strong>${fat}g</strong>
            `;
                } else {
                    nutritionPreview.innerHTML = 'Pilih makanan untuk melihat estimasi nutrisi';
                }
            }

            foodSelect.addEventListener('change', updateNutritionPreview);
            quantityInput.addEventListener('input', updateNutritionPreview);
        });
    </script>
@endsection
