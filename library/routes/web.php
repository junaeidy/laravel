<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/transactions', [App\Http\Controllers\TransactionController::class, 'index']);
Route::get('/transaction_details', [App\Http\Controllers\TransactionDetailController::class, 'index']);

//Catalog Route

//Route::get('/catalogs/create', [App\Http\Controllers\CatalogController::class, 'create']);
//Route::post('/catalogs', [App\Http\Controllers\CatalogController::class, 'store']);
//Route::get('/catalogs/{catalog}/edit', [App\Http\Controllers\CatalogController::class, 'edit']);
//Route::put('/catalogs/{catalog}', [App\Http\Controllers\CatalogController::class, 'update']);
//Route::delete('/catalogs/{catalog}', [App\Http\Controllers\CatalogController::class, 'destroy']);

//Route

route::resource('/catalogs', App\Http\Controllers\CatalogController::class);
route::resource('/publishers', App\Http\Controllers\PublisherController::class);
route::resource('/authors', App\Http\Controllers\AuthorController::class);
route::resource('/members', App\Http\Controllers\MemberController::class);
route::resource('/books', App\Http\Controllers\BookController::class);
route::resource('/home', App\Http\Controllers\HomeController::class);

//API

Route::get('/api/authors', [App\Http\Controllers\AuthorController::class, 'api']);
Route::get('/api/publishers', [App\Http\Controllers\PublisherController::class, 'api']);
Route::get('/api/members', [App\Http\Controllers\MemberController::class, 'api']);
Route::get('/api/books', [App\Http\Controllers\BookController::class, 'api']);



