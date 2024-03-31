<?php

use App\Http\Controllers\Admin\CashierController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('cashier.home');
Route::get('/transaksi-sukses/{id}', [HomeController::class, 'success'])->name('cashier.success');

Auth::routes([
    'register' => false
]);

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');


    Route::resource('menu', MenuController::class);
    Route::resource('kasir', CashierController::class);
});
