<?php
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\dashboardcontroller;
use App\Http\Controllers\Pagecontroller;
use App\Http\Controllers\pharmaciancontroller;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\ispharmacist;

use App\Http\Controllers\InventoryController;

Route::get('login/google', [LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('auth/google/callback', [LoginController::class, 'handleGoogleCallback']);
Route::get('/',[Pagecontroller::class,'home'])->name('home');

/**pharmacist panel**/
Route::middleware([ispharmacist::class])->group(function(){
    Route::get('/pharmacist/dashboard',[dashboardcontroller::class,'dashboard'])->name('pharmacist.dashboard');
//user management
Route::get('/pharmacist/user',[pharmaciancontroller::class,'userindex'])->name('pharmacist.user.userindex');
Route::get('user/{id}/useredit',[pharmaciancontroller::class,'useredit'])->name('pharmacist.user.useredit');
Route::post('user/{id}/userupdate',[pharmaciancontroller::class,'userupdate'])->name('pharmacist.user.userupdate');
Route::get('user/{id}/userdelete',[pharmaciancontroller::class,'userdelete'])->name('pharmacist.user.userdelete');    

//patient management
Route::get('/patientmngt',[pharmaciancontroller::class,'patientindex'])->name('pharmacist.patientmngt.patientindex');
Route::get('patientmngt-create',[pharmaciancontroller::class,'patientcreate'])->name('pharmacist.patientmngt.patientcreate');
Route::post('/patientmngt/store',[pharmaciancontroller::class,'patientstore'])->name('pharmacist.patientmngt.patientstore');
Route::get('/patientmngt/{id}/patientedit',[pharmaciancontroller::class,'patientedit'])->name('pharmacist.patientmngt.patientedit');
Route::post('/patientmngt/{id}/patientupdate',[pharmaciancontroller::class,'patientupdate'])->name('pharmacist.patientmngt.patientupdate');
Route::get('/patientmngt/{id}/patientdelete',[pharmaciancontroller::class,'patientdelete'])->name('pharmacist.patientmngt.patientdelete');

//medicine management
Route::get('/medicinemngt',[pharmaciancontroller::class,'medindex'])->name('pharmacist.medicinemngt.medindex');
Route::get('medicinemngt-create',[pharmaciancontroller::class,'medcreate'])->name('pharmacist.medicinemngt.medcreate');
Route::post('/medicinemngt/store',[pharmaciancontroller::class,'medstore'])->name('pharmacist.medicinemngt.medstore');
Route::get('/medicinemngt/{id}/mededit',[pharmaciancontroller::class,'mededit'])->name('pharmacist.medicinemngt.mededit');
Route::post('/medicinemngt/{id}/medupdate',[pharmaciancontroller::class,'medupdate'])->name('pharmacist.medicinemngt.medupdate');
Route::get('/medicinemngt/{id}/meddelete',[pharmaciancontroller::class,'meddelete'])->name('pharmacist.medicinemngt.meddelete');

//prescription detail 
Route::get('/prescriptiondetail', [PharmacianController::class, 'prescribeindex'])->name('pharmacist.prescriptiondetail.prescribeindex');
Route::get('/prescriptiondetail/create', [PharmacianController::class, 'prescribecreate'])->name('pharmacist.prescriptiondetail.prescribecreate');
Route::post('/prescriptiondetail/store', [PharmacianController::class, 'prescribestore'])->name('pharmacist.prescriptiondetail.prescribestore');
Route::get('/prescriptiondetail/{id}/prescribeedit', [PharmacianController::class, 'prescribeedit'])->name('pharmacist.prescriptiondetail.prescribeedit');
Route::post('/prescriptiondetail/{id}/prescribeupdate', [PharmacianController::class, 'prescribeupdate'])->name('pharmacist.prescriptiondetail.prescribeupdate'); // Change to PUT
Route::get('/prescriptiondetail/{id}/prescribedelete', [PharmacianController::class, 'prescribedelete'])->name('pharmacist.prescriptiondetail.prescribedelete');
Route::get('pharmacist/prescriptiondetail/{id}', [pharmaciancontroller::class, 'show'])->name('pharmacist.prescriptiondetail.show');



//prescription
Route::get('/prescriptions', [PrescriptionController::class, 'index'])->name('pharmacist.prescriptions.index'); // List all prescriptions
Route::get('/create', [PrescriptionController::class, 'create'])->name('pharmacist.prescriptions.create'); // Show create prescription form
Route::post('/store', [PrescriptionController::class, 'store'])->name('pharmacist.prescriptions.store'); // Store a new prescription
Route::get('/edit/{id}', [PrescriptionController::class, 'edit'])->name('pharmacist.prescriptions.edit'); // Show edit form for a prescription
Route::post('/update/{id}', [PrescriptionController::class, 'update'])->name('pharmacist.prescriptions.update'); // Update an existing prescription
Route::DELETE('/delete/{id}', [PrescriptionController::class, 'delete'])->name('pharmacist.prescriptions.delete'); // Delete a prescription



Route::get('/', [InventoryController::class, 'index'])->name('pharmacist.inventory.index');
Route::get('/create', [InventoryController::class, 'create'])->name('pharmacist.inventory.create');
Route::post('/store', [InventoryController::class, 'store'])->name('pharmacist.inventory.store');
Route::get('/edit/{id}', [InventoryController::class, 'edit'])->name('pharmacist.inventory.edit');
Route::put('/update/{id}', [InventoryController::class, 'update'])->name('pharmacist.inventory.update');
Route::delete('/delete/{id}', [InventoryController::class, 'delete'])->name('pharmacist.inventory.delete');
Route::get('/low-stock', [InventoryController::class, 'lowStock'])->name('pharmacist.inventory.lowStock'); // New route for low stock items
Route::get('/search', [InventoryController::class, 'search'])->name('pharmacist.inventory.search'); // New route for searching inventory











});

require __DIR__.'/auth.php';


