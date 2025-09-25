<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DummyController extends Controller
{
    public function Dummyjournalfood()
    {
        // Dummy data untuk makanan
        $foods = [
            ['id' => 1, 'name' => 'Nasi Putih', 'calories' => 130, 'protein' => 2.7, 'carbs' => 28, 'fat' => 0.3],
            ['id' => 2, 'name' => 'Ayam Goreng', 'calories' => 250, 'protein' => 25, 'carbs' => 5, 'fat' => 15],
            ['id' => 3, 'name' => 'Tempe Goreng', 'calories' => 150, 'protein' => 12, 'carbs' => 8, 'fat' => 7],
            ['id' => 4, 'name' => 'Sayur Bayam', 'calories' => 50, 'protein' => 3, 'carbs' => 6, 'fat' => 1],
            ['id' => 5, 'name' => 'Pisang', 'calories' => 90, 'protein' => 1, 'carbs' => 23, 'fat' => 0.3],
        ];

        // Dummy data untuk food logs
        $foodLogs = [
            [
                'id' => 1,
                'date' => '2024-01-15',
                'meal_time' => 'Sarapan',
                'food_name' => 'Nasi Goreng',
                'quantity' => 200,
                'calories' => 350,
                'protein' => 10,
                'carbs' => 45,
                'fat' => 12,
                'time' => '07:30'
            ],
            [
                'id' => 2,
                'date' => '2024-01-15',
                'meal_time' => 'Makan Siang',
                'food_name' => 'Soto Ayam',
                'quantity' => 300,
                'calories' => 420,
                'protein' => 25,
                'carbs' => 35,
                'fat' => 15,
                'time' => '12:15'
            ],
            [
                'id' => 3,
                'date' => '2024-01-15',
                'meal_time' => 'Camilan',
                'food_name' => 'Pisang',
                'quantity' => 100,
                'calories' => 90,
                'protein' => 1,
                'carbs' => 23,
                'fat' => 0.3,
                'time' => '15:45'
            ],
        ];

        $dailySummary = [
            'total_calories' => 860,
            'total_protein' => 36,
            'total_carbs' => 103,
            'total_fat' => 27.3,
            'target_calories' => 1800,
            'target_protein' => 60,
            'target_carbs' => 250,
            'target_fat' => 50
        ];

        return view('journalFoods.journalFood', compact('foods', 'foodLogs', 'dailySummary'));
    }

    public function store(Request $request)
    {
        // Simulasi penyimpanan data
        return redirect()->route('journal')->with('success', 'Makanan berhasil dicatat!');
    }

    public function destroy($id)
    {
        // Simulasi penghapusan data
        return redirect()->route('journal')->with('success', 'Catatan makanan berhasil dihapus!');
    }
    public function Dummymenuplanner()
    {
        // Dummy data untuk menu planner
        $weeklyMenu = [
            'Senin' => [
                'Sarapan' => ['name' => 'Omelet Sayur', 'calories' => 280, 'protein' => 18, 'carbs' => 12, 'fat' => 20],
                'Makan_Siang' => ['name' => 'Nasi Campur Bali', 'calories' => 450, 'protein' => 25, 'carbs' => 55, 'fat' => 15],
                'Makan_Malam' => ['name' => 'Capcay Kuah', 'calories' => 320, 'protein' => 15, 'carbs' => 40, 'fat' => 12],
            ],
            'Selasa' => [
                'Sarapan' => ['name' => 'Bubur Ayam', 'calories' => 300, 'protein' => 20, 'carbs' => 45, 'fat' => 8],
                'Makan_Siang' => ['name' => 'Gado-gado', 'calories' => 380, 'protein' => 18, 'carbs' => 50, 'fat' => 12],
                'Makan_Malam' => ['name' => 'Ikan Bakar', 'calories' => 350, 'protein' => 30, 'carbs' => 25, 'fat' => 18],
            ],
            'Rabu' => [
                'Sarapan' => ['name' => 'Roti Gandum + Selai', 'calories' => 250, 'protein' => 10, 'carbs' => 40, 'fat' => 6],
                'Makan_Siang' => ['name' => 'Soto Ayam', 'calories' => 420, 'protein' => 25, 'carbs' => 35, 'fat' => 15],
                'Makan_Malam' => ['name' => 'Tumis Tahu', 'calories' => 280, 'protein' => 20, 'carbs' => 15, 'fat' => 18],
            ],
            'Kamis' => [
                'Sarapan' => ['name' => 'Sereal + Susu', 'calories' => 220, 'protein' => 12, 'carbs' => 35, 'fat' => 5],
                'Makan_Siang' => ['name' => 'Pecel Lele', 'calories' => 480, 'protein' => 28, 'carbs' => 40, 'fat' => 22],
                'Makan_Malam' => ['name' => 'Sup Jagung', 'calories' => 260, 'protein' => 15, 'carbs' => 30, 'fat' => 10],
            ],
            'Jumat' => [
                'Sarapan' => ['name' => 'Martabak Telur', 'calories' => 320, 'protein' => 22, 'carbs' => 25, 'fat' => 18],
                'Makan_Siang' => ['name' => 'Rawon', 'calories' => 460, 'protein' => 32, 'carbs' => 38, 'fat' => 20],
                'Makan_Malam' => ['name' => 'Salad Buah', 'calories' => 180, 'protein' => 5, 'carbs' => 35, 'fat' => 3],
            ],
        ];

        $dailyTargets = [
            'calories' => 1800,
            'protein' => 60,
            'carbs' => 250,
            'fat' => 50
        ];

        return view('menuPlanner.menu-plan', compact('weeklyMenu', 'dailyTargets'));
    }

    public function generate(Request $request)
    {
        // Simulasi AI menu generation
        return redirect()->route('menu-planner')->with('success', 'Menu berhasil digenerate!');
    }

    public function Dummyreport()
    {
        // Dummy data untuk laporan
        $weeklyReport = [
            'period' => '8-14 Jan 2024',
            'total_calories' => 12600,
            'average_daily_calories' => 1800,
            'total_protein' => 420,
            'total_carbs' => 1750,
            'total_fat' => 350,
            'water_intake_avg' => 1.8,
            'activity_days' => 5,
        ];

        $nutritionTrends = [
            'labels' => ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'],
            'calories' => [1750, 1820, 1680, 1900, 1850, 2100, 1650],
            'protein' => [55, 60, 52, 65, 62, 70, 50],
            'carbs' => [230, 240, 220, 250, 245, 280, 210],
            'fat' => [45, 48, 42, 50, 48, 55, 40]
        ];

        $aiInsights = [
            'trend' => 'positive',
            'message' => 'Pola makan Anda minggu ini cukup baik! Asupan protein konsisten di atas target.',
            'recommendations' => [
                'Kurangi konsumsi gula tambahan pada weekend',
                'Tambah asupan serat dengan lebih banyak sayuran',
                'Pertahankan konsistensi olahraga 3x seminggu'
            ],
            'prediction' => 'Dengan pola ini, target berat badan 65kg dapat tercapai dalam 3 minggu'
        ];

        $achievements = [
            ['icon' => 'bx bx-trending-up', 'title' => 'Konsistensi Makan', 'value' => '7/7 hari', 'progress' => 100],
            ['icon' => 'bx bx-droplet', 'title' => 'Target Air Minum', 'value' => '5/7 hari', 'progress' => 71],
            ['icon' => 'bx bx-run', 'title' => 'Aktivitas Fisik', 'value' => '3/5 target', 'progress' => 60],
            ['icon' => 'bx bx-leaf', 'title' => 'Asupan Serat', 'value' => 'Rata-rata 25g/hari', 'progress' => 83],
        ];

        return view('Report.report', compact('weeklyReport', 'nutritionTrends', 'aiInsights', 'achievements'));
    }

}
