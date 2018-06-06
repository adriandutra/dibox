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
    Route::get('content/applications', array('uses' => 'Backend\API\ContentController@getApplications'))->name('content.applications');
    Route::get('content/genres', array('uses' => 'Backend\API\ContentController@getGenres'))->name('content.genres');
    Route::get('content/listseries', array('uses' => 'Backend\API\ContentController@getSeries'))->name('content.listseries');
    Route::get('content/outstandinglist', array('uses' => 'Backend\API\ContentController@getOutstandingList'))->name('content.outstandinglist');
    Route::get('content/images', array('uses' => 'Backend\API\ContentController@getImages'))->name('content.images');
    Route::get('content/advertisinglist', array('uses' => 'Backend\API\ContentController@getAdvertisingList'))->name('content.advertisinglist');
    Route::get('content/listvodhls', array('uses' => 'Backend\API\ContentController@getListVodHls'))->name('content.listvodhls');
    Route::get('content/trailers', array('uses' => 'Backend\API\ContentController@getTrailers'))->name('content.trailers');
    Route::get('users/ftpuser', array('uses' => 'Backend\API\UserController@getFtpUser'))->name('users.ftpuser');
    Route::get('users/list', array('uses' => 'Backend\API\UserController@getList'))->name('users.list');
    Route::get('users/notify', array('uses' => 'Backend\API\UserController@getNotify'))->name('users.notify');
    
});

Route::group([
        'prefix' => 'system/users'
    ], function () {
        Route::get('/', 'Backend\Statical\UserController@getList');
        Route::get('/users', 'Backend\Statical\UserController@getList'); 
});

Route::group([
    'prefix' => 'system/notifications'
], function () {
    Route::get('/', 'Backend\Statical\UserController@getNotify');
    Route::get('/mailing', 'Backend\Statical\UserController@getNotify');
    
});

Route::group([
    'prefix' => 'system/ftp'
], function () {
    Route::get('/', 'Backend\Statical\UserController@getFtpUser');
    Route::get('/ftpuser', 'Backend\Statical\UserController@getFtpUser');
    
});

Route::group([
    'prefix' => 'cdn/mediaservers'
], function () {
    Route::get('/', 'Backend\Statical\CdnController@getMediaServers');
    Route::get('/pops', 'Backend\Statical\CdnController@getPops');       
});

Route::group([
    'prefix' => 'cdn/pops'
], function () {
    Route::get('/', 'Backend\Statical\CdnController@getPops');
    Route::get('/pops', 'Backend\Statical\CdnController@getPops');
});

Route::group([
    'prefix' => 'comercial/providers'
], function () {
    Route::get('/', 'Backend\Statical\ComercialController@getProviders');
    Route::get('/providers', 'Backend\Statical\ComercialController@getProviders');
});

Route::group([
    'prefix' => 'comercial/resellers'
], function () {
    Route::get('/', 'Backend\Statical\ComercialController@getResellers');
    Route::get('/resellers', 'Backend\Statical\ComercialController@getResellers');
});

Route::group([
    'prefix' => 'comercial/services'
], function () {
    Route::get('/', 'Backend\Statical\ComercialController@getServices');
    Route::get('/services', 'Backend\Statical\ComercialController@getServices');
});

Route::group([
    'prefix' => 'comercial/packs'
], function () {
    Route::get('/', 'Backend\Statical\ComercialController@getPacks');
    Route::get('/packs', 'Backend\Statical\ComercialController@getPacks');
});

Route::group([
    'prefix' => 'comercial/products'
], function () {
    Route::get('/', 'Backend\Statical\ComercialController@getProducts');
    Route::get('/products', 'Backend\Statical\ComercialController@getProducts');
});

Route::group([
    'prefix' => 'comercial/customers'
], function () {
    Route::get('/', 'Backend\Statical\ComercialController@getCustomers');
    Route::get('/customers', 'Backend\Statical\ComercialController@getCustomers');
});

Route::group([
    'prefix' => 'content/applications'
], function () {
    Route::get('/', 'Backend\Statical\ContentController@getApplications');
    Route::get('/applications', 'Backend\Statical\ContentController@getApplications');
});

Route::group([
    'prefix' => 'content/genres'
], function () {
    Route::get('/', 'Backend\Statical\ContentController@getGenres');
    Route::get('/genres', 'Backend\Statical\ContentController@getGenres');
});

Route::group([
    'prefix' => 'content/ordergenres'
], function () {
    Route::get('/', 'Backend\Statical\ContentController@getOrderGenres');
    Route::get('/ordergenres', 'Backend\Statical\ContentController@getOrderGenres');
});

Route::group([
    'prefix' => 'content/metadata'
], function () {
    Route::get('/', 'Backend\Statical\ContentController@getMetadata');
    Route::get('/metadata', 'Backend\Statical\ContentController@getMetadata');
});

Route::group([
    'prefix' => 'content/images'
], function () {
    Route::get('/', 'Backend\Statical\ContentController@getImages');
    Route::get('/images', 'Backend\Statical\ContentController@getImages');
});

Route::group([
    'prefix' => 'content/live'
], function () {
    Route::get('/', 'Backend\Statical\ContentController@getLive');
    Route::get('/live', 'Backend\Statical\ContentController@getLive');
});

Route::group([
    'prefix' => 'content/newslist'
], function () {
    Route::get('/', 'Backend\Statical\ContentController@getNewsList');
    Route::get('/newslist', 'Backend\Statical\ContentController@getNewsList');
});

Route::group([
    'prefix' => 'content/listseries'
], function () {
    Route::get('/', 'Backend\Statical\ContentController@getSeries');
    Route::get('/listseries', 'Backend\Statical\ContentController@getSeries');
});

Route::group([
    'prefix' => 'content/outstandinglist'
], function () {
    Route::get('/', 'Backend\Statical\ContentController@getOutstandingList');
    Route::get('/outstandinglist', 'Backend\Statical\ContentController@getOutstandingList');
});

Route::group([
    'prefix' => 'content/categorylist'
], function () {
    Route::get('/', 'Backend\Statical\ContentController@getCategoryList');
    Route::get('/categorylist', 'Backend\Statical\ContentController@getCategoryList');
});

Route::group([
    'prefix' => 'content/cmstexts'
], function () {
    Route::get('/', 'Backend\Statical\ContentController@getCmsTexts');
    Route::get('/cmstexts', 'Backend\Statical\ContentController@getCmsTexts');
});

Route::group([
    'prefix' => 'content/mediaaudios'
], function () {
    Route::get('/', 'Backend\Statical\ContentController@getMediaAudios');
    Route::get('/mediaaudios', 'Backend\Statical\ContentController@getMediaAudios');
});

Route::group([
    'prefix' => 'content/listaudiodata'
], function () {
    Route::get('/', 'Backend\Statical\ContentController@getListAudioData');
    Route::get('/listaudiodata', 'Backend\Statical\ContentController@getListAudioData');
});

Route::group([
    'prefix' => 'content/musicgenres'
], function () {
    Route::get('/', 'Backend\Statical\ContentController@getMusicGenres');
    Route::get('/musicgenres', 'Backend\Statical\ContentController@getMusicGenres');
});

Route::group([
    'prefix' => 'content/advertisinglist'
], function () {
    Route::get('/', 'Backend\Statical\ContentController@getAdvertisingList');
    Route::get('/advertisinglist', 'Backend\Statical\ContentController@getAdvertisingList');
});

Route::group([
    'prefix' => 'content/listvodhls'
], function () {
    Route::get('/', 'Backend\Statical\ContentController@getListVodHls');
    Route::get('/listvodhls', 'Backend\Statical\ContentController@getListVodHls');
});

Route::group([
    'prefix' => 'content/mediafiles'
], function () {
    Route::get('/', 'Backend\Statical\ContentController@getMediaFiles');
    Route::get('/mediafiles', 'Backend\Statical\ContentController@getMediaFiles');
});

Route::group([
    'prefix' => 'content/trailers'
], function () {
    Route::get('/', 'Backend\Statical\ContentController@getTrailers');
    Route::get('/trailers', 'Backend\Statical\ContentController@getTrailers');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'HomeController@index')->name('home');
Route::get('/{slug?}', 'HomeController@index')->name('home');
