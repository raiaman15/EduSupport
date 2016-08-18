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
Route::get('study', [
    'middleware' => 'auth',
    'uses' => 'HomeController@display_study'
]);
Route::get('tutor', [
    'middleware' => 'auth',
    'uses' => 'HomeController@display_tutor'
]);
Route::get('why_us', [
    'middleware' => 'auth',
    'uses' => 'HomeController@display_why_us'
]);
Route::get('contact_us', [
    'middleware' => 'auth',
    'uses' => 'HomeController@display_contact_us'
]);
Route::post('add_more_info', [
    'middleware' => 'auth',
    'uses' => 'HomeController@add_more_info'
]);
Route::post('contact_send_mail', [
    'middleware' => 'auth',
    'uses' => 'HomeController@contact_send_mail'
]);
Route::post('seek_assistance', [
    'middleware' => 'auth',
    'uses' => 'HomeController@seek_assistance'
]);
Route::get('seek_assistance_detail', [
    'middleware' => 'auth',
    'uses' => 'HomeController@seek_assistance_detail'
]);
Route::post('provide_assistance', [
    'middleware' => 'auth',
    'uses' => 'HomeController@provide_assistance'
]);
Route::get('provide_assistance_detail', [
    'middleware' => 'auth',
    'uses' => 'HomeController@provide_assistance_detail'
]);
Route::get('download/{filename}', [
    'middleware' => 'auth',
    'uses' => 'HomeController@download'
]);
Route::get('tutor_feedback/{id}/{rating}', [
    'middleware' => 'auth',
    'uses' => 'HomeController@save_tutor_feedback'
]);
Route::group(['middleware' => ['web']], function () {
    Route::get('payPremium/{payplan}/{id}', ['as'=>'payPremium','uses'=>'PaypalController@payPremium']);
    Route::post('getCheckout', ['as'=>'getCheckout','uses'=>'PaypalController@getCheckout']);
    Route::get('getDone', ['as'=>'getDone','uses'=>'PaypalController@getDone']);
    Route::get('getCancel', ['as'=>'getCancel','uses'=>'PaypalController@getCancel']);
});
Route::get('admin_dashboard', ['middleware' => 'CheckAdmin', 'uses' => 'AdminController@dashboard']);
Route::get('save_payment_plan/{id}/{payment_plan}', ['middleware' => 'CheckAdmin', 'uses' => 'AdminController@make_pay_link_student']);
Route::get('save_assigned_tutor/{id}/{tutor_email}', ['middleware' => 'CheckAdmin', 'uses' => 'AdminController@save_assigned_tutor']);
Route::get('save_tutor_payment/{id}/{tutor_payment}', ['middleware' => 'CheckAdmin', 'uses' => 'AdminController@save_tutor_payment']);
Route::get('tutor_got_payment/{id}', ['middleware' => 'CheckAdmin', 'uses' => 'AdminController@tutor_got_payment']);
Route::get('approve_tutor/{id}', ['middleware' => 'CheckAdmin', 'uses' => 'AdminController@approve_tutor']);
Route::get('delete_tutor/{id}', ['middleware' => 'CheckAdmin', 'uses' => 'AdminController@delete_tutor']);

