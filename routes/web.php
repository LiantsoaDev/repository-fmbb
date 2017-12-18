<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Route::get('/', 'ArticlesController@ind');
//Route::post('upload', 'ArticlesController@upload');

/*---------------------Authentification-------------------------------*/

Route::prefix('authent')->group(function(){

    Route::get('/login',array('as'=>'login','uses'=>'SessionsController@create'));
    Route::get('/registration',array('as'=>'registration','uses'=>'RegisterController@create'));
    Route::post('/registrer',array('as'=>'registrer','uses'=>'RegisterController@store'));
    Route::get('/logout',array('as'=>'logout','uses'=>'SessionsController@destroy'));

});
/*---------------------------------------------------------------------*/

/* --------------------------Route Articles-------------------------- */

Route::prefix('articles')->group(function(){
    
        Route::get('/index',array('as'=>'index','uses'=>'ArticlesController@index')); 
        Route::get('/show/{id}',array('as'=>'show','uses'=>'ArticlesController@show'));
        Route::get('/create',array('as'=>'create','uses'=>'ArticlesController@create'));
        Route::post('/store',array('as'=>'store','uses'=>'ArticlesController@store'));
        Route::get('/edit/{id}',array('as'=>'edit','uses'=>'ArticlesController@edit'));
        Route::post('/update/{id}',array('as'=>'update','uses'=>'ArticlesController@update'));
        Route::get('/delete/{id}',array('as'=>'delete','uses'=>'ArticlesController@destroy'));

/*----------------------------route images----------------------------------*/
        Route::get('/uploadimage', array('as'=>'uploadimage','uses'=>'ArticlesController@uploadForm'));
        Route::post('/upload', array('as'=>'upload','uses'=>'ArticlesController@uploadSubmit'));
    
    });

/*------------------------------------------------------------------------- */
