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

Route::get('/', [
    'as' => 'home',
    'uses' => 'PageController@index'
]);
/*
 Esse grupo define a seção de admin com o prefix 'admin' e somente usuários logados
 poderão acessar porque declarei o middleware auth abaixo.
*/
Route::group(['middleware' => ['auth'], 'prefix' => 'admin'], function () {
    Route::get('/', [
        'as' => 'admin_home', // sempre usar rotas nomeadas para que eu possa alterar a url depois se precisar e não vai atrapalhar o resto da aplicação
        'uses' => 'PostController@read'
    ]);
    Route::get('/edit/user', [
        'as' => 'users_edit_get',
        'uses' => 'UserController@edit_get'
    ]);
    Route::post('/edit/user', [
        'as' => 'users_edit_post',
        'uses' => 'UserController@edit_post'
    ]);
    Route::get('/list/users', [
        'as' => 'users_read', 'uses' => 'UserController@index'
    ]);
});

Route::get('/auth/login', [
    'as' => 'get_login',
    'uses' => 'Auth\AuthController@getLogin'
]);

Route::post('/auth/login', [
    'as' => 'post_login',
    'uses' => 'Auth\AuthController@postLogin'
]);

Route::get('/auth/logout', [
    'as' => 'get_logout',
    'uses' => 'Auth\AuthController@getLogout'
]);

Route::get('/post', [
    'as' => 'post',
    'uses' => 'PostController@show'
]);