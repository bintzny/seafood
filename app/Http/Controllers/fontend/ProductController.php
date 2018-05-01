<?php

namespace App\Http\Controllers\fontend;

use App\Cart;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Session;

class ProductController extends Controller
{
    public function index()
    {
     return view('frontend.cart');
    }

    public function getAddToCart(Request $request, $id){
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        return redirect()->action('fontend\ProductController@getCart');
    }


    public function getCart(){
        if(!Session::has('cart')){
            return view('frontend.cart', ['products' => null]);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('frontend.cart',['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }


    public function cartAddItem(Request $request, $id)
    {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);
        $request->session()->put('cart', $cart);
        return back();
    }

    public function cartRemoveItem($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->remove($id);
        Session::put('cart', $cart);
        return redirect()->action('fontend\ProductController@getCart');
    }

    public  function  cartDeleteItem($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->delete($id);

        if (count($cart->items) > 0){
            Session::put('cart', $cart);
        }else{
            Session::forget('cart');
        }
        return redirect()->action('fontend\ProductController@getCart');
    }
}
