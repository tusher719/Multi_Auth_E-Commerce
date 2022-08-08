@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Edit Admin User</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Admin User Role</li>
                                <li class="breadcrumb-item" aria-current="page">
                                    <a href="{{ route('all.admin.user') }}">All Admin User</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Admin User</li>
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
                    <h4 class="box-title">Edit Admin User </h4>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{ route('admin.user.update') }}" enctype="multipart/form-data" >
                                @csrf

                                <input type="hidden" name="id" value="{{ $adminuser->id }}">
                                <input type="hidden" name="old_image" value="{{ $adminuser->profile_photo_path }}">



                                <div class="row">
                                    <div class="col-12">

                                        <div class="row">
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <h5>Admin User Name  <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="name" class="form-control" value="{{ $adminuser->name }}" > </div>
                                                </div>

                                            </div> <!-- end cold md 6 -->



                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <h5>Admin Email  <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="email" name="email" class="form-control" value="{{ $adminuser->email }}" > </div>
                                                </div>

                                            </div> <!-- end cold md 6 -->

                                        </div>	<!-- end row 	 -->




                                        <div class="row">
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <h5>Admin User Phone  <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="phone" class="form-control" value="{{ $adminuser->phone }}" > </div>
                                                </div>

                                            </div> <!-- end cold md 6 -->





                                        </div>	<!-- end row 	 -->







                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Admin User Image <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="file" name="profile_photo_path" class="form-control" id="image"> </div>
                                                </div>
                                            </div><!-- end cold md 6 -->

                                            <div class="col-md-6">
                                                <img id="showImage" src="{{ (!empty($adminuser->profile_photo_path)) ? asset($adminuser->profile_photo_path) : url('uploads/no_image.jpg') }}" style="width: 100px; height: 100px; object-fit: cover;">

                                            </div><!-- end cold md 6 -->
                                        </div><!-- end row 	 -->



                                        <hr>



                                        <div class="row">

                                            <div class="col-md-4">
                                                <div class="form-group">

                                                    <div class="controls">
                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_2" name="brand" value="1" {{ $adminuser->brand == 1 ? 'checked' : '' }}>
                                                            <label for="checkbox_2">Brand</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_3" name="category" value="1" {{ $adminuser->category == 1 ? 'checked' : '' }}>
                                                            <label for="checkbox_3">Category</label>
                                                        </fieldset>

                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_4" name="product" value="1" {{ $adminuser->product == 1 ? 'checked' : '' }}>
                                                            <label for="checkbox_4">Product</label>
                                                        </fieldset>

                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_5" name="slider" value="1" {{ $adminuser->slider == 1 ? 'checked' : '' }}>
                                                            <label for="checkbox_5">Slider</label>
                                                        </fieldset>

                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_6" name="coupons" value="1" {{ $adminuser->coupons == 1 ? 'checked' : '' }}>
                                                            <label for="checkbox_6">Coupons</label>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="col-md-4">
                                                <div class="form-group">

                                                    <div class="controls">
                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_7" name="shipping" value="1" {{ $adminuser->shipping == 1 ? 'checked' : '' }}>
                                                            <label for="checkbox_7">Shipping</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_8" name="blog" value="1" {{ $adminuser->blog == 1 ? 'checked' : '' }}>
                                                            <label for="checkbox_8">Blog</label>
                                                        </fieldset>

                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_9" name="setting" value="1" {{ $adminuser->setting == 1 ? 'checked' : '' }}>
                                                            <label for="checkbox_9">Setting</label>
                                                        </fieldset>


                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_10" name="return_order" value="1" {{ $adminuser->return_order == 1 ? 'checked' : '' }}>
                                                            <label for="checkbox_10">Return Order</label>
                                                        </fieldset>

                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_11" name="review" value="1" {{ $adminuser->review == 1 ? 'checked' : '' }}>
                                                            <label for="checkbox_11">	Review</label>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </div>




                                            <div class="col-md-4">
                                                <div class="form-group">

                                                    <div class="controls">
                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_12" name="orders" value="1" {{ $adminuser->orders == 1 ? 'checked' : '' }}>
                                                            <label for="checkbox_12">Orders</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_13" name="stock" value="1" {{ $adminuser->stock == 1 ? 'checked' : '' }}>
                                                            <label for="checkbox_13">Stock</label>
                                                        </fieldset>

                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_14" name="reports" value="1" {{ $adminuser->reports == 1 ? 'checked' : '' }}>
                                                            <label for="checkbox_14">Reports</label>
                                                        </fieldset>

                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_15" name="all_user" value="1" {{ $adminuser->all_user == 1 ? 'checked' : '' }}>
                                                            <label for="checkbox_15">All User</label>
                                                        </fieldset>

                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_16" name="admin_user_role" value="1" {{ $adminuser->admin_user_role == 1 ? 'checked' : '' }}>
                                                            <label for="checkbox_16">Admin User Role</label>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>





                                        <div class="text-xs-right">
                                            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Admin User">
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
        $(document).ready(function(){
            $('#image').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showImage').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>


@endsection
