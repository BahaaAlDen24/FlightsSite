<?php

namespace App\Http\Controllers\Guest;

use App\FlightsConnectionManager;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class HomeController extends Controller
{
    public function  index(Request $request)
    {
        $Access_token = Cookie::get('access_token');
        $IsLoggedIn = false ;
        if ($Access_token != null){
            $IsLoggedIn = true ;
        }
        $Cityresponse =  FlightsConnectionManager::GetAll("City") ;
        $Cities = \GuzzleHttp\json_decode($Cityresponse->getBody()) ;

        $FlightTypeResponse =  FlightsConnectionManager::GetAll("FlightType") ;
        $FlightTypes = \GuzzleHttp\json_decode($FlightTypeResponse->getBody()) ;

        return view('/Guest/Home',compact('FlightTypes','Cities','IsLoggedIn')) ;
    }

    public function Search(Request $request){
        $response =  FlightsConnectionManager::SaveObject("Search",$request->all()) ;
        $data = json_decode($response->getBody(),true);
        return json_encode($data);
    }

    public function Details($id){
        $FlightInfo = \GuzzleHttp\json_decode(FlightsConnectionManager::GetObject('Flight',$id)->getBody())[0];
        return json_encode($FlightInfo);
    }

    public function BookFlightDetails($id){
        $Access_token = Cookie::get('access_token');
        $IsLoggedIn = false ;
        if ($Access_token != null) {
            $FlightInfo = \GuzzleHttp\json_decode(FlightsConnectionManager::GetObject('Flight', $id)->getBody())[0];
            $UserInfo = \GuzzleHttp\json_decode(FlightsConnectionManager::GetAll('UserInfo')->getBody())[0];

            $data = array();
            $data[0] = $FlightInfo;
            $data[1] = $UserInfo;

            return json_encode($data);
        }else
        {
            return redirect()->route('login');
        }
    }

    public function BookFlight($FlightID,$BankAccountID){
        $Access_token = Cookie::get('access_token');
        if ($Access_token != null) {
            $BookedFlightInfo = \GuzzleHttp\json_decode(FlightsConnectionManager::GetObject('BookFlight' . '/' . $FlightID , $BankAccountID)->getBody());
            return json_encode($BookedFlightInfo);
        }else
        {
            return redirect()->route('login');
        }
    }


}
