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

Route::prefix('sales')->group(function() {
    Route::get('/', 'SalesController@saleshome')->middleware('Sales');
    Route::post('/filter', 'SalesController@filter')->middleware('Sales');
    //reports
    Route::get('/gettodayreport', 'SalesController@gettodayreport')->middleware('Sales');
    Route::get('/getcurrentmonth', 'SalesController@getcurrentmonth')->middleware('Sales');
    Route::get('/getcurrentyear', 'SalesController@getcurrentyear')->middleware('Sales');

    //call on actions
    Route::get('/noactions_today', 'SalesController@noactions_today')->middleware('Sales');
    Route::get('/done_today', 'SalesController@done_today')->middleware('Sales');
    Route::get('/onhold_today', 'SalesController@onhold_today')->middleware('Sales');
    Route::get('/deal_today', 'SalesController@deal_today')->middleware('Sales');


    //month
    Route::get('/getcurrentmonth_noaction', 'SalesController@getcurrentmonth_noaction')->middleware('Sales');
    Route::get('/getcurrentmonth_done', 'SalesController@getcurrentmonth_done')->middleware('Sales');
    Route::get('/getcurrentmonth_onhold', 'SalesController@getcurrentmonth_onhold');
    Route::get('/getcurrentmonth_deal', 'SalesController@getcurrentmonth_deal')->middleware('Sales');

    //year
    Route::get('/getcurrentyear_noaction', 'SalesController@getcurrentyear_noaction')->middleware('Sales');
    Route::get('/getcurrentyear_done', 'SalesController@getcurrentyear_done')->middleware('Sales');
    Route::get('/getcurrentyear_onhold', 'SalesController@getcurrentyear_onhold')->middleware('Sales');
    Route::get('/getcurrentyear_deal', 'SalesController@getcurrentyear_deal')->middleware('Sales');
    //actions
    Route::get('/onhold/{customer_id}', 'SalesController@onhold')->middleware('Sales');
    Route::get('/call/{customer_id}', 'SalesController@call')->middleware('Sales');
    Route::get('/deal/{customer_id}', 'SalesController@deal')->middleware('Sales');
    Route::get('/getcustomertrack/{customer_id}', 'SalesController@getcustomertrack')->middleware('Sales');


    //action
    Route::get('/action/{customer_id}', 'SalesController@action')->middleware('Sales');
    Route::post('/action_store/{customer_id}', 'SalesController@action_store')->middleware('Sales');
});
