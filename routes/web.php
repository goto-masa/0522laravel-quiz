<?php

use Illuminate\Http\Request;
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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('home');
    })->name('home');
    // Route::get('/{{id}}', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');

    // 単語一覧を取得
    Route::get('/words/index', 'App\Http\Controllers\WordController@index')->name('words.index');

    // 単語を作成
    Route::get('/words/create', 'App\Http\Controllers\WordController@showCreateWord')->name('words.create');
    Route::post('/words/create', 'App\Http\Controllers\WordController@create');

    // 単語を編集
    Route::get('/words/{word}/edit', 'App\Http\Controllers\WordController@showEditForm')->name('words.edit');
    Route::post('/words/{word}/edit', 'App\Http\Controllers\WordController@edit');

    // クイズ画面を取得
    Route::get('/quizzes/quiz', function () {
        return view('/quizzes/quiz');
    });
});


Auth::routes();
