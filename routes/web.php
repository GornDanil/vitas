<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\MainController;
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

//Route::get('/', 'MainController@home')->name('home');
Route::get('/', [\App\Http\Controllers\MainController::class, 'home'])->name('home');

Route::get('/login', function () {return view('authentification');})->name('login');
Route::post('/login', [\App\Http\Controllers\AuthentificateController::class, 'login'])->name('login-post');

Route::get('/registration', function () {return view('registration');})->name('registration');
Route::post('/registration', [\App\Http\Controllers\AuthentificateController::class, 'registration'])->name('registration-post');

Route::get('/logout', [\App\Http\Controllers\AuthentificateController::class, 'logout'])->name('logout');

Route::get('/my-pastes', [\App\Http\Controllers\PasteController::class, 'myPastes'])->name('my-pastes');

Route::post('/new-paste', [\App\Http\Controllers\PasteController::class, 'newPastePost'])->name('new-paste-post');
Route::get('/new-paste', [\App\Http\Controllers\PasteController::class, 'newPaste'])->name('new-paste');

Route::get('/{slug}/{id}', [\App\Http\Controllers\PasteController::class, 'showPaste'])->name('paste');
