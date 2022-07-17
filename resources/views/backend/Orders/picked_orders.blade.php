@extends('admin.admin_master')
@section('admin')


    <!-- Content Wrapper. Contains page content -->

    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Picked Orders</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Orders</li>
                                <li class="breadcrumb-item active" aria-current="page">Picked Orders</li>

                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>


        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Picked Orders List <span class="badge badge-pill badge-primary badge-sm">{{ $total_orders_picked }}</span></h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Date </th>
                                        <th>Invoice </th>
                                        <th>Amount </th>
                                        <th>Payment </th>
                                        <th>Status </th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders as $item)
                                        <tr>
                                            <td>{{ $loop->index+1 }}</td>
                                            <td> {{ $item->order_date }}  </td>
                                            <td> #{{ $item->invoice_no }}  </td>
                                            <td> ${{ number_format($item->amount,2) }}  </td>

                                            <td> {{ $item->payment_method }}  </td>
                                            <td> <span class="badge badge-pill badge-primary">{{ $item->status }} </span>  </td>

                                            <td>
                                                <a href="{{ route('pending.order.details',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-eye"></i> </a>
                                                <a href="{{ route('coupon.delete',$item->id) }}" class="btn btn-danger" title="Delete Data" id="delete">
                                                    <i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>

@endsection
