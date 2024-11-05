<?php

use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RoleMenuController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard', ['title' => 'Dashboard Page']);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/photo', [ProfileController::class, 'uploadPhoto'])->name('profile.photo.upload');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/roles', RoleController::class);
    Route::get('/roles/{id}/confirm-delete', [RoleController::class, 'confirmDelete'])->name('roles.confirm-delete');
    Route::resource('/menus', MenuController::class);
    Route::get('/menus/{id}/confirm-delete', [MenuController::class, 'confirmDelete'])->name('menus.confirm-delete');
    Route::resource('/role_menus', RoleMenuController::class);
    Route::resource('/users', UserController::class);

});

require __DIR__.'/auth.php';
