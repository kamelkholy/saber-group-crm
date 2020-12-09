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

Route::prefix('client')->group(function() {
    Route::get('/', 'ClientController@home')->middleware('Client');
    Route::post('/filter', 'ClientController@filter')->middleware('Client');

    //reports
    Route::get('/gettodayreport', 'ClientController@gettodayreport')->middleware('Client');
    Route::get('/getcurrentmonth', 'ClientController@getcurrentmonth')->middleware('Client');
    Route::get('/getcurrentyear', 'ClientController@getcurrentyear')->middleware('Client');
    Route::get('/allleads', 'ClientController@allleads')->middleware('Client');
    Route::get('/monthlyreport_main', 'ClientController@monthlyreport_main')->middleware('Client');
    Route::post('/getmonrhlyreport', 'ClientController@getmonrhlyreport')->middleware('Client');
    Route::get('/datemain', 'ClientController@datemain')->middleware('Client');
    Route::post('/datemain_get', 'ClientController@datemain_get');
    Route::get('/daterange', 'ClientController@daterange')->middleware('Client');
    Route::post('/daterangereport', 'ClientController@daterangereport')->middleware('Client');
    Route::get('/timemain', 'ClientController@timemain')->middleware('Client');
    Route::post('/timerangereport', 'ClientController@timerangereport')->middleware('Client');
    
    
});
