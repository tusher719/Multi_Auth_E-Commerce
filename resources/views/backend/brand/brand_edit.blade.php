@extends('admin.admin_master')
@section('admin')

    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Brand Edit</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" ><a href="{{ route('all.brand') }}">Brand</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Brand Edit</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-8 m-auto">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit Brand</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">

                                <form method="post" action="{{ route('brand.update',$brand->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $brand->id }}">
                                    <input type="hidden" name="old_image" value="{{ $brand->brand_image }}">

                                    <div class="form-group">
                                        <h5>Brand Name English</h5>
                                        <div class="input-group mb-3">
                                            <input type="text" name="brand_name_en" class="form-control" placeholder="Enter brand name english..." value="{{ $brand->brand_name_en }}">
                                        </div>
                                        @error('brand_name_en')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <h5>Brand Name Bangla</h5>
                                        <div class="input-group mb-3">
                                            <input type="text" name="brand_name_ban" class="form-control" placeholder="Enter brand name bangla..." value="{{ $brand->brand_name_ban }}">
                                        </div>
                                        @error('brand_name_ban')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <h5>Preview Image</h5>
                                        <div class="input-group mb-3">
                                            <img class="card-img-top" src="{{ asset($brand->brand_image) }}" style="border-radius: 5px; height: 150px; width: 180px; object-fit: cover;">
                                        </div>
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
                                        <img class="card-img-top" id="showImage" src="{{ (!empty($brand->brand_image)) ? url('uploads/no_image.jpg/') : url('uploads/no_image.jpg') }}" style="border-radius: 3px; height: 150px; width: 180px; object-fit: cover;">
                                    </div>

                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
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
