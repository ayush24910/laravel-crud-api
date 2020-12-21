<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productController;
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
Route::get('/datatable',[productController::class,'index']);
Route::get('/import-form',[productController::class,'importForm']);
Route::post('/import',[productController::class,'import'])->name('employee.import');
Route::get('/export-excel',[productController::class,'exportIntoExcel']);
Route::get('/export-csv',[productController::class,'exportIntoCSV']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/users', [productController::class,'index'])->name('users.index');
