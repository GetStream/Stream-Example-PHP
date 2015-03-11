<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::get('/', array('before' => 'autologin', 'as' => 'trending', 'uses' => 'LandingController@trending'));
Route::get('/feed', array('before' => 'autologin', 'as' => 'feed', 'uses' => 'FeedController@feed'));
Route::get('/aggregated', array('before' => 'autologin', 'as' => 'aggregated_feed', 'uses' => 'FeedController@aggregated_feed'));
Route::get('/people', array('before' => 'autologin', 'as' => 'people', 'uses' => 'ProfileController@index'));
Route::get('/profile/{username}', array('before' => 'autologin', 'as' => 'profile', 'uses' => 'ProfileController@profile'));
Route::resource('pin', 'PinController', array('before' => 'autologin'));
Route::resource('follow', 'FollowController', array('before' => 'autologin'));
