<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QueryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//queries
Route::middleware('auth')->prefix('query')->group(function(){
    Route::get('/', [QueryController::class, 'listQuery'])->name('query.list');
    Route::get('/add', [QueryController::class, 'addQuery'])->name('query.add');
    Route::post('/add', [QueryController::class, 'storeQuery'])->name('query.store');
    Route::get('/edit/{id}', [QueryController::class, 'editQuery'])->name('query.edit');
    Route::delete('/delete/{id}', [QueryController::class, 'deleteQuery'])->name('query.delete');
    Route::get('/categories', [QueryController::class, 'categories'])->name('query.categories');
    Route::post('/categories/store', [QueryController::class, 'storeCategory'])->name('query.categories.store');
});


require __DIR__.'/auth.php';
