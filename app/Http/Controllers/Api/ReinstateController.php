<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReinstateController extends Controller
{
    public function processRequest(Request $request)
    {
        $req = $request->json()->all();

        $response = [
            'status' => 'SUCCESS',
            'message' => 'The machine has been reinstate',
        ];

        return response()->json($response);

    }
}
