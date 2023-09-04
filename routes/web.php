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
use App\Models\Contact;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

// Home Page
Route::get('/', [HomeController::class, 'index'])->name('admin.dashboard');
// About Page
Route::get('/about', [AboutController::class, 'index'])->name('about');
// Contact Page
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
// Project Page
Route::get('/project', [ProjectController::class, 'index'])->name('project');

//@auth
Route::get('/admin/siswa', [SiswaController::class, 'index'])->name('siswa.index');
Route::get('/admin/siswa/create', [SiswaController::class, 'create'])->name('siswa.create');
Route::post('/admin/siswa', [SiswaController::class, 'store'])->name('siswa.store');
Route::get('/admin/siswa/{id}/edit', [SiswaController::class, 'edit'])->name('siswa.edit');
Route::put('/admin/siswa/{id}', [SiswaController::class, 'update'])->name('siswa.update'); // Change to PUT
Route::delete('/admin/siswa/{id}', [SiswaController::class, 'delete'])->name('siswa.delete');

Route::get('/admin/project',[ProjectController::class,'index'])->name('project.index');
Route::get('/admin/project/create',[ProjectController::class,'create'])->name('project.create');
Route::post('/admin/project',[ProjectController::class,'store'])->name('project.store');
Route::get('/admin/project/{id}/edit',[ProjectController::class,'edit'])->name('project.edit');
Route::get('/admin/project/{id}',[ProjectController::class,'update'])->name('project.update');
Route::delete('/admin/project/{id}',[ProjectController::class,'delete'])->name('project.delete');

Route::get('/admin/contact',[ContactController::class,'index'])->name('contact.index');
Route::get('/admin/contact/create',[ContactController::class,'create'])->name('contact.create');
Route::post('/admin/contact',[ContactController::class,'store'])->name('contact.store');
Route::get('/admin/contact/{id}/edit',[ContactController::class,'edit'])->name('contact.edit');
Route::get('/admin/contact/{id}',[ContactController::class,'update'])->name('contact.update');
Route::delete('/admin/contact/{id}',[ContactController::class,'delete'])->name('contact.delete');