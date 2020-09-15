<?php

namespace App\Http\Controllers\Customers;

use App\FlightsConnectionManager;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CustomerController extends Controller
{
    public function BookedFlightsIndex(){
        $Access_token = Cookie::get('access_token');
        $IsLoggedIn = false ;
        if ($Access_token != null){
            $IsLoggedIn = true ;
        }
        if ($Access_token != null) {
            $BookedFlights = \GuzzleHttp\json_decode(FlightsConnectionManager::GetAll('BookedFlightsIndex')->getBody());

            return view('Customers\BookedFlight',compact('BookedFlights','IsLoggedIn')) ;
        }else
        {
            return redirect()->route('login');
        }
    }

    public function CanceledFlightsIndex(){
        $Access_token = Cookie::get('access_token');
        $IsLoggedIn = false ;
        if ($Access_token != null){
            $IsLoggedIn = true ;
        }
        if ($Access_token != null) {
            $CanceledFlights = \GuzzleHttp\json_decode(FlightsConnectionManager::GetAll('CanceledFlightsIndex')->getBody());

            return view('Customers\CanceledFlight',compact('CanceledFlights','IsLoggedIn')) ;
        }else
        {
            return redirect()->route('login');
        }
    }

    public function CountriesIndex(){
        $Access_token = Cookie::get('access_token');
        $IsLoggedIn = false ;
        if ($Access_token != null){
            $IsLoggedIn = true ;
        }
        if ($Access_token != null) {
            $response =  FlightsConnectionManager::GetAll("Country") ;
            $Objects = \GuzzleHttp\json_decode($response->getBody()) ;
            return view('Customers\Countries',compact('Objects','IsLoggedIn')) ;
        }else
        {
            return redirect()->route('login');
        }
    }

    public function CitiesIndex(){
        $Access_token = Cookie::get('access_token');
        $IsLoggedIn = false ;
        if ($Access_token != null){
            $IsLoggedIn = true ;
        }
        if ($Access_token != null) {
            $response =  FlightsConnectionManager::GetAll("City") ;
            $Objects = \GuzzleHttp\json_decode($response->getBody()) ;
            return view('Customers\Cities',compact('Objects','IsLoggedIn')) ;
        }else
        {
            return redirect()->route('login');
        }
    }

    public function HotelsIndex(){
        $Access_token = Cookie::get('access_token');
        $IsLoggedIn = false ;
        if ($Access_token != null){
            $IsLoggedIn = true ;
        }
        if ($Access_token != null) {
            $response =  FlightsConnectionManager::GetAll("Hotel") ;
            $Objects = \GuzzleHttp\json_decode($response->getBody()) ;
            return view('Customers\Hotels',compact('Objects','IsLoggedIn')) ;
        }else
        {
            return redirect()->route('login');
        }
    }

    public function AirportsIndex(){
        $Access_token = Cookie::get('access_token');
        $IsLoggedIn = false ;
        if ($Access_token != null){
            $IsLoggedIn = true ;
        }
        if ($Access_token != null) {
            $response =  FlightsConnectionManager::GetAll("Airport") ;
            $Objects = \GuzzleHttp\json_decode($response->getBody()) ;
            return view('Customers\Airports',compact('Objects','IsLoggedIn')) ;
        }else
        {
            return redirect()->route('login');
        }
    }

    public function AirlinesIndex(){
        $Access_token = Cookie::get('access_token');
        $IsLoggedIn = false ;
        if ($Access_token != null){
            $IsLoggedIn = true ;
        }
        if ($Access_token != null) {
            $response =  FlightsConnectionManager::GetAll("Airline") ;
            $Objects = \GuzzleHttp\json_decode($response->getBody()) ;
            return view('Customers\Airlines',compact('Objects','IsLoggedIn')) ;
        }else
        {
            return redirect()->route('login');
        }
    }

    public function AirplanesIndex(){
        $Access_token = Cookie::get('access_token');
        $IsLoggedIn = false ;
        if ($Access_token != null){
            $IsLoggedIn = true ;
        }
        if ($Access_token != null) {
            $response =  FlightsConnectionManager::GetAll("Airplane") ;
            $Objects = \GuzzleHttp\json_decode($response->getBody()) ;
            return view('Customers\Airplanes',compact('Objects','IsLoggedIn')) ;
        }else
        {
            return redirect()->route('login');
        }
    }

    public function OffersIndex(){
        $Access_token = Cookie::get('access_token');
        $IsLoggedIn = false ;
        if ($Access_token != null){
            $IsLoggedIn = true ;
        }
        if ($Access_token != null) {
            $response =  FlightsConnectionManager::GetAll("Offer") ;
            $Objects = \GuzzleHttp\json_decode($response->getBody()) ;
            return view('Customers\Offers',compact('Objects','IsLoggedIn')) ;
        }else
        {
            return redirect()->route('login');
        }
    }

    public function ProfilePage(){}
}
