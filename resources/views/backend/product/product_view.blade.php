@extends('admin.admin_master')

@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Manage Product</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Products</li>
                                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('add-product') }}">Add Product</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Manage Product</li>
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
                            <h3 class="box-title">Product List <span class="badge badge-pill badge-primary badge-sm">{{ $total_pro }}</span></h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Image</th>
                                        <th>Product En</th>
                                        <th>Product Price </th>
                                        <th>Product Quantity</th>
                                        <th>Discount </th>
                                        <th>Status </th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($product as $item)
                                        <tr>
                                            <td>{{ $loop->index+1 }}</td>
                                            <td><img src="{{ asset($item->product_thambnail) }}" style="height: 80px; width: 70px;" alt="Product_image"> </td>
                                            <td>{{ $item->product_name_en }}</td>
                                            <td>{{ $item->selling_price }} $</td>
                                            <td>{{ $item->product_qty }} Pic</td>

                                            <td>
                                                @if($item->discount_price == NULL)
                                                    <span class="badge badge-pill badge-danger">No Discount</span>

                                                @else
                                                    @php
                                                        $amount = $item->selling_price - $item->discount_price;
                                                        $discount = ($amount/$item->selling_price) * 100;
                                                    @endphp
                                                    <span class="badge badge-pill badge-danger">{{ round($discount) }} %</span>

                                                @endif



                                            </td>

                                            <td>
                                                @if($item->status == 1)
                                                    <span class="badge badge-pill badge-success"> Active </span>
                                                @else
                                                    <span class="badge badge-pill badge-danger"> InActive </span>
                                                @endif

                                            </td>


                                            <td width="22%">
                                                <a href="{{ route('product.details',$item->id) }}" class="btn btn-primary" title="Product Details Data"><i class="fa fa-eye"></i> </a>
                                                <a href="{{ route('product.edit',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i> </a>

                                                <a href="{{ route('product.delete',$item->id) }}" class="btn btn-danger" title="Delete Data" id="delete"><i class="fa fa-trash"></i></a>

                                                @if($item->status == 1)
                                                    <a href="{{ route('product.inactive',$item->id) }}" class="btn btn-danger" title="Inactive Now"><i class="fa fa-arrow-down"></i> </a>
                                                @else
                                                    <a href="{{ route('product.active',$item->id) }}" class="btn btn-success" title="Active Now"><i class="fa fa-arrow-up"></i> </a>
                                                @endif
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
