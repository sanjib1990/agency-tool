<?php

Route::group([
    'prefix'        => 'v1',
    'middleware'    => ['header']
], function () {
    // Token
    Route::group([
        'prefix'    => 'auth',
        'namespace' => 'Api'
    ], function () {
        Route::post('/token', 'AuthenticateController@token');
        Route::post('/token/refresh', 'AuthenticateController@refreshToken')->middleware(['jwt.auth']);
    });
});
