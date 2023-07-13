<?php
namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
class MainController extends Controller
{
    public function productList()
    {
        $cartItems = \Cart::getContent();
        $products = Product::all();
        return view('main', compact('products', 'cartItems'));
    }
}

