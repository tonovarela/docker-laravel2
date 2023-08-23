<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;

class PaymentUpdateController extends Controller
{
    public function processRequest(Request $request)
    {

        $req = $request->json()->all();
        $order = Order::find($req['order_id']);

        $order->payment_status = $req['status'];
        $order->transaction_id = $req['transaction_id'];
        $order->save();
        // $response = '{"status":"Active","order_info":{}}';
        $response = [
            'status' => 'SUCCESS',
            'message' => 'SUCCESS',
        ];

        return response()->json($response);

    }
}
