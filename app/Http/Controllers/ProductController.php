<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('index', compact('products'));
    }

    public function addCart($id)
    {
        $product = Product::find($id);

        if ($product != null) {

            Cart::session('test')->add([
                'id' => $product->id,
                'name' => $product->name,
                'quantity' => 1,
                'price' => floatval($product->price),
                'attributes' => array(),
                'associatedModel' => $product
            ]);

            return view('cart');
        }

        toastr()->error('An error has occurred please try again later.');

        return back();
    }

    public function removeCart(Request $req, $id)
    {

        $cart = Cart::isEmpty();

        if (!$cart) {
            $req->session()->forget('test_cart_items');
        } else {
            Cart::session('test')->remove($id);
        }

        return view('cart');
    }

    public function removeListCart($id)
    {
        $quantity = Cart::session('test')->get($id)->quantity;

        if ($quantity > 1) {
            Cart::session('test')->update($id, [
                'quantity' => -1,
            ]);
        } else {
            Cart::session('test')->remove($id);
        }
        return view('list-cart');
    }


    public function updateListCart($id, $quantity)
    {
        $old_quantity = Cart::session('test')->get($id)->quantity;

        Cart::session('test')->update($id, [
            'quantity' => -$old_quantity + $quantity,
        ]);

        return view('list-cart');
    }

    public function EditAllListCart(Request $req)
    {
        $response = $req->data;

        foreach ($response as $item) {
            $old_quantity = Cart::session('test')->get($item['key'])->quantity;

            Cart::session('test')->update($item['key'], [
                'quantity' => -$old_quantity + $item['value'],
            ]);
        }

        return view('list-cart');
    }
}