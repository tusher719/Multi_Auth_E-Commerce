@extends('admin.admin_master')
@section('admin')


    <!-- Content Wrapper. Contains page content -->

    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">All Admin User</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Admin User Role</li>
                                <li class="breadcrumb-item active" aria-current="page">All Admin User</li>
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
                            <h3 class="box-title">Total Admin User <span class="badge badge-pill badge-danger badge-sm">{{ count($adminUser) }}</span></h3>
                            <a href="{{ route('add.admin') }}" class="btn btn-danger" style="float: right;">Add Admin User</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Image  </th>
                                        <th>Name  </th>
                                        <th>Email </th>
                                        <th>Access </th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($adminUser as $item)
                                        <tr>
                                            <td>{{ $loop->index+1 }}</td>
                                            <td> <img src="{{ asset($item->profile_photo_path) }}" style="width: 50px; height: 50px; object-fit: cover;border-radius: 3px;"></td>
                                            <td> {{ $item->name }}  </td>
                                            <td> {{ $item->email }}  </td>

                                            <td>
                                                @if($item->brand == 1)
                                                    <span class="badge btn-primary">Brand</span>
                                                @else
                                                @endif

                                                @if($item->category == 1)
                                                    <span class="badge btn-secondary">Category</span>
                                                @else
                                                @endif

                                                @if($item->product == 1)
                                                    <span class="badge btn-success">Product</span>
                                                @else
                                                @endif

                                                @if($item->slider == 1)
                                                    <span class="badge btn-danger">Slider</span>
                                                @else
                                                @endif

                                                @if($item->coupons == 1)
                                                    <span class="badge btn-warning">Coupons</span>
                                                @else
                                                @endif

                                                @if($item->shipping == 1)
                                                    <span class="badge btn-info">Shipping</span>
                                                @else
                                                @endif

                                                @if($item->blog == 1)
                                                    <span class="badge btn-light">Blog</span>
                                                @else
                                                @endif

                                                @if($item->setting == 1)
                                                    <span class="badge btn-dark">Setting</span>
                                                @else
                                                @endif

                                                @if($item->returnorder == 1)
                                                    <span class="badge btn-primary">Return Order</span>
                                                @else
                                                @endif

                                                @if($item->review == 1)
                                                    <span class="badge btn-secondary">Review</span>
                                                @else
                                                @endif

                                                @if($item->orders == 1)
                                                    <span class="badge btn-success">Orders</span>
                                                @else
                                                @endif

                                                @if($item->stock == 1)
                                                    <span class="badge btn-danger">Stock</span>
                                                @else
                                                @endif

                                                @if($item->reports == 1)
                                                    <span class="badge btn-warning">Reports</span>
                                                @else
                                                @endif

                                                @if($item->alluser == 1)
                                                    <span class="badge btn-info">Alluser</span>
                                                @else
                                                @endif

                                                @if($item->adminuserrole == 1)
                                                    <span class="badge btn-dark">Adminuserrole</span>
                                                @else
                                                @endif
                                            </td>


                                            <td width="14%">
                                                <a href="{{ route('edit.admin.user',$item->id) }}" class="btn btn-info" title="Edit Data">
                                                    <i class="fa fa-pencil"></i>
                                                </a>

                                                <a href="{{ route('delete.admin.user',$item->id) }}" class="btn btn-danger" title="Delete" id="delete">
                                                    <i class="fa fa-trash"></i>
                                                </a>
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
