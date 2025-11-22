<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\QueryController;
use App\Http\Controllers\ProfileController;

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
    Route::post('/edit/{id}', [QueryController::class, 'updateQuery'])->name('query.update');
    Route::delete('/delete/{id}', [QueryController::class, 'deleteQuery'])->name('query.delete');
    Route::get('/categories', [QueryController::class, 'categories'])->name('query.categories');
    Route::post('/categories/store', [QueryController::class, 'storeCategory'])->name('query.categories.store');
    //filter
    Route::post('/filter', [DataController::class, 'filter'])->name('data.filter');
});

Route::middleware('auth')->prefix('data')->group(function(){
    Route::get('/{id}', [DataController::class, 'index'])->name('data.index');
});

Route::middleware('auth')->prefix('users')->group(function(){
    Route::get('/', [UserController::class, 'listUsers'])->name('users.list');
    Route::get('/create', [UserController::class, 'createUser'])->name('users.create');
    Route::post('/store', [UserController::class, 'storeUser'])->name('users.store');
    Route::get('/edit/{id}', [UserController::class, 'editUser'])->name('users.edit');
    Route::put('/edit/{id}', [UserController::class, 'updateUser'])->name('users.update');
    Route::delete('/delete/{id}', [UserController::class, 'deleteUser'])->name('users.delete');
});


require __DIR__.'/auth.php';
