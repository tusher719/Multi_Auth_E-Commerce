@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Content Wrapper. Contains page content -->

    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Ship State</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Shiping Area</li>
                                <li class="breadcrumb-item active" aria-current="page">Ship State</li>
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
                            <h3 class="box-title">State List <span class="badge badge-pill badge-primary badge-sm">{{ $total_state }}</span></h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Division Name </th>
                                        <th>District Name </th>
                                        <th>State Name </th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($state as $item)
                                        <tr>
                                            <td>{{ $loop->index+1 }}</td>
                                            <td> {{ $item->division->division_name }}  </td>
                                            <td> {{ $item->district->district_name }}  </td>
                                            <td> {{ $item->state_name }}  </td>

                                            <td>
                                                <a href="{{ route('state.edit',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i> </a>
                                                <a href="{{ route('state.delete',$item->id) }}" class="btn btn-danger" title="Delete Data" id="delete">
                                                    <i class="fa fa-trash"></i></a>
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
                <!--   ------------ Add State Page -------- -->
                <div class="col-4">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add State </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">


                                <form method="post" action="{{ route('state.store') }}" >
                                @csrf

                                    <!-- Division Select -->
                                    <div class="form-group">
                                        <h5>Division Select <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="division_id" class="form-control"  >
                                                <option value="" selected="" disabled="">Select Division</option>
                                                @foreach($division as $div)
                                                    <option value="{{ $div->id }}">{{ $div->division_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('division_id')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- District Select -->
                                    <div class="form-group">
                                        <h5>District Select <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="district_id" class="form-control">
                                                <option value="" selected="" disabled="">Select Division</option>

                                            </select>
                                            @error('district_id')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- State -->
                                    <div class="form-group">
                                        <h5>State Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text"  name="state_name" class="form-control" placeholder="Enter state name...">
                                            @error('state_name')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
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


    <script type="text/javascript">
        $(document).ready(function () {
            $('select[name="division_id"]').on('change', function () {
                var division_id = $(this).val();
                if (division_id) {
                    $.ajax({
                        url: "{{ url('/shipping/district/ajax') }}/"+division_id,
                        type: "GET",
                        dataType: "json",
                        success:function (data) {
                            var d =$('select[name="district_id"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="district_id"]').append('<option value="'+ value.id +'">' + value.district_name + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>



@endsection