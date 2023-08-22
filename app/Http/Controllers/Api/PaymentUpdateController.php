<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentUpdateController extends Controller
{
    public function processRequest(Request $request)
    {

        // "request_id": ‘string’, //unique auto-gen
        // "kiosk_external_id": ‘string’, //Magex unique kiosk ID
        // request
        $req = $request->json()->all();


        // $response = '{"status":"Active","order_info":{}}';
        $response = [
            'status' => 'SUCCESS',
            'message' => 'SUCCESS',
        ];

        return response()->json($response);

    }
}
