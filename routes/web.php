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

use Illuminate\Support\Facades\Route;

Route::get('/home','HomeController@index')->name('Home');

Route::get('/login', function () { return view('Auth/Login'); })->name('login');
Route::get('/register', function () { return view('Auth/Register'); });

Route::post('/auth/register','AuthController@register');
Route::post('/auth/login','AuthController@login');
Route::get('/auth/logout','AuthController@logout');
Route::get('/FileDownload','FilesController@FileDownload');

Route::resource('Airline', 'AirlinesController');
Route::resource('Airplane', 'AirplanesController');
Route::resource('Airport', 'AirportsController');
Route::resource('BankAccount', 'BankAccountsController');
Route::resource('Bank', 'BankController');
Route::resource('BookedFlight', 'BookedFlightsController');
Route::resource('CanceledFlight', 'CanceledFlightsController');
Route::resource('City', 'CitiesController');
Route::resource('Country', 'CountryController');
Route::resource('FlightOffer', 'FlightOffersController');
Route::resource('Flight', 'FlightsController');
Route::resource('FlightType', 'FlightTypesController');
Route::resource('Hotel', 'HotelsController');
Route::resource('Offer', 'OffersController');
Route::resource('UserProfile', 'UserProfileController');
Route::resource('User', 'UsersController');
