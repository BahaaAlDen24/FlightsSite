<?php


namespace App;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Cache;

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

