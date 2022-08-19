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

            <form method="post" action="{{ route('update.sitesetting') }}" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="id" value="{{ $setting->id }}">
                <input type="hidden" name="old_image" value="{{ $setting->logo }}">

            <!-- Basic Forms -->
            <div class="row">
                <div class="col-md-12 mb-5">
                    <p class="date-time">Last Upadate: <span class="badge badge-danger">{{ Carbon\Carbon::parse($setting->updated_at)->format('l, d-M-Y - h:i A')  }}</span></p>
                </div>
                <div class="col-md-4">
                    <div class="box">
                        <div class="box-header">
                            <h4 class="box-title">Company Logo</h4>
                        </div>

                        <div class="box-body">
                            <div class="form-group">
                                <div class="logo b-dashed" style="height: 80px; width: 260px; margin-bottom: 20px;" >
                                    <img class="rounded" id="showImage" src="{{ (!empty($setting->logo)) ? asset($setting->logo) : url('uploads/no_image.jpg') }}" alt="" style="width: 100%; height: 100%; ">
                                </div>
                                <label>Select File</label>
                                <label class="file">
                                    <input type="file" name="logo" id="image">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="box">
                        <div class="box-header">
                            <h4 class="box-title">Social Link</h4>
                        </div>

                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Facebook</label>
                                        <input type="text" class="form-control" name="facebook" placeholder="facebook address" value="{{ $setting->facebook }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Twitter</label>
                                        <input type="text" class="form-control" name="twitter" placeholder="twitter address" value="{{ $setting->twitter }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Linkedin</label>
                                        <input type="text" class="form-control" name="linkedin" placeholder="linkedin address" value="{{ $setting->linkedin }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Youtube</label>
                                        <input type="text" class="form-control" name="youtube" placeholder="youtube address" value="{{ $setting->youtube }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Company Info </h4>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Company Name </h5>
                                        <div class="controls">
                                            <input type="text" name="company_name" class="form-control" placeholder="Enter company name" value="{{ $setting->company_name }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Email </h5>
                                        <div class="controls">
                                            <input type="email" name="email" class="form-control" placeholder="Enter email address" value="{{ $setting->email }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Phone One </h5>
                                        <div class="controls">
                                            <input type="text" name="phone_one" class="form-control" placeholder="Enter phone one" value="{{ $setting->phone_one }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Phone Two </h5>
                                        <div class="controls">
                                            <input type="text" name="phone_two" class="form-control" placeholder="Enter phone one" value="{{ $setting->phone_two }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Company Address </h5>
                                        <div class="controls">
                                            <input type="text" name="company_address" class="form-control" placeholder="Enter company address" value="{{ $setting->company_address }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12 text-center m-t-10">
                                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update" style="width: 250px">
                                </div>
                            </div>





                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

            </form>
        </section>

    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#image').change(function (e) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#showImage').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>

@endsection
