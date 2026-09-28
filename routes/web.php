<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('login');
});


/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {

    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegister'])
        ->name('register');

    Route::post('/register', [AuthController::class, 'register']);

});


Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');


/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');


/*
|--------------------------------------------------------------------------
| Owner & Admin
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:owner,admin'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Categories
    |--------------------------------------------------------------------------
    */

    Route::resource('categories', CategoryController::class)
        ->except(['show']);


    /*
    |--------------------------------------------------------------------------
    | Products
    |--------------------------------------------------------------------------
    */

    Route::resource('products', ProductController::class)
        ->except(['show']);


    /*
    |--------------------------------------------------------------------------
    | Suppliers
    |--------------------------------------------------------------------------
    */

    Route::resource('suppliers', SupplierController::class)
        ->except(['show']);


    /*
    |--------------------------------------------------------------------------
    | Purchases
    |--------------------------------------------------------------------------
    */

    Route::resource('purchases', PurchaseController::class)
        ->only([
            'index',
            'create',
            'store',
            'show'
        ]);


    /*
    |--------------------------------------------------------------------------
    | Expenses
    |--------------------------------------------------------------------------
    */

    Route::resource('expenses', ExpenseController::class)
        ->only([
            'index',
            'create',
            'store',
            'show',
            'destroy'
        ]);


    /*
    |--------------------------------------------------------------------------
    | Reports
    |--------------------------------------------------------------------------
    */

    Route::get('/reports/sales', [ReportController::class, 'sales'])
        ->name('reports.sales');

    Route::get('/reports/expenses', [ReportController::class, 'expenses'])
        ->name('reports.expenses');

    Route::get('/reports/stock', [ReportController::class, 'stock'])
        ->name('reports.stock');

    Route::get('/reports/purchases', [ReportController::class, 'purchases'])
        ->name('reports.purchases');
        Route::get('/reports/profit-loss', [ReportController::class, 'profitLoss'])
    ->name('reports.profit-loss');

});


/*
|--------------------------------------------------------------------------
| Sales
|--------------------------------------------------------------------------
|
| Owner, Admin, dan Kasir dapat melakukan transaksi penjualan.
|
*/

Route::middleware('auth')->group(function () {

    Route::resource('sales', SaleController::class)
        ->only([
            'index',
            'create',
            'store',
            'show'
        ]);

});