@extends('admin.admin_master')
@section('admin')

    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Slider Edit</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" ><a href="{{ route('manage-slider') }}">Slider</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Slider Edit</li>
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
                            <h3 class="box-title">Edit Slider</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">

                                <form method="post" action="{{ route('slider.update') }}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $sliders->id }}">
                                    <input type="hidden" name="old_image" value="{{ $sliders->slider_img }}">

                                    <div class="form-group">
                                        <h5>Slider Title</h5>
                                        <div class="input-group mb-3">
                                            <input type="text" name="title" class="form-control" placeholder="Enter slider title..." value="{{ $sliders->title }}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Slider Description</h5>
                                        <div class="input-group mb-3">
                                            <input type="text" name="description" class="form-control" placeholder="Enter slider description..." value="{{ $sliders->description }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Preview Image</h5>
                                        <div class="input-group">
                                            <img class="card-img-top" src="{{ asset($sliders->slider_img) }}" style="border-radius: 3px; height: 150px; width: 200px; object-fit: cover;">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Slider Image</h5>
                                        <div class="input-group mb-3">
                                            <input type="file" name="slider_img" class="form-control" id="image">
                                        </div>
                                        @error('slider_img')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <img class="card-img-top" name="old_image" id="showImage" src="{{ (!empty($brand->brand_image)) ? url('uploads/no_image.jpg/') : url('uploads/no_image.jpg') }}" style="border-radius: 3px; height: 150px; width: 200px; object-fit: cover;">
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
