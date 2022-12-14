<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [App\Http\Controllers\API\LoginController::class, 'login']);
Route::get('/profile', [App\Http\Controllers\API\MemberController::class, 'profile'])->name('profile');
Route::post('/update-profile', [App\Http\Controllers\API\MemberController::class, 'update_profile'])->name('update.profile');
Route::post('/update-password', [App\Http\Controllers\API\MemberController::class, 'update_password'])->name('update.password');
Route::get('/logout', [App\Http\Controllers\API\LoginController::class, 'logout']);

Route::get('/mission_report', [App\Http\Controllers\API\MemberController::class, 'mission_report'])->name('mission.report');
Route::get('/mission_all', [App\Http\Controllers\API\MemberController::class, 'mission_all'])->name('mission.all');
Route::get('/new_mission', [App\Http\Controllers\API\MemberController::class, 'new_mission'])->name('new.mission');
Route::get('/mission_cancle', [App\Http\Controllers\API\MemberController::class, 'mission_cancle'])->name('mission.cancle');
Route::get('/mission_submit', [App\Http\Controllers\API\MemberController::class, 'mission_submit'])->name('mission.submit');
Route::get('/mission_reject', [App\Http\Controllers\API\MemberController::class, 'mission_reject'])->name('mission.reject');
Route::get('/mission_fail', [App\Http\Controllers\API\MemberController::class, 'mission_fail'])->name('mission.fail');
Route::get('/mission_complete', [App\Http\Controllers\API\MemberController::class, 'mission_complete'])->name('mission.complete');
Route::post('/update-status-sender', [App\Http\Controllers\API\MemberController::class, 'update_status_sender'])->name('update.status.sender');
Route::post('/mission/update', [App\Http\Controllers\API\MemberController::class, 'mission_update'])->name('mission.update');
Route::get('/mission/detail', [App\Http\Controllers\API\MemberController::class, 'mission_detail'])->name('mission.detail');
Route::get('/mission/basket/detail', [App\Http\Controllers\API\MemberController::class, 'mission_basket_detail'])->name('mission.basket.detail');

Route::post('/product/store', [App\Http\Controllers\API\ProductController::class, 'product_store'])->name('product.store');
Route::get('/my-donate-product', [App\Http\Controllers\API\ProductController::class, 'my_donate_product'])->name('my.donate.product');
Route::get('/my-donate-product-cancle/{product_id}', [App\Http\Controllers\API\ProductController::class, 'my_donate_product_cancle'])->name('my.donate.product.cancle');

Route::get('/product-types', [App\Http\Controllers\API\ProductController::class, 'product_types'])->name('product.types');
Route::get('/product-type-detail', [App\Http\Controllers\API\ProductController::class, 'product_type_detail'])->name('product.type.detail');
Route::get('/product-select-type', [App\Http\Controllers\API\ProductController::class, 'product_select_type'])->name('product.select.type');
Route::get('/products', [App\Http\Controllers\API\ProductController::class, 'products'])->name('products');
Route::get('/product-detail', [App\Http\Controllers\API\ProductController::class, 'product_detail'])->name('product.detail');
Route::get('/donate-product-detail', [App\Http\Controllers\API\ProductController::class, 'donate_product_detail'])->name('donate.product.detail');


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
