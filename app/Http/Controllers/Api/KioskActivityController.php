<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;

class KioskActivityController extends Controller
{

    public function processRequest(Request $request)
    {

        // "request_id": ‘string’, //unique auto-gen
        // "kiosk_external_id": ‘string’, //Magex unique kiosk ID
        // request
        $req = $request->json()->all();


        //check for order
        $no_order  = '{}'; // blank for no orders
        $active_order = Order::with('details')->where('order_status', 'OrderCreated')->first();
        if (isset($active_order))
        {
            //format response
            $status = 'OrderCreated';
            $order_info = [
                'order_id' => $active_order->id,
                'item_amount' => $active_order->item_amount,
                'tax_amount' => $active_order->tax_amount,
                'total_amount' => $active_order->total_amount,
                'items' => array(),
            ];
            foreach ($active_order->details as $item)
            {
                $order_info['items'][] = [
                    'item_id' => $item->item_id,
                    'product_name' => $item->product_name,
                    'upc' => $item->upc,
                    'quantity' => 1,
                    'soldPrice' => $item->soldPrice,
                    'tax_amount' =>  $item->tax_amount,
                    'product' => $item->product,
                    'prodType' => 'prod',
                    'discount' => 0,
                    'referTo' => 'marcos@prepango.com',
                    'picture'=> $item->image1,
                    'total_amount' => $item->total_amount,

                ];
            }
        } else {
            $status = 'Active';
            $order_info = $no_order;
        }
        // $response = '{"status":"Active","order_info":{}}';
        $response = [
            'status' => $status,
            'order_info' => $order_info,
        ];

        return response()->json($response);

    }
}
