<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
        //register
        public function register()
        {
            return view('register');
        }

        public function registerApi(Request $request)
        {
            
            $http = new \GuzzleHttp\Client;

            $name = $request->name;
            $email = $request->email;
            $password = $request->password;
            $c_password = $request->c_password;

    
            $response = $http->post('http://127.0.0.1:8000/api/register?', [
                'headers' => [
                    'Authorization' => 'Bearer'.session()->get('token.access_token')
                ],
                'query' => [
                    'name' => $name,
                    'email' => $email,
                    'password' => $password,
                    'c_password'=> $c_password
                ]
            ]);
    
            $result = json_decode((string)$response->getBody(),true);
            return dd($result);
    
            return view('login');
        }
}
