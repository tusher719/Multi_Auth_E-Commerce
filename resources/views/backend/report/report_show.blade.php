@extends('admin.admin_master')
@section('admin')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Search Data</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">All Reports</li>
                            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('all-reports') }}">All Reports</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Date, Month, Year Data</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-full bg-brick-white">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">

            <div class="row">

                <!--   ------------ Add Search Page -------- -->
                <div class="col-md-3">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Search By Date </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">

                            <form method="post" action="{{ route('search-by-date') }}">
                                @csrf

                                <div class="form-group">
                                    <h5>Select Date <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="date" name="date" class="form-control">
                                        @error('date')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="text-xs-right text-right">
                                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Search">
                                </div>
                            </form>

                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>

                <div class="col-md-6">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Search By Month </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">

                            <form method="post" action="{{ route('search-by-month') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <h5>Select Month  <span class="text-danger">*</span></h5>
                                            <div class="controls">

                                                <select name="month" class="form-control">
                                                    <option label="Choose One"></option>
                                                    <option value="January">January</option>
                                                    <option value="February">February</option>
                                                    <option value="March">March</option>
                                                    <option value="April">April</option>
                                                    <option value="May">May</option>
                                                    <option value="Jun">Jun</option>
                                                    <option value="July">July</option>
                                                    <option value="August">August</option>
                                                    <option value="September">September</option>
                                                    <option value="October">October</option>
                                                    <option value="November">November</option>
                                                    <option value="December">December</option>
                                                </select>

                                                @error('month')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <h5>Select Year  <span class="text-danger">*</span></h5>
                                            <div class="controls">

                                                <select name="year_name" class="form-control">
                                                    <option label="Choose One"></option>
                                                    <option value="2020">2020</option>
                                                    <option value="2021">2021</option>
                                                    <option value="2022">2022</option>
                                                    <option value="2023">2023</option>
                                                    <option value="2024">2024</option>
                                                    <option value="2025">2025</option>
                                                    <option value="2026">2026</option>
                                                </select>

                                                @error('year_name')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-xs-right text-right">
                                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Search">
                                </div>
                            </form>

                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>

                <div class="col-md-3">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Select Year </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">

                            <form method="post" action="{{ route('search-by-year') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <h5>Select Year  <span class="text-danger">*</span></h5>
                                    <div class="controls">

                                        <select name="year" class="form-control">
                                            <option label="Choose One"></option>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                            <option value="2026">2026</option>
                                        </select>

                                        @error('year')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="text-xs-right text-right">
                                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Search">
                                </div>
                            </form>

                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!--   ------------End  Add Search Page -------- -->
            </div>
            <!-- /.row -->

            <div class="row">

                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Order List <span class="badge badge-pill badge-danger badge-sm">{{ count($orders) }}</span></h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Date </th>
                                        <th>Invoice </th>
                                        <th>Amount </th>
                                        <th>Payment </th>
                                        <th>Status </th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders as $item)
                                        <tr>
                                            <td>{{ $loop->index+1 }}</td>
                                            <td> {{ $item->order_date }}  </td>
                                            <td> #{{ $item->invoice_no }}  </td>
                                            <td> ${{ number_format($item->amount,2) }}  </td>
                                            <td> {{ $item->payment_method }}  </td>
                                            <td> <span class="badge badge-pill badge-primary">{{ $item->status }} </span>  </td>
                                            <td>
                                                <a href="{{ route('pending.order.details',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-eye"></i> </a>
                                                <a target="_blank" href="{{ route('invoice.download',$item->id) }}" class="btn btn-danger" title="Invoice Download">
                                                    <i class="fa fa-download"></i>
                                                </a>
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
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>

@endsection
