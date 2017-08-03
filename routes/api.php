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
        Route::get('/token', [
            'middleware' => 'auth',
            'uses'      => 'AuthenticateController@getToken',
            'as'        => 'get.token'
        ]);
        Route::post('/token', 'AuthenticateController@token');
        Route::post('/token/refresh', 'AuthenticateController@refreshToken')->middleware(['jwt.auth']);
    });

    Route::group([
        'middleware'    => ['jwt.auth', 'header'],
        'namespace'     => 'Api'
    ], function () {
        Route::get('project/statuses', 'ProjectController@statuses')->name('project.statuses');

        Route::get('test', function () {
            return response()->jsend(["Hi there"]);
        });
    });
});

Route::group([
    'prefix'        => 'v1',
    'middleware'    => ['jwt.auth'],
    'namespace'     => 'Api'
], function () {
    Route::post('/upload', 'UploadController@create')->name('api.upload');
    Route::post('/upload/dummy', function () {
        return response()->jsend(['Excellent'], "success", 201);
    })->name('api.upload.dummy');
});
