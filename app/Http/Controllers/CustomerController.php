<?php

namespace App\Http\Controllers;

// use App\order_list;
use Illuminate\Http\Request;
use App\Order_list;
use Stripe\Order;
use Auth;


class CustomerController extends Controller
{
    function homecustomer(){
      return view('customer.home'); 
    }

    // public function addreview(Request $request){
    //   print_r($request->all());
    //  $order_list = Order_list::where('user_id', Auth::id())->where('product_id', $request->product_id)->whereNull('review')->whereNull('star')->first();
    //   $order_list->review = $request->review;
    //   $order_list->ster = $request->star;
    //   $order_list->save();


    // }














    // 
}
