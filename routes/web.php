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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {

});

Route::group(['middleware'=>'adminAuth'],function(){
    Route::resource('product',App\Http\Controllers\ProductController::class);
    Route::resource('user',App\Http\Controllers\UserController::class);
    Route::post('/product/excel',[App\Http\Controllers\ProductController::class,'excelImport'])->name('product.excel');
    Route::get('/product/excel/create',[App\Http\Controllers\ProductController::class,'excel'])->name('product.excel.create');
    
});

