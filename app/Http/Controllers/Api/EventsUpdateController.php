<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventsUpdateController extends Controller
{
    public function processRequest(Request $request)
    {
        $req = $request->json()->all();

        $response = [
            'SUCCESS',
        ];

        return response()->json($response);

    }
}
