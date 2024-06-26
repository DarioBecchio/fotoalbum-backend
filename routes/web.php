<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PhotoController;
use App\Http\Controllers\Guest\PageController;
use App\Http\Controllers\Guest\PhotoController as GuestPhotoController;

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

Route::get('/', [PageController::class,'index']);
Route::resource('photos', GuestPhotoController::class)->only(['index','show']);


Route::middleware(['auth', 'verified'])
->name('admin.')
->prefix('admin')
->group(function(){
    Route::get('/', [DashboardController::class,'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');//http://localhost:8000/admin

//preparo le rotte di tipo resource per andare a gestire i dati che ho creato
    Route::resource('photos', PhotoController::class);

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
