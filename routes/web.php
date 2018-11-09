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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', [
    'uses' => 'HomeController@index',
    'as' => 'home_path',
]);

Route::post('/home/del', [
    'uses' => 'HomeController@remove_inquire',
    'as' => 'remove_inquire_path',
]);

Route::get('/trash', [
    'uses' => 'HomeController@trash',
    'as' => 'trash_path',
]);

Route::post('/home/restore', [
    'uses' => 'HomeController@restore_inquire',
    'as' => 'restore_inquire_path',
]);

//

Route::get('/message/{id_inquire}-{id_paquete}', [
    'uses' => 'MessageController@index',
    'as' => 'message_path',
]);

Route::post('/message/send', [
    'uses' => 'MessageController@message_mail',
    'as' => 'message_mail_path',
]);
Route::post('/message/inquire_package', [
    'uses' => 'MessageController@inquire_package',
    'as' => 'update_inquire_p_path',
]);
//statistics
Route::get('/statistics/{from}/{to}', [
    'uses' => 'TeamController@index',
    'as' => 'statistics_path',
]);
Route::get('/statistics/chart', [
    'uses' => 'TeamController@chart',
    'as' => 'chart_path',
]);
Route::get('/statistics/{iduser}', [
    'uses' => 'TeamController@info',
    'as' => 'info_path',
]);

//packages
Route::get('/packages', [
    'uses' => 'PackageController@index',
        'as' => 'packages_path',
]);

Route::get('search/autocomplete', [
    'uses' => 'MessageController@autocomplete',
    'as' => 'autocomplete_path',
]);
Route::get('search/autocomplete_included', [
    'uses' => 'MessageController@autocomplete_included',
    'as' => 'autocomplete_included_path',
]);
Route::get('search/autocomplete_no_included', [
    'uses' => 'MessageController@autocomplete_no_included',
    'as' => 'autocomplete_no_included_path',
]);

Route::get('search/autocomplete_itinerary', [
    'uses' => 'MessageController@autocomplete_itinerary',
    'as' => 'autocomplete_itinerary_path',
]);