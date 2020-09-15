<?php

namespace App\Http\Controllers\Admin;

use App\FlightsConnectionManager;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FilesController;
use Illuminate\Http\Request;

class AirlinesController extends Controller
{
    public function index(Request $request)
    {
        $response =  FlightsConnectionManager::GetAll("Airline") ;
        $Objects = \GuzzleHttp\json_decode($response->getBody()) ;
        return view('Admin\Airline',compact('Objects'));
    }

    public function store(Request $request)
    {
        $response =  FlightsConnectionManager::SaveObjectWithPics("Airline",$request) ;
        $data = json_decode($response->getBody(),true);
        FilesController::FileDownload2($data['IMGSRC1'],$data['id'],"Airlines","IMGSRC1") ;

        return $response->getBody();
    }

    public function show($id)
    {
        $Object = FlightsConnectionManager::GetObject('Airline',$id) ;
        $data = json_decode($Object->getBody(),true);

        FilesController::DeleteDirctory("Airline",$id) ;

        if ($data['IMGSRC1'] != ""){
            FilesController::FileDownload2($data['IMGSRC1'],$id,"Airline","IMGSRC1") ;
        }
        if ($data['IMGSRC2'] != ""){
            FilesController::FileDownload2($data['IMGSRC2'],$id,"Airline","IMGSRC2") ;
        }
        if ($data['IMGSRC3'] != ""){
            FilesController::FileDownload2($data['IMGSRC3'],$id,"Airline","IMGSRC3") ;
        }
        if ($data['IMGSRC4'] != ""){
            FilesController::FileDownload2($data['IMGSRC4'],$id,"Airline","IMGSRC4") ;
        }

        return  $Object->getBody() ;
    }

    public function update(Request $request,$id)
    {
        try{
            $response =  FlightsConnectionManager::UpdateObjectWithPics("Airline",$id,$request) ;
            $data = json_decode($response->getBody(),true);

            if ($data['IMGSRC1'] != ""){
                FilesController::DeleteDirctory("Airlines",$id) ;
                FilesController::FileDownload2($data['IMGSRC1'],$data['id'],"Airlines","IMGSRC1") ;
            }

            return $response->getBody() ;
        }catch (RuntimeException  $exception){
            throw $exception ;
        }
    }

    public function destroy($id)
    {
        $response =  FlightsConnectionManager::DeleteObject("Airline",$id) ;
        return $response->getBody() ;
    }
}
