<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\User;

Route::get('/', function () {
    // pega só os 5 primeiros posts do usuário admin, só pra testar o BD
    return User::where('name', 'admin')->first()->posts()->take(5)->get();
});