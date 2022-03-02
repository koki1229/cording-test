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
    return view('home');
})->middleware('auth');

//タスク管理関連
//一覧
Route::get('task', 'TaskController@index')->middleware('auth');
Route::post('task', 'TaskController@serch')->middleware('auth');
//新規追加
Route::get('task/add', 'TaskController@add')->middleware('auth');
Route::post('task/add', 'TaskController@create')->middleware('auth');
//閲覧
Route::get('task/view', 'TaskController@view')->middleware('auth');
//編集
Route::get('task/edit', 'TaskController@edit')->middleware('auth');
Route::post('task/edit', 'TaskController@update')->middleware('auth');
//削除
Route::post('task/delete', 'TaskController@delete')->middleware('auth');

//Auth関連
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
