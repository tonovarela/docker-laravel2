<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OutOfOrderController extends Controller
{
    public function processRequest(Request $request)
    {

        // "request_id": ‘string’, //unique auto-gen
        // "kiosk_external_id": ‘string’, //Magex unique kiosk ID
        // request
        $req = $request->json()->all();

        $response = [
            'status' => 'SUCCESS',
            'message' => 'The out of order request object is updated',
        ];

        return response()->json($response);

    }
}
