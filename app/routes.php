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

Route::Resource('/', 'App\Controllers\UserRegController');
Route::get('user/{userId}/downloadHere', array('as' => 'user.downloadHere', 'uses' => 'App\Controllers\UserRegController@downloadFromHere'));
Route::get('pdf/{userId}', array('as' => 'downloadPDF', 'uses' => 'App\Controllers\UserRegController@generatePDF'));
