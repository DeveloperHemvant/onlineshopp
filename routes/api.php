<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Vendorapi\VendorController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Auth::routes([
    'verify'=>true
]);
Route::post('/vendorregister',[VendorController::class,'store']);
Route::get('/verifyemail/{token}',[VendorController::class,'verifyemail']);
Route::post('/vendorlogin',[VendorController::class,'vendorlogin']);
