<?php

namespace App\Http\Controllers;

use App\FlightsConnectionManager;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redirect;
use Psr\Http\Message\ResponseInterface;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $Access_token = Cache::get('AccessToken');
        if ($Access_token == null) {
            $response = FlightsConnectionManager::SaveObject("register", $request->all());
            return redirect()->route('login');
        }else
        {
            return redirect()->action('StudentsController@index');
        }
    }

    public function  login(Request $request)
    {
        $Access_token = Cache::get('AccessToken');
        if ($Access_token == null){
            $response =  FlightsConnectionManager::Login("login",$request->all()) ;

            if ($response->getStatusCode() == 200){
                $response = json_decode($response->getBody()->getContents(), true);
                $value = Cache::put('AccessToken',$response['token'],3600);
                $Access_token = Cache::get('AccessToken');
            }else if($response->getStatusCode() == 300) {
                return response()->json(['ErrorMessage' => "Email or Password not correct"],200)->header('Content-Type','text-plain') ;
            }
         }
        return response()->json(['token' => $Access_token],200)->header('Content-Type','text-plain') ; ;
    }

    public function logout(Request $request)
    {
        Cache::forget('AccessToken');
        return redirect()->action('HomeController@index');
    }
}
