<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\HotelController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CustomerController::class, 'index']);
Route::get('/customer', [CustomerController::class, 'index'])->name('customer.index');
Route::get('/customer/create', [CustomerController::class, 'create'])->name('customer.create');
Route::post('/customer/store', [CustomerController::class, 'store'])->name('customer.store');
Route::get('/customer/{customer}/edit', [CustomerController::class, 'edit'])->name('customer.edit');
Route::put('/customer/{customer}', [CustomerController::class, 'update'])->name('customer.update');
Route::delete('/customer/{customer}', [CustomerController::class, 'destroy'])->name('customer.destroy');
Route::get('/customer/trash', [CustomerController::class, 'trash'])->name('customer.trash');
Route::put('/customer/{id}/restore', [CustomerController::class, 'restore'])->name('customer.restore');
Route::delete('/customer/{id}/force-delete', [CustomerController::class, 'forceDelete'])->name('customer.forceDelete');

Route::resource('/customer', CustomerController::class);

Route::resource('/hotel', HotelController::class);

Route::resource('/room', RoomController::class);