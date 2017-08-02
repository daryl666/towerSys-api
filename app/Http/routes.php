<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {
    $api->group(['namespace' => 'App\Api\Controllers'], function($api){
        $api->post('user/login', 'AuthController@authenticate');
        $api->post('user/logout', 'AuthController@logout');
        $api->post('user/register', 'AuthController@register');
        $api->group(['middleware' => ['jwt.auth', 'cors']], function ($api){
            $api->get('user/me', 'AuthController@getAuthenticatedUser');
            $api->resource('siteOrder', 'SiteOrderCoreController');
            $api->resource('eventSiteCheck', 'EventSiteCheckController');
            $api->resource('priceTower', 'PriceTowerController');
            $api->resource('priceHouse', 'PriceHouseController');
            $api->resource('priceMaintain', 'PriceMaintainController');
            $api->resource('priceSite', 'PriceSiteController');
            $api->resource('priceSupport', 'PriceSupportController');
            $api->resource('priceImport', 'PriceImportController');
            $api->resource('shareDiscount', 'ShareDiscountController');
            $api->resource('eventTysysOs', 'EventTysysOsController');
            $api->resource('eventPowerGnr', 'EventPowerGnrController');
        });
    });
});
