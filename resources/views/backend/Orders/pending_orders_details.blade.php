@extends('admin.admin_master')
@section('admin')


    <!-- Content Wrapper. Contains page content -->

    <div class="container-full">
        <!-- Content Header (Page header) -->


        <div class="content-header">
            <div class="row">
                <div class="col-md-10">
                    <div class="d-flex align-items-center">
                        <div class="mr-auto">
                            <h3 class="page-title">View Details</h3>
                            <div class="d-inline-block align-items-center">
                                <nav>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                        <li class="breadcrumb-item" aria-current="page">Orders</li>
                                        <li class="breadcrumb-item" aria-current="page">
                                            @if($order->status == 'Pending')
                                                <a href="{{ route('pending-orders') }}">Pending Orders</a>
                                            @elseif($order->status == 'Confirm')
                                                <a href="{{ route('confirmed-orders') }}">Confirmed Orders</a>
                                            @elseif($order->status == 'Processing')
                                                <a href="{{ route('processing-orders') }}">Processing Orders</a>
                                            @elseif($order->status == 'Picked')
                                                <a href="{{ route('picked-orders') }}">Picked Orders</a>
                                            @elseif($order->status == 'Shipped')
                                                <a href="{{ route('shipped-orders') }}">Shipped Orders</a>
                                            @elseif($order->status == 'Delivered')
                                                <a href="{{ route('delivered-orders') }}">Delivered Orders</a>
                                            @endif
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">View Details</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 text-right">
                    @if($order->status == 'Pending')

                    @else
                        <a href="{{ route('invoice.download',$order->id) }}" class="btn btn-success" title="Invoice Download" target="_blank">
                            <i class="fa fa-download"> Download</i>
                        </a>
                    @endif
                </div>
            </div>
        </div>



        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-md-12 col-12">
                    <div class="box box-bordered border-primary">
                        <div class="box-header">
                            <h4 class="box-title"><strong class="text-danger">Invoice:</strong><span> #{{ $order->invoice_no }}</span></h4>
                        </div>
                    </div>
                </div> <!--  // cod md -12 -->

                <div class="col-md-6">
                    <div class="box box-bordered border-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title"><strong>Shipping Details:</strong> </h4>
                        </div>

                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
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
                                    </tbody>
                                </table>
                            </div>
                        </div>


                    </div>
                </div> <!--  // cod md -6 -->


                <div class="col-md-6">
                    <div class="box box-bordered border-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title"><strong>Order Details:</strong></h4>
                        </div>

                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
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
                                        <th> Tranx ID : </th>
                                        <th>
                                            @if($order->transaction_id == Null)
                                                --------
                                            @else
                                                {{ $order->transaction_id }}
                                            @endif
                                        </th>
                                    </tr>

                                    <tr>
                                        <th> Invoice  : </th>
                                        <th class="text-danger"> #{{ $order->invoice_no }} </th>
                                    </tr>

                                    <tr>
                                        <th> Order Total : </th>
                                        <th>${{ number_format($order->amount,2) }} </th>
                                    </tr>

                                    <tr>
                                        <th> Order : </th>
                                        <th>
                                            <span class="badge badge-pill badge-warning" style="background: #418DB9;">{{ $order->status }} </span>
                                        </th>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="box-footer text-right">
                            @if($order->status == 'Pending')
                                <a href="{{ route('pending.confirm',$order->id) }}" id="confirm" class="btn btn-outline btn-primary mb-5">Confirm Order</a>
                            @elseif($order->status == 'Confirm')
                                <a href="{{ route('confirm.processing',$order->id) }}" id="processing" class="btn btn-outline btn-primary mb-5">Processing Order</a>
                            @elseif($order->status == 'Processing')
                                <a href="{{ route('processing.picked',$order->id) }}" id="picked" class="btn btn-outline btn-primary mb-5">Picked Order</a>
                            @elseif($order->status == 'Picked')
                                <a href="{{ route('picked.shipped',$order->id) }}" id="shipped" class="btn btn-outline btn-primary mb-5">Shipped Order</a>
                            @elseif($order->status == 'Shipped')
                                <a href="{{ route('shipped.delivered',$order->id) }}" id="delivered" class="btn btn-outline btn-primary mb-5">Delivered Order</a>
                            @endif
                        </div>

                    </div>
                </div> <!--  // cod md -6 -->

                <div class="col-md-12 ">
                    <div class="box box-bordered border-primary">
                        <div class="box-header with-border">
                        </div>

                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead style="background: #0e90d2; color: #fcfcfc;">
                                    <tr>
                                        <th width="10%">Image</th>

                                        <th width="25%">Product Name</th>

                                        <th width="10%">Pro. Code</th>


                                        <th width="10%">Color</th>

                                        <th width="15%">Size</th>

                                        <th width="5%">Quantity</th>

                                        <th width="10%"> Price </th>

                                        <th width="15%" class="text-right"> Total </th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                    @foreach($orderItem as $item)
                                        <tr>
                                            <td width="10%">
                                                <img src="{{ asset($item->product->product_thambnail) }}" class="img-thumbnail" height="60px;" width="60px;">
                                            </td>

                                            <td width="25%">{{ $item->product->product_name_en }}</td>


                                            <td width="10%">#{{ $item->product->product_code }}</td>

                                            <td width="10%">{{ $item->color }}</td>

                                            <td width="15%">
                                                @if($item->size == Null)
                                                    ------
                                                @else
                                                    {{ $item->size }}
                                                @endif

                                            </td>

                                            <td width="5%">{{ $item->qty }}</td>

                                            <td width="10%">${{ number_format($item->price,2) }}</td>

                                            <td width="15%" class="text-right">$ {{ number_format($item->price * $item->qty,2) }}</td>

                                        </tr>
                                    @endforeach

                                    </tbody>

                                </table>
                            </div>
                        </div>

                    </div>
                </div>  <!--  // cod md -12 -->
            </div>
            <!-- /. end row -->
        </section>
        <!-- /.content -->
    </div>


@endsection
