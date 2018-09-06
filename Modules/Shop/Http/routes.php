<?php

Route::group(['middleware' => 'web', 'prefix' => 'shop', 'namespace' => 'Modules\Shop\Http\Controllers'], function()
{
    Route::get('/', 'ShopController@index')->name('shop.index');
    Route::get('/product-detail/{slug}', 'ShopController@productShow')->name('shop.product-detail');
    Route::get('/contact', 'ShopController@contact')->name('shop.contact');
    Route::get('/checkout', 'ShopController@checkout')->name('shop.checkout');
    Route::get('/privacy-policy', 'ShopController@privacy')->name('shop.privacy');
    Route::get('/cancel-return', 'ShopController@cancelReturn')->name('shop.cancel_return');
    Route::get('/terms-of-use', 'ShopController@terms')->name('shop.terms');
    Route::get('/online-selling-contract', 'ShopController@onlineSellingContract')->name('shop.online_selling_contract');
    Route::get('/payment-shipment', 'ShopController@paymentShipment')->name('shop.payment-shipment');
    Route::get('/lawsuit', 'ShopController@lawsuit')->name('shop.lawsuit');
});
