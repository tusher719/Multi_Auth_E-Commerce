<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Product;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function index() {
        $sliders = Slider::where('status',1)->orderBy('id','DESC')->limit(3)->get();
        $products = Product::where('status',1)->orderBy('id','DESC')->limit(6)->get();
        $categories = Category::orderBy('category_name_en','ASC')->get();

        $freatured = Product::where('featured',1)->orderBy('id','DESC')->limit(6)->get();
        $hot_deals = Product::where('hot_deals',1)->orderBy('id','DESC')->limit(3)->get();
        $speciel_offer = Product::where('special_offer',1)->orderBy('id','DESC')->limit(6)->get();
        $speciel_deals = Product::where('special_deals',1)->orderBy('id','DESC')->limit(6)->get();


        // Skip Category Wish
        $skip_category_0 = Category::skip(0)->first();
        $skip_product_0 = Product::where('status',1)->where('category_id',$skip_category_0->id)->orderBy('id','DESC')->get();

        $skip_category_1 = Category::skip(1)->first();
        $skip_product_1 = Product::where('status',1)->where('category_id',$skip_category_1->id)->orderBy('id','DESC')->get();

        $skip_category_2 = Category::skip(2)->first();
        $skip_product_2 = Product::where('status',1)->where('category_id',$skip_category_2->id)->orderBy('id','DESC')->get();

        $skip_category_3 = Category::skip(3)->first();
        $skip_product_3 = Product::where('status',1)->where('category_id',$skip_category_3->id)->orderBy('id','DESC')->get();

        $skip_category_4 = Category::skip(4)->first();
        $skip_product_4 = Product::where('status',1)->where('category_id',$skip_category_4->id)->orderBy('id','DESC')->get();


        // Skip Brand Wish
        $skip_brand_0 = Brand::skip(0)->first();
        $skip_brand_product_0 = Product::where('status',1)->where('brand_id',$skip_brand_0->id)->orderBy('id','DESC')->get();

        $skip_brand_1 = Brand::skip(1)->first();
        $skip_brand_product_1 = Product::where('status',1)->where('brand_id',$skip_brand_1->id)->orderBy('id','DESC')->get();

        $skip_brand_2 = Brand::skip(2)->first();
        $skip_brand_product_2 = Product::where('status',1)->where('brand_id',$skip_brand_2->id)->orderBy('id','DESC')->get();

        $skip_brand_3 = Brand::skip(3)->first();
        $skip_brand_product_3 = Product::where('status',1)->where('brand_id',$skip_brand_3->id)->orderBy('id','DESC')->get();

        $skip_brand_4 = Brand::skip(4)->first();
        $skip_brand_product_4 = Product::where('status',1)->where('brand_id',$skip_brand_4->id)->orderBy('id','DESC')->get();

        $skip_brand_5 = Brand::skip(5)->first();
        $skip_brand_product_5 = Product::where('status',1)->where('brand_id',$skip_brand_5->id)->orderBy('id','DESC')->get();

        $skip_brand_6 = Brand::skip(6)->first();
        $skip_brand_product_6 = Product::where('status',1)->where('brand_id',$skip_brand_6->id)->orderBy('id','DESC')->get();

        return view('frontend.index', [
            'sliders' => $sliders,
            'products' => $products,
            'categories' => $categories,
            'freatured' => $freatured,
            'hot_deals' => $hot_deals,
            'speciel_offer' => $speciel_offer,
            'speciel_deals' => $speciel_deals,
            'skip_category_0' => $skip_category_0,
            'skip_product_0' => $skip_product_0,
            'skip_category_1' => $skip_category_1,
            'skip_product_1' => $skip_product_1,
            'skip_category_2' => $skip_category_2,
            'skip_product_2' => $skip_product_2,
            'skip_category_3' => $skip_category_3,
            'skip_product_3' => $skip_product_3,
            'skip_category_4' => $skip_category_4,
            'skip_product_4' => $skip_product_4,
            'skip_brand_0' => $skip_brand_0,
            'skip_brand_product_0' => $skip_brand_product_0,
            'skip_brand_1' => $skip_brand_1,
            'skip_brand_product_1' => $skip_brand_product_1,
            'skip_brand_2' => $skip_brand_2,
            'skip_brand_product_2' => $skip_brand_product_2,
            'skip_brand_3' => $skip_brand_3,
            'skip_brand_product_3' => $skip_brand_product_3,
            'skip_brand_4' => $skip_brand_4,
            'skip_brand_product_4' => $skip_brand_product_4,
            'skip_brand_5' => $skip_brand_5,
            'skip_brand_product_5' => $skip_brand_product_5,
            'skip_brand_6' => $skip_brand_6,
            'skip_brand_product_6' => $skip_brand_product_6,
            ]);
    }

    // Logout
    public function UserLogout(){
        Auth::logout();
        return redirect()->route('login');
    }

    // Edit Profile
    public function UserProfile(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.user_profile', compact('user'));
    }

    // Profile Update
    public function UserProfileStore(Request $request){
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        if ($request->file('profile_photo_path')){
            $file = $request->file('profile_photo_path');
            @unlink(public_path('uploads/user_images/'.$data->profile_photo_path));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('uploads/user_images'),$filename);
            $data['profile_photo_path'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'User Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('dashboard')->with($notification);

    }



    // Password Page View
    public function UserChangePassword(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.change_password', compact('user'));
    }

    // Password Change
    public function UserPasswordUpdate(Request $request){
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword, $hashedPassword)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('user.logout');
        } else{
            return redirect()->back();
        }
    } // End Method


    public function ProductDetails($id, $slug){
        $product = Product::findOrFail($id);
        $multiImg = MultiImg::where('product_id', $id)->get();
        return view('frontend.product.product_details', compact('product','multiImg'));
    }
}
