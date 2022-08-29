<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/report_sender', [App\Http\Controllers\API\MemberController::class, 'report_sender'])->name('Report.Sender');

Route::get('/mission_all', [App\Http\Controllers\API\ProductController::class, 'mission_all'])->name('mission.all');
Route::get('/new_mission', [App\Http\Controllers\API\ProductController::class, 'new_mission'])->name('new.mission');
Route::get('/mission_cancle', [App\Http\Controllers\API\ProductController::class, 'mission_cancle'])->name('mission.cancle');
Route::get('/mission_submit', [App\Http\Controllers\API\ProductController::class, 'mission_submit'])->name('mission.submit');
Route::get('/mission_reject', [App\Http\Controllers\API\ProductController::class, 'mission_reject'])->name('mission.reject');
Route::get('/mission_fail', [App\Http\Controllers\API\ProductController::class, 'mission_fail'])->name('mission.fail');
Route::get('/mission_complete', [App\Http\Controllers\API\ProductController::class, 'mission_complete'])->name('mission.complete');

Route::post('/mission/update/{id}', [App\Http\Controllers\API\MemberController::class, 'mission_update'])->name('mission.update');

Route::get('/mission/detail/{id}', [App\Http\Controllers\API\MemberController::class, 'mission_detail'])->name('mission.detail');
Route::get('/mission/basket/detail/{id}', [App\Http\Controllers\API\MemberController::class, 'mission_basket_detail'])->name('mission.basket.detail');

Route::get('/products', [App\Http\Controllers\API\ProductController::class, 'products'])->name('products');
Route::get('/product-types', [App\Http\Controllers\API\ProductController::class, 'product_types'])->name('product.types');
Route::get('/product-type-detail/{product_type_id}', [App\Http\Controllers\API\ProductController::class, 'product_type_detail'])->name('product.type.detail');
Route::get('/product-select-type/{product_type_id}', [App\Http\Controllers\API\ProductController::class, 'product_select_type'])->name('product.select.type');

Route::get('/giver/show', [App\Http\Controllers\API\MemberController::class, 'giver_show'])->name('giver.show');
Route::get('/reciever/show', [App\Http\Controllers\API\MemberController::class, 'reciever_show'])->name('reciever.show');
Route::get('/sender/show', [App\Http\Controllers\API\MemberController::class, 'sender_show'])->name('sender.show');
Route::post('/member/store', [App\Http\Controllers\API\MemberController::class, 'store'])->name('member.store');
Route::put('/member/update/{member_id}', [App\Http\Controllers\API\MemberController::class, 'update'])->name('member.update');
Route::delete('/member/delete/{member_id}', [App\Http\Controllers\API\MemberController::class, 'delete'])->name('member.delete');

Route::get('/product/show', [App\Http\Controllers\API\ProductController::class, 'product_show'])->name('product.show');
Route::get('/product/detail/{product_id}', [App\Http\Controllers\API\ProductController::class, 'product_detail'])->name('product.detail');
Route::post('/product/store', [App\Http\Controllers\API\ProductController::class, 'prod_store'])->name('prod.store');
Route::put('/product/update/{product_id}', [App\Http\Controllers\API\ProductController::class, 'prod_update'])->name('prod.update');
Route::delete('/product/delete/{product_id}', [App\Http\Controllers\API\ProductController::class, 'prod_delete'])->name('prod.delete');

Route::get('/product_type/show', [App\Http\Controllers\API\ProductController::class, 'product_type_show'])->name('product_type.show');
Route::post('/product_type/store', [App\Http\Controllers\API\ProductController::class, 'prod_type_store'])->name('prod_type.store');
Route::put('/product_type/update/{product_type_id}', [App\Http\Controllers\API\ProductController::class, 'prod_type_update'])->name('prod_type.update');
Route::delete('/product_type/delete/{product_type_id}', [App\Http\Controllers\API\ProductController::class, 'prod_type_delete'])->name('prod_type.delete');

Route::get('/donate/show', [App\Http\Controllers\API\ProductController::class, 'donate_show'])->name('donate.show');
Route::post('/donate/store', [App\Http\Controllers\API\ProductController::class, 'donate_store'])->name('donate.store');
Route::put('/donate/update/{id}', [App\Http\Controllers\API\ProductController::class, 'donate_update'])->name('donate.update');
Route::delete('/donate/delete/{id}', [App\Http\Controllers\API\ProductController::class, 'donate_delete'])->name('donate.delete');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
