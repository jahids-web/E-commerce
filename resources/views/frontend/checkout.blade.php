@extends('layouts.frontend')
@section('checkout')
active
@endsection
@section('content')

<!-- .breadcumb-area start -->
<div class="breadcumb-area bg-img-4 ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcumb-wrap text-center">
                    <h2>Checkout</h2>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><span>Checkout</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- .breadcumb-area end -->
<!-- checkout-area start -->
<div class="checkout-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="checkout-form form-style">
                    <h3>Billing Details</h3>
                    <form method="post" action="{{ url('checkout/post') }}">
                        @csrf
                        <h5>Yore are login as: {{ Auth::user()->name }}</h5>
                        <div class="row">
                            <div class="col-sm-6 col-12">
                                <p>First Name *</p>
                                <input type="text" value="{{ Auth::user()->name }}" name="full_name">
                            </div>
                            <div class="col-sm-6 col-12">
                                <p>Email Address *</p>
                                <input type="text" value="{{ Auth::user()->email }}" name="email_adderss">
                            </div>
                            <div class="col-sm-12 col-6">
                                <p>Phone No. *</p>
                                <input type="text" name="phone_namber">
                            </div>
                            <div class="col-6">
                                <p>Country *</p>
                                    <select class="" name="country_id">
                                        <option value="1">Bangladesh</option>
                                    </select>
                                
                            </div>
                            <div class="col-6">
                                <p>City *</p>
                                    <select class="" name="city_id">
                                        <option value="1">Dhaka</option>
                                        <option value="1">Kumela</option>
                                        <option value="1">Chetpur</option>
                                    </select>
                            
                            </div>
                            <div class="col-12">
                                <p>Your Address *</p>
                                <input type="text" name="address">
                            </div>
                           
                            <div class="col-12">
                                <p>Order Notes </p>
                                <textarea name="note" placeholder="Notes about Your Order, e.g.Special Note for Delivery"></textarea>
                            </div>
                        </div>
                    
                </div>
            </div>
            <div class="col-lg-4">
                <div class="order-area">
                    <h3>Your Order</h3>
                    <ul class="total-cost">
                        @foreach(cart_products() as $cart_product)
                        <li>{{ $cart_product->relationtoproducttable->product_name }} 
                            <span class="pull-right">${{ $cart_product->relationtoproducttable->product_price * $cart_product->amount }}</span>
                        </li>
                        @endforeach
                        <input type="hidden" name="sub_total" value="{{ cart_subtotal() }}">
                        <input type="hidden" name="total" value="{{ $total_from_cart }}">
                        <input type="hidden" name="coupon_name" value="{{ $coupon_name_from_cart ?? "" }}">
                        <li>Subtotal <span class="pull-right"><strong>${{ cart_subtotal() }}</strong></span></li>
                        <li>Coupon <span class="pull-right"><strong>{{ $coupon_name_fron_cart ?? "" }}</strong></span></li>
                        <li>Shipping <span class="pull-right">Free</span></li>
                        <li>Total<span class="pull-right">${{ $total_from_cart }}</span></li>   
                    </ul>
                    <ul class="payment-method">

                        <li>
                            <input id="delivery" type="radio" value="1" >
                            <label for="delivery">Cash on Delivery</label>
                        </li>

                        <li>
                            <input id="card" type="radio" value="2">
                            <label for="card">Credit Card/Paypal</label>
                        </li>
                       
                    </ul>
                    <button type="submit">Place Order</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<!-- checkout-area end -->
