<?php

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return redirect(route('login'));
});

Route::get('/dashboard', function () {
    // return view('dashboard');
    return redirect(route('productos.index'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('productos', ProductoController::class)->names('productos')->middleware('auth');
Route::get('products/data', [ProductoController::class, 'productosData'])->name('productos.data')->middleware('auth');

require __DIR__.'/auth.php';
