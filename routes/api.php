<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group([
    'middleware' => 'api',
    'prefix'=>'v1'
], function ($router) {
    Route::post('login', 'App\Http\Controllers\AuthController@login')->name('login');
    Route::post('register', 'App\Http\Controllers\AuthController@register');
    Route::post('logout', 'App\Http\Controllers\AuthController@logout');
    Route::post('refresh', 'App\Http\Controllers\AuthController@refresh');
    Route::get('user-profile', 'App\Http\Controllers\AuthController@userProfile');

        Route::put('update-user', 'App\Http\Controllers\UserController@updateProfile');
        Route::put('update-password', 'App\Http\Controllers\UserController@updatePassword');

        Route::post('doctor-education', 'App\Http\Controllers\Doctor\DoctorEducationController@store');
});
