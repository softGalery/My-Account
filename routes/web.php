<?php

use App\Http\Controllers\Homecontroller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Usercontroller;
use Illuminate\Support\Facades\Route;

Route::get('/', [Homecontroller::class, 'index']);

Route::get('/dashboard', function () {
    return view('backend.index');
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
    Route::get('user-logout', [Usercontroller::class, 'logout'])->name('user.logout');
}
);
