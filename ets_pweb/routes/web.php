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
Route::get('{id}/delete_task', [App\Http\Controllers\TaskController::class, 'deleteTask'])->name('deleteTask');
Route::get('{id}/archieve_task', [App\Http\Controllers\TaskController::class, 'archieveTask'])->name('archieveTask');
Route::get('{id}/delete_archieved', [App\Http\Controllers\ArchievedTaskController::class, 'deleteTask'])->name('deleteArchieved');
Route::get('{id}/unarchieved_task', [App\Http\Controllers\ArchievedTaskController::class, 'unarchieveTask'])->name('unarchievedTask');
Route::get('{id}/edit_tag', [App\Http\Controllers\TagController::class, 'index'])->name('editTag');
Route::post('store_tag', [App\Http\Controllers\TagController::class, 'storeTag'])->name('storeTag');
Route::put('change_tag', [App\Http\Controllers\TagController::class, 'storeTaskTagRelationship'])->name('changeTag');

Auth::routes();

Route::get('/home', [App\Http\Controllers\TaskController::class, 'index'])->name('home');
Route::get('/view_archieved', [App\Http\Controllers\ArchievedTaskController::class, 'index'])->name('viewArchieved');

Route::group(['middleware' => 'auth'], function () {
    Route::get('profile', [App\Http\Controllers\ProfileController::class, 'edit_Profile'])->name('edit_Profile');
    Route::patch('profile',  [App\Http\Controllers\ProfileController::class, 'update'])->name('update_Profile');
});