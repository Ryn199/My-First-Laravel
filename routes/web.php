<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Project1Controller;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectTypeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Tugas Nomor 1

# routing untuk homepage 
// Route::get('/home', function () { return 'ini Homepage https://homepage.ridhoyudiana.my.id/'; });
# routing untuk kontak 
Route::get('/Kontak', function () { return 'Nomor Wa:085280028441'; });
# routing untuk projek 
Route::get('/projek', function () { return 'project lefa dan project pribadi'; });
# routing untuk game 
Route::get('/gamelist', function () { return 'Genshin Impact, Honkai Star Rail, Valorant, Gta5'; });
# routing untuk status 
Route::get('/status', function () { return 'Aktif'; });

// Tugas Nomor 2

# routing untuk halaman list projects 
Route::get('/homepage', function () { return view('home'); });
# routing untuk halaman list projects 
Route::get('/takumi', function () { return view('takumikw'); });
# routing untuk halaman list projects 
Route::get('/profil', function () { return view('portofolio'); });

// Tugas Nomor 3

Route::get('/project', [Project1Controller::class, 'hom']);
Route::get('/nama', [Project1Controller::class, 'nama']);
Route::get('/prodi', [Project1Controller::class, 'prodi']);

Route::get('logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('login', [LoginController::class, 'prosesLogin'])->name('login.proses');

// admin group route

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::get('/project-types', [ProjectTypeController::class, 'index'])->name('project-types.index');
    Route::get('/project-types/create', [ProjectTypeController::class, 'create'])->name('project-types.create');
    Route::post('/project-types/store', [ProjectTypeController::class, 'store'])->name('project-types.store');
    Route::delete('/project-types/{id}', [ProjectTypeController::class, 'destroy'])->name('project-types.destroy');

    Route::get('/project-types/{id}/edit', [ProjectTypeController::class, 'edit'])->name('project-types.edit');
    Route::patch('/project-types/{id}', [ProjectTypeController::class, 'update'])->name('project-types.update');
    
    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
    Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
    Route::post('/projects/store', [ProjectController::class, 'store'])->name('projects.store');

    Route::get('/projects/{id}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::patch('/projects/{id}', [ProjectController::class, 'update'])->name('projects.update');
    Route::delete('/projects/{id}', [ProjectController::class, 'destroy'])->name('projects.destroy');

});
