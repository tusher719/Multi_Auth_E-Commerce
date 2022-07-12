@extends('frontend.main_master')
@section('content')
    <div class="body-content">
        <div class="container">
            <div class="row">

                @include('frontend.common.user_sidebar')

                <div class="col-md-2"></div> <!-- End col md 2 -->

                <div class="col-md-6" style="margin-top: 20px; margin-bottom: 20px; border-radius: 3px; background: #ddd;">
                    <div class="card">
                        <h4 class="card-header">
                            <span class="text-primary"><i class="fa fa-edit"></i> Password Change:</span>
                        </h4>

                        <div class="card-body" style="margin-top: 20px;">
                            <form action="{{ route('user.password.update') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail2">Current Password</label>
                                    <input type="password" name="oldpassword" id="current_password" class="form-control" placeholder="Enter your old-password...">
                                </div>

                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail2">New Password</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter your new-password...">
                                </div>

                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail2">Confirm Password</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Enter your confirm-password...">
                                </div>

                                <div class="form-group mt-3">
                                    <button type="submit" class="btn btn-success">Update Password</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div> <!-- End col md 6 -->
            </div> <!-- End row -->
        </div>
    </div>
@endsection
