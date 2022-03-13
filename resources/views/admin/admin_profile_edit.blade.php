@extends('admin.admin_master')

@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <div class="container-full">

        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title"><i class="fa fa-edit"></i> Admin Profile Edit</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{ route('admin.profile.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Admin User Name <span class="text-danger">*</span></h5>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="ti-user"></i></span>
                                                        </div>
                                                        <input type="text" name="name" class="form-control" placeholder="Enter Name...." required="" value="{{ $editData->name }}">
                                                    </div>
                                                </div>
                                            </div><!-- End col md 6 -->

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Admin Email <span class="text-danger">*</span></h5>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="ti-email"></i></span>
                                                        </div>
                                                        <input type="email" name="email" class="form-control" placeholder="Enter Email...." required="" value="{{ $editData->email }}">
                                                    </div>
                                                </div>
                                            </div><!-- End col md 6 -->

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>File Input Field <span class="text-danger">*</span></h5>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="ti-image"></i></span>
                                                        </div>
                                                        <input type="file" name="profile_photo_path" class="form-control" required="" id="image">
                                                    </div>
                                                </div>
                                            </div> <!-- End col md 6 -->

                                            <div class="col-md-6">
                                                <img class="rounded" id="showImage" src="{{ (!empty($editData->profile_photo_path)) ? url('uploads/admin_images/'.$editData->profile_photo_path) : url('uploads/no_image.jpg') }}" alt="" style="width: 120px; height: 120px; object-fit: cover">
                                            </div> <!-- End col md 6 -->


                                        </div> <!-- End row -->
                                    </div>
                                </div>
                                <div class="text-xs-right">
                                    <button type="submit" class="btn btn-rounded btn-success mb-5">Update</button>
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
