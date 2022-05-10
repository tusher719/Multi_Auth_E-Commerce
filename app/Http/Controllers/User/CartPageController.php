<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

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
        return response()->json(['success' => 'Successfully Remove from Cart']);
    } // End Method

    // Cart Increment
    public function CartIncrement($rowId) {
        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty + 1);
        return response()->json('increment');
    } // End Method

    // Cart Decrement
    public function CartDecrement($rowId) {
        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty - 1);
        return response()->json('decrement');
    } // End Method


}
