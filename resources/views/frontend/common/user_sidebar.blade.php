@php
    $id = Auth::user()->id;
    $user = \App\Models\User::find($id);
@endphp
<div class="col-md-2">
    <br>
    <img class="card-img-top" src="{{ (!empty($user->profile_photo_path)) ? url('uploads/user_images/'.$user->profile_photo_path) : url('uploads/no_image.jpg') }}" style="border-radius: 50%; height: 150px; width: 150px; object-fit: cover;">
    <br><br>
    <ul class="list-group list-group-flush">
        <a href="{{ url('/dashboard') }}" class="btn btn-primary btn-sm btn-block">Home</a>
        <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
        <a href="{{ route('change.password') }}" class="btn btn-primary btn-sm btn-block">Change Password</a>
        <a href="{{ route('my.orders') }}" class="btn btn-primary btn-sm btn-block">Orders</a>
        <a href="{{ route('return.order.list') }}" class="btn btn-primary btn-sm btn-block">Return Orders</a>
        <a href="{{ route('cancel.orders') }}" class="btn btn-primary btn-sm btn-block">Cancel Orders</a>
        <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>
    </ul>
</div> <!-- End col md 2 -->
