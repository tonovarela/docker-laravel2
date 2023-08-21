<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Order_detail;


class CartController extends Controller
{
    public function cartList()
    {
        $cartItems = \Cart::getContent();
        return view('cart', compact('cartItems'));
    }

    public function addToCart(Request $request)
    {
        $condition = new \Darryldecode\Cart\CartCondition(array(
            'name' => 'TAX',
            'type' => 'tax',
            'target' => 'subtotal', // this condition will be applied to cart's subtotal when getSubTotal() is called.
            'value' => env('MACHINE_TAX'),
            'attributes' => array( // attributes field is optional
                'description' => 'Sales tax',

            )
        ));
        
        \Cart::condition($condition);
   
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image,
            ),
        ]);
        
        session()->flash('success', 'Product is Added to Cart Successfully !');
        return redirect()->route('main.list');
    }

    public function updateCart(Request $request)
    {
        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );
        session()->flash('success', 'Item Cart is Updated Successfully !');
        return redirect()->route('main.list');
    }

    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
        session()->flash('success', 'Item Cart Remove Successfully !');
        return redirect()->route('cart.list');
    }

    public function clearAllCart()
    {
        \Cart::clear();
        session()->flash('success', 'All Item Cart Clear Successfully !');
        return redirect()->route('main.list');
    }

    public function checkout()
    {
        $cartItems = \Cart::getContent();

        $subTotal = \Cart::getSubTotalWithoutConditions();
        $condition = \Cart::getCondition('TAX');
        $tax = $condition->getCalculatedValue($subTotal);

        // create order
        $order = new Order;
        $order->item_amount = \Cart::getTotalQuantity();
        $order->tax_amount =  number_format($tax,2);
        $order->total_amount = \Cart::getTotal();
        $order->order_status = 'orderStarted'; // avoid partial order getting picked up
        $order->save();
        // add items
        foreach ($cartItems as $item)
        {
            
            $det = new Order_detail;
            $det->order_id = $order->id;
            $det->item_id = $item->id;
            $det->product_name = $item->name;
            $det->soldPrice = $item->price;
            $det->tax_amount = number_format($item->price * $condition->parsedRawValue,2);
            $det->quantity = 1;
            $det->discount = 0;
            $det->total_amount = $det->tax_amount +  $det->soldPrice;
            $det->save();

            
        }
        //set to created
        $order->order_status = 'OrderCreated';
        $order->save();
        dd($order);
        return redirect()->route('checkout.start');
    }
}