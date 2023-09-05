<?php

use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderDetailsController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [FrontendController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dogs', [App\Http\Controllers\HomeController::class, 'showDogs'])->name('dogs');
Route::get('/cats', [App\Http\Controllers\HomeController::class, 'showCats'])->name('cats');
Route::get('/p_hrana', [App\Http\Controllers\HomeController::class, 'showP_hrana'])->name('p_hrana');
Route::get('/p_odjeca', [App\Http\Controllers\HomeController::class, 'showP_odjeca'])->name('p_odjeca');
Route::get('/p_igracke', [App\Http\Controllers\HomeController::class, 'showP_igracke'])->name('p_igracke');
Route::get('/m_hrana', [App\Http\Controllers\HomeController::class, 'showM_hrana'])->name('m_hrana');
Route::get('/m_odjeca', [App\Http\Controllers\HomeController::class, 'showM_odjeca'])->name('m_odjeca');
Route::get('/m_igracke', [App\Http\Controllers\HomeController::class, 'showM_igracke'])->name('m_igracke');
Route::get('/orderDetails', [OrderDetailsController::class, 'index'])->name('orderDetails');
Route::get('/orderDetails/{id}', [OrderDetailsController::class, 'show'])->name('show');




    Route::post('add-to-cart', [CartController::class, 'addProduct']);
    Route::post('delete-cart-item', [CartController::class, 'deleteproduct']);
    Route::post('update-cart', [CartController::class, 'updatecart']);


        Route::get('cart', [CartController::class, 'viewcart']);
        Route::get('checkout', [CheckoutController::class, 'index']);
        Route::post('place-order',[CheckoutController::class, 'placeorder']);



Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', 'Admin\FrontendController@index')->name('dashboard');


    Route::get('add-category', [CategoryController::class,'add']);
    Route::post('insert-category', [CategoryController::class,'insert']);
    Route::get("categories", [CategoryController::class ,'index']);
    Route::get("edit-category/{id}", [CategoryController::class ,'edit']);
    Route::put('update-category/{id}', [CategoryController::class, 'update']);
    Route::get('delete-category/{id}',[CategoryController::class, 'destroy']);

    Route::get('add-subcategory', [SubcategoryController::class,'add']);
    Route::post('insert-subcategory', [SubcategoryController::class,'insert']);
    Route::get("subcategories", [SubcategoryController::class ,'index']);
    Route::get("edit-subcategory/{id}", [SubcategoryController::class ,'edit']);
    Route::put('update-subcategory/{id}', [SubcategoryController::class, 'update']);
    Route::get('delete-subcategory/{id}',[SubcategoryController::class, 'destroy']);

    Route::get('products',[ProductController::class, 'index'])->name("products");
    Route::get('add-product',[ProductController::class, 'add']);
    Route::post('insert-product',[ProductController::class, 'insert']);
    Route::get('delete-product/{id}',[ProductController::class, 'destroy']);
    Route::get('edit-product/{id}',[ProductController::class, 'edit']);
    Route::put('update-product/{id}',[ProductController::class, 'update']);
    Route::post('get-categoryId',[ProductController::class, 'getCategoryId']);





});
