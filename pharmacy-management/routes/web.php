<?php
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\dashboardcontroller;
use App\Http\Controllers\Pagecontroller;
use App\Http\Controllers\pharmaciancontroller;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\ispharmacist;

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






















});

require __DIR__.'/auth.php';


