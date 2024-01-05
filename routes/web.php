<?php

use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('welcome');

Route::get('area',[\App\Http\Controllers\AreaController::class,'index']);
Route::post('areas',[\App\Http\Controllers\AreaController::class,'store']);
Route::get('fetch-areas', [\App\Http\Controllers\AreaController::class, 'fetch_area']);
Route::get('edit-areas/{id}', [\App\Http\Controllers\AreaController::class, 'edit_area']);
Route::put('update-areas/{id}', [\App\Http\Controllers\AreaController::class, 'update_area']);
Route::post('delete-areas/{id}', [\App\Http\Controllers\AreaController::class, 'destroy_area']);


Route::get('distributor',[\App\Http\Controllers\DistributorController::class,'index']);
Route::post('distributors',[\App\Http\Controllers\DistributorController::class,'store']);
Route::get('fetch-distributors', [\App\Http\Controllers\DistributorController::class, 'fetch_distributor']);
Route::get('edit-distributors/{id}', [\App\Http\Controllers\DistributorController::class, 'edit_distributor']);
Route::put('update-distributors/{id}', [\App\Http\Controllers\DistributorController::class, 'update_distributor']);
Route::post('delete-distributors/{id}', [\App\Http\Controllers\DistributorController::class, 'destroy_distributor']);


Route::get('owner',[\App\Http\Controllers\OwnerController::class,'index']);
Route::post('owners',[\App\Http\Controllers\OwnerController::class,'store']);
Route::get('fetch-owners', [\App\Http\Controllers\OwnerController::class, 'fetch_owner']);
Route::get('edit-owners/{id}', [\App\Http\Controllers\OwnerController::class, 'edit_owner']);
Route::put('update-owners/{id}', [\App\Http\Controllers\OwnerController::class, 'update_owner']);
Route::post('delete-owners/{id}', [\App\Http\Controllers\OwnerController::class, 'destroy_owner']);

Route::get('packaging',[\App\Http\Controllers\PackagingController::class,'index']);
Route::post('packagings',[\App\Http\Controllers\PackagingController::class,'store']);
Route::get('fetch-packagings', [\App\Http\Controllers\PackagingController::class, 'fetch_packaging']);
Route::get('edit-packagings/{id}', [\App\Http\Controllers\PackagingController::class, 'edit_packaging']);
Route::put('update-packagings/{id}', [\App\Http\Controllers\PackagingController::class, 'update_packaging']);
Route::post('delete-packagings/{id}', [\App\Http\Controllers\PackagingController::class, 'destroy_packaging']);


Route::get('product',[\App\Http\Controllers\ProductController::class,'index']);
Route::post('products',[\App\Http\Controllers\ProductController::class,'store']);
Route::get('fetch-products', [\App\Http\Controllers\ProductController::class, 'fetch_product']);
Route::get('edit-products/{id}', [\App\Http\Controllers\ProductController::class, 'edit_product']);
Route::put('update-products/{id}', [\App\Http\Controllers\ProductController::class, 'update_product']);
Route::post('delete-products/{id}', [\App\Http\Controllers\ProductController::class, 'destroy_product']);


Route::get('salesman',[\App\Http\Controllers\SalesmanController::class,'index']);
Route::post('salesmans',[\App\Http\Controllers\SalesmanController::class,'store']);
Route::get('fetch-salesmans', [\App\Http\Controllers\SalesmanController::class, 'fetch_salesman']);
Route::get('edit-salesmans/{id}', [\App\Http\Controllers\SalesmanController::class, 'edit_salesman']);
Route::put('update-salesmans/{id}', [\App\Http\Controllers\SalesmanController::class, 'update_salesman']);
Route::post('delete-salesmans/{id}', [\App\Http\Controllers\SalesmanController::class, 'destroy_salesman']);


Route::get('type',[\App\Http\Controllers\TypeController::class,'index']);
Route::post('types',[\App\Http\Controllers\TypeController::class,'store']);
Route::get('fetch-types', [\App\Http\Controllers\TypeController::class, 'fetch_type']);
Route::get('edit-types/{id}', [\App\Http\Controllers\TypeController::class, 'edit_type']);
Route::put('update-types/{id}', [\App\Http\Controllers\TypeController::class, 'update_type']);
Route::post('delete-types/{id}', [\App\Http\Controllers\TypeController::class, 'destroy_type']);


Route::get('volume',[\App\Http\Controllers\VolumeController::class,'index']);
Route::post('volumes',[\App\Http\Controllers\VolumeController::class,'store']);
Route::get('fetch-volumes', [\App\Http\Controllers\VolumeController::class, 'fetch_volume']);
Route::get('edit-volumes/{id}', [\App\Http\Controllers\VolumeController::class, 'edit_volume']);
Route::put('update-volumes/{id}', [\App\Http\Controllers\VolumeController::class, 'update_volume']);
Route::post('delete-volumes/{id}', [\App\Http\Controllers\VolumeController::class, 'destroy_volume']);

