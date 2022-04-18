<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\FacultyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('user.dashboard');

Route::resources([
    'faculty' => FacultyController::class,
    'module' => ModuleController::class,
]);


Route::get('/', function () {
    return view('home');
});

Route::get('/profile/create', [HomeController::class, 'createProfile'])->name('profile.create');
