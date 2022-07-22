@extends('admin.admin_master')
@section('admin')

    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Seo Setting</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Manage Setting</li>
                                <li class="breadcrumb-item active" aria-current="page">Seo Setting</li>
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
                    <h4 class="box-title">Seo Setting Page </h4>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{ route('update.seosetting') }}" >
                                @csrf

                                <input type="hidden" name="id" value="{{ $seo->id }}">
                                <div class="row">
                                    <div class="col-12">

                                        <div class="row">
                                            <div class="col-md-6">

                                                <div class="form-group">
                                                    <h5>Meta Title <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="meta_title" class="form-control" value="{{ $seo->meta_title }}" > </div>
                                                </div>

                                                <div class="form-group">
                                                    <h5>Meta Author <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="meta_author" class="form-control"  value="{{ $seo->meta_author }}"  > </div>
                                                </div>

                                                <div class="form-group">
                                                    <h5>Meta Keyword <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="meta_keyword" class="form-control" value="{{ $seo->meta_keyword }}"   > </div>
                                                </div>

                                                <div class="form-group">
                                                    <h5>Meta Description <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea name="meta_description" id="textarea" class="form-control" required placeholder="Textarea text">
                                                            {{ $seo->meta_description }}
                                                        </textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <h5>Google Analytics <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea name="google_analytics" id="textarea" class="form-control" required placeholder="Textarea text">
                                                            {{ $seo->google_analytics }}
                                                        </textarea>
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
