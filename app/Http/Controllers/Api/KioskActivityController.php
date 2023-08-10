<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KioskActivityController extends Controller
{

    public function processRequest(Request $request)
    {
        //authenticate
        

            $req = json_encode($request->all());
            $this->postToQueue($req);  
            //setup response
            $response = $this->setupResponse($request);
            
  
            return response()->json($response);
                    
        
    
    }
}
