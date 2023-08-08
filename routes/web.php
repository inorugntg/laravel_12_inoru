<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\LoginController;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

// Home Page
Route::get('/', [HomeController::class, 'index'])->name('admin.admin');

// About Page
Route::get('/about', [AboutController::class, 'index'])->name('about');

// Contact Page
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

// Project Page
Route::get('/project', [ProjectController::class, 'index'])->name('project');

// Dashboard Page
Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('admin.dashboard');

// Login Page
Route::get('/login',[LoginController::class,'index'])->name('admin.login');

// Master Siswa
Route::get('/mastersiswa', [SiswaController::class, 'index'])->name('admin.mastersiswa');

// Tambah Siswa
Route::get('/tambahsiswa', [SiswaController::class, 'create'])->name('admin.tambahsiswa');
Route::post('/simpan-siswa', [SiswaController::class, 'store'])->name('simpan.siswa');

//Master Project
Route::get('/masterproject',[ProjectController::class,'project'])->name('admin.masterproject');

// Tambah Project
Route::get('/tambahproject', [ProjectController::class, 'create'])->name('admin.tambahproject');
Route::post('/simpan-project', [ProjectController::class, 'store'])->name('simpan.project');