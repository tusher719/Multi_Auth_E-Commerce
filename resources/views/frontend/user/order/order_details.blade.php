@extends('frontend.main_master')
@section('content')

    <div class="body-content">
        <div class="container">
            <div class="row">

                @include('frontend.common.user_sidebar')

                <div class="col-md-1"></div> <!-- End col md 2 -->

                <div class="col-md-10" style="margin-top: 80px; margin-bottom: 20px; background: #d1d1d1; border-radius: 3px;">
                    <div class="card">
{{--                        <h4 class="card-header">--}}
{{--                            <span class="text-primary"><i class="fa fa-shopping-cart"></i> Shipping Details:</span>--}}
{{--                        </h4>--}}
                        <div class="card-body">

                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header"><h4>Shipping Details</h4></div>
                                    <hr>
                                    <div class="card-body" style="background: #E9EBEC;">
                                        <table class="table">
                                            <tr>
                                                <th> Shipping Name : </th>
                                                <th> {{ $order->name }} </th>
                                            </tr>

                                            <tr>
                                                <th> Shipping Phone : </th>
                                                <th> {{ $order->phone }} </th>
                                            </tr>

                                            <tr>
                                                <th> Shipping Email : </th>
                                                <th> {{ $order->email }} </th>
                                            </tr>

                                            <tr>
                                                <th> Division : </th>
                                                <th> {{ $order->division->division_name }} </th>
                                            </tr>

                                            <tr>
                                                <th> District : </th>
                                                <th> {{ $order->district->district_name }} </th>
                                            </tr>

                                            <tr>
                                                <th> State : </th>
                                                <th>{{ $order->state->state_name }} </th>
                                            </tr>

                                            <tr>
                                                <th> Post Code : </th>
                                                <th> {{ $order->post_code }} </th>
                                            </tr>

                                            <tr>
                                                <th> Order Date : </th>
                                                <th> {{ $order->order_date }} </th>
                                            </tr>

                                        </table>

                                    </div>

                                </div>

                            </div> <!-- // end col md -6 -->

                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header"><h4>Order Details
                                            <span class="text-danger"> Invoice : {{ $order->invoice_no }}</span></h4>
                                    </div>
                                    <hr>
                                    <div class="card-body" style="background: #E9EBEC;">
                                        <table class="table">
                                            <tr>
                                                <th>  Name : </th>
                                                <th> {{ $order->user->name }} </th>
                                            </tr>

                                            <tr>
                                                <th>  Phone : </th>
                                                <th> {{ $order->user->phone }} </th>
                                            </tr>

                                            <tr>
                                                <th> Payment Type : </th>
                                                <th> {{ $order->payment_method }} </th>
                                            </tr>

                                            <tr>
                                                @if($order->transaction_id == true)
                                                    <th> Tranx ID : </th>
                                                    <th> {{ $order->transaction_id }} </th>
                                                @else
                                                    <th> Tranx ID : </th>
                                                    <th> Null </th>
                                                @endif
                                            </tr>

                                            <tr>
                                                <th> Invoice  : </th>
                                                <th class="text-danger"> {{ $order->invoice_no }} </th>
                                            </tr>

                                            <tr>
                                                <th> Order Total : </th>
                                                <th>{{ number_format($order->amount,2) }} </th>
                                            </tr>

                                            <tr>
                                                <th> Order : </th>
                                                <th>
                                                    <span class="badge badge-pill badge-warning" style="background: #418DB9;">{{ $order->status }} </span> </th>
                                            </tr>
                                        </table>

                                    </div>

                                </div>

                            </div> <!-- // 2ND end col md -6 -->

                            <div class="row">

                                <div class="col-md-12">

                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>

                                            <tr style="background: #e2e2e2;">
                                                <th> Image </th>

                                                <th> Product Name </th>

                                                <th> Product Code </th>


                                                <th> Color </th>

                                                <th> Size  </th>

                                                <th> Price </th>

                                                <th class="text-right"> Total </th>
                                            </tr>

                                            @foreach($orderItem as $item)
                                                <tr>
                                                    <td> <img src="{{ asset($item->product->product_thambnail) }}" height="50px;" width="50px;"> </td>

                                                    <td> {{ $item->product->product_name_en }} </td>


                                                    <td> {{ $item->product->product_code }} </td>

                                                    <td> {{ $item->color }} </td>

                                                    <td>
                                                        @if($item->size == true)
                                                            {{ $item->size }}
                                                        @else
                                                            ------
                                                        @endif
                                                    </td>

                                                    <td> {{ number_format($item->price,2) }}৳ X {{ $item->qty }} </td>

                                                    <td class="text-right"> {{ number_format($item->price * $item->qty,2) }}৳ </td>

                                                </tr>
                                            @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div> <!-- / end col md 8 -->
                            </div> <!-- // END ORDER ITEM ROW -->
                        </div>
                    </div>
                </div> <!-- End col md 6 -->
            </div> <!-- End row -->
        </div>
    </div>
@endsection
