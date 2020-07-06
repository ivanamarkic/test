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
});*/

Route::get('/','PagesController@index');
Route::get('/DodajRaspored','PagesController@DodajRaspored');
Route::get('/DodajUsere','PagesController@DodajUsere');
Route::get('/dodaj','PagesController@dodaj');
Route::get('/dodaj1','PagesController@dodaj1');

/*
Route::get('/users/{id}', function ($id) {
    return view('pages.dodajraspored');
});
*/