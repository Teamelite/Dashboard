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

/**
 * Pages
 */
Route::group(['as' => 'page'], function() {

    Route::get('/', ['as' => '.home', 'uses' => 'Page\PageController@showHome']);
    Route::get('/about', ['as' => '.about', 'uses' => 'Page\PageController@showAbout']);

});

/**
 * Authentication
 */
Route::group(['as' => 'auth'], function() {

    Route::group(['middleware' => 'guest'], function() {

        /**
         * User login
         */
        Route::get('login', ['as' => '.login', 'uses' => 'Auth\AuthController@showLogin']);
        Route::group(['middleware' => 'verification.required'], function() {
            Route::post('login', ['as' => '.login', 'uses' => 'Auth\AuthController@login']);
        });

        /**
         * User registration
         */
        Route::get('register', ['as' => '.register', 'uses' => 'Auth\AuthController@showRegister']);
        Route::post('register', ['as' => '.register', 'uses' => 'Auth\AuthController@register']);
        Route::group(['as' => '.verify', 'prefix' => 'verify'], function() {
            Route::get('{token}', 'Auth\AuthController@verify');
        });

        /**
         * Password Reset
         */
        Route::post('forgot', ['as' => '.forgot', 'uses' => 'Auth\AuthController@forgotPassword']);
        Route::group(['as' => '.reset', 'prefix' => 'reset'], function() {
            Route::get('{token}', 'Auth\AuthController@resetPassword');
        });

    });

    /**
     * User logout
     */
    Route::get('logout', ['as' => '.logout', 'uses' => 'Auth\AuthController@logout']);

});

/**
 * User
 */
Route::group(['as' => 'user', 'prefix' => 'user'], function() {

    Route::group(['middleware' => 'auth'], function() {

        /**
         * Applications
         */
        Route::group(['as' => '.apply', 'prefix' => 'apply', 'middleware' => 'minecraft.required'], function() {
            Route::get('/', 'User\ApplicationController@showApply');
            Route::post('/', 'User\ApplicationController@apply');

            Route::get('edit/{id}', ['as' => '.edit', 'uses' => 'User\ApplicationController@edit']);
            Route::post('update', ['as' => '.update', 'uses' => 'User\ApplicationController@update']);
        });

        /**
         * Account
         */
        Route::group(['as' => '.account', 'prefix' => 'account'], function() {
            Route::get('/', 'User\AccountController@showAccount');

            Route::post('settings', ['as' => '.settings', 'uses' => 'User\AccountController@update']);
            Route::post('password', ['as' => '.password', 'uses' => 'User\AccountController@changePassword']);
            Route::post('email', ['as' => '.email', 'uses' => 'User\AccountController@changeEmailRequest']);
            Route::get('email/{token}', ['as' => '.email.confirm', 'uses' => 'User\AccountController@changeEmailConfirm']);
        });

        /**
         * Minecraft
         */
        Route::group(['as' => '.minecraft', 'prefix' => 'minecraft'], function() {
            Route::get('confirm/{token}', ['as' => '.confirm', 'uses' => 'User\AccountController@minecraftConfirm']);
        });

    });

});

/**
 * Dashboard
 */
Route::group(['as' => 'dashboard', 'prefix' => 'dashboard'], function() {

    Route::get('/', 'Dashboard\DashboardController@show');

});
