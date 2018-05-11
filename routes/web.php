<?php

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
    return view('backend.system.index');
});

Route::group([
        'prefix' => 'system'
    ], function () {
        Route::get('/', 'Backend\Statical\UserController@getList');
        Route::get('/index', 'Backend\Statical\UserController@getList');
        
});