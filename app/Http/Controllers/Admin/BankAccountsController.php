<?php

namespace App\Http\Controllers\Admin;

use App\FlightsConnectionManager;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FilesController;
use Illuminate\Http\Request;

class BankAccountsController extends Controller
{
    public function index(Request $request)
    {
        $response =  FlightsConnectionManager::GetAll("BankAccount") ;
        $Objects = \GuzzleHttp\json_decode($response->getBody()) ;

        $Userresponse =  FlightsConnectionManager::GetAll("User") ;
        $Users = \GuzzleHttp\json_decode($Userresponse->getBody()) ;

        $Bankresponse =  FlightsConnectionManager::GetAll("Bank") ;
        $Banks = \GuzzleHttp\json_decode($Bankresponse->getBody()) ;

        return view('Admin\BankAccount',compact('Objects','Users','Banks'));
    }

    public function store(Request $request)
    {
        $response =  FlightsConnectionManager::SaveObject("BankAccount",$request->all()) ;

        $Data = $response->getBody() ;

        return $response->getBody();
    }

    public function show($id)
    {
        $Object = FlightsConnectionManager::GetObject('BankAccount',$id) ;
        $data = json_decode($Object->getBody(),true)[0];

        return  json_encode($data) ;
    }

    public function update(Request $request,$id)
    {
        try{
            $response =  FlightsConnectionManager::UpdateObject("BankAccount",$id,$request->all()) ;
            return $response->getBody() ;
        }catch (RuntimeException  $exception){
            throw $exception ;
        }
    }

    public function destroy($id)
    {
        $response =  FlightsConnectionManager::DeleteObject("BankAccount",$id) ;
        return $response->getBody() ;
    }
}
