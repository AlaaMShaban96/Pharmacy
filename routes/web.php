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
Route::get('/language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
});
Route::get('/', function () {
    return view('auth.login');
});
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');;

Auth::routes();

Route::middleware(['auth','language'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


    //Route::resource('posts', App\Http\Controllers\PostController::class);

    Route::resource('companies', App\Http\Controllers\CompanyController::class);

    // Route::get('/agents', [App\Http\Controllers\CompanyController::class, 'index'])->name('agents.index');

    Route::resource('drugDosages', App\Http\Controllers\DrugDosageController::class);


    Route::resource('drugs', App\Http\Controllers\DrugController::class);

    Route::get('currencies/{id}/setDefault',[App\Http\Controllers\CurrencyController::class, 'setDefault'])->name('currencies.setDefault');

    Route::resource('currencies', App\Http\Controllers\CurrencyController::class);


    Route::resource('packages', App\Http\Controllers\PackageController::class);


    Route::resource('tests', App\Http\Controllers\TestController::class);


    Route::resource('countries', App\Http\Controllers\CountryController::class);


    Route::resource('specialties', App\Http\Controllers\StratumController::class,['names' => 'specialties'] );


    Route::resource('forms', App\Http\Controllers\RouteController::class,['names' => 'forms']);


    Route::resource('suppliers', App\Http\Controllers\LaboratoryController::class ,['names' => 'suppliers']);

    Route::post('addTools', [App\Http\Controllers\UserController::class,'addTools'])->name('addToolsToUser');
    Route::post('removeTools', [App\Http\Controllers\UserController::class,'removeTools'])->name('removeToolsToUser');

    Route::post('addGools', [App\Http\Controllers\UserController::class,'addGools'])->name('addGoolsToUser');
    Route::post('removeGools', [App\Http\Controllers\UserController::class,'removeGools'])->name('removeGoolsToUser');

    Route::post('addTraining', [App\Http\Controllers\UserController::class,'addTraining'])->name('addTrainingToUser');
    Route::post('removeTraining', [App\Http\Controllers\UserController::class,'removeTraining'])->name('removeTrainingToUser');

    Route::resource('users', App\Http\Controllers\UserController::class);

    // Route::resource('financialCovenants', App\Http\Controllers\FinancialCovenantController::class);


    Route::post('addOutlays', [App\Http\Controllers\OutlayController::class,'addOutlays'])->name('addOutlays');
    Route::post('removeOutlays', [App\Http\Controllers\OutlayController::class,'removeOutlays'])->name('removeOutlays');

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


    Route::resource('financialCovenants', App\Http\Controllers\FinancialCovenantController::class);


    Route::resource('stores', App\Http\Controllers\StoreController::class);



    Route::resource('receives', App\Http\Controllers\ReceiveController::class);

    Route::post('addShipmentModels', [App\Http\Controllers\ShipmentModelController::class,'addShipmentModels'])->name('addShipmentModels');
    Route::post('removeShipmentModels', [App\Http\Controllers\ShipmentModelController::class,'removeShipmentModels'])->name('removeShipmentModels');

    Route::resource('shipmentModels', App\Http\Controllers\ShipmentModelController::class);


    Route::resource('sampleReceiveds', App\Http\Controllers\SampleReceivedController::class);


    Route::resource('doctors', App\Http\Controllers\DoctorController::class);


    Route::resource('orders', App\Http\Controllers\OrderController::class);

    Route::post('orderRequests/{id}/status', [App\Http\Controllers\OrderRequestController::class,'changeStatus'])->name('orderRequests.changeStatus');

    Route::resource('orderRequests', App\Http\Controllers\OrderRequestController::class);


    Route::resource('permissions', App\Http\Controllers\PermissionController::class);

    Route::post('roles/{role}/permissions/{permission}', [App\Http\Controllers\RoleController::class,'addPermission'])->name('user');

    Route::resource('roles', App\Http\Controllers\RoleController::class);

});


Route::resource('tools', App\Http\Controllers\ToolController::class);


Route::resource('gools', App\Http\Controllers\GoolController::class);


Route::resource('trainingTypes', App\Http\Controllers\TrainingTypeController::class);


Route::resource('trainings', App\Http\Controllers\TrainingController::class);
