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

Route::get('/', [
    'uses' => 'HomeController@index',
    'as' => 'home_path',
]);

Route::get('/message/{id_inquire}-{id_paquete}', [
    'uses' => 'MessageController@index',
    'as' => 'message_path',
]);

Route::post('/message/send', [
    'uses' => 'MessageController@message_mail',
    'as' => 'message_mail_path',
]);
