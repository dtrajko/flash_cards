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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', 'MenuController@index');

Route::get('/cards', 'CardsController@index');

Route::get('/languages', 'LanguagesController@home');
Route::get('/languages/{language}', 'LanguagesController@show');

Route::post('/languages/create', 'LanguagesController@create');
Route::get('/languages/delete/{language}', 'LanguagesController@delete');

Route::get('/terms', 'TermsController@index');
Route::post('/terms/create', 'TermsController@create');
Route::get('/terms/details/{term}', 'TermsController@details');
Route::get('/terms/delete/{term}', 'TermsController@delete');

Route::get('/vocabulary', 'VocabularyController@index');
Route::get('/vocabulary/delete/{vocabulary}', 'VocabularyController@delete');
Route::post('/vocabulary/create', 'VocabularyController@create');

Route::post('/vocabulary/verify', 'VocabularyController@verify');

Route::get('/settings/update_score/{outcome}', 'SettingsController@update_score');
