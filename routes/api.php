<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/


Route::post('/register', 'API\AuthController@register');
Route::post('/login', 'API\AuthController@login');
Route::post('/import', 'API\AuthController@importCsv');


Route::group(['middleware' => 'auth:api'], function() {
    Route::post('/logout', 'API\AuthController@logout');
    Route::post('/shops', 'API\ShopController@index');
    Route::post('/likedshops', 'API\ShopController@likedShops');
    Route::put('/like/{id}', 'API\ShopController@likeShop');
    Route::put('/dislike/{id}', 'API\ShopController@disLikeShop');
    Route::delete('/delete/{id}', 'API\ShopController@destroy');
});
