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
    // return view('welcome');
    return redirect('/login');
});

Auth::routes();

Route::prefix('home')->group(function(){

	Route::get('/', function(){return redirect('/home/welcome');});


	Route::get('/ver2', 'HomeController@index')->name('home');


	Route::get('/welcome', 'HomeController@index')->name('home');
	Route::get('/history', 'HomeController@history')->name('history');
	Route::get('/ra9482', 'HomeController@ra9482')->name('ra9482');

});

Route::prefix('site')->group(function(){

	// Route::get('/vacc/{id}', 'SiteController@index');
	// Route::get('/nvacc/{id}', 'SiteController@non');

	Route::get('/brgy/{id}', 'SiteController@brgy');

	Route::post('/', 'SiteController@store');
	Route::get('/delete/{id}', 'SiteController@destroy');

	Route::get('/edit/{id}', 'SiteController@edit');
	Route::post('/edit', 'SiteController@update');
});

Route::prefix('settings')->group(function(){

	// Route::get('/brgy', 'BrgyController@index');
	// Route::post('/brgy', 'BrgyController@store');
	// Route::put('/brgy', 'BrgyController@update');
	// Route::get('/brgy/delete/{id}', 'BrgyController@destroy');

	// Route::get('/purok', 'PurokController@index');
	// Route::post('/purok', 'PurokController@store');
	// Route::put('/purok', 'PurokController@update');
	// Route::get('/purok/delete/{id}', 'PurokController@destroy');

	Route::prefix('account')->group(function(){
		Route::get('/', 'ProfileController@index');
		Route::post('/profile', 'ProfileController@profile');
		Route::post('/username', 'ProfileController@username');
		Route::post('/password', 'ProfileController@password');
	});

});

Route::prefix('reports')->group(function(){
	Route::get('/summary', 'ReportController@index');
	Route::get('/vacc/{id}', 'ReportController@vacc');
	Route::get('/nvacc/{id}', 'ReportController@nvacc');
	Route::get('/form/{id}', 'ReportController@form');
});

Route::prefix('owner')->group(function(){
	Route::get('/', 'OwnerController@index');
	Route::post('/', 'OwnerController@store');

	Route::get('/delete/{id}', 'OwnerController@destroy');

	Route::post('/update', 'OwnerController@update');
});

Route::prefix('lost-and-found')->group(function(){

	Route::get('/', 'LostFoundController@index');
	Route::get('/{id}', 'LostFoundController@found');
	Route::post('/', 'LostFoundController@store');

});




