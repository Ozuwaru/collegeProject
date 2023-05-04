<?php

use App\Http\Controllers\courseController;
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
// Route::get('/', function () {
    //     return view('dashboard');
    // })->name('dashboard')->middleware('auth.basic');
    
    
Route::middleware(['auth'])->group(function (){
        
        
    Route::get('/',[pageController::class,'dashboard'])->middleware('auth.basic')->name('dashboard');
    
    
    Route::get('logout',[logoutController::class,'logout'])->name('logout')->middleware('auth.basic');
    Route::resource('student',studentController::class)->middleware('auth.basic');
    
    Route::resource('courses', courseController::class)->middleware('auth.basic');
    Route::get('editGrades', [courseController::class,'editG'])->middleware('auth.basic')->name('edit');
});

Route::get('register',[registerController::class,'register'])->name('register');
Route::post('registerF',[registerController::class,'registerF'])->name('registerF');


Route::get('login',[loginController::class,'login'])->name('login');
Route::post('loginF',[loginController::class,'loginF'])->name('loginF');


