<?php
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/postagem/{id}', 'PublicController@postagem')->name('postagem');
Route::get('/', 'PublicController@index')->name('index');

Route::prefix('/posts')->group(function (){
    Route::get('/destroy', 'PostsController@destroy')->name('destroy');
    Route::get('/postagem/{id}', 'PostsController@publicar')->name('publicar');
    Route::get('/editar/{id}', 'PostsController@editar')->name('editar');
    Route::post('/store', 'PostsController@store')->name('store');
    Route::patch('/editar/', 'PostsController@update')->name('update');
    Route::get('/novo', 'PostsController@novo')->name('novo');
});


