<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('volumes',[\App\Http\Controllers\VolumeController::class,'index'])->name('volumes');
Route::post('volumes',[\App\Http\Controllers\VolumeController::class,'store'])->name('store_volume');
Route::get('fetch-volumes', [\App\Http\Controllers\VolumeController::class, 'fetch'])->name('fetch_volume');
Route::get('edit-volume/{id}', [\App\Http\Controllers\VolumeController::class, 'edit'])->name('edit_volume');
Route::put('update-volume/{id}', [\App\Http\Controllers\VolumeController::class, 'update'])->name('update_volume');
Route::post('delete-volume/{id}', [\App\Http\Controllers\VolumeController::class, 'destroy'])->name('destroy_volume');

Route::get('type',[\App\Http\Controllers\TypeController::class,'index'])->name('types');
Route::post('types',[\App\Http\Controllers\TypeController::class,'store'])->name('store_type');
Route::get('fetch-types', [\App\Http\Controllers\TypeController::class, 'fetch'])->name('fetch_type');
Route::post('delete-type/{id}', [\App\Http\Controllers\TypeController::class, 'destroy'])->name('destroy_type');


Route::get('product',[\App\Http\Controllers\ProductController::class,'index']);
Route::post('products',[\App\Http\Controllers\ProductController::class,'store']);
Route::get('fetch-products', [\App\Http\Controllers\ProductController::class, 'fetch_product']);
Route::post('delete-products/{id}', [\App\Http\Controllers\ProductController::class, 'destroy_product']);


Route::get('area',[\App\Http\Controllers\AreaController::class,'index']);
Route::post('areas',[\App\Http\Controllers\AreaController::class,'store']);
Route::get('fetch-areas', [\App\Http\Controllers\AreaController::class, 'fetch_area']);
Route::post('delete-areas/{id}', [\App\Http\Controllers\AreaController::class, 'destroy_area']);


Route::get('distributor',[\App\Http\Controllers\DistributorController::class,'index']);
Route::post('distributors',[\App\Http\Controllers\DistributorController::class,'store']);
Route::get('fetch-distributors', [\App\Http\Controllers\DistributorController::class, 'fetch_distributor']);
Route::post('delete-distributors/{id}', [\App\Http\Controllers\DistributorController::class, 'destroy_distributor']);


Route::get('owner',[\App\Http\Controllers\OwnerController::class,'index']);
Route::post('owners',[\App\Http\Controllers\OwnerController::class,'store']);
Route::get('fetch-owners', [\App\Http\Controllers\OwnerController::class, 'fetch_owner']);
Route::post('delete-owners/{id}', [\App\Http\Controllers\OwnerController::class, 'destroy_owner']);

Route::get('packaging',[\App\Http\Controllers\PackagingController::class,'index']);
Route::post('packagings',[\App\Http\Controllers\PackagingController::class,'store']);
Route::get('fetch-packagings', [\App\Http\Controllers\PackagingController::class, 'fetch_packaging']);
Route::post('delete-packagings/{id}', [\App\Http\Controllers\PackagingController::class, 'destroy_packaging']);



Route::get('salesman',[\App\Http\Controllers\SalesmanController::class,'index']);
Route::post('salesmans',[\App\Http\Controllers\SalesmanController::class,'store']);
Route::get('fetch-salesmans', [\App\Http\Controllers\SalesmanController::class, 'fetch_salesman']);
Route::post('delete-salesmans/{id}', [\App\Http\Controllers\SalesmanController::class, 'destroy_salesman']);







