@extends('admin.admin_master')
@section('admin')


    <!-- Content Wrapper. Contains page content -->

    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Return Request</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Return Order</li>
                                <li class="breadcrumb-item active" aria-current="page">Return Request</li>
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
                            <h3 class="box-title">Return Orders List <span class="badge badge-pill badge-danger"> {{ count($orders) }} </span></h3>
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
                                            <td> ${{ number_format($item->amount,2) }} </td>

                                            <td> {{ $item->payment_method }}  </td>
                                            <td>
                                                @if($item->return_order == 1)
                                                    <span class="badge badge-pill badge-primary">Pending </span>
                                                @elseif($item->return_order == 2)
                                                    <span class="badge badge-pill badge-success">Success </span>
                                                @endif

                                            </td>

                                            <td>
                                                <a href="{{ route('return.approve',$item->id) }}" class="btn btn-danger">Approve </a>
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
