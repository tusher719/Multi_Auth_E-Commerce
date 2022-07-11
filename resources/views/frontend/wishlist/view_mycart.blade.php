@extends('frontend.main_master')
@section('content')

@section('title')
    My Cart | Easy Online Shop
@endsection


<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class='active'>MyCart</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
        <div class="my-wishlist-page">

            <div class="row">
                <div class="col-md-12">
                    <div style="border: 1px solid #278cd1;  background: #278cd1; display: inline-block; padding: 6px 10px; border-radius: 5px">
                        <span style="font-size: 18px; font-weight: 700; color: #171819;">Subtotal ( <span class="count" style="color: #fff;" id="myCartQty"> </span> Items):</span>
                        <span class="total-price">
                            <span class="sign" style="font-size: 18px; font-weight: 600; color: #fff;">
                                ৳<span class="value" id="cartSubTotal"></span>
                            </span>
                        </span>
                        <div class="basket-item-count"></div>
                    </div>
                </div>
            </div>

            <div class="row ">
                <div class="shopping-cart">
                    <div class="shopping-cart-table ">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="cart-romove item">Remove</th>
                                    <th class="cart-description item">Image</th>
                                    <th class="cart-product-name item">Product Name</th>
                                    <th class="cart-qty item">Quantity</th>
                                    <th class="cart-sub-total item">Subtotal</th>
                                    <th class="cart-total last-item">Grandtotal</th>
                                </tr>
                                </thead><!-- /thead -->
                                <tbody id="cartPage">

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <hr style="border-top: 1px solid #b7b7b7">
                    <div class="col-md-3 col-sm-12 estimate-ship-tax">
                    </div>

                    <div class="col-md-4 col-sm-12 estimate-ship-tax">

                        @if(Session::has('coupon'))

                        @else
                            <table class="table" id="couponField">
                                <thead>
                                <tr>
                                    <th>
                                        <span class="estimate-title">Discount Code</span>
                                        <p>Enter your coupon code if you have one..</p>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" class="form-control unicase-form-control text-input" placeholder="You Coupon.." id="coupon_name">
                                        </div>
                                        <div class="clearfix pull-right">
                                            <button type="submit" class="btn-upper btn btn-primary" onclick="applyCoupon()">APPLY COUPON</button>
                                        </div>
                                    </td>
                                </tr>
                                </tbody><!-- /tbody -->
                            </table><!-- /table -->
                        @endif
                    </div><!-- /.estimate-ship-tax -->





                    <div class="col-md-5 col-sm-12 cart-shopping-total">
                        <table class="table">
                            <thead id="couponCalField">

                            </thead><!-- /thead -->
                            <tbody>
                            <tr>
                                <td>
                                    <div class="cart-checkout-btn pull-right">
                                        <a href="{{ route('checkout') }}" class="btn btn-primary checkout-btn">PROCEED TO CHECKOUT</a>
                                    </div>
                                </td>
                            </tr>
                            </tbody><!-- /tbody -->
                        </table><!-- /table -->
                    </div><!-- /.cart-shopping-total -->



                </div><!-- /.row -->
            </div><!-- /.sigin-in-->
        <!-- ============================================== BRANDS CAROUSEL ============================================== -->
    @include('frontend.body.brands')
    <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div><!-- /.body-content -->

@endsection
