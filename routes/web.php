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
Route::post('/home/sent', [
    'uses' => 'HomeController@sent_inquire',
    'as' => 'sent_inquire_path',
]);

Route::get('/trash', [
    'uses' => 'HomeController@trash',
    'as' => 'trash_path',
]);

Route::post('/save_compose', [
    'uses' => 'HomeController@save_compose',
    'as' => 'save_compose_path',
]);
Route::post('/save_payment', [
    'uses' => 'HomeController@save_payment',
    'as' => 'save_compose_payment_path',
]);

Route::get('/send', [
    'uses' => 'HomeController@send',
    'as' => 'send_path',
]);

Route::post('/home/restore', [
    'uses' => 'HomeController@restore_inquire',
    'as' => 'restore_inquire_path',
]);

Route::get('/archive', [
    'uses' => 'HomeController@archive',
    'as' => 'archive_path',
]);
Route::post('/home/archive', [
    'uses' => 'HomeController@archive_inquire',
    'as' => 'archive_inquire_path',
]);

//

Route::get('/message/{id_inquire}-{id_paquete}', [
    'uses' => 'MessageController@index',
    'as' => 'message_path',
]);

Route::get('/message/compose/{id_inquire}-{id_paquete}', [
    'uses' => 'MessageController@compose',
    'as' => 'compose_path',
]);

Route::get('/message_send/{id_inquire}-{id_paquete}', [
    'uses' => 'MessageController@message_send',
    'as' => 'message_send_path',
]);
Route::get('/del_send/{id_inquire}-{id_paquete}', [
    'uses' => 'MessageController@del_send',
    'as' => 'del_send_path',
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
Route::get('/statistics/chart/{from}/{to}', [
    'uses' => 'TeamController@chart',
    'as' => 'chart_path',
]);
Route::get('/statistics/{from}/{to}', [
    'uses' => 'TeamController@index',
    'as' => 'statistics_path',
]);
Route::get('/statistics/{iduser}/{from}/{to}', [
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


//
Route::get('/send/methods', [
    'uses' => 'PaymentController@send_methods',
    'as' => 'send_methods_path',
]);
Route::get('send/methods/{idinquire}', [
    'uses' => 'PaymentController@methods',
    'as' => 'methods_show_path',
]);
//payment
Route::get('send/payment/{idinquire}', [
    'uses' => 'PaymentController@show',
    'as' => 'payment_show_path',
]);
Route::post('send/payment/total', [
    'uses' => 'PaymentController@total',
    'as' => 'save_total_inquire_path',
]);
Route::post('send/payment/registrer', [
    'uses' => 'PaymentController@store',
    'as' => 'payment_store_path',
]);

Route::post('send/payment/registrer_next', [
    'uses' => 'PaymentController@store_next',
    'as' => 'payment_store_next_path',
]);

//process
Route::get('/send/process', [
    'uses' => 'PaymentController@process',
    'as' => 'process_path',
]);

Route::get('/pruebas', [
    'uses' => 'MessageController@pruebas',
    'as' => 'pruebas_path',
]);
