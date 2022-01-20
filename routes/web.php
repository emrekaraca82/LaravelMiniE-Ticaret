<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\UserInterface\HomeController;
use App\Http\Controllers\UserInterface\CartController;
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

// Route::get('/', function () {
//     return view('UserInterface.index');
// });

route::get('/',[HomeController::class, 'index']);
route::get('product',[HomeController::class, 'product']);
route::get('category/{cate_slug}/{prod_slug}',[HomeController::class, 'product_detail']);
route::get('category/{slug}',[HomeController::class, 'category_detail']);


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

route::post('add-to-cart',[CartController::class, 'addProduct']);
route::post('delete-cart',[CartController::class, 'deleteProduct']);
route::post('update-cart',[CartController::class, 'updateProduct']);
route::get('load-to-cart',[CartController::class, 'cartCount']);

Route::middleware(['auth'])->group(function () {
    route::get('cart',[CartController::class, 'cartView']);
});


Route::group(['middleware'=>['auth','isAdmin'],'prefix'=>'admin'],function()
{
    route::get('category/{id}',[CategoryController::class, 'destroy'])->whereNumber('id')->name('category.destroy');
    Route::resource('category',CategoryController::class);

    route::get('product/{id}',[ProductController::class, 'destroy'])->whereNumber('id')->name('product.destroy');
    Route::resource('product',ProductController::class);
   
});
