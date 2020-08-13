<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

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
})->name('Home');

// Routes for examples
Route::get('/watcher', function () {
    return view('vue.watcher');
})->name('Watcher');

Route::get('/class-bindings', function () {
    return view('vue.class-bindings');
})->name('Class Bindings');

Route::get('/style-bindings', function () {
    return view('vue.style-bindings');
})->name('Style Bindings');

Route::get('/conditional-rendering', function () {
    return view('vue.conditional-rendering');
})->name('Conditional Rendering');

Route::get('/list-rendering', function () {
    return view('vue.list-rendering');
})->name('List Rendering');

Route::get('/event-handling', function () {
    return view('vue.event-handling');
})->name('Event Handling');

Route::get('/form-input-bindings', function () {
    return view('vue.form-input-bindings');
})->name('Form Input Bindings');

Route::get('/components', function () {
    return view('vue.components');
})->name('Components');

Route::get('/keep-alive', function () {
    return view('vue.keep-alive');
})->name('Keep Alive');

Route::get('/async-components', function () {
    return view('vue.async-components');
})->name('Async Components');

Route::get('/transitions', function () {
    return view('vue.transitions');
})->name('Transitions');
