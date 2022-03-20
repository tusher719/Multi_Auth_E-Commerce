@extends('frontend.main_master')
@section('content')
    <div class="body-content">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <br>
                    <img class="card-img-top" src="{{ (!empty($user->profile_photo_path)) ? url('uploads/user_images/'.$user->profile_photo_path) : url('uploads/no_image.jpg') }}" style="border-radius: 50%; height: 150px; width: 150px; object-fit: cover;">
                    <br><br>
                    <ul class="list-group list-group-flush">
                        <a href="{{ url('/dashboard') }}" class="btn btn-primary btn-sm btn-block">Home</a>
                        <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
                        <a href="{{ route('change.password') }}" class="btn btn-primary btn-sm btn-block">Change Password</a>
                        <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>
                    </ul>
                </div> <!-- End col md 2 -->

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
