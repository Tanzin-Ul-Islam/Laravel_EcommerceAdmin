<?php
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Auth::routes();
Route::group(['middleware'=>['authUser']], function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

Route::group(['prefix'=>'admin', 'middleware'=>['authAdmin']], function(){
    Route::get('/', [App\Http\Controllers\AdminController::class, 'adminIndex'])->name('adminHome');

    Route::resource('user', UserController::class);

    //admin category
    Route::get('/category', [App\Http\Controllers\CategoryController::class, 'index'])->name('adminCategory');
    Route::get('/category/create', [App\Http\Controllers\CategoryController::class, 'create'])->name('category.create');
    Route::get('/category/details/{slug}', [App\Http\Controllers\CategoryController::class, 'show'])->name('category.details');
    Route::post('/category/store', [App\Http\Controllers\CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/{slug}', [App\Http\Controllers\CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/category/update/{slug}', [App\Http\Controllers\CategoryController::class, 'update'])->name('category.update');
    Route::delete('/category/delete/{slug}', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('category.delete');

    //admin Product
    Route::get('/product', [App\Http\Controllers\ProductController::class, 'index'])->name('product.list');
    Route::get('/product/create', [App\Http\Controllers\ProductController::class, 'create'])->name('product.create');
    Route::get('/product/details/{slug}', [App\Http\Controllers\ProductController::class, 'show'])->name('product.details');
    Route::post('/product/store', [App\Http\Controllers\ProductController::class, 'store'])->name('product.store');
    Route::get('/product/{slug}', [App\Http\Controllers\ProductController::class, 'edit'])->name('product.edit');
    Route::put('/product/update/{slug}', [App\Http\Controllers\ProductController::class, 'update'])->name('product.update');
    Route::delete('/product/delete/{slug}', [App\Http\Controllers\ProductController::class, 'destroy'])->name('product.delete');
});
