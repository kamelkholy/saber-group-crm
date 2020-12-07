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

Route::prefix('moderation')->group(function() {
    Route::get('/', 'ModerationController@home')->middleware('Moderation');


    //leads
    Route::get('/addnewlead', 'ModerationController@addnewlead')->middleware('Moderation');
    Route::post('/addnewlead_store', 'ModerationController@addnewlead_store')->middleware('Moderation');
    Route::get('/manageleads', 'ModerationController@manageleads')->middleware('Moderation');
    Route::get('/deletecustomer/{customer_id}', 'ModerationController@deletecustomer')->middleware('Moderation');
    Route::get('/checknumber_lead/{number}', 'ModerationController@checknumber_lead')->middleware('Moderation');
    Route::get('/updatelead/{customer_id}', 'ModerationController@updatelead')->middleware('Moderation');
    Route::post('/updatelead_store/{customer_id}', 'ModerationController@updatelead_store')->middleware('Moderation');
    //startshift
    Route::get('/startshift', 'ModerationController@startshift')->middleware('Moderation');
    Route::get('/updateshift/{shift_id}', 'ModerationController@updateshift')->middleware('Moderation');
    Route::get('/shiftreport', 'ModerationController@shiftreport')->middleware('Moderation');
    Route::get('/getclientreport/{client_id}', 'ModerationController@getclientreport')->middleware('Moderation');


    //reports static
    Route::get('/gettodayreport', 'ModerationController@gettodayreport')->middleware('Moderation');
    Route::get('/monthlyreport_main', 'ModerationController@monthlyreport_main')->middleware('Moderation');
    Route::get('/getcurrentmonth', 'ModerationController@getcurrentmonth')->middleware('Moderation');
    Route::get('/getcurrentyear', 'ModerationController@getcurrentyear')->middleware('Moderation');
    Route::get('/allleads', 'ModerationController@allleads')->middleware('Moderation');


    //dynamic
    Route::post('/getmonrhlyreport', 'ModerationController@getmonrhlyreport')->middleware('Moderation');
    Route::get('/datemain', 'ModerationController@datemain')->middleware('Moderation');
    Route::post('/datemain_get', 'ModerationController@datemain_get')->middleware('Moderation');
    Route::get('/daterange', 'ModerationController@daterange');
    Route::post('/daterangereport', 'ModerationController@daterangereport')->middleware('Moderation');
    Route::get('/timemain', 'ModerationController@timemain');
    Route::post('/timerangereport', 'ModerationController@timerangereport')->middleware('Moderation');

    //shifts
    Route::get('/normalshiftper', 'ModerationController@normalshiftper')->middleware('Moderation');
    Route::post('/normalshiftperreport', 'ModerationController@normalshiftperreport')->middleware('Moderation');
    Route::get('/nightshiftper', 'ModerationController@nightshiftper')->middleware('Moderation');
    Route::post('/nightshiftperreport', 'ModerationController@nightshiftperreport')->middleware('Moderation');

    
    Route::get('/normalallclients', 'ModerationController@normalallclients')->middleware('Moderation');
    Route::post('/normalallclientsreport', 'ModerationController@normalallclientsreport')->middleware('Moderation');
    Route::get('/nightallclients', 'ModerationController@nightallclients')->middleware('Moderation');
    Route::post('/nightallclientsreport', 'ModerationController@nightallclientsreport')->middleware('Moderation');


    //city
    Route::get('/addnewcity', 'ModerationController@addnewcity')->middleware('Moderation');
    Route::post('/addnewcity_store', 'ModerationController@addnewcity_store')->middleware('Moderation');
    Route::get('/citylist', 'ModerationController@citylist')->middleware('Moderation');
    Route::get('/deletecity/{city_id}', 'ModerationController@deletecity')->middleware('Moderation');

    //category
    Route::get('/addnewclientcat', 'ModerationController@addnewclientcat')->middleware('Moderation');
    Route::post('/addnewcat_store', 'ModerationController@addnewcat_store')->middleware('Moderation');
    Route::get('/catlist', 'ModerationController@catlist')->middleware('Moderation');
    Route::get('/getclientcat/{cat_id}', 'ModerationController@getclientcat')->middleware('Moderation');

    


    



    
});
