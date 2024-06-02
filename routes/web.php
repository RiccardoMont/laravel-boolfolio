<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\ProfileController;
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
    return view('welcome');
});


//Dovuto creare una rotta a parte per la dashboard. Causa malfunzionamento con il rename admin
Route::middleware(['auth', 'verified']) 
->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

});


Route::middleware(['auth', 'verified'])
->name('admin.')
->prefix('admin')
->group(function () {

    //NOT WORKING
    /*Route::get('/', function () {
        return view('dashboard');
    });*/
    //Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    //http://localhost:8000/admin

    Route::resource('projects', ProjectController::class);

    //NOT WORKING
    //Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
