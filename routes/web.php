<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return redirect()->route('post.index');
});

// Route::get('register', 'RegisterController@showRegistrationForm');

Route::resource('post', 'PostController', ['only' => [
    'index',
    'show',
]]); 

// Auth::routes();

// Route::get('/home', 'HomeController@index');
