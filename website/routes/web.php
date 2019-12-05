<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

if (Auth::check()) {
  Route::get('/', 'HomeController@show');
} else {
  Route::get('/', 'WelcomeController@show');
}

Route::get('/home', 'HomeController@show');

// Generic Pages...
Route::get('/about', 'GenericController@about');
Route::get('/features', 'GenericController@features');
Route::get('/pricing', 'GenericController@pricing');
Route::get('/privacy', 'GenericController@privacy');
Route::get('/status', 'GenericController@status');
Route::get('/terms', 'GenericController@terms');
Route::get('/thanks', 'ThanksController@show');

// Show the relevant profile page
Route::get('/user/{id}', 'UserController@show');
Route::get('/course/{id}', 'CourseController@show');
Route::get('/venue/{id}', 'VenueController@show');

// Submit and search pages
Route::get('/search', 'SearchController@show');

Route::group([
  'prefix' => 'submit'
], function () {
  Route::get('/', 'SubmitController@show');
  Route::get('/{any}', 'SubmitController@show')->where('any', '.*');
});
