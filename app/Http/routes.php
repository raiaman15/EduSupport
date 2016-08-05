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

Route::get('/', function () {
    return view('pages.welcome');
});

Route::auth();
Route::get('user/activation/{token}', 'Auth\AuthController@activateUser')->name('user.activate');
Route::get('home', [
    'middleware' => 'auth',
    'uses' => 'HomeController@index'
]);
Route::post('add_more_info', [
    'middleware' => 'auth',
    'uses' => 'HomeController@add_more_info'
]);
Route::post('contact_send_mail', [
    'middleware' => 'auth',
    'uses' => 'HomeController@contact_send_mail'
]);
Route::group(['middleware' => ['web']], function () {
    Route::get('payPremium', ['as'=>'payPremium','uses'=>'PaypalController@payPremium']);
    Route::post('getCheckout', ['as'=>'getCheckout','uses'=>'PaypalController@getCheckout']);
    Route::get('getDone', ['as'=>'getDone','uses'=>'PaypalController@getDone']);
    Route::get('getCancel', ['as'=>'getCancel','uses'=>'PaypalController@getCancel']);
});
Route::get('admin_dashboard', ['middleware' => 'CheckAdmin', 'uses' => 'AdminController@dashboard']);

