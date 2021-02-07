<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Order_list;
use App\Cart;
use App\Product;
use Auth;
use Carbon\Carbon;

class CheckoutController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    function index(Request $request)
    {
        return view('frontend.checkout', [
            'total_from_cart' => $request->total_from_cart,
            'coupon_name_fron_cart' => $request->coupon_name_fron_cart

        ]);
    }

    function checkoutpost(Request $request)
    {
        //oder table inser
        $order_id = Order::insertGetId($request->except('_token') + [
            'user_id' => Auth::id(),
            'created_at' => Carbon::now()
        ]);
            //order list table insert
        foreach (cart_products() as $cart_product) {
            Order_list::insert([
                "user_id" => Auth::id(),
                "order_id" => $order_id,
                "product_id" => $cart_product->product_id,
                "amount" => $cart_product->amount,
                'created_at' => Carbon::now()
            ]);
            Product::find($cart_product->product_id)->decrement('quantity', $cart_product->amount);
            //cart tabile delete
            Cart::find($cart_product->id)->delete();
            
        }
        return redirect('/');
    }
}
