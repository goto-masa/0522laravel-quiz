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
    });
    // 単語一覧を取得
    Route::get('/{id}/words', [App\Http\Controllers\WordController::class, 'index'])->name('home');
    // 単語登録画面を取得
    Route::get('/home', [App\Http\Controllers\WordController::class, 'create'])->name('');
});

Auth::routes();
