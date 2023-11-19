<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Order;
use App\OrderDetail;
use App\Payment;
use App\Shipment;
use App\Shipping;
use DB;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function manageOrder(){

    	$orders=DB::table('orders')
    	            ->join('payments','orders.id','=','payments.orderId')
    	            ->join('customers','orders.customerId','=','customers.id')
                    ->orderBy('orders.id','desc')
    	            ->select('orders.*','payments.paymentStatus','payments.paymentType','customers.name','customers.email')
    	            ->get();


        return view('admin.order.manageOrder',['orders'=>$orders]);
    }


    public function editOrder($id){

        $orderId=$id;
        $findOrder=Order::where('id',$orderId)->first();
        $findShipment=Shipment::where('orderId',$orderId)->first();
        $customerId=$findOrder->customerId;
        $shippingId=$findOrder->shippingId;

   
    	$orderById=DB::table('orders')
    	            ->join('payments','orders.id','=','payments.orderId')
    	            ->join('customers','orders.customerId','=','customers.id')
    	            ->where('orders.id',$id)
    	            ->select('orders.*','payments.paymentType','payments.paymentStatus','customers.name','customers.email')
    	            ->get();


    	return view('admin.order.editOrder',['orderById'=>$orderById,'customerId'=>$customerId,
    		'shippingId'=>$shippingId,'findShipment'=>$findShipment]);
    }

    public function updateOrderStatus(Request $request){

    	$orderId=$request->orderId;
    	$order=Order::find($orderId);

    	$order->orderStatus=$request->orderStatus;
    	$order->save();

        return redirect('/order/edit/'.$orderId)->with('message','Order Status Updated Succesfully!');
    }


    public function updatePaymentStatus($id){

    	$payment=Payment::where('orderId',$id)->first();

    	$payment->paymentStatus="Paid";
    	$payment->save();

    	return redirect('/order/edit/'.$id)->with('message','Payment Status Updated Succesfully!');
    }


    public function showBillingAddress($id){

    	$customerById=Customer::find($id);


    	return view('admin.order.showBillingAddress',['customerById'=>$customerById]);
    }


    public function showShippingAddress($id){

    	$shippingById=Shipping::find($id);

        return view('admin.order.showShippingAddress',['shippingById'=>$shippingById]);
    }


    public function showProductList($id){

    	//$orderProducts=OrderDetail::where('orderId',$id)->get();

    	$orderProducts=DB::table('order_details')
    	               ->join('products','order_details.productId','products.id')
    	               ->where('order_details.orderId',$id)
    	               ->select('order_details.*','products.id','products.productImage')
    	               ->get();


         return view('admin.order.showProductList',['orderProducts'=>$orderProducts]);
    }


}
