<?php

use App\Http\Controllers\AssetController;
use App\Http\Controllers\Homecontroller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Rolecontroller;
use App\Http\Controllers\Usercontroller;
use Illuminate\Support\Facades\Route;

Route::get('/', [Homecontroller::class, 'index']);

Route::get('/dashboard', function () {
    return view('backend.pages.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// User login
Route::get('/user-login',[Homecontroller::class, 'useLogin']);


require __DIR__.'/auth.php';


Route::middleware(['auth', 'verified'])->group(function ()
{
    // User login and logout controller
    Route::get('user-logout', [Usercontroller::class, 'logout'])->name('user.logout');

    // User role controller
    Route::get('/user-role', [Rolecontroller::class, 'index'])->name('user.role');
    Route::get('/role/create', [Rolecontroller::class, 'create'])->name('role.create');
    Route::get('/role/{id}/edit', [Rolecontroller::class, 'edit'])->name('role.edit');
    Route::post('/role', [Rolecontroller::class, 'store'])->name('role.store');
    Route::put('/role/{id}/', [Rolecontroller::class, 'update'])->name('role.update');
    Route::delete('/role/{id}/', [Rolecontroller::class, 'destroy'])->name('role.delete');

    // All user controller
    Route::get('/users', [Usercontroller::class, 'index'])->name('user.index');
    Route::get('/users/create', [Usercontroller::class, 'create'])->name('user.create');
    Route::post('/users/add', [Usercontroller::class, 'store'])->name('user.store');
    Route::get('/users/{id}/edit', [Usercontroller::class, 'edit'])->name('user.edit');
    Route::put('/users/{id}', [Usercontroller::class, 'update'])->name('user.update');
    Route::delete('/users/{id}', [Usercontroller::class, 'destroy'])->name('user.delete');

    // Assets Control Section
    Route::get('/asset-page',[Assetcontroller::class, 'index'])->name('asset.index');
    Route::post('/asset-add',[Assetcontroller::class, 'create'])->name('asset.create');
    Route::get('/asset-list',[Assetcontroller::class, 'assetsList'])->name('asset.list');
    Route::post('/asset-delete',[Assetcontroller::class, 'assetDelete'])->name('asset.delete');
    Route::post('/asset-update',[Assetcontroller::class, 'assetUpdate'])->name('asset.update');
}
);
