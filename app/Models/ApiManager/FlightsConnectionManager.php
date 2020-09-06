<?php


namespace App;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use phpDocumentor\Reflection\Types\Array_;

class FlightsConnectionManager
{
    public static function GetAll($OBjectName){
        $Access_token = Cache::get('AccessToken');

        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => env('APIURL'),
            // You can set any number of default request options.
            'headers' => ['Authorization'  => 'Bearer '. $Access_token] , 'Accept'  => 'application/json',
        ]);

        $response = $client->request('GET', $OBjectName);

        return $response ;
    }

    public static function SaveObject($ObjectName,$data){
        $Access_token = Cache::get('AccessToken');

        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => env('APIURL'),
        ]);

        $response = $client->request('POST', $ObjectName, ['form_params' => $data]);

        return $response ;
    }

    public static function SaveObjectWithPics($ObjectName,$request){
        $Access_token = Cache::get('AccessToken');

        $Images[] = array()  ;

        for ($i = 1 ; $i < 5 ; $i++){
            $Image1 = $request->file('IMGSRC' . $i);
            if ($Image1 != null){
                $orginalName = $Image1->getClientOriginalName() ;
                $name = date('YmdHis') . $Image1->getClientOriginalName() ;
                $tempPath = 'TempFiles/' ;

                $Image1->move($tempPath,$name) ;

                $tempArray = array('name' =>  'IMGSRC' . $i,
                                   'contents'  =>  file_get_contents($tempPath . $name),
                                   'filename'  =>  $orginalName,);

                $Images[$i-1] = $tempArray ;
            }
        }

        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => env('APIURL'),
        ]);


        $data = $request->all() ;

        $res = $client->request('POST', $ObjectName ,
            [
                'headers' => ['Authorization' => $Access_token],
                'query' => [
                    'data' => $data,
                ],
                'multipart' => $Images ,
            ]);

        return $res ;
    }

    public static function Login($ObjectName,$data){
        $Access_token = Cache::get('AccessToken');

        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => env('APIURL'),
            // You can set any number of default request options.
            'headers' => ['Authorization'  => 'Bearer '. $Access_token] , 'Accept'  => 'application/json',
        ]);

        $response = $client->requestAsync('POST', $ObjectName, ['json' => $data])->wait();

        return $response ;
    }

    public static function GetObject($ObjectName,$id){
        $Access_token = Cache::get('AccessToken');

        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => env('APIURL'),
            // You can set any number of default request options.
            'headers' => ['Authorization'  => 'Bearer '. $Access_token] , 'Accept'  => 'application/json',
        ]);

        $response = $client->request('GET', $ObjectName . "/" . $id);

        return $response ;
    }

    public static  function UpdateObject($ObjectName,$id,$data){
        $Access_token = Cache::get('AccessToken');

        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => env('APIURL'),
            // You can set any number of default request options.
            'headers' => ['Authorization'  => 'Bearer '. $Access_token] , 'Accept'  => 'application/json',
        ]);

        $response = $client->request('PUT', $ObjectName . "/" . $id, ['form_params' => $data]);

        return $response ;
    }

    public static function DeleteObject($ObjectName,$id){
        $Access_token = Cache::get('AccessToken');

        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => env('APIURL'),
            // You can set any number of default request options.
            'headers' => ['Authorization'  => 'Bearer '. $Access_token] , 'Accept'  => 'application/json',
        ]);

        $response = $client->request('DELETE', $ObjectName . "/" . $id);

        return $response ;
    }
}

