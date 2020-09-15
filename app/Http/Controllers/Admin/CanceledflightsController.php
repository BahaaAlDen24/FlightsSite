<?php

namespace App\Http\Controllers\Admin;

use App\FlightsConnectionManager;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CanceledflightsController extends Controller
{
    public function index(Request $request)
    {
        $response =  FlightsConnectionManager::GetAll("CanceledFlight") ;
        $Objects = \GuzzleHttp\json_decode($response->getBody()) ;

        return view('Admin\CanceledFlight',compact('Objects'));
    }

    public function show($id)
    {

        $CanceledFlight = \GuzzleHttp\json_decode(FlightsConnectionManager::GetObject('CanceledFlight',$id)->getBody())[0];
        $BookedFlight = \GuzzleHttp\json_decode(FlightsConnectionManager::GetObject('BookedFlight',$CanceledFlight->BOOKEDFLIGHTID)->getBody())[0];
        $FlightInfo = \GuzzleHttp\json_decode(FlightsConnectionManager::GetObject('Flight',$BookedFlight->FLIGHTID)->getBody())[0];
        $UserInfo = \GuzzleHttp\json_decode(FlightsConnectionManager::GetObject('User',$BookedFlight->USERID)->getBody());

        $data = array() ;
        $data[0] = $FlightInfo ;
        $data[1] = $UserInfo ;
        $data[2] = $BookedFlight ;
        $data[3] = $CanceledFlight;

        return json_encode($data) ;
    }


    public function store(Request $request)
    {
        $response =  FlightsConnectionManager::SaveObject("CanceledFlight",$request->all()) ;
        return $response->getBody(); ;
    }

}
