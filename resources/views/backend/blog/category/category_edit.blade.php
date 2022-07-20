@extends('admin.admin_master')
@section('admin')


    <!-- Content Wrapper. Contains page content -->

    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Edit Blog Category</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Manage Blog</li>
                                <li class="breadcrumb-item" aria-current="page"><a href="{{ route('blog.category') }}">Blog Category</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Blog Category</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>


        <!-- Main content -->
        <section class="content">
            <div class="row">


                <!--   ------------ Add Blog Category Page -------- -->
                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit Blog Category </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">

                                <form method="post" action="{{ route('blogcategory.update') }}" >
                                    @csrf

                                    <input type="hidden" name="id" value="{{ $blogcategory->id }}">

                                    <div class="form-group">
                                        <h5>Blog Category English  <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text"  name="blog_category_name_en" class="form-control" value="{{ $blogcategory->blog_category_name_en }}" >
                                            @error('blog_category_name_en')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Blog Category Bangla <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="blog_category_name_ban" class="form-control" value="{{ $blogcategory->blog_category_name_ban }}"  >
                                            @error('blog_category_name_ban')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
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
