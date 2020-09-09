<?php

namespace App\Http\Controllers\Admin;

use App\FlightsConnectionManager;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FilesController;
use Illuminate\Http\Request;

class OffersController extends Controller
{
    public function index(Request $request)
    {
        $response =  FlightsConnectionManager::GetAll("Offer") ;
        $Objects = \GuzzleHttp\json_decode($response->getBody()) ;
        return view('Admin\Offer',compact('Objects'));
    }

    public function store(Request $request)
    {
        $response =  FlightsConnectionManager::SaveObjectWithPics("Offer",$request) ;

        $Data = $response->getBody() ;

        return $response->getBody();
    }

    public function show($id)
    {
        $Object = FlightsConnectionManager::GetObject('Offer',$id) ;
        $data = json_decode($Object->getBody(),true);

        FilesController::DeleteDirctory("Offer",$id) ;

        if ($data['IMGSRC1'] != ""){
            FilesController::FileDownload2($data['IMGSRC1'],$id,"Offer","IMGSRC1") ;
        }
        if ($data['IMGSRC2'] != ""){
            FilesController::FileDownload2($data['IMGSRC2'],$id,"Offer","IMGSRC2") ;
        }
        if ($data['IMGSRC3'] != ""){
            FilesController::FileDownload2($data['IMGSRC3'],$id,"Offer","IMGSRC3") ;
        }
        if ($data['IMGSRC4'] != ""){
            FilesController::FileDownload2($data['IMGSRC4'],$id,"Offer","IMGSRC4") ;
        }

        return  $Object->getBody() ;
    }

    public function update(Request $request,$id)
    {
        try{
            $response =  FlightsConnectionManager::UpdateObjectWithPics("Offer",$id,$request) ;
            return $response->getBody() ;
        }catch (RuntimeException  $exception){
            throw $exception ;
        }
    }

    public function destroy($id)
    {
        $response =  FlightsConnectionManager::DeleteObject("Offer",$id) ;
        return $response->getBody() ;
    }
}
