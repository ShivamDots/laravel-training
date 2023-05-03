<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('admin')->middleware('test')->name('admin.')->group(function () {
    Route::get('/',[App\Http\Controllers\AdminController::class,'index'])->name('admin');

    Route::post('/login',[App\Http\Controllers\AdminController::class,'CheckLogin'])->name('login');
    Route::get('/listingpage',[App\Http\Controllers\AdminController::class,'listing'])->name('listingpage');

    Route::get('/adddcustomer',[App\Http\Controllers\AdminController::class,'addform'])->name('adddcustomer');
   Route::post('/save',[App\Http\Controllers\AdminController::class,'savedata'])->name('saveform');

   Route::get('/logout',[App\Http\Controllers\AdminController::class,'logout']);
   Route::get('/home',[App\Http\Controllers\AdminController::class,'home'])->name('home');
});








// Route :: get('/admin',[App\Http\Controllers\AdminController::class,'index'])->middleware("test");

// Route::get('/save', function () {
//     return view('admin');
// })->name('save');

