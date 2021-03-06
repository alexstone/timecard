<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*
|--------------------------------------------------------------------------
| API v1
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'v1'], function() {
    /*
    |--------------------------------------------------------------------------
    | Client API
    |--------------------------------------------------------------------------
    */
    Route::get('clients', ['uses' => 'ClientController@api_index'])->middleware('auth:api');
    Route::group(['prefix' => 'client', 'middleware' => 'auth:api'], function() {
        Route::post('/', ['uses' => 'ClientController@api_create']);
    });
});
