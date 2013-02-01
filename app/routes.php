<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::controller('account', 'AccountController');
Route::controller('order', 'OrderController');
Route::controller('api', 'ApiController');
Route::controller('/', 'HomeController');

App::missing(function($exception)
{
	switch ($exception->getStatusCode()) {
		case '404':
			return View::make('errors.404');
			break;
		case '403':
			return View::make('errors.403');
			break;
		case '500':
			Log::error('http error 500 on page ' . Request::url());
			return View::make('errors.500');
			break;
		default:
			Log::error('http error 500 on page ' . Request::url());
			return View::make('errors.500');
			break;
	}
});