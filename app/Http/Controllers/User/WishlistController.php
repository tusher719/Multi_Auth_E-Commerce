<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    // Add To Wishlist Method
    public function AddToWishlist(Request $request, $product_id) {
        if (Auth::check()) {
            $exists = Wishlist::where('user_id', Auth::id())->where('product_id', $product_id)->first();

            if (!$exists) {
                Wishlist::insert([
                    'user_id' => Auth::id(),
                    'product_id' => $product_id,
                    'created_at' => Carbon::now(),
                ]);

                return response()->json(['success' => 'Successfully Add On Your WishList']);

            } else {

                return response()->json(['error' => 'This Product has Already on Your Wishlist']);
            }

        } else {

            return response()->json(['error' => 'At First Login Your Account']);
        }
    } // end method

    // View WishList Page
    public function ViewWishlist(){
        return view('frontend.wishlist.view_wishlist');
    }

    // WishList Read Product With Ajax
    public function GetWishlistProduct(){
        $wishlist = Wishlist::with('product')->where('user_id',Auth::id())->latest()->get();

        return response()->json($wishlist);
    } // end mehtod



}
