<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/welcome', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);

Route::group(['middleware' => 'auth:member'], function () {

Route::get('/', [App\Http\Controllers\MemberController::class, 'Dashboard'])->name('Dashboard');

Route::get('/my-profile', [App\Http\Controllers\MemberController::class, 'my_profile'])->name('my.profile');

Route::put('/update-myprofile/{member_id}', [App\Http\Controllers\MemberController::class, 'update_profile'])->name('update.myprofile');
Route::put('/update-mypassword/{member_id}', [App\Http\Controllers\MemberController::class, 'update_password'])->name('update.mypassword');

Route::post('/check/donate', [App\Http\Controllers\ProductController::class, 'check_donate'])->name('check.donate');
Route::put('/sender/update/{member_id}', [App\Http\Controllers\MemberController::class, 'sender_update'])->name('sender.update');

Route::get('/giver/show', [App\Http\Controllers\MemberController::class, 'giver_show'])->name('giver.show');
Route::get('/reciever/show', [App\Http\Controllers\MemberController::class, 'reciever_show'])->name('reciever.show');
Route::get('/sender/show', [App\Http\Controllers\MemberController::class, 'sender_show'])->name('sender.show');
Route::post('/member/store', [App\Http\Controllers\MemberController::class, 'store'])->name('member.store');
Route::put('/member/update/{member_id}', [App\Http\Controllers\MemberController::class, 'update'])->name('member.update');
Route::delete('/member/delete/{member_id}', [App\Http\Controllers\MemberController::class, 'delete'])->name('member.delete');

Route::get('/products', [App\Http\Controllers\ProductController::class, 'products'])->name('products');

Route::get('/product/show', [App\Http\Controllers\ProductController::class, 'product_show'])->name('product.show');
Route::get('/product/detail/{product_id}', [App\Http\Controllers\ProductController::class, 'product_detail'])->name('product.detail');
Route::post('/product/store', [App\Http\Controllers\ProductController::class, 'prod_store'])->name('prod.store');
Route::put('/product/update/{product_id}', [App\Http\Controllers\ProductController::class, 'prod_update'])->name('prod.update');
Route::delete('/product/delete/{product_id}', [App\Http\Controllers\ProductController::class, 'prod_delete'])->name('prod.delete');

Route::get('/product_types/{product_type_id}', [App\Http\Controllers\ProductController::class, 'product_types'])->name('product_types');

Route::get('/product_type/show', [App\Http\Controllers\ProductController::class, 'product_type_show'])->name('product_type.show');
Route::post('/product_type/store', [App\Http\Controllers\ProductController::class, 'prod_type_store'])->name('prod_type.store');
Route::put('/product_type/update/{product_type_id}', [App\Http\Controllers\ProductController::class, 'prod_type_update'])->name('prod_type.update');
Route::delete('/product_type/delete/{product_type_id}', [App\Http\Controllers\ProductController::class, 'prod_type_delete'])->name('prod_type.delete');

Route::get('/donate/show', [App\Http\Controllers\ProductController::class, 'donate_show'])->name('donate.show');
Route::post('/donate/store', [App\Http\Controllers\ProductController::class, 'donate_store'])->name('donate.store');
Route::put('/donate/update/{id}', [App\Http\Controllers\ProductController::class, 'donate_update'])->name('donate.update');
Route::get('/donate/cancle/{id}', [App\Http\Controllers\ProductController::class, 'donate_cancle'])->name('donate.cancle');
Route::delete('/donate/delete/{id}', [App\Http\Controllers\ProductController::class, 'donate_delete'])->name('donate.delete');

Route::get('/basket/show', [App\Http\Controllers\ProductController::class, 'basket_show'])->name('basket.show');
Route::post('/basket/store', [App\Http\Controllers\ProductController::class, 'basket_store'])->name('basket.store');
Route::put('/basket/update/{id}', [App\Http\Controllers\ProductController::class, 'basket_update'])->name('basket.update');
Route::delete('/basket/delete/{id}', [App\Http\Controllers\ProductController::class, 'basket_delete'])->name('basket.delete');

Route::get('/my/mission', [App\Http\Controllers\MemberController::class, 'my_mission'])->name('my.mission');
Route::get('/mission/detail/{id}', [App\Http\Controllers\MemberController::class, 'mission_detail'])->name('mission.detail');
Route::put('/mission/update/{id}', [App\Http\Controllers\MemberController::class, 'mission_update'])->name('mission.update');

Route::get('/my/donate', [App\Http\Controllers\MemberController::class, 'my_donate'])->name('my.donate');
Route::get('/cancle/donate/{product_id}', [App\Http\Controllers\ProductController::class, 'cancle_donate'])->name('cancle.donate');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

});