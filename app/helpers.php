<?php 

function cart_total_products(){
    return App\Cart::where('ip_address', request()->ip())->count();
}

function cart_products(){
    return App\Cart::where('ip_address', request()->ip())->get();
}

function cart_subtotal(){
    $total_price = 0;
    foreach (cart_products() as $cart_product) {
        $total_price = $total_price + ($cart_product->amount * App\Product::find($cart_product->product_id)->product_price);
    }
    return $total_price;
}











?>