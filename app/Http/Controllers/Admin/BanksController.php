<?php

namespace App\Http\Controllers\Admin;

use App\FlightsConnectionManager;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FilesController;
use Illuminate\Http\Request;

class BanksController extends Controller
{
    public function index(Request $request)
    {
        $response =  FlightsConnectionManager::GetAll("Bank") ;
        $Objects = \GuzzleHttp\json_decode($response->getBody()) ;
        return view('Admin\Bank',compact('Objects'));
    }

    public function store(Request $request)
    {
        $response =  FlightsConnectionManager::SaveObjectWithPics("Bank",$request) ;

        $Data = $response->getBody() ;

        return $response->getBody();
    }

    public function show($id)
    {
        $Object = FlightsConnectionManager::GetObject('Bank',$id) ;
        $data = json_decode($Object->getBody(),true);

        FilesController::DeleteDirctory("Bank",$id) ;

        if ($data['IMGSRC1'] != ""){
            FilesController::FileDownload2($data['IMGSRC1'],$id,"Bank","IMGSRC1") ;
        }
        if ($data['IMGSRC2'] != ""){
            FilesController::FileDownload2($data['IMGSRC2'],$id,"Bank","IMGSRC2") ;
        }
        if ($data['IMGSRC3'] != ""){
            FilesController::FileDownload2($data['IMGSRC3'],$id,"Bank","IMGSRC3") ;
        }
        if ($data['IMGSRC4'] != ""){
            FilesController::FileDownload2($data['IMGSRC4'],$id,"Bank","IMGSRC4") ;
        }

        return  $Object->getBody() ;
    }

    public function update(Request $request,$id)
    {
        try{
            $response =  FlightsConnectionManager::UpdateObjectWithPics("Bank",$id,$request) ;
            return $response->getBody() ;
        }catch (RuntimeException  $exception){
            throw $exception ;
        }
    }

    public function destroy($id)
    {
        $response =  FlightsConnectionManager::DeleteObject("Bank",$id) ;
        return $response->getBody() ;
    }
}
