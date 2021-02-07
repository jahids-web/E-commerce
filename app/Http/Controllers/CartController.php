<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Coupon;
use DB;
use App\Cart;

class CartController extends Controller
{
    function cart($coupon_name = ""){
        if($coupon_name){
            if(Coupon::where('coupon_name', $coupon_name)->exists()){
                if(Coupon::where('coupon_name', $coupon_name)->first()->validity_till >= Carbon::now()->format('y-m-d')){
                   $discount_amount = Coupon::where('coupon_name', $coupon_name)->first()->discount_amount;
                   return view('frontend.cart',[
                      'coupon_name' => $coupon_name,
                      'discount_amount' => $discount_amount,
                   ]);
                }
                else{
                    return back()->withValidityerrors('validity date over');
                }
            }
            else{
                return back()->withInvaliderrors('You Provide An Invalid Coupon!');
            }
        }
        else{
            return view('frontend.cart');
        }  
    }
    function addtocart(Request $request){
        if(Cart::where('ip_address', $request->ip())->where('product_id', $request->product_id)->exists()){
            Cart::where('ip_address', $request->ip())->where('product_id', $request->product_id)->increment('amount', $request->amount );
        }
        else{
            DB::table('carts')->insert([
                'ip_address' => $request->ip(),
                'product_id' => $request->product_id,
                'amount' => $request->amount,
                'created_at' => Carbon::now()
            ]);
        }
      
       return back()->with('cart_status', 'Product added to Cart!');
    }
    function deletefromcart($cart_id){
        Cart::find($cart_id)->delete();
        return back();
    }

    function updatecart(Request $request){
        foreach ($request->cart_id as $key => $id){
           Cart::find($id)->update([
               'amount' => $request->cart_quantity[$key]
           ]);
        }
        return back();
    }
}
