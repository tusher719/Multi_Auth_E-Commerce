@extends('frontend.main_master')
@section('content')
    <style>
        .card-header{
            background: #157ed2;
            border-radius: 3px 3px 0 0;
        }
        table thead{
            background: #0b97c4;
            color: #fcfcfc;

        }
        table tbody tr:nth-child(even){
            background: #fcfcfc;
        }
        table tbody tr:nth-child(odd){
            background: #e9e9e9;
        }
        .table>thead>tr>th {
            border-bottom: none;
        }
        hr{
            border: 1px solid #f9f9f9;
        }
    </style>

    <div class="body-content">
        <div class="container">
            <div class="row">

                @include('frontend.common.user_sidebar')

                <div class="col-md-1"></div> <!-- End col md 1 -->

                <div class="col-md-10" style="margin: 20px 0; background: #d1d1d180; border-radius: 3px; padding: 0">
                    <div class="card">
                        <div class="card-header" style="padding: 12px 20px;">
                            <div class="text-right" >
                                <a href="#" style="border: 1px solid #0e90d2;  border-radius: 3px; background: #0e90d2; color: #fff; font-size: 16px; padding: 4px 6px"><i class="fa fa-print"></i> Print</a>
                                <a href="{{ url('user/invoice_download/'.$order->id ) }}" style="border: 1px solid #0b816a;  border-radius: 3px; background: #0b816a; color: #fff; font-size: 16px; padding: 4px 6px"><i class="fa fa-download"></i> Download</a>
                            </div>
                        </div>
                        <div class="card-body" style="padding: 12px 20px">

                            <div class="container-fluid">
                                <div class="order_view">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div >
                                                <h4><strong style="color: #0b97c4">Invoice:</strong> #{{ $order->invoice_no }}</h4>
                                            </div>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <div style="padding: 4px 0">
                                                <img src="{{ asset('frontend/assets/images/logo.png') }}" alt="">
                                            </div>
                                        </div>

                                        <hr>

                                        <div class="col-md-12" style="margin: -15px 0 5px 0;">
                                            <h5><strong>Customer Information</strong></h5>
                                        </div>

                                        <hr>
                                        <div class="col-md-6">
                                            <h4 style="margin-bottom: 10px;"><strong>Shipping Details:</strong></h4>
                                            <h4><strong>Shipping Name:</strong> {{ $order->name }}</h4>
                                            <h4><strong>Shipping Email:</strong> {{ $order->email }}</h4>
                                            <h4><strong>Shipping Phone:</strong> {{ $order->phone }}</h4>
                                            <h4><strong>Address:</strong>
                                                {{ $order->state->state_name }}, {{ $order->district->district_name }}, {{ $order->division->division_name }}
                                            </h4>
                                            <h4><strong>Post Code:</strong> {{ $order->post_code }}</h4>
                                            <h4><strong>Order Date:</strong>{{ $order->order_date }}</h4>
                                        </div>
                                        <div class="col-md-6">
                                            <h4 style="margin-bottom: 10px;"><strong>Orders Details:</strong></h4>
                                            <h4><strong>Name:</strong> {{ $order->user->name }}</h4>
                                            <h4><strong>Email:</strong> {{ $order->user->email }}</h4>
                                            <h4><strong>Phone:</strong> {{ $order->user->phone }}</h4>
                                            <h4><strong>Payment Type:</strong> {{ $order->payment_method }}</h4>
                                            <h4><strong>Tranx ID:</strong>
                                                @if($order->transaction_id == NUll)
                                                    Null
                                                @else
                                                    {{ $order->transaction_id }}
                                                @endif
                                            </h4>
                                            <h4><strong>Order Total:</strong> {{ number_format($order->amount,2) }}৳</h4>
                                            <h4><strong>Order:</strong> <span class="badge badge-pill badge-warning" style="background: #418DB9;">{{ $order->status }} </span></h4>

                                        </div>
                                        <div class="col-md-12" style="margin-top: 20px">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th>Image</th>
                                                        <th>Product Name</th>
                                                        <th>Code</th>
                                                        <th>Color</th>
                                                        <th>Size</th>
                                                        <th>Quantity</th>
                                                        <th>Price</th>
                                                        <th class="text-right">Total</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($orderItem as $item)
                                                        <tr>
                                                            <td><img src="{{ asset($item->product->product_thambnail) }}" class="img-thumbnail" width="80px" height="80px" alt=""></td>
                                                            <td>{{ $item->product->product_name_en }}</td>
                                                            <td>{{ $item->product->product_code }}</td>
                                                            <td>{{ $item->color }}</td>
                                                            <td>
                                                                @if($item->size == Null)
                                                                    ------
                                                                @else
                                                                    {{ $item->size }}
                                                                @endif
                                                            </td>
                                                            <td>{{ $item->qty }}</td>
                                                            <td>{{ number_format($item->price,2) }}৳</td>
                                                            <td class="text-right">{{ number_format($item->price * $item->qty,2) }}৳</td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div> <!-- End col md 10 -->

            </div> <!-- End row -->


            @if($order->status !== "delivered")

            @else
                @php
                    $order = \App\Models\Order::where('id',$order->id)->where('return_reason','=',NULL)->first();
                @endphp

                @if($order)
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-10" style="margin: 20px 0; background: #d1d1d180; border-radius: 3px; padding: 12px 20px">
                            <form action="{{ route('return.order',$order->id) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <h4><strong>Order Return Reason:</strong></h4>
                                    <textarea name="return_reason" id="" rows="5" class="form-control" placeholder="Return reason" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-danger">Return Order</button>

                            </form>
                        </div>
                    </div>
                @else

                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-10 text-center" style="margin: 20px 0; background: #d1d1d180; border-radius: 3px; padding: 12px 20px">
                            <span class="badge badge-pill badge-warning" style="background: red">You Have send return request for this product</span>
                        </div>
                    </div>
                @endif

            @endif

        </div>
    </div>
@endsection
