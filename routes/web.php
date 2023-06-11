<?php

use App\Product;
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

Route::get('/', function() {
    return redirect()->route('login');
});

Route::resource('categories', 'CategoryController')->names('categories');
Route::resource('subcategories', 'SubcategoryController')->names('subcategories');
Route::resource('brands', 'BrandController')->names('brands');
Route::resource('products', 'ProductController')->names('products');
Route::resource('providers', 'ProviderController')->names('providers');
Route::resource('clients', 'ClientController')->names('clients');
Route::resource('users', 'UserController')->names('users');
Route::resource('roles', 'RoleController')->names('roles');
Route::resource('business', 'BusinessController')->names('business')->only([
    'index', 'update'
]);
Route::get('get_products_by_id', 'ProductController@get_products_by_id')->name('get_products_by_id');
Route::get('change_status/products/{product}', 'ProductController@change_status')->name('change.status.products');

//
Route::resource('purchases', 'PurchaseController')->names('purchases')->except([
    'edit', 'update', 'destroy'
]);
Route::get('purchases/pdf/{purchase}', 'PurchaseController@pdf')->name('purchases.pdf');
Route::get('change_status/purchases/{purchase}', 'PurchaseController@change_status')->name('change.status.purchases');

//
Route::resource('sales', 'SaleController')->names('sales')->except([
    'edit', 'update', 'destroy'
]);
Route::get('print_barcode', 'ProductController@print_barcode')->name('print_barcode');
Route::get('/prueba', function () {
    return view('prueba');
});


// Auth::routes();
Auth::routes(['register' => false]);
Route::get('/home', 'HomeController@index')->name('home');
