@extends('frontend.main_master')
@section('content')

@section('title')
    Cash On Delivery Page | Easy Online Shop
@endsection


<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class='active'>Cash On Delivery</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->



<div class="body-content">
    <div class="container">
        <div class="checkout-box ">
            <div class="row">

                <div class="col-md-6">
                    <!-- checkout-progress-sidebar -->
                    <div class="checkout-progress-sidebar ">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">your payment details</h4>
                                </div>
                                <div class="">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                            @if(Session::has('coupon'))
                                                <tr>
                                                    <th colspan="3">Sub-Total:</th>
                                                    <th class="text-right" style="color: #EF4A23;"> {{ number_format($cartTotal, 2) }}৳ </th>
                                                </tr>
                                                <tr>
                                                    <th colspan="3">Coupon Name:</th>
                                                    <th class="text-right" style="color: #EF4A23;">{{ session()->get('coupon')['coupon_name'] }} </th>
                                                </tr>
                                                <tr>
                                                    <th colspan="3">Discount:</th>
                                                    <th class="text-right" style="color: #EF4A23;">{{ session()->get('coupon')['coupon_discount'] }}% </th>
                                                </tr>
                                                <tr>
                                                    <th colspan="3">Discount Amount:</th>
                                                    <th class="text-right" style="color: #EF4A23;"> {{ number_format(session()->get('coupon')['discount_amount'], 2) }}৳ </th>
                                                </tr>
                                                <tr>
                                                    <th colspan="3">Grant Total:</th>
                                                    <th class="text-right" style="color: #EF4A23;">{{ number_format(session()->get('coupon')['total_amount'], 2) }}৳ </th>
                                                </tr>
                                            @else
                                                <tr>
                                                    <th colspan="3">Sub-Total:</th>
                                                    <th class="text-right" style="color: #EF4A23;">{{ number_format($cartSubTotal, 2) }}৳</th>
                                                </tr>
                                                <tr>
                                                    <th colspan="3">Grant Total:</th>
                                                    <th class="text-right" style="color: #EF4A23;">{{ number_format($cartSubTotal, 2) }}৳</th>
                                                </tr>
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- checkout-progress-sidebar -->
                </div>
                <div class="col-md-6">
                    <!-- checkout-progress-sidebar -->
                    <div class="checkout-progress-sidebar ">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">Select Payment Method</h4>
                                </div>

                                <form action="{{ route('cash.order') }}" method="post" id="payment-form">
                                    @csrf
                                    <div class="form-row">

                                        <img src="{{ asset('frontend/assets/images/payments/cash.png') }}" alt="">

                                        <label for="card-element">
                                            <input type="hidden" name="name" value="{{ $data['shipping_name'] }}">
                                            <input type="hidden" name="email" value="{{ $data['shipping_email'] }}">
                                            <input type="hidden" name="phone" value="{{ $data['shipping_phone'] }}">
                                            <input type="hidden" name="post_code" value="{{ $data['post_code'] }}">
                                            <input type="hidden" name="division_id" value="{{ $data['division_id'] }}">
                                            <input type="hidden" name="district_id" value="{{ $data['district_id'] }}">
                                            <input type="hidden" name="state_id" value="{{ $data['state_id'] }}">
                                            <input type="hidden" name="notes" value="{{ $data['notes'] }}">
                                        </label>

                                    </div>
                                    <br>
                                    <button class="btn btn-primary">Submit Payment</button>
                                </form>

                            </div>
                        </div>
                    </div>
                    <!-- checkout-progress-sidebar --> </div>
            </div><!-- /.row -->
        </div><!-- /.checkout-box -->
        <!-- ============================================== BRANDS CAROUSEL ============================================== -->
    @include('frontend.body.brands')
    <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div><!-- /.body-content -->

@endsection
