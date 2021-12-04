<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::get('/orders', function () {
   return Inertia::render('Orders/Index');
})->name('orders');
Route::get('/customers', function () {
   return Inertia::render('Customers/Index');
})->name('customers');
Route::get('/products', function () {
   return Inertia::render('Products/Index');
})->name('products');
Route::get('/statistics', function () {
   return "Here is the statistics.";
})->name('statistics');
Route::get('/discounts', function () {
   return "Here is the discounts.";
})->name('discounts');
Route::get('/settings', function () {
   return "Here is the settings.";
})->name('settings');

Route::get('/products/test', function () {
    return Inertia::render('Shop/ViewProduct');
});
Route::get('/shop', function () {
    return Inertia::render('Shop/Home');
})->name('shop');
