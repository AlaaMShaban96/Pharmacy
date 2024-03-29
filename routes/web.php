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


Route::resource('items', App\Http\Controllers\ItemController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();


Route::resource('stores', App\Http\Controllers\StoreController::class);


Route::resource('drugDosages', App\Http\Controllers\DrugDosageController::class);


Route::resource('companies', App\Http\Controllers\CompanyController::class);


Route::resource('drugs', App\Http\Controllers\DrugController::class);
