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

// 商品出品修正周り
Route::get('/', 'ItemsController@index');
Route::get('/sell', 'ItemsController@sell');
Route::post('/items', 'ItemsController@store');
Route::get('/itemsedit/{item}', 'ItemsController@edit');
Route::post('/items/update', 'ItemsController@update');
Route::delete('/itemdelete/{item}', 'ItemsController@destroy');
Route::post('/item/fav/{item_id}','ItemsController@fav');
Route::get('/item/{item}', 'ItemsController@show');

// 購入申請周り
Route::get('/purchase/{item}', 'TransactionsController@apply');
Route::post('/purchase/confirm', 'TransactionsController@store');

// ユーザーページ周り
Route::get('/user/{user}', 'UsersController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
