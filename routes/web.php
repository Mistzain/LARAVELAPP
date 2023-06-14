<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Http\Controllers\ProductController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/greet', function () {
    return view('hello');
});


//Route::get('/products', function () {
//     return view('product.index');
// });
Route::get('/product', [ProductController::class, 'index']);
Route::get('/product/create', [ProductController::class, 'create']);
Route::post('/product/store', [ProductController::class, 'store']);
Route::get('/product/show/{product}', [ProductController::class, 'show']);
Route::get('/product/edit/{product}', [ProductController::class, 'edit']);
Route::put('/product/update/{product}', [ProductController::class, 'update']);
Route::get('/product/destroy/{product}', [ProductController::class, 'destroy']);


Route::get('/pagod', function () {
    return "KAYA PA YAN";
});

Route::get('/laban', function () {
    return "daming due na activity";
});

Route::get('/hayst', function () {
    return "pagod na malala";
});

Route::get('/2D', function () {
    return "see you next year hahaha";
});