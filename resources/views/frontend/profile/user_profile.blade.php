@extends('frontend.main_master')
@section('content')
    <div class="body-content">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <br>
                    <img class="card-img-top" id="showImage" src="{{ (!empty($user->profile_photo_path)) ? url('uploads/user_images/'.$user->profile_photo_path) : url('uploads/no_image.jpg') }}" style="border-radius: 50%; height: 150px; width: 150px; object-fit: cover;">
                    <br><br>
                    <ul class="list-group list-group-flush">
                        <a href="{{ url('/dashboard') }}" class="btn btn-primary btn-sm btn-block">Home</a>
                        <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
                        <a href="{{ route('change.password') }}" class="btn btn-primary btn-sm btn-block">Change Password</a>
                        <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>
                    </ul>
                </div> <!-- End col md 2 -->

                <div class="col-md-2"></div> <!-- End col md 2 -->

                <div class="col-md-6" style="margin-top: 20px; margin-bottom: 20px; background: #ddd;">
                    <div class="card">
                        <h4 class="card-header">
                            <span class="text-primary"><i class="fa fa-edit"></i> Profile Edit:</span>
                        </h4>

                        <div class="card-body" style="margin-top: 20px;">
                            <form action="{{ route('user.profile.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail2">Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter your name..." value="{{ $user->name }}">
                                </div>

                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail2">Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Enter your email..." value="{{ $user->email }}">
                                </div>

                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail2">Phone</label>
                                    <input type="text" name="phone" class="form-control" placeholder="Enter your phone..." value="{{ $user->phone }}">
                                </div>

                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail2">User Image</label>
                                    <input type="file" name="profile_photo_path" class="form-control" id="image">
                                </div>

                                <div class="form-group mt-3">
                                    <button type="submit" class="btn btn-success">Update Profile</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div> <!-- End col md 6 -->
            </div> <!-- End row -->
        </div>
    </div>
@endsection
