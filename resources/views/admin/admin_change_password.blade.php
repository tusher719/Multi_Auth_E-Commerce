@extends('admin.admin_master')

@section('admin')
    <div class="container-full">

        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title"><i class="fa fa-edit"></i> Admin Password Change</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{ route('update.change.password') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-12">

                                        <div class="row">

                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <h5>Current Password <span class="text-danger">*</span></h5>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="ti-lock"></i></span>
                                                        </div>
                                                        <input type="password" id="current_password" name="oldpassword" class="form-control" placeholder="Old Password...." required="">
                                                    </div>
                                                </div>
                                            </div><!-- End col md 6 -->

                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <h5>New Password <span class="text-danger">*</span></h5>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="ti-lock"></i></span>
                                                        </div>
                                                        <input type="password" id="password" name="password" class="form-control" placeholder="New Password...." required="">
                                                    </div>
                                                </div>
                                            </div><!-- End col md 6 -->

                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <h5>Confirm Password <span class="text-danger">*</span></h5>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="ti-lock"></i></span>
                                                        </div>
                                                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirm Password...." required="">
                                                    </div>
                                                </div>
                                            </div><!-- End col md 6 -->

                                        </div> <!-- End row -->
                                    </div>
                                </div>
                                <div class="text-xs-right">
                                    <button type="submit" class="btn btn-rounded btn-success mb-5">Password Update</button>
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
