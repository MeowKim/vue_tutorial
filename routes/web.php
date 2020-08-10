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

Route::get('/watcher', function () {
    return view('vue.watcher');
});

Route::get('/class-bindings', function () {
    return view('vue.class-bindings');
});

Route::get('/style-bindings', function () {
    return view('vue.style-bindings');
});

Route::get('/conditional-rendering', function () {
    return view('vue.conditional-rendering');
});

Route::get('/list-rendering', function () {
    return view('vue.list-rendering');
});

Route::get('/event-handling', function () {
    return view('vue.event-handling');
});
