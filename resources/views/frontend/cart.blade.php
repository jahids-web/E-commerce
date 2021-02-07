@extends('layouts.frontend')

@section('home')
active
@endsection


@section('content')

 <!-- .breadcumb-area start -->
 <div class="breadcumb-area bg-img-4 ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcumb-wrap text-center">
                    <h2>Shopping Cart</h2>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><span>Shopping Cart</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- .breadcumb-area end -->
<!-- cart-area start -->
<div class="cart-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                @if (session('validityerrors'))
                <div class="alert alert-danger">
                    {{ session('validityerrors') }}
                </div>
                @endif

                @if (session('invaliderrors'))
                <div class="alert alert-danger">
                    {{ session('invaliderrors') }}
                </div>
                @endif

                <form method="post" action="{{ url('update/cart') }}">
                    @csrf
                    <table class="table-responsive cart-wrap">
                        <thead>
                            <tr>
                                <th class="images">Image</th>
                                <th class="product">Product</th>
                                <th class="ptice">Price</th>
                                <th class="quantity">Quantity</th>
                                <th class="total">Total</th>
                                <th class="remove">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            
                            @foreach(cart_products() as $cart_product)
                            <tr>
                            <td class="images"><img src="{{ asset('uploads/product_thumbnail') }}/{{ $cart_product->relationtoproducttable->product_thumbnail_photo }}" alt="{{ $cart_product->relationtoproducttable->product_thumbnail_photo }}"></td>
                                <td class="product"><a href="{{ url('product') }}/{{ $cart_product->relationtoproducttable->product_slug }}" targe="_blank">{{ $cart_product->relationtoproducttable->product_name }}</a></td>
                                <td class="ptice">${{ $cart_product->relationtoproducttable->product_price }}</td>
                                <td class="quantity cart-plus-minus">
                                    <input type="hidden" value="{{ $cart_product->id }}" name="cart_id[]">
                                    <input type="text" value="{{ $cart_product->amount }}" name="cart_quantity[]">
                                </td>
                                <td class="total">${{ $cart_product->relationtoproducttable->product_price * $cart_product->amount}}</td>
                                <td class="remove">
                                    <a href="{{ url('delete/from/cart') }}/{{ $cart_product->id }}"> <i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>

                    </table>
                    <div class="row mt-60">
                        <div class="col-xl-4 col-lg-5 col-md-6 ">
                            <div class="cartcupon-wrap">
                                <ul class="d-flex"> 
                                    <li>
                                        <button type="submit">Update Cart</button>
                                    </form>
                                    </li>
                                    <li><a href="{{ url('/') }}">Continue Shopping</a></li>
                                </ul>
                    
                                <h3>Cupon</h3>
                                <p>Enter Your Cupon Code if You Have One</p>
                                {{-- cupon-wrap --}}
                                <div>
                                    <input type="text" placeholder="Cupon Code" id="coupon_text" value="{{ $coupon_name ?? "" }}">
                                    {{-- <a class="btn btn-danger" type="submit" id="apply-btn">Apply Cupon</a> --}}
                                    <button type="submit" id="apply-btn" class="btn btn-danger">Apply Cupon</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 offset-xl-5 col-lg-4 offset-lg-3 col-md-6">
                            <div class="cart-total text-right">
                                <h3>Cart Totals</h3>
                                <ul>
                                    <li><span class="pull-left">Subtotal </span>${{ cart_subtotal() }}</li>
                                    {{-- <li><span class="pull-left"> Total </span> $---</li> --}}
                                    @isset($discount_amount)
                                    <li><span class="pull-left"> Coupon Discount </span> {{ $discount_amount }}%</li>
                                    @endisset

                                    <li><span class="pull-left"> Total </span> 
                                    @isset($discount_amount)
                                        ${{ $total_from_cart = (cart_subtotal()- (($discount_amount / 100) * cart_subtotal())) }}
                                    @else
                                        ${{ $total_from_cart = cart_subtotal() }}
                                    @endisset
                                    </li>
                                   
                                </ul>
                                <form method="post" action="{{ url('checkout') }}">
                                    
                                    @csrf
                                    <input type="hidden" name="coupon_name_fron_cart" value="{{ $coupon_name ?? "" }}">
                                    <input type="hidden" name="total_from_cart" value="{{ $total_from_cart }}">
                                    <button type="submit" class="btn btn-danger">Proceed to Checkout</button>
                                </form>
                                
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
<!-- cart-area end -->



@section('footer_scripts')
    <script type="text/javascript">
    $(document).ready(function(){
        $('#apply-btn').click(functin(){
            var coupon_text = $('#coupon_text').val();
            var link_to_go = "{{ url('cart') }}/"+coupon_text;
           window.location.href = link_to_go;
        });
    });
    </script>

@endsection

@endsection