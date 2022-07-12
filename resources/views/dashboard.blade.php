@extends('frontend.main_master')
@section('content')
    <div class="body-content">
        <div class="container">
            <div class="row">

                @include('frontend.common.user_sidebar')

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
