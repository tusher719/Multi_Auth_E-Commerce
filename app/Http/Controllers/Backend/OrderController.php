<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Pending Orders
    public function PendingOrders(){
        $total_pending = Order::where('status','Pending')->count();
        $orders = Order::where('status','Pending')->orderBy('id','DESC')->get();
        return view('backend.orders.pending_orders',compact('orders', 'total_pending'));

    } // end mehtod


    // Pending Order Details
    public function PendingOrdersDetails($order_id){
        $order = Order::with('division','district','state','user')->where('id',$order_id)->first();
        $orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
        return view('backend.orders.pending_orders_details',compact('order','orderItem'));

    } // end method

    // Confirmed Orders
    public function ConfirmedOrders(){
        $total_orders_confirm = Order::where('status','Confirm')->count();
        $orders = Order::where('status','confirmed')->orderBy('id','DESC')->get();
        return view('backend.orders.confirmed_orders',compact('orders','total_orders_confirm'));

    } // end mehtod


    // Processing Orders
    public function ProcessingOrders(){
        $total_orders_pro = Order::where('status','Processing')->count();
        $orders = Order::where('status','processing')->orderBy('id','DESC')->get();
        return view('backend.orders.processing_orders',compact('orders','total_orders_pro'));

    } // end mehtod


    // Picked Orders
    public function PickedOrders(){
        $total_orders_picked = Order::where('status','Picked')->count();
        $orders = Order::where('status','picked')->orderBy('id','DESC')->get();
        return view('backend.orders.picked_orders',compact('orders','total_orders_picked'));

    } // end mehtod



    // Shipped Orders
    public function ShippedOrders(){
        $total_orders_shipped = Order::where('status','Shipped')->count();
        $orders = Order::where('status','shipped')->orderBy('id','DESC')->get();
        return view('backend.orders.shipped_orders',compact('orders','total_orders_shipped'));

    } // end mehtod


    // Delivered Orders
    public function DeliveredOrders(){
        $total_orders_Delivered = Order::where('status','Delivered')->count();
        $orders = Order::where('status','delivered')->orderBy('id','DESC')->get();
        return view('backend.orders.delivered_orders',compact('orders','total_orders_Delivered'));

    } // end mehtod


    // Cancel Orders
    public function CancelOrders(){
        $total_orders_cancel = Order::where('status','Cancel')->count();
        $orders = Order::where('status','cancel')->orderBy('id','DESC')->get();
        return view('backend.orders.cancel_orders',compact('orders','total_orders_cancel'));

    } // end mehtod
}
