<?php

namespace App\Http\Controllers\Api;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function setupResponse(Request $request)
    {
        $response = [
            'response' => [
                'responseCode' => '',
                'uniqueRequestId' => $request->input('request.uniqueRequestId'),
            ]
        ];
        return $response;
    }

    public function invalid()
    {
        $response = [
            'response' => [
                'responseCode' => '02',
            ]
        ];
        return $response;
    }

    public function authenticate(Request $request)
    {
        $credentials['username'] = $request->input('request.authenticate.username');
        $pass64 = $request->input('request.authenticate.password');
        $pass_e = base64_decode($pass64);
        $rsa = new RSA;
        $rsa->loadKey(env('PRIVKEY'));
        try 
        {
            $pass = $rsa->decrypt($pass_e);
        } catch (\Exception $e) {
            report($e);
            return '';
        } 
        $credentials['password'] = $pass;
        
        if (Auth::attempt($credentials)) 
        {
            return true;
        } else {
            return false;
        }
    }
}
