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

Route::get('/home','Guest\HomeController@index')->name('Home');

Route::get('/login', function () { return view('Auth/Login'); })->name('login');
Route::get('/register', function () { return view('Auth/Register'); });

Route::post('/auth/register','Auth\AuthController@register');
Route::post('/auth/login','Auth\AuthController@login');
Route::get('/auth/logout','Auth\AuthController@logout');
Route::get('/FileDownload','Auth\FilesController@FileDownload');

Route::resource('Airline', 'Admin\AirlinesController');
Route::resource('Airplane', 'Admin\AirplanesController');
Route::resource('Airport', 'Admin\AirportsController');
Route::resource('BankAccount', 'Admin\BankAccountsController');
Route::resource('Bank', 'Admin\BanksController');
Route::resource('BookedFlight', 'Admin\BookedFlightsController');
Route::resource('CanceledFlight', 'Admin\CanceledFlightsController');
Route::resource('City', 'Admin\CitiesController');
Route::resource('Country', 'Admin\CountryController');
Route::resource('FlightOffer', 'Admin\FlightsOffersController');
Route::resource('Flight', 'Admin\FlightsController');
Route::resource('FlightType', 'Admin\FlightsTypesController');
Route::resource('Hotel', 'Admin\HotelsController');
Route::resource('Offer', 'Admin\OffersController');
Route::resource('UserProfile', 'Admin\UserProfileController');
Route::resource('User', 'Admin\UsersController');
