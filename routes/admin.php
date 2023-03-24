<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

define('PAGINATION_COUNT',10);

Route::group(['namespace' => 'Admin' , 'middleware' => 'auth:admin'] , function(){

   Route::get('/','DashboardController@index') -> name('admin.dashboard');

   ######################## Languages Routes #################

    Route::group(['prefix' => 'languages'], function(){

        Route::get('/','LanguagesController@index') -> name('admin.languages');
        Route::get('create','LanguagesController@create') -> name('admin.languages.create');
        Route::post('store','LanguagesController@store') -> name('admin.languages.store');

        Route::get('edit/{id}','LanguagesController@edit') -> name('admin.languages.edit');
        Route::post('update/{id}','LanguagesController@update') -> name('admin.languages.update');

        Route::get('delete/{id}','LanguagesController@delete') -> name('admin.languages.delete');
    });

    ######################### Main Categories Routes ############################

    Route::group(['prefix' => 'main_categories'], function(){

        Route::get('/','MainCategoriesController@index') -> name('admin.maincategory');

        Route::get('create','MainCategoriesController@create') -> name('admin.maincategory.create');
        Route::post('store','MainCategoriesController@store') -> name('admin.maincategory.store');

        Route::get('edit/{id}','MainCategoriesController@edit') -> name('admin.maincategory.edit');
        Route::post('update/{id}','MainCategoriesController@update') -> name('admin.maincategory.update');

        Route::get('delete/{id}','MainCategoriesController@delete') -> name('admin.maincategory.delete');
    });


});

Route::group(['namespace' => 'Admin' , 'middleware' => 'guest:admin'] , function(){

   Route::get('login','LoginController@getlogin')-> name('get.admin.login');
   Route::post('login','LoginController@login') -> name('admin.login');

});
