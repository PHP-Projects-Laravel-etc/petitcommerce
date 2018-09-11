<?php

Route::group(['middleware' => ['web','admin'], 'prefix' => 'instagram', 'namespace' => 'Modules\Instagram\Http\Controllers'], function()
{
    Route::get('/', 'InstagramController@index');
    Route::get('/reportset', 'InstagramController@reportset')->name('instagram.reportset');
    Route::post('/report','InstagramController@report')->name('instagram.report');
    Route::post('/','InstagramController@store')->name('instagram.store');


});
