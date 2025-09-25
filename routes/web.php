<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DummyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('/food-journal', [DummyController::class, 'Dummyjournalfood'])->name('journal');
Route::post('/food-journal', [DummyController::class, 'store'])->name('food-journal.store');
Route::delete('/food-journal/{id}', [DummyController::class, 'destroy'])->name('food-journal.destroy');

Route::get('/menu-planner', [DummyController::class, 'Dummymenuplanner'])->name('menu-planner');
Route::post('/menu-planner/generate', [DummyController::class, 'generate'])->name('menu-planner.generate');

Route::get('/reports', [DummyController::class, 'Dummyreport'])->name('report');



Route::get('/test',[Controller::class,'index'])->name('test');
