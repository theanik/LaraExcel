<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Customer -- Export
Route::get('customer', 'CustomerController@index');

Route::get('customer_exprot_all', 'CustomerController@export_all')->name("export_all");
Route::get('customer_exprot_view', 'CustomerController@export_view')->name("export_view");

Route::get('customer_exprot_format/{format}', 'CustomerController@export_format')->name("export_format");

Route::get('customer_exprot_multipe_sheets', 'CustomerController@exprot_multipe_sheets')->name("exprot_multipe_sheets");

Route::get('customer_with_heading_and_chunk', 'CustomerController@export_headings')->name("export_headings");
Route::get('export_customer_sale', 'CustomerController@export_customer_sale')->name('export_customer_sale');
Route::get('export_customer_sale_total', 'CustomerController@export_customer_sale_total')->name('export_customer_sale_total');

// Customer -- Import

Route::post('customer_import','CustomerController@customer_import')->name('customer_import');