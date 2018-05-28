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
    return view('auth/login');
});
    
    Auth::routes();
    
    Route::get('/home', 'HomeController@index')->name('home');

Route::group([
    'prefix' => 'api/v1'
], function () {
    Route::get('cdn/mediaservers', array('uses' => 'Backend\API\CdnController@getMediaServers'))->name('cdn.mediaservers');
    Route::get('cdn/pops', array('uses' => 'Backend\API\CdnController@getPops'))->name('cdn.pops');
    Route::get('comercial/providers', array('uses' => 'Backend\API\ComercialController@getProviders'))->name('comercial.providers');
    Route::get('comercial/resellers', array('uses' => 'Backend\API\ComercialController@getResellers'))->name('comercial.resellers');
    Route::get('comercial/services', array('uses' => 'Backend\API\ComercialController@getServices'))->name('comercial.services');
    Route::get('comercial/packs', array('uses' => 'Backend\API\ComercialController@getPacks'))->name('comercial.packs');
    Route::get('comercial/products', array('uses' => 'Backend\API\ComercialController@getProducts'))->name('comercial.products');
    Route::get('comercial/customers', array('uses' => 'Backend\API\ComercialController@getCustomers'))->name('comercial.customers');
    Route::get('users/ftpuser', array('uses' => 'Backend\API\UserController@getFtpUser'))->name('users.ftpuser');
    Route::get('users/list', array('uses' => 'Backend\API\UserController@getList'))->name('users.list');
    Route::get('users/notify', array('uses' => 'Backend\API\UserController@getNotify'))->name('users.notify');
    
});

Route::group([
        'prefix' => 'system'
    ], function () {
        Route::get('/', 'Backend\Statical\UserController@getList');
        Route::get('/users', 'Backend\Statical\UserController@getList');
        Route::get('/notify', 'Backend\Statical\UserController@getNotify');
        Route::get('/ftpuser', 'Backend\Statical\UserController@getFtpUser');
        
});

Route::group([
    'prefix' => 'cdn'
], function () {
    Route::get('/', 'Backend\Statical\CdnController@getMediaServers');
    Route::get('/mediaservers', 'Backend\Statical\CdnController@getMediaServers');
    Route::get('/pops', 'Backend\Statical\CdnController@getPops');       
});

Route::group([
    'prefix' => 'comercial'
], function () {
    Route::get('/', 'Backend\Statical\ComercialController@getProviders');
    Route::get('/providers', 'Backend\Statical\ComercialController@getProviders');
    Route::get('/resellers', 'Backend\Statical\ComercialController@getResellers');
    Route::get('/services', 'Backend\Statical\ComercialController@getServices');
    Route::get('/packs', 'Backend\Statical\ComercialController@getPacks');
    Route::get('/products', 'Backend\Statical\ComercialController@getProducts');
    Route::get('/customers', 'Backend\Statical\ComercialController@getCustomers');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'HomeController@index')->name('home');
Route::get('/{slug?}', 'HomeController@index')->name('home');
