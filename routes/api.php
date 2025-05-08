<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\notificationProductController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\UserController;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('home',[ProductController::class,'search']);
Route::post('home',[ProductController::class,'searchByCatgorie']);
Route::get('notification' ,[notificationProductController::class,'makeAsRead']);

