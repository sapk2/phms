<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\cartController;
use App\Http\Controllers\dashboardcontroller;
use App\Http\Controllers\Pagecontroller;
use App\Http\Controllers\pharmaciancontroller;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\ispharmacist;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SalesController;
use Illuminate\Routing\Route as RoutingRoute;

Route::get('login/google', [LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('auth/google/callback', [LoginController::class, 'handleGoogleCallback']);
// Route::get('/', [Pagecontroller::class, 'home'])->name('home');
Route::get('/', [Pagecontroller::class, 'index'])->name('index');
Route::get('/products', [PageController::class, 'product'])->name('products');
Route::get('/about', [PageController::class, 'about'])->name('about');
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


//inventory
Route::get('/inventory',[InventoryController::class,'index'])->name('pharmacist.inventory.index');
Route::get('/inventory-create',[InventoryController::class,'create'])->name('pharmacist.inventory.create');
Route::post('/inventory/store',[InventoryController::class,'store'])->name('pharmacist.inventory.store');
Route::get('/inventory/{id}/edit',[InventoryController::class,'edit'])->name('pharmacist.inventory.edit');
Route::post('/inventory/{id}/update', [InventoryController::class, 'update'])->name('pharmacist.inventory.update');
Route::get('/inventory/{id}/delete',[InventoryController::class,'delete'])->name('pharmacist.inventory.delete');


// Route for low stock items
Route::get('/inventory/low-stock', [InventoryController::class, 'lowStock'])->name('pharmacist.inventory.low_stock');

// Route for inventory search
Route::get('/inventory/search', [InventoryController::class, 'search'])->name('pharmacist.inventory.search');


Route::get('/sales', [SalesController::class,'index'])->name('pharmacist.sales.index'); // This handles all the CRUD operations for sales
Route::get('/sales-create',[SalesController::class,'create'])->name('pharmacist.sales.create');
Route::post('/sales/store',[SalesController::class,'store'])->name('pharmacist.sales.store');
Route::get('/sales/{id}',[SalesController::class,'show'])->name('pharmacist.sales.show');
Route::get('/sales/{id}/edit', [SalesController::class, 'edit'])->name('pharmacist.sales.edit');

// Update an existing sale
Route::put('/sales/{id}', [SalesController::class, 'update'])->name('pharmacist.sales.update');

// Delete a sale
Route::delete('/sales/{id}', [SalesController::class, 'destroy'])->name('pharmacist.sales.destroy');


//site_setting
// Route to display the edit settings form
Route::get('/settings/edit', [pharmaciancontroller::class, 'siteedit'])->name('pharmacist.settings.siteedit');

// Route to handle the form submission for updating settings
Route::post('/settings/update', [pharmaciancontroller::class, 'siteupdate'])->name('pharmacist.settings.siteupdate');



//about
Route::get('/admin/about', [AboutUsController::class, 'index'])->name('pharmacist.about.index');
    Route::put('/admin/about', [AboutUsController::class, 'update'])->name('pharmacist.about.update');
   


//carts
Route::post('cart/store',[cartController::class,'store'])->name('pharmacist.cart.store');
Route::get('mycart',[CartController::class,'mycart'])->name('pharmacist.mycart');
Route::get('cart/{id}/destroy',[CartController::class,'destroy'])->name('pharmacist.cart.destroy');
// Show checkout page
Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');

// Confirm and place the order
Route::post('/order/confirm', [OrderController::class, 'confirmOrder'])->name('order.confirm');

// Show all orders
Route::get('/orders', [OrderController::class, 'index'])->name('pharmacist.orders.index');

// Update order status
Route::post('/orders/{id}/status/{status}', [OrderController::class, 'status'])->name('orders.status');
});

require __DIR__.'/auth.php';


