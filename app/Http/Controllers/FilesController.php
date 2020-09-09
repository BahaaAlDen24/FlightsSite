<?php

namespace App\Http\Controllers;

use App\FlightsConnectionManager;
use http\Exception\RuntimeException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class FilesController extends Controller
{
    public function FileDownload($ServerPath){

        $FileContent = FlightsConnectionManager::GetAll( "FileDownlaod/". $ServerPath) ;

        $FileBody = $FileContent->getBody() ;

        $stringBody = (string) $FileBody;

        $FileName =uniqid('', true) . '.pdf' ;

        Storage::disk('local')->put("/DownloadedFiles/" . $FileName , $stringBody);

        $file = storage_path('app/DownloadedFiles/') . $FileName;

        if (file_exists($file)) {

            $headers = [
                'Content-Type' => 'application/pdf'
            ];

            return response()->download($file, 'Test File', $headers, 'inline');
        }
    }

    public static function FileDownload2($ServerPath,$id,$ObjectType,$ImageNum){

        $data = array('ServerPath' => $ServerPath ) ;

        $FileContent = FlightsConnectionManager::SaveObject( "FileDownload" , $data) ;

        $FileBody = $FileContent->getBody() ;

        $stringBody = (string) $FileBody;

        $FileName = $ImageNum . '.jpg' ;

        Storage::disk('MyPath')->put("assets/DownloadedFiles/" . $ObjectType ."/". $id . "/" . $FileName , $stringBody);


    }


    public static function  DeleteDirctory($ObjectType,$id){
        try{
            $Result = File::deleteDirectory(public_path("assets/DownloadedFiles/" . $ObjectType ."/". $id ));
            return $Result ;
        }catch (RuntimeException $exception){
            throw  $exception ;
        }
    }

}
