<?php

namespace App\Http\Controllers\Auth;

use App\FlightsConnectionManager;
use App\Http\Controllers\Controller;
use GuzzleHttp\Exception\RequestException;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redirect;
use Psr\Http\Message\ResponseInterface;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $Access_token = Cookie::get('access_token');
        if ($Access_token == null) {
            $response = FlightsConnectionManager::SaveObject("register", $request->all());
            return redirect()->route('login');
        }else
        {
            return redirect()->action('register');
        }
    }

    public function  login(Request $request)
    {
        $Access_token = Cookie::get('access_token');
        if ($Access_token == null){
            $response =  FlightsConnectionManager::Login("login",$request->all()) ;

            if ($response->getStatusCode() == 200){
                $response = json_decode($response->getBody()->getContents(), true);
                $value = Cache::put('AccessToken',$response['token'],3600);
                $Access_token = Cookie::queue(cookie('access_token', $response['token'], $minute = 60));
            }else if($response->getStatusCode() == 300) {
                return response()->json(['ErrorMessage' => "Email or Password not correct"],200)->header('Content-Type','text-plain') ;
            }
         }
        return response()->json(['token' => $Access_token],200)->header('Content-Type','text-plain') ; ;
    }

    public function login1()
    {
        $Access_token = Cookie::get('access_token');
        if ($Access_token == null) {
            return view('Auth/Login');
        }else
        {
            return redirect()->action('Guest\HomeController@index');
        }
    }

    public function logout(Request $request)
    {
        Cookie::queue(Cookie::forget('access_token'));
        return redirect()->action('Guest\HomeController@index');
    }
}
