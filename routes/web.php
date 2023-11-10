<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\TeachersController;
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
Route::post('/', [StudentsController::class, 'index'])->name('students.login');
Route::get('/teachers', [TeachersController::class, 'index']);
Route::post('/teachers', [TeachersController::class, 'login'])->name('teachers.login');



Route::middleware(['auth:teacher'])->group(function(){
    Route::get('/teachers-dashboard',[TeachersController::class,'dashboard']);    
});
Route::middleware(['auth:student'])->group(function () {
    Route::get('/dashboard', [StudentsController::class, 'getSession'])->name('dashboard');
    Route::match(['get', 'post'], '/dashboard', [StudentsController::class, 'logout'])->name('logout');
   
});