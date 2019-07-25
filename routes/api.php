<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::apiResource('question', 'QuestionController');
Route::apiResource('category', 'CategoryController');
Route::apiResource('question/{question}/reply', 'ReplyController')->except(['show', 'update', 'destroy']);
Route::get('reply/{reply}', 'ReplyController@show')->name('reply.show');
Route::patch('reply/{reply}', 'ReplyController@update')->name('reply.update');
Route::delete('reply/{reply}', 'ReplyController@destroy')->name('reply.destroy');