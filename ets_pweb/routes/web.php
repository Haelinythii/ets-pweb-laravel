<?php

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
Route::post('store_task', [App\Http\Controllers\TaskController::class, 'storeATask'])->name('storeTask');

Auth::routes();

Route::get('/home', [App\Http\Controllers\TaskController::class, 'index'])->name('home');

