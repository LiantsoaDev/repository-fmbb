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

/* --------------------------Route ARTICLES-------------------------- */

Route::prefix('articles')->group(function(){
    
        Route::get('/index',array('as'=>'index','uses'=>'ArticlesController@index')); 
        Route::get('/show/{id}',array('as'=>'show','uses'=>'ArticlesController@show'));
        Route::get('/create',array('as'=>'create','uses'=>'ArticlesController@create'));
        Route::post('/store',array('as'=>'store','uses'=>'ArticlesController@store'));
        Route::get('/edit/{id}',array('as'=>'edit','uses'=>'ArticlesController@edit'));
        Route::post('/update/{id}',array('as'=>'update','uses'=>'ArticlesController@update'));
        Route::get('/delete/{id}',array('as'=>'delete','uses'=>'ArticlesController@destroy'));


/*----------------------------route publicite----------------------------------*/
        Route::get('/publicite', array('as'=>'publicite','uses'=>'PubController@indexpub'));
        Route::post('/insertpub', array('as'=>'insertpub','uses'=>'PubController@storepub'));
        Route::get('/publierpub/{id}', array('as'=>'publierpub','uses'=>'PubController@publierpub'));
        Route::get('/supprpub/{id}', array('as'=>'supprpub', 'uses'=>'PubController@supprpub'));
/*----------------------------------------------------------------------------*/


/*----------------------------route image-fond----------------------------------*/

        Route::get('/fond',array('as'=>'fond','uses'=>'ImagePubController@fond'));
        Route::post('/insertimgpub',array('as'=>'insertimgpub','uses'=>'ImagePubController@insertimages'));
        Route::get('/destroy/{id}',array('as'=>'destroy','uses'=>'ImagePubController@destroy'));
/*----------------------------------------------------------------------------*/

/*----------------------------route publication---------------------------*/

        //publier articles
        Route::get('/publication/{id}', array('as'=>'publication','uses'=>'ArticlesController@publication'));

        //publier Images de fond
        Route::get('/publier/{id}', array('as'=>'publier','uses'=>'ImagePubController@publication'));

/*-------------------------------------------------------------------------*/
    
    });

/*------------------------------------------------------------Fin ARTICLES----------------------------------------------------------------------- */


/*-----------------------------Backoffice admin -------------------------------------------- */

Route::prefix('admin')->group(function () {

    Route::get('listes-evenements',['as' => 'show.event', 'uses' => 'EventsController@showevents']);
    Route::get('ajout-evenement',['as' => 'add.event', 'uses' => 'EventsController@addevents']);
    Route::get('insertion-equipe',['as' => 'add.team', 'uses' => 'EventsController@addteams']);
    Route::post('formaddevents',['as' => 'method.addevent', 'uses' => 'EventsController@ajoutevenement']);
    Route::post('formaddteams',['as' => 'method.addteam', 'uses' => 'EventsController@ajoutequipevent']);
    Route::get('update-event/{id}',['as' => 'event.showupdate', 'uses' => 'EventsController@showupdate'])->where('id','[0-9]+')->middleware('verifyid');
    Route::post('form-update',['as' => 'form.update.event', 'uses' => 'EventsController@formupdatevent']);
    Route::get('detail-event/{id}',['as' => 'event.detail', 'uses' => 'EventsController@detailevent'])->where('id','[0-9]+')->middleware('verifyid');
    Route::get('suspendre/{id}',['as' => 'event.suspend', 'uses' => 'EventsController@suspendre'])->where('id','[0-9]+')->middleware('verifyid');

    Route::post('getnewmatch',['as' => 'new.match', 'uses' => 'CalendriersController@insertnewmatch']);

    Route::post('multiple',['as' => 'js.teams', 'uses' => 'EventsController@multiples']);
    Route::get('error',['as' => 'error.errorpage', 'uses' => function(){ return view('error.errorpage'); }]);

    Route::get('calendrier/{id}',['as' => 'admin.calendrier', 'uses' => 'CalendriersController@showcalendrier'])->where('id','[0-9]+')->middleware('verifyid'); 
    Route::get('update-match',['as' => 'admin.show-update-match', 'uses' => 'CalendriersController@showupdatematch']); 
    Route::get('addnewmatch',['as' => 'admin.addmatch', 'uses' => 'CalendriersController@addnewmatch' ])->middleware('verifysessionid');    
        
});


/**----------------------------------------------Front-end jersam---------------------------------------------------- */

Route::prefix('front')->group(function(){
    
        Route::get('/accueil',array('as'=>'accueil','uses'=>'FrontController@index')); 
       
    });

/**----------------------------------------------Fin Front-end jersam--------------------------------------------------*/