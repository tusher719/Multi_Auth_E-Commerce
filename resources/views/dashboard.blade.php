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

                <div class="col-md-6" style="margin-top: 80px; margin-bottom: 20px; background: #ddd; border-radius: 3px;">
                    <div class="card">
                        <h4 class="card-header">
                            <span class="text-primary"><i class="fa fa-user"></i> Basic Information:</span>
                        </h4>
                        <div class="card-body">
                            <table>
                                <tr>
                                    <th style="font-size: 16px; padding: 8px;">Name:</th>
                                    <td><p style="font-size: 14px; margin: 0;">{{ Auth::user()->name }}</p></td>
                                </tr>
                                <tr>
                                    <th style="font-size: 16px; padding: 8px;">Email:</th>
                                    <td><p style="font-size: 14px; margin: 0;">{{ Auth::user()->email }}</p></td>
                                </tr>
                                <tr>
                                    <th style="font-size: 16px; padding: 8px;">Phone:</th>
                                    <td><p style="font-size: 14px; margin: 0;">{{ Auth::user()->phone }}</p></td>
                                </tr>
                                <tr>
                                    <th style="font-size: 16px; padding: 8px;">Gender:</th>
                                    <td><p style="font-size: 14px; margin: 0;">{{ Auth::user()->name }}</p></td>
                                </tr>
                                <tr>
                                    <th style="font-size: 16px; padding: 8px;">Date of Birth:</th>
                                    <td><p style="font-size: 14px; margin: 0;">eg. October 25th, 1990</p></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div> <!-- End col md 6 -->
            </div> <!-- End row -->
        </div>
    </div>
@endsection
