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


Route::resource('posts', App\Http\Controllers\PostController::class);


Route::resource('companies', App\Http\Controllers\CompanyController::class);


Route::resource('drugDosages', App\Http\Controllers\DrugDosageController::class);


Route::resource('drugs', App\Http\Controllers\DrugController::class);

Route::get('currencies/{id}/setDefault',[App\Http\Controllers\CurrencyController::class, 'setDefault'])->name('currencies.setDefault');

Route::resource('currencies', App\Http\Controllers\CurrencyController::class);


Route::resource('packages', App\Http\Controllers\PackageController::class);


Route::resource('tests', App\Http\Controllers\TestController::class);


Route::resource('countries', App\Http\Controllers\CountryController::class);


Route::resource('strata', App\Http\Controllers\StratumController::class);


Route::resource('routes', App\Http\Controllers\RouteController::class);


Route::resource('laboratories', App\Http\Controllers\LaboratoryController::class);
