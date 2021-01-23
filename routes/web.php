<?php

use Illuminate\Support\Facades\Route;


Route::view('/', 'index');



Route::get('about', 'UserController@index');
Route::view('schedule', 'schedule');
Route::view('galery', 'galery');
Route::view('galery-detail', 'galery-detail`');

Route::get('blog', 'BlogController@index')->name('blog.index');

Route::prefix('blog')->middleware('auth')->group(function () {
    Route::get('create', 'BlogController@create')->name('blog.create');
    Route::post('store', 'BlogController@store')->name('blog.store');
    Route::get('{blog:slug}/edit', 'BlogController@edit')->name('blog.edit');
    Route::patch('{blog:slug}/edit', 'BlogController@update')->name('blog.update');
    Route::delete('{blog:slug}/delete', 'BlogController@destroy')->name('blog.destroy');
});

Route::get('blog/{blog:slug}', 'BlogController@show')->name('blog.show');
Route::get('categories/{category:slug}', 'CategoryController@show')->name('blog.show');



Route::view('contact', 'contact');
Route::view('login', 'login');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
