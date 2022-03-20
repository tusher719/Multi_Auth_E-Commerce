@extends('admin.admin_master')
@section('admin')

        <div class="container-full">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h3 class="page-title">All Brand</h3>
                        <div class="d-inline-block align-items-center">
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}"><i class="mdi mdi-home-outline"></i></a></li>
                                    <li class="breadcrumb-item" aria-current="page">Brand</li>
                                    <li class="breadcrumb-item active" aria-current="page">All Brand</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main content -->
            <section class="content">
                <div class="row">

                    <div class="col-8">

                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Brand List</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>Brand En</th>
                                            <th>Brand Ban</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($brands as $item)
                                            <tr>
                                                <td>{{ $item->brand_name_en }}</td>
                                                <td>{{ $item->brand_name_ban }}</td>
                                                <td>
                                                    <img src="{{ asset($item->brand_image) }}" alt="" style="width: 70px; height: 40px;">
                                                </td>
                                                <td>
                                                    <a href="{{ route('brand.edit', $item->id) }}" class="btn btn-primary" title="Edit Data"><i class="fa fa-pencil"></i></a>
                                                    <a href="{{ route('brand.delete', $item->id) }}" class="btn btn-danger" id="delete" title="Delete Data"><i class="fa fa-trash"></i></a>
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




                    <div class="col-4">

                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Add Brand</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">

                                    <form method="post" action="{{ route('brand.store') }}" enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group">
                                            <h5>Brand Name English</h5>
                                            <div class="input-group mb-3">
                                                <input type="text" name="brand_name_en" class="form-control" placeholder="Enter brand name english..." >
                                            </div>
                                            @error('brand_name_en')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <h5>Brand Name Bangla</h5>
                                            <div class="input-group mb-3">
                                                <input type="text" name="brand_name_ban" class="form-control" placeholder="Enter brand name bangla...">
                                            </div>
                                            @error('brand_name_ban')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <h5>Brand Image</h5>
                                            <div class="input-group mb-3">
                                                <input type="file" name="brand_image" class="form-control" id="image">
                                            </div>
                                            @error('brand_image')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <img class="card-img-top" id="showImage" src="{{ (!empty($brand->brand_image)) ? url('uploads/brand/'.$brand->brand_image) : url('uploads/no_image.jpg') }}" style="border-radius: 3px; height: 100px; width: 100px; object-fit: cover;">
                                        </div>

                                        <div class="text-xs-right">
                                            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add New">
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->

        </div>

@endsection
