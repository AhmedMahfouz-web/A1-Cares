<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;

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
    return view('home');
});

Route::get('/{slug}', [ProductController::class, 'show'])->name('product');

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [ProductController::class, 'index'])->name('admindashboard');

    Route::get('/create', [ProductController::class, 'create'])->name('create');
    Route::post('/create', [ProductController::class, 'store'])->name('store');
    Route::get('/edit/{slug}', [ProductController::class, 'edit'])->name('edit');
    Route::post('/edit/{slug}', [ProductController::class, 'update'])->name('update');
    Route::post('/destroy/{slug}', [ProductController::class, 'destroy'])->name('destroy');

    Route::controller(AuthController::class)->group(function(){

        Route::get('/login', 'index')->name('login');
    
        Route::get('/logout', 'logout')->name('logout');
    
        Route::post('/validate_login', 'validate_login')->name('validate_login');
    
    });
    

});

