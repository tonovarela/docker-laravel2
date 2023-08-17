<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
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
}