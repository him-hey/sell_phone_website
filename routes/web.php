<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// admin route
Route::get('/admin_login', function () {
    return view('admin/admin_login');
});
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'checklogin'])->name('admin');

// Product route
Route::get('/product', [App\Http\Controllers\ProductController::class, 'index'])->name('product');
// Prefex route 
Route::prefix('products')->group(function () {
    Route::get('create', [App\Http\Controllers\ProductController::class, 'create'])->name('create');
    Route::post('store', [App\Http\Controllers\ProductController::class, 'store'])->name('store');
    Route::get('{id}/edit', [App\Http\Controllers\ProductController::class, 'edit'])->name('edit');
    Route::patch('{id}/update', [App\Http\Controllers\ProductController::class, 'update'])->name('update');
    Route::delete('/destroy/{id}', [\App\Http\Controllers\ProductController::class, 'destroy'])->name('destroy');
});
// send mail to admin
Route::get('send-mail', function () {
   
    $details = [
        'title' => 'Customer request to buy Software!',
        'body' => 'This is for testing email using smtp'
    ];
   
    \Mail::to('sellsoftware9@gmail.com')->send(new \App\Mail\MyMail($details));
   
    dd("Email is Sent.");

});
// Api get product
Route::get('/product_api', [App\Http\Controllers\ProductController::class, 'productList'])->name('product');
