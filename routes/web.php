<?php

use App\Models\SubCat;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SubCatController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::controller(UserController::class)->prefix('dashboard')->group(function(){

Route::get('login','viewForm');
Route::post('login','loginUser')->name('user.login');
});

Route::controller(CategoryController::class)->prefix('dashboard')->group(function(){

Route::get('category','viewForm');
Route::post('category','store')->name('category.make');



});


Route::controller(SubCatController::class)->prefix('dashboard')->group(function(){

    Route::get('sub','viewForm');
    Route::post('sub','store')->name('subcategory.make');
    
    Route::get('home','all');
    Route::get('show/{id}','show');

    Route::get('edit/{id}','edit');
    Route::put('update/{id}','update');

    Route::delete('destroy/{id}','destroy');

});




Route::controller(ProductController::class)->prefix('product')->group(function(){
// create 
Route::get('create','create')->name('products.create');
Route::post('create','store')->name('products.store');

//update

Route::get('edit/{id}','edit')->name('product.edit');

Route::put('edit/{id}','update')->name('product.update');

//select all 

Route::get('all','all')->name('products.all');
Route::get('show/{id}','show');

//delete
Route::delete('delete/{id}','destroy')->name('product.destroy');

});




