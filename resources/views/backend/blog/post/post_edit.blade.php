@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Add Blog Post</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" >Manage Blog</li>
                                <li class="breadcrumb-item" ><a href="{{ route('list.post') }}">List Blog Post</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Blog Post</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Add Blog Post </h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">

                            <form method="post" action="{{ route('blog.post.update',$blogpost->id) }}" enctype="multipart/form-data" >
                                @csrf
                                <input type="hidden" name="id" value="{{ $blogpost->id }}">

                                <div class="row">
                                    <div class="col-12">

                                        <div class="row"> <!-- start 2nd row  -->

                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <h5>Post Title En <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="post_title_en" class="form-control" placeholder="Post title english" value="{{ $blogpost->post_title_en }}">
                                                        @error('post_title_en')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div> <!-- end col md 6 -->

                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <h5>Post Title Ban <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="post_title_ban" class="form-control" placeholder="Post title bangla" value="{{ $blogpost->post_title_ban }}">
                                                        @error('post_title_ban')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div> <!-- end col md 6 -->

                                        </div> <!-- end 2nd row  -->

                                        <div class="row"> <!-- start 6th row  -->
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <h5>BlogCategory Select <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="category_id" class="form-control">
                                                            <option value="" selected="" disabled="">Select BlogCategory</option>
                                                            @foreach($blogcategory as $category)
                                                                <option value="{{ $category->id }}" {{ $category->id == $blogpost->category_id ? 'selected': '' }} >{{ $category->blog_category_name_en }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('category_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div> <!-- end col md 6 -->

                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <h5>Post Main Image  <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="hidden" name="old_image" class="form-control" value="{{ $blogpost->post_image }}">
                                                        <img src="{{ asset($blogpost->post_image) }}" alt="" width="40%">
                                                    </div>
                                                </div>


                                            </div> <!-- end col md 6 -->

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Post Main Image  <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="file" name="post_image" class="form-control" onChange="mainThamUrl(this)" >
                                                        @error('post_image')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <img src="" id="mainThmb" style="width: 30%; margin-top: 5px">
                                                    </div>
                                                </div>
                                            </div>

                                        </div> <!-- end 6th row  -->

                                        <div class="row"> <!-- start 8th row  -->
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <h5>Post Details English <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea id="editor1" name="post_details_en" rows="10" cols="80">
                                                            {{ $blogpost->post_details_en }}
                                                        </textarea>
                                                    </div>
                                                </div>

                                            </div> <!-- end col md 6 -->

                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <h5>Post Details Bangla <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea id="editor2" name="post_details_ban" rows="10" cols="80">
                                                            {{ $blogpost->post_details_ban }}
                                                        </textarea>
                                                    </div>
                                                </div>


                                            </div> <!-- end col md 6 -->

                                        </div> <!-- end 8th row  -->

                                        <hr>

                                        <div class="text-xs-right">
                                            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Post">
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>



    <script type="text/javascript">
        function mainThamUrl(input){
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#mainThmb').attr('src',e.target.result).style.objectFit = "cover";
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

@endsection
