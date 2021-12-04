<?php
use Illuminate\Http\Request;
use App\Item;
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

Route::get('/', 'ItemsController@index');
Route::post('/items', 'ItemsController@store');
Route::get('/itemsedit/{item}', 'ItemsController@edit');
Route::post('/items/update', 'ItemsController@update');
Route::delete('/item/{item}', 'ItemsController@destroy');
Route::post('/item/fav/{item_id}','ItemsController@fav');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
