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
                                <li class="breadcrumb-item active" aria-current="page">SubCategory</li>
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
                            <h3 class="box-title">SubCategory List <span class="badge badge-pill badge-primary badge-sm">{{ $total_subcat }}</span></h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <td>No</td>
                                        <th>Category Id</th>
                                        <th>Category En</th>
                                        <th>Category Ban</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($subcategory as $item)
                                        <tr>
                                            <td>{{ $loop->index+1 }}</td>
                                            <td>{{ $item['category']['category_name_en'] }}</td>
                                            <td>{{ $item->subcategory_name_en }}</td>
                                            <td>{{ $item->subcategory_name_ban }}</td>
                                            <td>
                                                <a href="{{ route('subcategory.edit', $item->id) }}" class="btn btn-primary" title="Edit Data"><i class="fa fa-pencil"></i></a>
                                                <a href="{{ route('subcategory.delete', $item->id) }}" class="btn btn-danger" id="delete" title="Delete Data"><i class="fa fa-trash"></i></a>
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
                            <h3 class="box-title">Add SubCategory</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">

                                <form method="post" action="{{ route('subcategory.store') }}">
                                    @csrf

                                    <div class="form-group">
                                        <h5>Category Select<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="category_id" class="form-control">
                                                <option value="">Select Your Category</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->category_name_en }}</option>
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
                                            <input type="text" name="subcategory_name_en" class="form-control" placeholder="Enter category name english..." >
                                        </div>
                                        @error('subcategory_name_en')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <h5>SubCategory Name Bangla <span class="text-danger">*</span></h5>
                                        <div class="input-group mb-3">
                                            <input type="text" name="subcategory_name_ban" class="form-control" placeholder="Enter category name bangla...">
                                        </div>
                                        @error('subcategory_name_ban')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
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
