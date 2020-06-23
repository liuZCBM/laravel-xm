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
//     return view('welcome');
// });
Route::any('/','index\MenuController@index');
Route::any('/create','index\MenuController@create');
Route::any('/addcreate','index\MenuController@addcreate');
Route::any('/addindex','index\MenuController@addindex');
Route::any('/dodel','index\MenuController@dodel');
Route::any('/connoisseuradd/{id}','index\MenuController@connoisseuradd');
Route::any('/update','index\MenuController@update');
Route::any('/updateajax','index\MenuController@updateajax');
