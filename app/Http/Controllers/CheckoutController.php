<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Order;
use App\OrderDetail;
use App\Payment;
use App\Product;
use App\Shipping;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    
    public function index(){

    	return view('frontEnd.checkout.checkoutContent');
    }


    public function customerRegistration(Request $request){

    	$this->validate($request,[
         'name'=>'required',
         'email'=>'required|string|email|max:255|unique:customers',
         'password'=>'required', 
    	]);

    	$customer=new Customer();
    	$customer->name=$request->name;
    	$customer->email=$request->email;
    	$customer->password=$request->password;
    	$customer->save();

    	$customerId=$customer->id;
    	Session::put('customerId',$customerId);


    	return redirect('/checkout/billing');
    }


    public function customerLogin(Request $request){

        $customerEmail=$request->email;
        $customerPassword=$request->password;
        $authCustomer=Customer::where('email',$customerEmail)
                                ->where('password',$customerPassword)->first();

        if($authCustomer){
            
            Session::put('customerId',$authCustomer->id);
    
            return redirect('/checkout/billing');
        }
        else{

            return redirect('/checkout')->with('loginError','Sorry ! Wrong email/password.');
        }

    }


    public function showBillingForm(){

        $customerId=Session::get('customerId');
        $customerById=Customer::where('id',$customerId)->first();

       return view('frontEnd.checkout.billingContent',['customerById'=>$customerById]);
    }


    public function saveBillingInfo(Request $request){

       // $customerId=Session::get('customerId');

        $customerId=$request->billingCustomerId;
        $billing=Customer::find($customerId);

        $this->validate($request,[
         'address'=>'required',
         'phoneNumber'=>'required',
         'districtName'=>'required',
        ]);

        $billing->address=$request->address;
        $billing->phoneNumber=$request->phoneNumber;
        $billing->districtName=$request->districtName;
        $billing->save();

        return redirect('/checkout/shipping');
        
    }


    public function showShippingForm(){

    	$customerId=Session::get('customerId');
    	//$customerById=Customer::find($customerId);
        $customerById=Customer::where('id',$customerId)->first();


    	return view('frontEnd.checkout.shippingContent',['customerById'=>$customerById]);
    }


    public function saveShippingInfo(Request $request){

        $this->validate($request,[
         'fullName'=>'required',
         'email'=>'required|string|email|max:255',
         'address'=>'required',
         'phoneNumber'=>'required',
         'districtName'=>'required',
        ]);

    	$shipping=new Shipping();
    	$shipping->fullName=$request->fullName;
    	$shipping->email=$request->email;
    	$shipping->address=$request->address;
    	$shipping->phoneNumber=$request->phoneNumber;
    	$shipping->districtName=$request->districtName;
    	$shipping->save();

    	$shippingId=$shipping->id;
    	Session::put('shippingId',$shippingId);

    	return redirect('/checkout/payment');
    }



    public function showPaymentForm(){

    	return view('frontEnd.checkout.paymentContent');
    }



    public function saveOrderInfo(Request $request){

    	$paymentType=$request->paymentType;

    	if($paymentType=='cashOnDelivery'){

    		$order= new Order();
    		$order->customerId=Session::get('customerId');
    		$order->shippingId= Session::get('shippingId');
    		$order->orderTotal= Session::get('orderTotal');
    		$order->save();

    		$orderId=$order->id;
    		Session::put('orderId',$orderId);

    		$payment= new Payment();
    		$payment->orderId= Session::get('orderId');
    		$payment->paymentType= $paymentType;
    		$payment->save();

    		
    		$cartProducts=Cart::content();

    		foreach ($cartProducts as $cartProduct) {
                
                $orderDetail= new OrderDetail(); 
	    		$orderDetail->orderId= Session::get('orderId');
	    		$orderDetail->productId=$cartProduct->id;
	    		$orderDetail->productName=$cartProduct->name;
	    		$orderDetail->productPrice=$cartProduct->price;
	    		$orderDetail->productQuantity=$cartProduct->qty;
	    		$orderDetail->save();

            //reduce product quantity from store
                $reduceQty=Product::find($cartProduct->id);
                $value=$reduceQty->productQuantity;
                $reduceQty->productQuantity=($value-($cartProduct->qty));
                $reduceQty->save();

                // remove from cart
                Cart::remove($cartProduct->rowId);
    		}

    		
    		return redirect('/checkout/confirmation');

    	}

    	elseif ($paymentType=='bkash') {
    	   
    	   return "Under Construction Bkash Payment. Please, use Cash on Delivery";
    	}

    	elseif ($paymentType=='paypal') {
    		
    		return redirect('/payment');
    	}

    }


    public function customerHome(){

    	return view('frontEnd.customer.customerHome');
    }

    
}
