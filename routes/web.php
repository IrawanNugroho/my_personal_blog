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

Route::get('/', function () {
    return view('demo');
});

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'article'], function(){
    route::get('/', 'ArticleController@index')->name('articles.index');
    route::get('/create', 'ArticleController@create')->name('articles.create');
    route::get('/edit/{id}', 'ArticleController@edit')->where(['id' => '[0-9]+'])->name('articles.edit');

    route::post('/', 'ArticleController@store')->name('articles.store');
    route::post('/{id}', 'ArticleController@update')->name('articles.update');
    
});