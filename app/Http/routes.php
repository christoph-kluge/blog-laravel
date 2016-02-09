<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/', ['as' => 'blog', 'uses' => 'BlogController@index']);
    Route::get('/post/new', ['as' => 'post-new', 'uses' => 'BlogController@newPost']);
    Route::post('/post/new', ['as' => 'post-new-save', 'uses' => 'BlogController@insertPost']);
    Route::get('/post/{slug}', ['as' => 'post', 'uses' => 'BlogController@showPost']);
    Route::get('/post/{slug}/edit', ['as' => 'post-edit', 'uses' => 'BlogController@editPost']);
    Route::post('/post/{slug}/edit', ['as' => 'post-edit-save', 'uses' => 'BlogController@editPost']);
});