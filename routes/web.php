<?php

use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TestController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('backend.dashboard');
});


// TEST
Route::get('/testview', [TestController::class, 'testview'])->name('testview');
Route::post('/test/store', [TestController::class, 'teststore'])->name('teststore');
Route::post('/test/edit/{id}', [TestController::class, 'edit'])->name('edit');
Route::put('/test/update/{id}', [TestController::class, 'update'])->name('update');
Route::post('/test/{id}', [TestController::class, 'destroy'])->name('destroy');
Route::get('/testview/getdata', [TestController::class, 'getData'])->name('getData');


//ADMISSION
Route::get('/addmission', [AdmissionController::class, 'index'])->name('admission');
Route::post('/addmission/store', [AdmissionController::class, 'store'])->name('admission.store');
Route::get('/addmission/getdata', [AdmissionController::class, 'getAdmissiondata'])->name('getAdmissiondata');
Route::post('/addmission/{id}', [AdmissionController::class, 'destroy'])->name('admission.destroy');


Route::get('/employee-add', [EmployeeController::class, 'employee'])->name('employee.view');
Route::post('/employee-store', [EmployeeController::class, 'store'])->name('employee.store');
Route::get('/employee-List', [EmployeeController::class, 'employeeList'])->name('employeeList');
Route::get('/employee-getdata', [EmployeeController::class, 'employeegetdata'])->name('employee.getdata');
Route::get('/employee-edit/{id}', [EmployeeController::class, 'edit'])->name('employee.edit');
Route::put('/employee-update/{id}', [EmployeeController::class, 'update'])->name('employee.update');
Route::delete('/employee-delete/{id}', [EmployeeController::class, 'destroy'])->name('employee.destroy');


//CLIENT
Route::get('/client', [ClientController::class, 'index'])->name('client');
Route::post('/client/store', [ClientController::class, 'store'])->name('client.store');
Route::get('/client/getdata', [ClientController::class, 'Getclintdata'])->name('Getclintdata');

Route::post('/client/edit/{id} ', [ClientController::class, 'edit'])->name('client.edit');
Route::put('/client/update/{id}', [ClientController::class, 'update'])->name('client.update');



Route::delete('/client/delete/{id}', [ClientController::class, 'destroy'])->name('client.destroy');


// PRODUCT
Route::get('/product', [ProductController::class, 'index'])->name('product');
Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');

//AVTAR_PATH
defined('AVTAR_PATH') or define('AVTAR_PATH', public_path('/backend/avtar'));
defined('AVTAR_ROOT') or define('AVTAR_ROOT', asset('/backend/avtar') . '/');


// PRODUCT_IMAGE
defined('PRODUCT_IMAGE') or define('PRODUCT_IMAGE', public_path('/backend/product-images'));

// LEAVING_CERTIFICATE

defined('LEAVING_CERTIFICATE') or define('LEAVING_CERTIFICATE', public_path('/backend/admission/leaving_certificate'));

//MEDICAL_REPORT
defined('MEDICAL_REPORT') or define('MEDICAL_REPORT', public_path('/backend/admission/medical_report'));

//REPORT_CARD
defined('REPORT_CARD') or define('REPORT_CARD', public_path('/backend/admission/report_card'));
