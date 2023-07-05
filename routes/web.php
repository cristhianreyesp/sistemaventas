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


Route::resource('business', 'BusinessesController')->names('business')->only([
    'index', 'update'
]);
Route::resource('categories', 'CategoryController')->names('categories');
Route::resource('subcategories', 'SubcategoryController')->names('subcategories');
Route::resource('brands', 'BrandController')->names('brands');
Route::resource('products', 'ProductController')->names('products');
Route::resource('providers', 'ProviderController')->names('providers');
Route::resource('clients', 'ClientController')->names('clients');
Route::resource('users', 'UserController')->names('users');
Route::resource('roles', 'RoleController')->names('roles');

Route::get('get_products_by_id', 'ProductController@get_products_by_id')->name('get_products_by_id');
Route::get('change_status/products/{product}', 'ProductController@change_status')->name('change.status.products');

//
Route::resource('purchases', 'PurchaseController')->names('purchases')->except([
    'edit', 'update', 'destroy'
]);
Route::get('purchases/pdf/{purchase}', 'PurchaseController@pdf')->name('purchases.pdf');
Route::get('change_status/purchases/{purchase}', 'PurchaseController@change_status')->name('change.status.purchases');
Route::get('reports/reports_cday', 'ReportController@reports_cday')->name('reports.cday');
Route::get('reports/reports_cdate', 'ReportController@reports_cdate')->name('reports.cdate');
Route::post('reports/report_cresults', 'ReportController@report_cresults')->name('report.cresults');

// ventas
Route::resource('sales', 'SaleController')->names('sales')->except([
    'edit', 'update', 'destroy'
]);
Route::get('change_status/sales/{sale}', 'SaleController@change_status')->name('change.status.sales');
Route::get('sales/pdf/{sale}', 'SaleController@pdf')->name('sales.pdf');
Route::get('reports/reports_day', 'ReportController@reports_day')->name('reports.day');
Route::get('reports/reports_date', 'ReportController@reports_date')->name('reports.date');
Route::post('reports/report_results', 'ReportController@report_results')->name('report.results');
//
Route::get('/home', function () {
    return view('home');
});
//
// Auth::routes();
Auth::routes(['register' => false]);
Route::get('/home', 'HomeController@index')->name('home');
