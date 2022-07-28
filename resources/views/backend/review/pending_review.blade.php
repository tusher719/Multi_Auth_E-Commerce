@extends('admin.admin_master')
@section('admin')

    <!-- Content Wrapper. Contains page content -->

    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Pending Review</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Manage Review</li>
                                <li class="breadcrumb-item active" aria-current="page">Pending Review</li>
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
                            <h3 class="box-title">Pending All Reviews <span class="badge badge-pill badge-danger"> {{ count($review) }} </span></h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Summary</th>
                                        <th>Comment</th>
                                        <th>User</th>
                                        <th>Product</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($review as $item)
                                        <tr>
                                            <td>{{ $loop->index+1 }}</td>
                                            <td> {{ Str::limit($item->summary, 40) }}  </td>
                                            <td> {{ Str::limit($item->comment, 101) }}  </td>
                                            <td>  {{ $item->user->name }}  </td>

                                            <td> {{ $item->product->product_name_en }}  </td>
                                            <td>
                                                @if($item->status == 0)
                                                    <span class="badge badge-pill badge-primary">Pending </span>
                                                @elseif($item->status == 1)
                                                    <span class="badge badge-pill badge-success">Publish </span>
                                                @endif

                                            </td>

                                            <td>
                                                <a href="{{ route('review.approve',$item->id) }}" class="btn btn-danger">Approve </a>
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
