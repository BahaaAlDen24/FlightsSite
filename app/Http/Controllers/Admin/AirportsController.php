<?php

namespace App\Http\Controllers\Admin;

use App\FlightsConnectionManager;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FilesController;
use Illuminate\Http\Request;

class AirportsController extends Controller
{
    public function index(Request $request)
    {
        $response =  FlightsConnectionManager::GetAll("Airport") ;
        $Objects = \GuzzleHttp\json_decode($response->getBody()) ;

        $Cityresponse =  FlightsConnectionManager::GetAll("City") ;
        $Cities = \GuzzleHttp\json_decode($Cityresponse->getBody()) ;

        return view('Admin\Airport',compact('Objects','Cities'));
    }

    public function store(Request $request)
    {
        $response =  FlightsConnectionManager::SaveObjectWithPics("Airport",$request) ;

        $Data = $response->getBody() ;

        return $response->getBody();
    }

    public function show($id)
    {
        $Object = FlightsConnectionManager::GetObject('Airport',$id) ;
        $data = json_decode($Object->getBody(),true)[0];

        FilesController::DeleteDirctory("Airport",$id) ;

        if ($data['IMGSRC1'] != ""){
            FilesController::FileDownload2($data['IMGSRC1'],$id,"Airport","IMGSRC1") ;
        }
        if ($data['IMGSRC2'] != ""){
            FilesController::FileDownload2($data['IMGSRC2'],$id,"Airport","IMGSRC2") ;
        }
        if ($data['IMGSRC3'] != ""){
            FilesController::FileDownload2($data['IMGSRC3'],$id,"Airport","IMGSRC3") ;
        }
        if ($data['IMGSRC4'] != ""){
            FilesController::FileDownload2($data['IMGSRC4'],$id,"Airport","IMGSRC4") ;
        }

        return  json_encode($data) ;
    }

    public function update(Request $request,$id)
    {
        try{
            $response =  FlightsConnectionManager::UpdateObjectWithPics("Airport",$id,$request) ;
            return $response->getBody() ;
        }catch (RuntimeException  $exception){
            throw $exception ;
        }
    }

    public function destroy($id)
    {
        $response =  FlightsConnectionManager::DeleteObject("Airport",$id) ;
        return $response->getBody() ;
    }
}
