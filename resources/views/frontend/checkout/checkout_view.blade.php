@extends('frontend.main_master')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

@section('title')
    Checkout Page | Easy Online Shop
@endsection
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class='active'>Checkout</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->



<div class="body-content">
    <div class="container">
        <div class="checkout-box ">
            <div class="row">
                <div class="col-md-7">
                    <div class="panel-group checkout-steps" id="accordion">
                        <!-- checkout-step-01  -->
                        <div class="panel panel-default checkout-step-01">

                            <!-- panel-heading -->
                            <div class="panel-heading">
                                <h4 class="unicase-checkout-title">
                                    <a class="" href="#">
                                        <span style="font-size: 22px"><i class="fa fa-truck"></i></span>Checkout Method
                                    </a>
                                </h4>
                            </div>
                            <!-- panel-heading -->

                            <div class="panel-collapse collapse in">

                                <!-- panel-body  -->
                                <div class="panel-body">
                                    <div class="row">

                                        <!-- guest-login -->
                                        <div class="col-md-6 col-sm-6 already-registered-login">
                                            <h4 class="checkout-subtitle"><b>Shipping Address</b></h4>
                                            <form class="register-form" role="form">
                                                <div class="form-group">
                                                    <label class="info-title"><b>Shipping Name</b> <span>*</span></label>
                                                    <input type="text" name="shipping_name" class="form-control unicase-form-control text-input" placeholder="Enter name" value="{{ Auth::user()->name }}" required>
                                                </div> <!-- end form group -->

                                                <div class="form-group">
                                                    <label class="info-title"><b>Email</b> <span>*</span></label>
                                                    <input type="email" name="shipping_email" class="form-control unicase-form-control text-input" placeholder="Enter email address" value="{{ Auth::user()->email }}" required>
                                                </div> <!-- end form group -->

                                                <div class="form-group">
                                                    <label class="info-title"><b>Phone</b> <span>*</span></label>
                                                    <input type="text" name="shipping_phone" class="form-control unicase-form-control text-input" placeholder="Enter phone number" value="{{ Auth::user()->phone }}" required>
                                                </div> <!-- end form group -->

                                                <div class="form-group">
                                                    <label class="info-title"><b>Post Code</b> <span>*</span></label>
                                                    <input type="text" name="post_code" class="form-control unicase-form-control text-input" placeholder="Enter post code" required>
                                                </div> <!-- end form group -->

                                        </div>
                                        <!-- guest-login -->

                                        <!-- already-registered-login -->
                                        <div class="col-md-6 col-sm-6 already-registered-login">
                                            <!-- Division Select -->
                                            <div class="form-group">
                                                <h5><b>Division Select</b> <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="division_id" class="form-control"  >
                                                        <option value="" selected="" disabled="">Select Division</option>
                                                        @foreach($division as $item)
                                                            <option value="{{ $item->id }}">{{ $item->division_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('division_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- District Select -->
                                            <div class="form-group">
                                                <h5><b>District Select</b> <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="district_id" class="form-control">
                                                        <option value="" selected="" disabled="">Select District</option>

                                                    </select>
                                                    @error('district_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- State Select -->
                                            <div class="form-group">
                                                <h5><b>State Name</b> <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="state_id" class="form-control">
                                                        <option value="" selected="" disabled="">Select State</option>

                                                    </select>
                                                    @error('state_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- Notes -->
                                            <div class="form-group">
                                                <h5><b>Notes</b> <span class="text-danger">*</span></h5>
                                                <textarea class="form-control unicase-form-control text-input" name="notes" id="" cols="30" rows="5" placeholder="Notes"></textarea>
                                            </div> <!-- end form group -->

                                                <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Submit</button>
                                            </form>
                                        </div>
                                        <!-- already-registered-login -->

                                    </div>
                                </div>
                                <!-- panel-body  -->

                            </div><!-- row -->
                        </div>
                        <!-- checkout-step-01  -->

                    </div><!-- /.checkout-steps -->
                </div>
                <div class="col-md-5">
                    <!-- checkout-progress-sidebar -->
                    <div class="checkout-progress-sidebar ">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">Order Overview</h4>
                                </div>
                                <div class="">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th class="cart-description item">Image</th>
                                                <th class="cart-product-name item">Name</th>
                                                <th class="cart-qty item">Price</th>
                                                <th class="cart-qty item text-right">Total</th>
                                            </tr>
                                            </thead><!-- /thead -->
                                            <tbody>
                                            @foreach($carts as $item)
                                                <tr>
                                                    <td>
                                                        <img src="{{asset($item->options->image)}}" alt="" style="height: 60px; width: 60px;">
                                                    </td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ number_format($item->price) }}৳<strong style="color: #9e9e9e; padding: 0 2px">X</strong>{{ $item->qty }}</td>
                                                    <td class="text-right">{{ number_format($item->price*$item->qty, 2) }}৳</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                            <tfooter>
                                                @if(Session::has('coupon'))
                                                    <tr>
                                                        <th colspan="3" class="text-right">Sub-Total:</th>
                                                        <th class="text-right" style="color: #EF4A23;"> {{ number_format($cartSubTotal, 2) }}৳ </th>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="3" class="text-right">Coupon Name:</th>
                                                        <th class="text-right" style="color: #EF4A23;">{{ session()->get('coupon')['coupon_name'] }} </th>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="3" class="text-right">Discount:</th>
                                                        <th class="text-right" style="color: #EF4A23;">{{ session()->get('coupon')['coupon_discount'] }}% </th>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="3" class="text-right">Discount Amount:</th>
                                                        <th class="text-right" style="color: #EF4A23;"> {{ number_format(session()->get('coupon')['discount_amount'], 2) }}৳ </th>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="3" class="text-right">Grant Total:</th>
                                                        <th class="text-right" style="color: #EF4A23;">{{ number_format(session()->get('coupon')['total_amount'], 2) }}৳ </th>
                                                    </tr>
                                                @else
                                                    <tr>
                                                        <th colspan="3" class="text-right">Sub-Total:</th>
                                                        <th class="text-right" style="color: #EF4A23;">{{ number_format($cartSubTotal, 2) }}৳</th>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="3" class="text-right">Grant Total:</th>
                                                        <th class="text-right" style="color: #EF4A23;">{{ number_format($cartSubTotal, 2) }}৳</th>
                                                    </tr>
                                                @endif
                                            </tfooter>
                                        </table>
                                    </div>
                                    <ul class="nav nav-checkout-progress list-unstyled">
                                            <li><a href="#">Shipping Address</a></li>
                                            <li><a href="#">Shipping Method</a></li>
                                            <li><a href="#">Payment Method</a></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- checkout-progress-sidebar -->				</div>
            </div><!-- /.row -->
        </div><!-- /.checkout-box -->
        <!-- ============================================== BRANDS CAROUSEL ============================================== -->
        @include('frontend.body.brands')
        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div><!-- /.body-content -->


<script type="text/javascript">
    $(document).ready(function () {
        $('select[name="division_id"]').on('change', function () {
            var division_id = $(this).val();
            if (division_id) {
                $.ajax({
                    url: "{{ url('/district-get/ajax') }}/"+division_id,
                    type: "GET",
                    dataType: "json",
                    success:function (data) {
                        $('select[name="state_id"]').empty();
                        var d =$('select[name="district_id"]').empty();
                        $.each(data, function (key, value) {
                            $('select[name="district_id"]').append('<option value="'+ value.id +'">' + value.district_name + '</option>');
                        });
                    },
                });
            } else {
                alert('danger');
            }
        });




        $('select[name="district_id"]').on('change', function(){
            var district_id = $(this).val();
            if(district_id) {
                $.ajax({
                    url: "{{  url('/state-get/ajax') }}/"+district_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                        var d =$('select[name="state_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="state_id"]').append('<option value="'+ value.id +'">' + value.state_name + '</option>');
                        });
                    },
                });
            } else {
                alert('danger');
            }
        });
    });
</script>
@endsection
