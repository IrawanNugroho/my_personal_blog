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

// Route::get('/', function () {
//     return view('demo');
// });
Route::get('/', 'FrontendController@index')->name('frontend.index');

Route::get('/blog/{slug}', 'FrontendController@show')->name('frontend.show');

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'article'], function(){
    route::get('/', 'ArticleController@index')->name('articles.index');
    route::get('/create', 'ArticleController@create')->name('articles.create');
    route::get('/edit/{id}', 'ArticleController@edit')->where(['id' => '[0-9]+'])->name('articles.edit');
    route::get('/show/{id}', 'ArticleController@show')->where(['id' => '[0-9]+'])->name('articles.show');

    route::post('/', 'ArticleController@store')->name('articles.store');
    
    route::post('/{id}', 'ArticleController@update')->where(['id' => '[0-9]+'])->name('articles.update');
    
    route::delete('/delete/{id}', 'ArticleController@destroy')->where(['id' => '[0-9]+'])->name('articles.delete');

    route::get('/upload', 'ArticleController@store_image')->name('articles.upload');
    
});

Route::group(['prefix' => 'gallery'], function(){
    route::get('/', 'GalleryController@index')->name('galleries.index');
    route::get('/create', 'GalleryController@create')->name('galleries.create');
});