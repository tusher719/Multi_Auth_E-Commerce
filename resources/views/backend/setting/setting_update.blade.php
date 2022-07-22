@extends('admin.admin_master')
@section('admin')

    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Site Setting</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Manage Setting</li>
                                <li class="breadcrumb-item active" aria-current="page">Site Setting</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Site Setting Page </h4>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{ route('update.sitesetting') }}" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="id" value="{{ $setting->id }}">
                                <div class="row">
                                    <div class="col-12">

                                        <div class="row">
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <h5>Site Logo  <span class="text-danger"> </span></h5>
                                                    <div class="controls">
                                                        <input type="file" name="logo" class="form-control" >
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <h5>Phone One <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="phone_one" class="form-control" placeholder="Enter phone one" value="{{ $setting->phone_one }}">
                                                    </div>
                                                </div>



                                                <div class="form-group">
                                                    <h5>Phone Two <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="phone_two" class="form-control" placeholder="Enter phone one" value="{{ $setting->phone_two }}">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <h5>Email <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="email" name="email" class="form-control" placeholder="Enter email address" value="{{ $setting->email }}">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <h5>Company Name <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="company_name" class="form-control" placeholder="Enter company name" value="{{ $setting->company_name }}">
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <h5>Company Address <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="company_address" class="form-control" placeholder="Enter company address" value="{{ $setting->company_address }}">
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <h5>Facebook <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="facebook" class="form-control" placeholder="Enter facebook address" value="{{ $setting->facebook }}">
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <h5>Twitter <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="twitter" class="form-control" placeholder="Enter twitter address" value="{{ $setting->twitter }}">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <h5>Linkedin <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="linkedin" class="form-control" placeholder="Enter linkedin address" value="{{ $setting->linkedin }}">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <h5>Youtube <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="youtube" class="form-control" placeholder="Enter youtube address" value="{{ $setting->youtube }}">
                                                    </div>
                                                </div>

                                            </div> <!-- end cold md 6 -->

                                        </div>	<!-- end row 	 -->

                                        <div class="text-xs-right">
                                            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
                                        </div>
                            </form>

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </section>

    </div>

@endsection
