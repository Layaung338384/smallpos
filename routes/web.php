<?php

use App\Livewire\OrderForm;
use App\Livewire\Admin\ProductPage;
use App\Livewire\Admin\AdminPayment;
use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\AdminPaymentPage;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminPaymentController;

Route::get('/', function () {
    return view('login.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('admin/main/dashboard',[AdminController::class,'indexx'])->name('adminDashboard');

//pdf download
Route::get('/admin/orders/download-pdf', [OrderController::class, 'downloadPdf'])->name('orders.downloadPdf');

// Product (admin)
// Route::get('/admin/products', ProductPage::class)->name('products.index');
Route::get('/admin/products', [ProductController::class, 'index'])->name('products.index');
Route::post('/admin/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/admin/products/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
Route::post('/admin/products/update/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/admin/products/delete/{id}', [ProductController::class, 'destroy'])->name('products.destroy');




// Admin Payments
// Route::get('/admin/payments', AdminPayment::class)->name('payments.index');
Route::get('/admin/payments', [AdminPaymentController::class, 'index'])->name('payments.index');
Route::post('/admin/payments', [AdminPaymentController::class, 'store'])->name('payments.store');
Route::get('/admin/payments/destroy/{id}', [AdminPaymentController::class, 'destroy'])->name('payments.destroy');
Route::get('/admin/payments/edit/{id}', [AdminPaymentController::class, 'edit'])->name('payments.edit');
Route::post('/admin/payments/update/{id}', [AdminPaymentController::class, 'update'])->name('payments.update');



// Orders
// Route::get('/admin/orders/create', OrderForm::class)->name('orders.create');
Route::get('/order', [OrderController::class, 'create'])->name('orders.create');
Route::post('/order', [OrderController::class, 'store'])->name('orders.store');

// Admin order list
Route::get('/admin/orders', [OrderController::class, 'index'])->name('orders.index');
Route::delete('/admin/orders/{id}', [OrderController::class, 'destroy'])->name('orders.destroy');



require __DIR__.'/auth.php';
