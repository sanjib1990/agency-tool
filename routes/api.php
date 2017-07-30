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

    Route::group([
        'middleware'    => ['jwt.auth', 'jwt.refresh'],
        'namespace'     => 'Api'
    ], function () {
        Route::get('test', function () {
            return response()->jsend(["Hi there"]);
        });
    });
});

Route::group([
    'prefix'        => 'v1',
    'middleware'    => ['jwt.auth', 'jwt.refresh'],
    'namespace'     => 'Api'
], function () {
    Route::post('/upload', 'UploadController@create');
});
