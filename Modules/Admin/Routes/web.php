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

Route::prefix('admin')->group(function() {
    Route::get('/', 'AdminController@homeadmin')->middleware('Admin');;
    Route::get('/addnewuser', 'AdminController@addnewuser')->middleware('Admin');;
    Route::post('/addnewuser_store', 'AdminController@addnewuser_store')->middleware('Admin');;
    Route::get('/userlist', 'AdminController@userlist')->middleware('Admin');;
    Route::get('/addnewclient', 'AdminController@addnewclient')->middleware('Admin');;
    Route::post('/addnewclient_store', 'AdminController@addnewclient_store')->middleware('Admin');;
    Route::get('/clientlist', 'AdminController@clientlist')->middleware('Admin');;
});
