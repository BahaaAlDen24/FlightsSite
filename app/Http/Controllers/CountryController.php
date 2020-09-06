<?php


namespace App\Http\Controllers;


use App\FlightsConnectionManager;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index(Request $request)
    {
        $response =  FlightsConnectionManager::GetAll("Country") ;
        $Objects = \GuzzleHttp\json_decode($response->getBody()) ;
        return view('Admin\Country',compact('Objects'));
    }

    public function store(Request $request)
    {
        $response =  FlightsConnectionManager::SaveObjectWithPics("Country",$request) ;

        $Data = $response->getBody() ;

        return $response->getBody();
    }

    public function show($id)
    {
        $Object = FlightsConnectionManager::GetObject('Country',$id) ;
        $data = json_decode($Object->getBody(),true);

        if ($data['IMGSRC1'] != ""){
            FilesController::FileDownload2($data['IMGSRC1'],$id,"Country","IMGSRC1") ;
        }
        if ($data['IMGSRC2'] != ""){
            FilesController::FileDownload2($data['IMGSRC2'],$id,"Country","IMGSRC2") ;
        }
        if ($data['IMGSRC3'] != ""){
            FilesController::FileDownload2($data['IMGSRC3'],$id,"Country","IMGSRC3") ;
        }
        if ($data['IMGSRC4'] != ""){
            FilesController::FileDownload2($data['IMGSRC4'],$id,"Country","IMGSRC4") ;
        }

        return  $Object->getBody() ;
    }

    public function update(Request $request,$id)
    {
        $response =  FlightsConnectionManager::UpdateObject("Country",$id,$request->all()) ;
        return $response->getBody() ;;
    }

    public function destroy($id)
    {
        $response =  FlightsConnectionManager::DeleteObject("Country",$id) ;
        return $response->getBody() ;
    }
}
