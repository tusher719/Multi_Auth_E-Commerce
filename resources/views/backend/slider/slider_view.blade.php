@extends('admin.admin_master')
@section('admin')

    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">All Slider</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Slider</li>
                                <li class="breadcrumb-item active" aria-current="page">All Slider</li>
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
                            <h3 class="box-title">Slider List <span class="badge badge-pill badge-primary badge-sm">{{ $total_slider }}</span></h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Slider Image</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sliders as $item)
                                        <tr>
                                            <td>{{ $loop->index+1 }}</td>
                                            <td>
                                                <img src="{{ asset($item->slider_img) }}" alt="" style="width: 70px; height: 40px;">
                                            </td>
                                            <td>
                                                @if($item->title == Null)
                                                    <span class="badge badge-pill badge-danger"> No Title Aviable </span>
                                                @else
                                                    {{ $item->title }}
                                                @endif

                                            </td>
                                            <td>{{ $item->description }}</td>
                                            <td>
                                                @if($item->status == 1)
                                                    <span class="badge badge-pill badge-success"> Active </span>
                                                @else
                                                    <span class="badge badge-pill badge-danger"> InActive </span>
                                                @endif
                                            </td>
                                            <td width="22%">
                                                <a href="{{ route('slider.edit', $item->id) }}" class="btn btn-primary btn-sm" title="Edit Data"><i class="fa fa-pencil"></i></a>
                                                <a href="{{ route('slider.delete', $item->id) }}" class="btn btn-danger btn-sm" id="delete" title="Delete Data"><i class="fa fa-trash"></i></a>

                                                @if($item->status == 1)
                                                    <a href="{{ route('slider.inactive',$item->id) }}" class="btn btn-danger btn-sm" title="Inactive Now"><i class="fa fa-arrow-down"></i> </a>
                                                @else
                                                    <a href="{{ route('slider.active',$item->id) }}" class="btn btn-success btn-sm" title="Active Now"><i class="fa fa-arrow-up"></i> </a>
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




                <div class="col-4">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Slider</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">

                                <form method="post" action="{{ route('slider.store') }}" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">
                                        <h5>Slider Title </h5>
                                        <div class="input-group mb-3">
                                            <input type="text" name="title" class="form-control" placeholder="Enter slider title..." >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Slider Description</h5>
                                        <div class="input-group mb-3">
                                            <input type="text" name="description" class="form-control" placeholder="Enter slider description...">
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
