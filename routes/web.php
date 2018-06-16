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

Route::get('about', function() {
    return View::make('about');
});


Route::get('bravo', 'MyHomeController@showbravo');
Route::get('echo', 'MyHomeController@showecho');

Route::get('charlie/{name?}', 'MyHomeController@showcharlie');

Route::view('/delta', 'deltaview', ['aa' => '11', 'bb' => '22', 'cc' => '33']);

Route::get('firstchild', function() {
	return View::make('firstchild');
});

Route::get('shuffle', 'MyHomeController@do_shuffle');

