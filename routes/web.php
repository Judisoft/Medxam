<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionsController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('questions', QuestionsController::class);
Route::post('questions/create', [App\Http\Controllers\QuestionsController::class, 'store'])->name('post.question');
Route::put('questions/{id}/edit', [App\Http\Controllers\QuestionsController::class, 'update'])->name('edit.question');
Route::get('questions/{id}/show', [App\Http\Controllers\QuestionsController::class, 'show'])->name('show.question');
Route::post('questions/', [App\Http\Controllers\QuestionsController::class, 'index'])->name('index.question');
Route::get('download', [App\Http\Controllers\QuestionsController::class, 'download'])->name('download');
Route::delete('questions/{id}/delete', [App\Http\Controllers\QuestionsController::class, 'destroy'])->name('delete.question');

//Routes for Questions
//Route::get('questions/create', 'QuestionsController@create');
//Route::get('/questions/create', 'QuestionsController@create');
