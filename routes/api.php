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



Route::resource("users","UserController",['except'=>['create','edit','show']]);


Route::group(['middleware'=>['auth:api']], function (){
    Route::get("posts","PostController@index");
    Route::resource("posts","PostController",['except'=>['destroy','index','create','edit','show']]);
    Route::resource("responses","ResponseController",['except'=>['create','edit','show']]);
    Route::resource("likes","LikeController",['except'=>['create','show']]);

    Route::group(['middleware'=>["check.post.user"]], function (){
        Route::delete("posts/{post}","PostController@destroy");
    });


    Route::get("list/user",function (){
        return \App\User::all();
    });
});


/*Route::group(['middleware'=>['Post:api']], function (){
    Route::get("list/post",function (){
        return \App\Post::all();
    });
});*/


Route::group(['middleware'=>['Response:api']], function (){
    Route::get("list/response",function (){
        return \App\Response::all();
    });
});

Route::group(['middleware'=>['Like:api']], function (){
    Route::get("list/like",function (){
        return \App\Like::all();
    });
});
