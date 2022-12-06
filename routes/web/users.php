<?php 
// prefix: users
use App\Http\Controllers\UsersController;


Route::get('/',[UsersController::class,'index'])->name('dashboard');//name: users.dashboard
Route::get('create',[UsersController::class,'create'])->name('create'); //name : users.create

Route::get('{user}/edit',[UsersController::class,'edit'])->name('edit');//name : users.edit

Route::get('{user}',[UsersController::class,'show'])->name('show');//name: users.show
// ->where('user','[0,9]+')
Route::post('/',[UsersController::class,'store'])->name('store');

Route::put('{user}',[UsersController::class,'update'])->name('update');

Route::put('{user}/profile-image',[UsersController::class,'updateProfileImage'])->name('update.profileImage');

Route::delete('{user}',[UsersController::class,'destroy'])->name('delete');

Route::delete('{user}/profile-image',[UsersController::class,'destroyProfileImage'])->name('delete.profileImage');