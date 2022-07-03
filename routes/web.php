<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Models\Product;

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

Route::get('/',[HomeController::class,'index']);
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/redirect',[HomeController::class,'redirect']);
Route::get('/view_categoryB',[AdminController::class,'view_categoryB']);
Route::get('/view_categoryS',[AdminController::class,'view_categoryS']);
Route::get('/add_categoryB',[AdminController::class,'add_categoryB']);
Route::get('/add_categoryS',[AdminController::class,'add_categoryS']);
Route::get('/view_product',[AdminController::class,'view_productB']);
Route::post('/add_product',[AdminController::class,'add_product']);
Route::get('/show_product',[AdminController::class,'show_product']);
Route :: delete('/delete_product/{id}',[AdminController :: class,'delete_product']);
Route :: get('/update_product/{id}',[AdminController :: class,'update_product']);
Route :: post('/update_product_confirm/{id}',[AdminController :: class,'update_product_confirm']);
Route :: get('/customer_orders',[AdminController :: class,'customer_orders']);
Route :: get('/delivered/{id}',[AdminController :: class,'delivered']);
Route :: get('/customer_orders',[AdminController :: class,'customer_orders']);
Route :: get('/update_categoryB/{id}',[AdminController :: class,'update_categoryB']);
Route :: post('/update_category_nameB_confirm/{id}',[AdminController :: class,'update_category_nameB_confirm']);
Route :: delete('/delete_categoryB/{id}',[AdminController :: class,'delete_categoryB']);
Route :: get('/update_categoryS/{id}',[AdminController :: class,'update_categoryS']);
Route :: post('/update_category_nameS_confirm/{id}',[AdminController :: class,'update_category_nameS_confirm']);
Route :: delete('/delete_categoryS/{id}',[AdminController :: class,'delete_categoryS']);
Route :: get('/update_basic',[AdminController :: class,'update_basic']);
Route :: get('/update_sub',[AdminController :: class,'update_sub']);




Route :: get('/products',[HomeController :: class,'product']);
Route :: get('/product_details/{id}',[HomeController :: class,'product_details']);
Route :: post('/add_cart/{id}',[HomeController :: class,'add_cart']);
Route :: get('/show_cart',[HomeController :: class,'show_cart']);
Route :: get('/remove_cart/{id}',[HomeController :: class,'remove_cart']);
Route :: get('/cash_order',[HomeController :: class,'cash_order']);
Route :: get('/search',[HomeController :: class,'search']);
Route :: get('/show_order',[HomeController :: class,'show_order']);
Route :: get('/cancel_order/{id}',[HomeController :: class,'cancel_order']);
Route :: get('/men',[HomeController :: class,'men']);
Route :: get('/women',[HomeController :: class,'women']);
Route :: get('/children',[HomeController :: class,'children']);
Route :: get('/sub',[HomeController :: class,'sub']);
Route :: get('/sub2',[HomeController :: class,'sub2']);
Route :: get('/sub3',[HomeController :: class,'sub3']);
Route :: get('/user_data',[HomeController :: class,'user_data']);
Route :: post('/submit_data',[HomeController :: class,'submit_data']);




