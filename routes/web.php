<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\VendorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

////Admin Login Route
Route::get('admin/login',[AdminController::class,'login']);
Route::post('admin/login',[AdminController::class,'adminlogin']);
Route::group(['middleware'=>'admin_auth'],function(){
    Route::get('admin/dashboard',[AdminController::class,'dashboard']);
    Route::get('admin/category',[CategoryController::class,'category']);
    Route::post('admin/category_add',[CategoryController::class,'category_add']);
    Route::get('admin/show_category',[CategoryController::class,'category_show']);
    Route::get('admin/category/delete/{id}',[CategoryController::class,'destroy']);
    Route::get('admin/category/update/{id}',[CategoryController::class,'edit']);
    Route::get('admin/sub_category',[CategoryController::class,'sub_category']);
    Route::post('admin/sub_category_add',[CategoryController::class,'sub_category_add']);
    Route::get('admin/show_sub_category',[CategoryController::class,'show_sub_category']);



    Route::get('admin/logout',[AdminController::class,'logout']);

});
///routes for vendor 
Route::get('/vendor/registration', function () {
    return view('vendor.vendor_register');
});
