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
                            <h4 class="text-primary"><i class="fa fa-cart-plus"></i> Return Orders:</h4>
                        </h4>
                        <table class="table">
                            <thead>
                            <tr>
                                <th width="15%">Date</th>
                                <th width="15%">Total</th>
                                <th width="20%">Payment</th>
                                <th width="15%">Invoice</th>
                                <th width="15%">Order Number</th>
                                <th width="15%" class="text-right" style="padding-right: 25px">Order Status</th>
                            </tr>
                            </thead>
                        </table>
                        <div class="card-body" style="height: 320px; overflow-y: scroll">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                    @foreach($orders as $order)
                                        <tr>
                                            <td width="15%">{{ $order->order_date }}</td>
                                            <td width="15%">৳ {{ number_format($order->amount,2) }}</td>
                                            <td width="20%">{{ $order->payment_method }}</td>
                                            <td width="15%">#{{ $order->invoice_no }}</td>
                                            <td width="15%">

                                                @if($order->return_order == 0)
                                                    <span class="badge badge-pill badge-warning" style="background: #418DB9;"> No Return Request </span>
                                                @elseif($order->return_order == 1)
                                                    <span class="badge badge-pill badge-warning" style="background: #ffc107;"> Pedding </span>
                                                    <span class="badge badge-pill badge-warning" style="background:red;">Return Requested </span>

                                                @elseif($order->return_order == 2)
                                                    <span class="badge badge-pill badge-warning" style="background: #008000;">Success </span>
                                                @endif

{{--                                                <span class="badge badge-pill badge-info" style="background: #4caf50">{{ $order->status }}</span>--}}
{{--                                                <br>--}}
{{--                                                <span class="badge badge-pill badge-warning" style="background:red;">Return Requested </span>--}}
                                            </td>
                                            <td width="15%" class="text-right">
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
