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

Route::get('/', function () {
    return view('login');
});
Route::match(['get', 'post'], '/login', [StudentsController::class, 'index'])->name('login');

Route::middleware('student')->group(function(){
Route::get('/dashboard' , function(){
    return view('/partials.dashboard');
  
});
Route::match(['get', 'post'], '/logout', [DashboardController::class, 'logout'])->name('logout');
});
@include('partials.header');