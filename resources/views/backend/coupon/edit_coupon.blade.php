@extends('admin.admin_master')
@section('admin')

    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">All Coupon</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">Coupon</li>
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
                            <h3 class="box-title">Add Coupon</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">

                                <form method="post" action="{{ route('coupon.upate',$coupons->id) }}">
                                    @csrf

                                    <div class="form-group">
                                        <h5>Coupon Name<span class="text-danger">*</span></h5>
                                        <div class="input-group mb-3">
                                            <input type="text" name="coupon_name" value="{{ $coupons->coupon_name }}" class="form-control" placeholder="Enter coupon name..." >
                                        </div>
                                        @error('coupon_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <h5>Coupon Discount(%)<span class="text-danger">*</span></h5>
                                        <div class="input-group mb-3">
                                            <input type="text" name="coupon_discount" value="{{ $coupons->coupon_discount }}" class="form-control" placeholder="Enter coupon Discount...">
                                        </div>
                                        @error('coupon_discount')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <h5>Coupon Validity Date<span class="text-danger">*</span></h5>
                                        <div class="input-group mb-3">
                                            <input type="date" name="coupon_validity" value="{{ $coupons->coupon_validity }}" class="form-control" min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                                        </div>
                                        @error('coupon_validity')
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
