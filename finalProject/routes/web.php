<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
 


Route::get('/insertCategory', function () {
    return view('insertCategory');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Category
Route::post('/insertCategory', [App\Http\Controllers\CategoryController::class, 'store'])->name('insertCategory'); 
Route::post('/insertCategory/store', [App\Http\Controllers\CategoryController::class, 'store'])->name('addCategory'); 
Route::get('/showCategory', [App\Http\Controllers\CategoryController::class, 'show'])->name('showCategory');
Route::get('/deleteCategory/{id}', [App\Http\Controllers\CategoryController::class, 'delete'])->name('deleteCategory');
//Phone(seller)
Route::post('/insertPhone/store', [App\Http\Controllers\PhoneController::class, 'store'])->name('addPhone');
Route::get('/showPhone', [App\Http\Controllers\PhoneController::class, 'show'])->name('showPhone');
Route::get('/insertPhone', [App\Http\Controllers\PhoneController::class, 'create'])->name('insertPhone');
Route::get('/editPhone/{id}', [App\Http\Controllers\PhoneController::class, 'edit'])->name('editPhone');
Route::get('/deleteProduct/{id}', [App\Http\Controllers\PhoneController::class, 'delete'])->name('deletePhone');
Route::post('/updatePhone', [App\Http\Controllers\PhoneController::class, 'update'])->name('updatePhone');

//phone(user)
Route::get('/userShowProduct', [App\Http\Controllers\userShowPhone::class, 'show'])->name('showProduct');

Auth::routes();


