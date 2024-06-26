<?php
namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
class MainController extends Controller
{
    public function productList()
    {
        $cartItems = \Cart::getContent();
        $products = Product::where('available', '>', 0)->get();
        return view('main', compact('products', 'cartItems'));
    }

    public function productDetail($id)
    {
        $product = Product::find($id);
        return view('details', compact('product'));
    }
}

