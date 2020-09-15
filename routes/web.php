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

Route::get('/','Guest\HomeController@index')->name('Home');
Route::get('/AdminPanel','Admin\FlightsController@index')->name('Admin');

Route::get('/login', 'Auth\AuthController@login1')->name('login');
Route::get('/logout', 'Auth\AuthController@logout')->name('logout');
Route::get('/register', function () { return view('Auth/Register'); })->name('Register');

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

Route::post('Search', 'Guest\HomeController@Search');
Route::get('Details/{id}', 'Guest\HomeController@Details');
Route::get('BookFlightDetails/{id}', 'Guest\HomeController@BookFlightDetails');
Route::get('BookFlight/{FlightID}/{BankAccountID}', 'Guest\HomeController@BookFlight');

Route::get('UserBookedFlights', 'Customers\CustomerController@BookedFlightsIndex')->name('UserBookedFlights');
Route::get('UserCanceledFlights', 'Customers\CustomerController@CanceledFlightsIndex')->name('UserCanceledFlights');
Route::get('AirlinesIndex', 'Customers\CustomerController@AirlinesIndex')->name('AirlinesIndex');
Route::get('AirplanesIndex', 'Customers\CustomerController@AirplanesIndex')->name('AirplanesIndex');
Route::get('AirportsIndex', 'Customers\CustomerController@AirportsIndex')->name('AirportsIndex');
Route::get('CitiesIndex', 'Customers\CustomerController@CitiesIndex')->name('CitiesIndex');
Route::get('CountriesIndex', 'Customers\CustomerController@CountriesIndex')->name('CountriesIndex');
Route::get('HotelsIndex', 'Customers\CustomerController@HotelsIndex')->name('HotelsIndex');
Route::get('OffersIndex', 'Customers\CustomerController@OffersIndex')->name('OffersIndex');

