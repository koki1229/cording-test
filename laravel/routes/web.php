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
    return view('welcome');
});

//一覧
Route::get('task', 'TaskController@index');
//新規追加
Route::get('task/add', 'TaskController@add');
Route::post('task/add', 'TaskController@create');
//編集
Route::get('task/edit', 'TaskController@edit');
Route::post('task/edit', 'TaskController@update');
//削除
Route::post('task/delete', 'TaskController@delete');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
