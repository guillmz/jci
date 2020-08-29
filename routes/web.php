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

Route::get('/home', 'LineaController@index')->name('home');


Route::group(['prefix' => 'production'], function () {
    Route::get('line/new', 'LineaController@create')->name('line.new');
    Route::get('line/edit/{id}', 'LineaController@edit')->name('line.edit');
    Route::post('line/save', 'LineaController@store')->name('line.save');
    Route::get('line/delete/{id}', 'LineaController@destroy')->name('line.destroy');
    Route::get('line/update/{id}', 'LineaController@update')->name('line.update');
});

