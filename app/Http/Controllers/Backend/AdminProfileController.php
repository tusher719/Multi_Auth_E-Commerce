<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class AdminProfileController extends Controller
{

    // Admin Profile Data
    public function AdminProfile(){
        $id = Auth::user()->id;
        $adminData = Admin::find($id);
        return view('admin.admin_profile_view', compact('adminData'));
    }

    // Edit Profile
    public function AdminProfileEdit(){
        $id = Auth::user()->id;
        $editData = Admin::find($id);
        return view('admin.admin_profile_edit', compact('editData'));
    }

    // Profile Update
    public function AdminProfileStore(Request $request){
        $id = Auth::user()->id;
        $data = Admin::find($id);
        $data->name = $request->name;
        $data->email = $request->email;

//        $old_image = $request->old_image;

        if ($request->file('profile_photo_path')){
//            unlink($old_image);
            $image = $request->file('profile_photo_path');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(225,225)->save('uploads/admin_images/'.$name_gen);
            $save_url = 'uploads/admin_images/'.$name_gen;

            Admin::findOrFail($id)->update([
                'profile_photo_path' => $save_url,
            ]);
        }
        $data->save();

        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.profile')->with($notification);
    } // End method


    // View Change Password Page
    public function AdminChangePassword(){
        return view('admin.admin_change_password');
    }

    // Password Change
    public function AdminUpdateChangePassword(Request $request){
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword, $hashedPassword)) {
            $admin = Admin::find(Auth::id());
            $admin->password = Hash::make($request->password);
            $admin->save();
            Auth::logout();
            return redirect()->route('admin.logout');
        } else{
            return redirect()->back();
        }

    } // End Method


    // All Register User
    public function AllUsers(){
        $users = User::latest()->get();
        return view('backend.users.all_user',compact('users'));
    }






}
