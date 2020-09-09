<?php

namespace App\Http\Controllers\Admin;

use App\FlightsConnectionManager;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FilesController;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function index(Request $request)
    {
        $response =  FlightsConnectionManager::GetAll("UserProfile") ;
        $Objects = \GuzzleHttp\json_decode($response->getBody()) ;

        $Userresponse =  FlightsConnectionManager::GetAll("User") ;
        $Users = \GuzzleHttp\json_decode($Userresponse->getBody()) ;

        return view('Admin\UserProfile',compact('Objects','Users'));
    }

    public function store(Request $request)
    {
        $response =  FlightsConnectionManager::SaveObjectWithPics("UserProfile",$request) ;

        $Data = $response->getBody() ;

        return $response->getBody();
    }

    public function show($id)
    {
        $Object = FlightsConnectionManager::GetObject('UserProfile',$id) ;
        $data = json_decode($Object->getBody(),true)[0];

        FilesController::DeleteDirctory("UserProfile",$id) ;

        if ($data['IMGSRC1'] != ""){
            FilesController::FileDownload2($data['IMGSRC1'],$id,"UserProfile","IMGSRC1") ;
        }
        if ($data['IMGSRC2'] != ""){
            FilesController::FileDownload2($data['IMGSRC2'],$id,"UserProfile","IMGSRC2") ;
        }
        if ($data['IMGSRC3'] != ""){
            FilesController::FileDownload2($data['IMGSRC3'],$id,"UserProfile","IMGSRC3") ;
        }
        if ($data['IMGSRC4'] != ""){
            FilesController::FileDownload2($data['IMGSRC4'],$id,"UserProfile","IMGSRC4") ;
        }

        return  json_encode($data) ;
    }

    public function update(Request $request,$id)
    {
        try{
            $response =  FlightsConnectionManager::UpdateObjectWithPics("UserProfile",$id,$request) ;
            return $response->getBody() ;
        }catch (RuntimeException  $exception){
            throw $exception ;
        }
    }

    public function destroy($id)
    {
        $response =  FlightsConnectionManager::DeleteObject("UserProfile",$id) ;
        return $response->getBody() ;
    }
}
