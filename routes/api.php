<?php

Route::group(['namespace' => 'Api', 'middleware' => ['auth:api']], function () {
    Route::resource('users', 'UserController');
});
