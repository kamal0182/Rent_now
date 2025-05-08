<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use App\Models\Product;
use App\Models\Rental;
use App\Notifications\RentalCreated;
use Dom\Comment;
Route::get('/',function ()
{
    return view("landingpage");
});
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('rentals', [RentalController::class, 'showRentals'])->name('rentals');
Route::get('detail-item', [RentalController::class, 'showdetail'])->name('detail');
Route::get('profile', [UserController::class, 'showprofile'])->name('profile');
Route::patch('profile', [UserController::class, 'updateProfile'])->name('profile');
Route::get('admin/categories', [CategorieController::class, 'index'])->name('adminDashboard');
Route::post('admin/categories', [CategorieController::class, 'createcategorie'])->name('adminDashboard');
Route::delete('admin/categories', [CategorieController::class, 'delete']);
Route::put('admin/categories', [CategorieController::class, 'update']);
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('home', [ProductController::class, 'allProductsFilterByStatus'])->name('home');
Route::get('admin/dashboard', [UserController::class, 'showusers']);
Route::get('admin/users', [UserController::class, 'showAllUsers']);
Route::get('admin/rentals', [RentalController::class, 'showRentals']);
Route::get('admin/products', [ProductController::class, 'showAllProducts']);
Route::patch('admin/products', [ProductController::class, 'updateStatus']);
Route::delete('admin/products', [ProductController::class, 'delete'])->name('tags.update');
Route::put('admin/rentals', [UserController::class, 'update'])->name('tags.update');

Route::get('test', [UserController::class, 'showdata'])->name('tags.destroy');
Route::get('/products/create', [ProductController::class, 'showProductForm']);
Route::post('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::get('/products/rentals/{id}', [ProductController::class, 'showProductDetail'])->name('prdoucts.show');
Route::post('/products', [CategorieController::class, 'showdata'])->name('prdoucts.show');
Route::post('/products/rentals/{id}', [RentalController::class, 'create'])->name('prdoucts.show');
Route::post('/products/add-to-cart/{id}', [RentalController::class, 'addtocart']);
Route::get('paneer', [RentalController::class , 'showpaneer']);
Route::delete('paneer', [RentalController::class , 'deleteFromCarte']);
Route::patch('paneer', [RentalController::class , 'updateCartSession']);
Route::post('/products/{productId}/comments', [CommentController::class, 'addComment' ]);
Route::post('/products', [CategorieController::class, 'showdata'])->name('prdoucts.show');
Route::post('/products', [CategorieController::class, 'showdata'])->name('prdoucts.show');
Route::get('/products/{productid}/comments', [ProductController::class, 'showProductComment'])->name('prdoucts.show');
Route::put('/products/{productid}/comments', [CommentController::class, 'updateComment'])->name('prdoucts.update');
Route::delete('/products/{productid}/comments', [CommentController::class, 'delete'])->name('prdoucts.delete');
Route::get('rental/{id}' , [RentalController::class , 'showSelectedRental']);
Route::patch('rental/{id}', [RentalController::class , 'changeThestatus']);
Route::get('rental/{id}/payment',[StripeController::class , 'showChekout']);
Route::get('products/edit/{id}' , [ProductController::class ,'showEditForm']);
Route::post('products/edit/{id}' , [ProductController::class ,'update']);


