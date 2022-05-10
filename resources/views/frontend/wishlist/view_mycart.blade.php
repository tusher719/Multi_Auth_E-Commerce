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
                    <div>
                        <span style="font-size: 18px; font-weight: 700; color: grey">Sub Total:</span>
                        <span class="total-price">
                            <span class="sign" style="font-size: 18px; font-weight: 700; color: #0f6cb2;">
                                $<span class="value" id="cartSubTotal"></span>
                            </span>
                        </span>
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
                </div>			</div><!-- /.row -->
        </div><!-- /.sigin-in-->
        <!-- ============================================== BRANDS CAROUSEL ============================================== -->
    @include('frontend.body.brands')
    <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div><!-- /.body-content -->

@endsection
