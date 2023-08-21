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
            $order_info = $active_order;
        } else {
            $order_info = $no_order;
        }
        // $response = '{"status":"Active","order_info":{}}';
        $response = [
            'status' => 'Active',
            'order_info' => $order_info,
        ];

        return response()->json($response);

    }
}
