<?php

namespace App\Http\Controllers\Admin;

use App\FlightsConnectionManager;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FilesController;
use Illuminate\Http\Request;

class FlightsController extends Controller
{
    public function index(Request $request)
    {
        $response =  FlightsConnectionManager::GetAll("Flight") ;
        $Objects = \GuzzleHttp\json_decode($response->getBody()) ;

        $AirportResponse =  FlightsConnectionManager::GetAll("Airport") ;
        $Airports = \GuzzleHttp\json_decode($AirportResponse->getBody()) ;

        $AirplaneResponse =  FlightsConnectionManager::GetAll("Airplane") ;
        $Airplanes = \GuzzleHttp\json_decode($AirplaneResponse->getBody()) ;

        $AirlineResponse =  FlightsConnectionManager::GetAll("Airline") ;
        $Airlines = \GuzzleHttp\json_decode($AirlineResponse->getBody()) ;

        $FlightTypeResponse =  FlightsConnectionManager::GetAll("FlightType") ;
        $FlightTypes = \GuzzleHttp\json_decode($FlightTypeResponse->getBody()) ;

        $OfferResponse =  FlightsConnectionManager::GetAll("Offer") ;
        $Offers = \GuzzleHttp\json_decode($OfferResponse->getBody()) ;

        return view('Admin\Flight',compact('Objects','Airports','Airplanes','Airlines','FlightTypes','Offers'));
    }

    public function store(Request $request)
    {
        $response =  FlightsConnectionManager::SaveObjectWithPics("Flight",$request) ;

        return $response->getBody();
    }

    public function show($id)
    {
        $Object = FlightsConnectionManager::GetObject('Flight',$id) ;
        $data = json_decode($Object->getBody(),true)[0];

        FilesController::DeleteDirctory("Flight",$id) ;

        if ($data['IMGSRC1'] != ""){
            FilesController::FileDownload2($data['IMGSRC1'],$id,"Flight","IMGSRC1") ;
        }
        if ($data['IMGSRC2'] != ""){
            FilesController::FileDownload2($data['IMGSRC2'],$id,"Flight","IMGSRC2") ;
        }
        if ($data['IMGSRC3'] != ""){
            FilesController::FileDownload2($data['IMGSRC3'],$id,"Flight","IMGSRC3") ;
        }
        if ($data['IMGSRC4'] != ""){
            FilesController::FileDownload2($data['IMGSRC4'],$id,"Flight","IMGSRC4") ;
        }

        return  json_encode($data) ;
    }

    public function update(Request $request,$id)
    {
        try{
            $response =  FlightsConnectionManager::UpdateObjectWithPics("Flight",$id,$request) ;
            return $response->getBody() ;
        }catch (RuntimeException  $exception){
            throw $exception ;
        }
    }

    public function destroy($id)
    {
        $response =  FlightsConnectionManager::DeleteObject("Flight",$id) ;
        return $response->getBody() ;
    }
}
