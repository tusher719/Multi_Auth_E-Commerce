<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartPageController extends Controller
{
    // My Cart View
    public function MyCart() {
        return view('frontend.wishlist.view_mycart');
    }

    // Show Cart Product
    public function GetCartProduct() {
        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartSubTotal = Cart::total();

        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartSubTotal' => round($cartSubTotal),
        ));
    } // End Method

    // Remove Cart Item
    public function RemoveCartProduct($rowId) {
        Cart::remove($rowId);

        if (Session::has('coupon')) {
            Session::forget('coupon');
        }

        return response()->json(['success' => 'Successfully Remove from Cart']);
    } // End Method

    // Cart Increment
    public function CartIncrement($rowId) {
        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty + 1);

        if (Session::has('coupon')) {

            $coupon_name = Session::get('coupon')['coupon_name'];
            $coupon = Coupon::where('coupon_name', $coupon_name)->first();

            Session::put('coupon',[
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round(Cart::total() * $coupon->coupon_discount/100),
                'total_amount' => round(Cart::total() - Cart::total() * $coupon->coupon_discount/100)
            ]);
        }

        return response()->json('increment');
    } // End Method

    // Cart Decrement
    public function CartDecrement($rowId) {
        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty - 1);

        if (Session::has('coupon')) {

            $coupon_name = Session::get('coupon')['coupon_name'];
            $coupon = Coupon::where('coupon_name', $coupon_name)->first();

            Session::put('coupon',[
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round(Cart::total() * $coupon->coupon_discount/100),
                'total_amount' => round(Cart::total() - Cart::total() * $coupon->coupon_discount/100)
            ]);
        }

        return response()->json('decrement');
    } // End Method


}
