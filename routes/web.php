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
    return view('vue.index');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/qna', function () {
    return view('vue.qna');
});

Route::get('/class-bindings', function () {
    return view('vue.class-bindings');
});

Route::get('/style-bindings', function () {
    return view('vue.style-bindings');
});
