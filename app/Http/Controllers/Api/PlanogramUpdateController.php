<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Planogram;

class PlanogramUpdateController extends Controller
{
    public function processRequest(Request $request)
    {

        // "request_id": ‘string’, //unique auto-gen
        // "kiosk_external_id": ‘string’, //Magex unique kiosk ID
        // request
        $req = $request->json()->all();

        $planos = Planogram::all();

        $response = [
            'status' => 'SUCCESS',
            'items' => array(),
        ];
        foreach ($planos as $plano)
        {
            $response['items'][] = [
                'productCode' => $plano->productCode,
                'stock' => $plano->stock,
                'row' => $plano->row,
                'lane' => $plano->lane,
                'productPrice' => $plano->productPrice,
                'stepNum' => $plano->stepNum,
                'maxStock' => '4',
            ];
        }

        return response()->json($response);

    }
}
