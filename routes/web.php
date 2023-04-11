<?php

use App\Http\Controllers\loginController;
use App\Http\Controllers\logoutController;
use App\Http\Controllers\pageController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\studentController;
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
Route::get('/',[pageController::class,'dashboard'])->middleware('auth.basic')->name('dashboard');
// Route::get('/', function () {
//     return view('dashboard');
// })->name('dashboard')->middleware('auth.basic');

Route::get('register',[registerController::class,'register'])->name('register');
Route::post('registerF',[registerController::class,'registerF'])->name('registerF');


Route::get('login',[loginController::class,'login'])->name('login');
Route::post('loginF',[loginController::class,'loginF'])->name('loginF');


Route::get('logout',[logoutController::class,'logout'])->name('logout');
    Route::resource('student',studentController::class);

//Route::group('student',)