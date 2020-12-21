<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get("product",[productController::class,'getData']);
Route::post("add",[productController::class,'add']);
Route::put("update",[productController::class,'update']);
Route::delete("delete/{id}",[productController::class,'delete']);
Route::get("search/{title}",[productController::class,'getDataTitle']);
Route::get("search/{id}",[productController::class,'getDataId']);
Route::get("filter/{min}/{max}",[productController::class,'filter']);
Route::get('/import-form',[productController::class,'importForm']);
Route::post('/import',[productController::class,'import'])->name('employee.import');
Route::get('/export-excel',[productController::class,'exportIntoExcel']);
Route::get('/export-csv',[productController::class,'exportIntoCSV']);