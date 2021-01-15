<?php

use Illuminate\Support\Facades\Route;


Route::view('/', 'index');



Route::view('about', 'about');
Route::view('schedule', 'schedule');
Route::view('galery', 'galery');
Route::get('galery-detail', function () {
    return view('galery-detail');
});
Route::get('blog', 'BlogController@index');
Route::get('blog/create', 'BlogController@create');
Route::post('blog/store', 'BlogController@store');
Route::get('blog/{blog:slug}', 'BlogController@show');
Route::get('blog/{blog:slug}/edit', 'BlogController@edit');
Route::patch('blog/{blog:slug}/edit', 'BlogController@update');
Route::delete('blog/{blog:slug}/delete', 'BlogController@destroy');




Route::view('contact', 'contact');
Route::view('login', 'login');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
