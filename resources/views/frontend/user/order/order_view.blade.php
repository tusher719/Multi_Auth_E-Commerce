@extends('frontend.main_master')
@section('content')
    <style>
        ::-webkit-scrollbar {
            width: 10px;
        }
        ::-webkit-scrollbar-track {
            background: #fff;
            border-radius: 50px;
        }
        ::-webkit-scrollbar-thumb {
            background: #666666;
            border-radius: 50px;
        }
    </style>
    <div class="body-content">
        <div class="container">
            <div class="row">

                @include('frontend.common.user_sidebar')

                <div class="col-md-1"></div> <!-- End col md 2 -->

                <div class="col-md-8" style="margin-top: 80px; margin-bottom: 20px; padding: 6px 10px; background: #d1d1d1; border-radius: 3px;">
                    <div class="card">
                        <h4 class="card-header">
                            <span class="text-primary"><i class="fa fa-cart-plus"></i> Orders Information:</span>
                        </h4>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th></th>
                                    <th>Total</th>
                                    <th></th>
                                    <th>Payment</th>
                                    <th></th>
                                    <th>Invoice</th>
                                    <th></th>
                                    <th>Order</th>
                                    <th class="text-right" style="padding-right: 25px">Action</th>
                                </tr>
                                </thead>
                            </table>
                        <div class="card-body" style="height: 320px; overflow-y: scroll">
                            <div class="table-responsive">
                                <table class="table table-success">
                                    <tbody>
                                    @foreach($orders as $order)
                                        <tr>
                                            <td>{{ $order->order_date }}</td>
                                            <td>৳ {{ number_format($order->amount,2) }}</td>
                                            <td>{{ $order->payment_method }}</td>
                                            <td>#{{ $order->invoice_no }}</td>
                                            <td>
                                                @if($order->status == 'pending')
                                                    <span class="badge badge-pill badge-warning" style="background: #800080;"> Pending </span>
                                                @elseif($order->status == 'confirm')
                                                    <span class="badge badge-pill badge-warning" style="background: #0000FF;"> Confirm </span>
                                                @elseif($order->status == 'processing')
                                                    <span class="badge badge-pill badge-warning" style="background: #FFA500;"> Processing </span>
                                                @elseif($order->status == 'picked')
                                                    <span class="badge badge-pill badge-warning" style="background: #808000;"> Picked </span>
                                                @elseif($order->status == 'shipped')
                                                    <span class="badge badge-pill badge-warning" style="background: #808080;"> Shipped </span>
                                                @elseif($order->status == 'delivered')
                                                    @if($order->return_order == 2)
                                                        <span class="badge badge-pill badge-warning" style="background: #008000;"> Return Success </span>
                                                    @else
                                                        <span class="badge badge-pill badge-warning" style="background: #008000;"> Delivered </span>
                                                        @if($order->return_order == 1)
                                                            <br><span class="badge badge-pill badge-warning" style="background:red;">Return Requested </span>
                                                        @endif
                                                    @endif
                                                @else
                                                    <span class="badge badge-pill badge-warning" style="background: #FF0000;"> Cancel </span>
                                                @endif
                                            </td>
                                            <td class="text-right">
                                                <a href="{{ url('user/order_details/'.$order->id ) }}" class="btn btn-info" title="Invoice View"><i class="fa fa-eye"></i> </a>
                                                <a href="{{ url('user/invoice_download/'.$order->id ) }}" target="_blank" class="btn btn-primary" title="Invoice Download"><i class="fa fa-download"></i> </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> <!-- End col md 6 -->
            </div> <!-- End row -->
        </div>
    </div>
@endsection
