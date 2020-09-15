<?php

namespace App\Http\Controllers\Admin;

use App\FlightsConnectionManager;
use App\Http\Controllers\Controller;
use App\SCM;
use Illuminate\Http\Request;

class BookedflightsController extends Controller
{
    public function index(Request $request)
    {
        $response =  FlightsConnectionManager::GetAll("BookedFlight") ;
        $Objects = \GuzzleHttp\json_decode($response->getBody()) ;

        return view('Admin\BookedFlight',compact('Objects'));
    }

    public function show($id)
    {

        $BookedFlight = \GuzzleHttp\json_decode(FlightsConnectionManager::GetObject('BookedFlight',$id)->getBody())[0];
        $FlightInfo = \GuzzleHttp\json_decode(FlightsConnectionManager::GetObject('Flight',$BookedFlight->FLIGHTID)->getBody());
        $UserInfo = \GuzzleHttp\json_decode(FlightsConnectionManager::GetObject('User',$BookedFlight->USERID)->getBody());

        $data = array() ;
        $data[0] = $FlightInfo[0] ;
        $data[1] = $UserInfo ;
        $data[2] = $BookedFlight ;

        return json_encode($data) ;
    }

    public function store(Request $request)
    {
        $response =  FlightsConnectionManager::SaveObject("BookedFlight",$request->all()) ;
        return $response ;
    }

}
