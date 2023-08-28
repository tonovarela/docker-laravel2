<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;

class InventoryUpdateController extends Controller
{
    public function processRequest(Request $request)
    {
        $stock = array();

        $req = $request->json()->all();

        if ($message_type === 'loading')
        {
            foreach ($req['post_items'] as $item)
            {   
                isset($stock[$item['upc']]) ||  $stock[$item['upc']] = 0;
                $stock[$item['upc']] += $item['current_stock'];
            }
        } else {
            foreach ($req['items'] as $item)
            {   
                isset($stock[$item['upc']]) ||  $stock[$item['upc']] = 0;
                $stock[$item['upc']] += $item['current_stock'];
            }
        }
        foreach ($stock as $upc => $available)
        {
            $product = Product::where('productCode', $upc)->first();
            if (isset($product))
            {
                $product->available = $available;
                $product->save();
            } else {
                info('product missing: ', $upc, $available);
            }
        }

        // $response = '{"status":"Active","order_info":{}}';
        $response = [
            'status' => 'SUCCESS',
            'message' => 'SUCCESS',
        ];

        return response()->json($response);

    }
}
