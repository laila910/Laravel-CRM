<?php

// prefix: customers
use App\Http\Controllers\CustomersController;

Route::get('/',[CustomersController::class,'index'])->name('dashboard');//name: customers.dashboard
Route::get('create',[CustomersController::class,'create'])->name('create'); //name : customers.create

Route::get('{customer}/edit',[CustomersController::class,'edit'])->name('edit');//name :customers.edit

Route::get('{customer}',[CustomersController::class,'show'])->name('show');//name: customers.show
// ->where('user','[0,9]+')
Route::post('/',[CustomersController::class,'store'])->name('store');//name: customers.store

Route::put('{customer}',[CustomersController::class,'update'])->name('update');//name: customers.update

Route::delete('{customer}',[CustomersController::class,'destroy'])->name('delete');//name: customers.delete

Route::post('/storeRecord',[CustomersController::class,'addRecordAction'])->name('add.recordAction');
