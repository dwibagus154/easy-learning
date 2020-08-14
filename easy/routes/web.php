<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/question', 'QuestionsController@index');
Route::get('/question/ask', 'QuestionsController@create');
Route::post('/question/ask', 'QuestionsController@store');
Route::get('question/{question}', 'QuestionsController@show');
Route::resource('question', 'QuestionsController');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/ind', 'IndonesiaController@index');
