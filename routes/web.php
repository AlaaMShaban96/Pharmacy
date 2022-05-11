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


//Route::resource('posts', App\Http\Controllers\PostController::class);


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


Route::resource('users', App\Http\Controllers\UserController::class);


Route::resource('financialCovenants', App\Http\Controllers\FinancialCovenantController::class);


Route::resource('outlays', App\Http\Controllers\OutlayController::class);


Route::resource('eventSpecialties', App\Http\Controllers\EventSpecialtyController::class);


Route::resource('eventTypes', App\Http\Controllers\EventTypeController::class);


Route::resource('eventLocations', App\Http\Controllers\EventLocationController::class);

Route::post('addInvoice', [App\Http\Controllers\EventMaterialController::class,'addInvoices'])->name('addInvoice');
Route::post('removeInvoice', [App\Http\Controllers\EventMaterialController::class,'removeInvoices'])->name('removeInvoice');

Route::resource('eventMaterials', App\Http\Controllers\EventMaterialController::class);

Route::post('addMaterials', [App\Http\Controllers\EventController::class,'addMaterials'])->name('addMaterials');
Route::post('removeMaterials', [App\Http\Controllers\EventController::class,'removeMaterials'])->name('removeMaterials');

Route::resource('events', App\Http\Controllers\EventController::class);

Route::post('addSpeakers', [App\Http\Controllers\EventController::class,'addSpeakers'])->name('addSpeakers');
Route::post('removeSpeakers', [App\Http\Controllers\EventController::class,'removeSpeakers'])->name('removeSpeakers');

Route::resource('speakers', App\Http\Controllers\SpeakerController::class);

Route::resource('invoices', App\Http\Controllers\InvoiceController::class);


Route::resource('departments', App\Http\Controllers\DepartmentController::class);

Route::post('addFinancialCovenantTypes', [App\Http\Controllers\FinancialCovenantTypeController::class,'addFinancialCovenantTypes'])->name('addFinancialCovenantTypes');
Route::post('removeFinancialCovenantTypes', [App\Http\Controllers\FinancialCovenantTypeController::class,'removeFinancialCovenantTypes'])->name('removeFinancialCovenantTypes');

Route::resource('financialCovenantTypes', App\Http\Controllers\FinancialCovenantTypeController::class);

Route::post('addClause', [App\Http\Controllers\ClauseController::class,'addClause'])->name('addClause');
Route::post('removeClause', [App\Http\Controllers\ClauseController::class,'removeClause'])->name('removeClause');

Route::resource('clauses', App\Http\Controllers\ClauseController::class);
