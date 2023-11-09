<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentsController;

use Illuminate\Support\Facades\Route;

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


Route::get('/', [StudentsController::class, 'checkAuth']);
Route::post('/', [StudentsController::class, 'index'])->name('login');

Route::middleware(['auth:student'])->group(function () {
    Route::get('/dashboard', [StudentsController::class, 'getSession'])->name('dashboard');
    Route::match(['get', 'post'], '/logout', [StudentsController::class, 'logout'])->name('logout');
   
});