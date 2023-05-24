<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
})->name('home');



/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('projects', ProjectController::class)->parameters(['projects' => 'project:slug']);
    Route::get('/', [DashboardController::class, 'home']);
    // Route::get('admin/projects/create', [ProjectController::class, 'create'])->name('admin.projects.create');
    Route::resource('types', TypeController::class)->parameters(['types' => 'type:slug']);
});

// I added this route to handle the dashboard link in my navbar. I assume i could as well include the file in my admin/projects folder without needing to use the following route because at that point if would be automatically created by my RESOURSE route for projects above here.
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

// a queste tolgo la parte middleware e la includo in quella sopra

// Route::resource('projects', ProjectController::class)->middleware(['auth', 'verified']);
// Route::get('/admin', [DashboardController::class, 'home'])->middleware(['auth', 'verified']);


require __DIR__ . '/auth.php';
