<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\TableController;
use App\Models\Order;
use App\Models\Table;
use Illuminate\Support\Facades\Route;


Route::get('/',[PageController::class,'showlogin']);
Route::get('/login', function () {
    return view('home');
});
Route::post('/login',[AuthController::class,'Postlogin']);
Route::get('/logout',[AuthController::class,'logout']);

//TableJoin / Split
Route::post('/maxtable',[TableController::class,'join']);
Route::get('/delete/{slug}',[TableController::class,'delete']);


//food menu
Route::get('/table/{slug}',[TableController::class,'menu']);

//orders
Route::get('/order/{slug}',[OrderController::class,'orderadd']);
Route::get('/ordertable',[OrderController::class,'orderdetail']);
Route::get('/table/{id}/{slug}/jointable/{jslug}',[TableController::class,'tabledetail']);

Route::get('/add-quantity/{slug}',[OrderController::class,'addqty']);
Route::get('/remove-quantity/{slug}',[OrderController::class,'removeqty']);
Route::get('/checkout/{slug}/{tslug}',[OrderController::class,'checkout']);

