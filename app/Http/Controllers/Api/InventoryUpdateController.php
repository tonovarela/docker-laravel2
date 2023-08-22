<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;

class InventoryUpdateController extends Controller
{
    public function processRequest(Request $request)
    {

        // "request_id": ‘string’, //unique auto-gen
        // "kiosk_external_id": ‘string’, //Magex unique kiosk ID
        // request
        $req = $request->json()->all();
        $stock = array();
        foreach ($req['items'] as $item)
        {   
            isset($stock[$item['upc']]) ||  $stock[$item['upc']] = 0;
            $stock[$item['upc']] += $item['current_stock'];
        }
        
        foreach ($stock as $upc => $available)
        {
            $product = Product::where('productCode', $upc)->first();
            $product->available = $available;
            $product->save();
        }

        // $response = '{"status":"Active","order_info":{}}';
        $response = [
            'status' => 'SUCCESS',
            'message' => 'SUCCESS',
        ];

        return response()->json($response);

    }
}
