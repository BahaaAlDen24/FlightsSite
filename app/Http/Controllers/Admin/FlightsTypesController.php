<?php

namespace App\Http\Controllers\Admin;

use App\FlightsConnectionManager;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FilesController;
use Illuminate\Http\Request;

class FlightsTypesController extends Controller
{
    public function index(Request $request)
    {
        $response =  FlightsConnectionManager::GetAll("FlightType") ;
        $Objects = \GuzzleHttp\json_decode($response->getBody()) ;
        return view('Admin\FlightType',compact('Objects'));
    }

    public function store(Request $request)
    {
        $response =  FlightsConnectionManager::SaveObjectWithPics("FlightType",$request) ;

        $Data = $response->getBody() ;

        return $response->getBody();
    }

    public function show($id)
    {
        $Object = FlightsConnectionManager::GetObject('FlightType',$id) ;
        $data = json_decode($Object->getBody(),true);

        FilesController::DeleteDirctory("FlightType",$id) ;

        if ($data['IMGSRC1'] != ""){
            FilesController::FileDownload2($data['IMGSRC1'],$id,"FlightType","IMGSRC1") ;
        }
        if ($data['IMGSRC2'] != ""){
            FilesController::FileDownload2($data['IMGSRC2'],$id,"FlightType","IMGSRC2") ;
        }
        if ($data['IMGSRC3'] != ""){
            FilesController::FileDownload2($data['IMGSRC3'],$id,"FlightType","IMGSRC3") ;
        }
        if ($data['IMGSRC4'] != ""){
            FilesController::FileDownload2($data['IMGSRC4'],$id,"FlightType","IMGSRC4") ;
        }

        return  $Object->getBody() ;
    }

    public function update(Request $request,$id)
    {
        try{
            $response =  FlightsConnectionManager::UpdateObjectWithPics("FlightType",$id,$request) ;
            return $response->getBody() ;
        }catch (RuntimeException  $exception){
            throw $exception ;
        }
    }

    public function destroy($id)
    {
        $response =  FlightsConnectionManager::DeleteObject("FlightType",$id) ;
        return $response->getBody() ;
    }
}
