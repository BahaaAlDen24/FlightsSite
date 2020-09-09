<?php

namespace App\Http\Controllers\Admin;

use App\FlightsConnectionManager;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FilesController;
use Illuminate\Http\Request;

class HotelsController extends Controller
{
    public function index(Request $request)
    {
        $response =  FlightsConnectionManager::GetAll("Hotel") ;
        $Objects = \GuzzleHttp\json_decode($response->getBody()) ;

        $Cityresponse =  FlightsConnectionManager::GetAll("City") ;
        $Cities = \GuzzleHttp\json_decode($Cityresponse->getBody()) ;

        return view('Admin\Hotel',compact('Objects','Cities'));
    }

    public function store(Request $request)
    {
        $response =  FlightsConnectionManager::SaveObjectWithPics("Hotel",$request) ;

        $Data = $response->getBody() ;

        return $response->getBody();
    }

    public function show($id)
    {
        $Object = FlightsConnectionManager::GetObject('Hotel',$id) ;
        $data = json_decode($Object->getBody(),true)[0];

        FilesController::DeleteDirctory("Hotel",$id) ;

        if ($data['IMGSRC1'] != ""){
            FilesController::FileDownload2($data['IMGSRC1'],$id,"Hotel","IMGSRC1") ;
        }
        if ($data['IMGSRC2'] != ""){
            FilesController::FileDownload2($data['IMGSRC2'],$id,"Hotel","IMGSRC2") ;
        }
        if ($data['IMGSRC3'] != ""){
            FilesController::FileDownload2($data['IMGSRC3'],$id,"Hotel","IMGSRC3") ;
        }
        if ($data['IMGSRC4'] != ""){
            FilesController::FileDownload2($data['IMGSRC4'],$id,"Hotel","IMGSRC4") ;
        }

        return  json_encode($data) ;
    }

    public function update(Request $request,$id)
    {
        try{
            $response =  FlightsConnectionManager::UpdateObjectWithPics("Hotel",$id,$request) ;
            return $response->getBody() ;
        }catch (RuntimeException  $exception){
            throw $exception ;
        }
    }

    public function destroy($id)
    {
        $response =  FlightsConnectionManager::DeleteObject("Hotel",$id) ;
        return $response->getBody() ;
    }
}
