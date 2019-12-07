<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'post'], function ($route) {

    $route->get('/', 'Api\PostController@index');
    $route->post('/', 'Api\PostController@store');
    $route->get('/{id}', 'Api\PostController@show');
    $route->patch('/{id}', 'Api\PostController@update');
    $route->delete('/{id}','Api\PostController@destroy');
});


Route::get('/{postid}/comments','Api\CommentController@viewComments');
Route::post('/{postid}/addComment', 'Api\CommentController@addComment');
Route::delete('/{postid}/deleteComment', 'Api\CommentController@deleteComment');

Route::get('/comments', 'Api\CommentController@viewAllComments');