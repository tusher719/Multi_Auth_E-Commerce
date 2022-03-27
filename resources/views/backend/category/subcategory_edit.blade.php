@extends('admin.admin_master')
@section('admin')

    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">SubCategory</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page"><a href="{{ route('all.category') }}">Category</a></li>
                                <li class="breadcrumb-item" aria-current="page"><a href="{{ route('all.subcategory') }}">SubCategory</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit SubCategory</li>
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
                            <h3 class="box-title">Edit SubCategory</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">

                                <form method="post" action="{{ route('subcategory.update') }}">
                                    @csrf

                                    <input type="hidden" name="id" value="{{ $subcat->id }}">

                                    <div class="form-group">
                                        <h5>Category Select<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="category_id" class="form-control">
                                                <option value="">Select Your Category</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}" {{ $category->id == $subcat->category_id ? 'selected': '' }}>{{ $category->category_name_en }}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <div class="help-block"></div></div>
                                    </div>

                                    <div class="form-group">
                                        <h5>SubCategory Name English<span class="text-danger">*</span></h5>
                                        <div class="input-group mb-3">
                                            <input type="text" name="subcategory_name_en" class="form-control" placeholder="Enter category name english..." value="{{ $subcat->subcategory_name_en }}">
                                        </div>
                                        @error('subcategory_name_en')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <h5>SubCategory Name Bangla <span class="text-danger">*</span></h5>
                                        <div class="input-group mb-3">
                                            <input type="text" name="subcategory_name_ban" class="form-control" placeholder="Enter category name bangla..." value="{{ $subcat->subcategory_name_ban }}">
                                        </div>
                                        @error('subcategory_name_ban')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
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
