<?php

Route::get('/', function () {
    return [
        'latest'  => config('app.api_latest'),
        'current' => config('app.api_version'),
    ];
});

Route::group(['prefix' => '/cart'], function () {
    Route::delete('/', '\App\Http\Controllers\CartController@delete');
    Route::patch('/', '\App\Http\Controllers\CartController@update');
    Route::post('/', '\App\Http\Controllers\CartController@store');

    Route::get('/contents', '\App\Http\Controllers\CartController@contents');

    Route::delete('/product/{product}/remove', '\App\Http\Controllers\CartController@removeItem');

    Route::group(['prefix' => '/q'], function () {
        Route::get('/is-empty', '\App\Http\Controllers\CartController@isEmpty');
        Route::get('/count', '\App\Http\Controllers\CartController@count');
        Route::get('/coupon/{coupon}', '\App\Http\Controllers\CartController@coupon');
        Route::get('/subtotal', '\App\Http\Controllers\CartController@subtotal');
        Route::get('/total', '\App\Http\Controllers\CartController@total');
        Route::get('/total-quantity', '\App\Http\Controllers\CartController@totalQuantity');
    });
});

Route::get('/csv/download', '\App\Http\Controllers\CSVExporter');

Route::resource('/product', 'ProductController');
