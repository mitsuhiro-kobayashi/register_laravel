<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RegisterController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// ルーティング→プラウザから任意のURLにアクセスがあった場合、どのController処理を動かすのかを定義する
// Routeは名前を付けることができて、「users」という名前を付けた。



// 会員画面トップページを表示
Route::get('/', [App\Http\Controllers\RegisterController::class, 'showRegister'])->name('showRegister');

// 登録画面を表示GET
Route::get('/admin', [App\Http\Controllers\RegisterController::class, 'showAdmin'])->name('showAdmin');

// 登録処理POST　redirectさせる
Route::post('/admin', [App\Http\Controllers\RegisterController::class, 'store'])->name('store');

// 編集画面を表示GET
Route::get('/edit/{id}', [App\Http\Controllers\RegisterController::class, 'showEdit'])->name('showEdit');


// 編集ボタンを押して、編集する。そのためにはまずデータを編集画面を表示したときに名前とかが表示されていないといけない。
// それをPOSTで受け取るtoEDIT
Route::post('/edit/{id}', [App\Http\Controllers\RegisterController::class, 'toEdit'])->name('toEdit');


// 削除ボタンをおして、削除されるようにするdestroy
Route::DELETE('/edit/{id}', [App\Http\Controllers\RegisterController::class, 'destroy'])->name('destroy');
