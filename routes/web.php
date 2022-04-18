<?php

use App\Http\Controllers\CountriesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaravelCrud;

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

Route::get('crud.index', [LaravelCrud::class, 'index'])->name('index');
Route::post('add', [LaravelCrud::class, 'add'])->name('add');
Route::get('crud.detailItem/{id}', [LaravelCrud::class, 'detail'])->name('detail');
Route::post('crud.detailItem', [LaravelCrud::class, 'update'])->name('update');
Route::get('delete/{id}', [LaravelCrud::class, 'delete'])->name('delete');

Route::get('dashboard', [LaravelCrud::class, 'dashboard_category'])->name('dashboard');
