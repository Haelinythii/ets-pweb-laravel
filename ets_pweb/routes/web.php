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
Route::post('store_task', [App\Http\Controllers\TaskController::class, 'storeTask'])->name('store');
Route::get('{id}/edit', [App\Http\Controllers\TaskController::class, 'editTask'])->name('edit');
Route::put('update', [App\Http\Controllers\TaskController::class, 'updateTask'])->name('update');
Route::get('{id}/delete', [App\Http\Controllers\TaskController::class, 'deleteTask'])->name('delete');

Auth::routes();

Route::get('/home', [App\Http\Controllers\TaskController::class, 'index'])->name('home');

