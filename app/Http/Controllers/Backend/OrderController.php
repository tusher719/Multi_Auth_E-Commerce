<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $orders = Order::where('status','confirm')->orderBy('id','DESC')->get();
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

    // Pending To Confirm
    public function PendingToConfirm($order_id){
        Order::findOrFail($order_id)->update(['status' => 'Confirm']);

        $notification = array(
            'message' => 'Order Confirm Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('pending-orders')->with($notification);

    } // end method


    // Confirm To Processing
    public function ConfirmToProcessing($order_id){
        Order::findOrFail($order_id)->update(['status' => 'Processing']);

        $notification = array(
            'message' => 'Order Processing Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('confirmed-orders')->with($notification);

    } // end method

    // Processing To Picked
    public function ProcessingToPicked($order_id){
        Order::findOrFail($order_id)->update(['status' => 'Picked']);

        $notification = array(
            'message' => 'Order Picked Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('processing-orders')->with($notification);

    } // end method


    // Picked To Shipped$order
    public function PickedToShipped($order_id){
        Order::findOrFail($order_id)->update(['status' => 'Shipped']);

        $notification = array(
            'message' => 'Order Shipped Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('picked-orders')->with($notification);

    } // end method


    // Shipped To Delivered
    public function ShippedToDelivered($order_id){
        Order::findOrFail($order_id)->update(['status' => 'Delivered']);

        $notification = array(
            'message' => 'Order Delivered Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('shipped-orders')->with($notification);

    } // end method


    // Invoice Download
    public function AdminInvoiceDownload($order_id) {
        $order = Order::with('division','district','state','user')->where('id',$order_id)->first();
        $orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();

        $pdf = Pdf::loadView('backend.orders.order_invoice', compact('order','orderItem'))->setPaper('a4')->setOption([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');
    } // end method





}