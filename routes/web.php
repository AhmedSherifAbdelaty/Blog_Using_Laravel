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


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/add' , 'manageBlogger@addArticleGet');
Route::post('/add' , 'manageBlogger@addArticlePost');

Route::get('view' , 'manageBlogger@viewArticle');

Route::get('read/{id}' , 'manageBlogger@read');
Route::post('read/{id}' , 'manageBlogger@postComment');

Route::get('edit/{id}' , 'manageBlogger@edit');
Route::post('update/{id}' , 'manageBlogger@update');

Route::get('/delete/{id}' , 'manageBlogger@delete');


Route::get('editcomment/{id}' , 'manageBlogger@editcomment');
Route::post('updatecomment/{id}' , 'manageBlogger@updatecomment');

Route::get ('deletecomment/{id}' , 'manageBlogger@deletecomment');
