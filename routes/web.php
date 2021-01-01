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

Route::get('/', 'ProductController@index');

Route::get('Add-Cart/{id}', 'ProductController@addCart');

Route::get('Remove-Cart/{id}', 'ProductController@removeCart');

Route::get('Show-Cart', 'ProductController@showCart');

Route::get('list', function () {
    return view('list');
});

Route::get('Remove-List-Cart/{id}', 'ProductController@removeListCart');

Route::get('Update-List-Cart/{id}/{quantity}', 'ProductController@updateListCart');

Route::post('Edit-All', 'ProductController@EditAllListCart');