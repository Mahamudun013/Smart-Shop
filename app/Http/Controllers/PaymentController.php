<?php

namespace App\Http\Controllers;

use App\Payment;
use App\Product;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function payment(Request $request){

         // $product=Product::find($request->id); 

          $product=Product::find(2); 
          $paypal_id=1234; 

       // return view('frontEnd.paypal.payment',compact('product','paypal_id'));

        return view('frontEnd.paypal.payment');
    }



   public function paymentInfo(Request $request){    

       if($request->tx){

           if($payment=Payment::where('transaction_id',$request->tx)->first()){
               $payment_id=$payment->id;

           }else{

               $payment=new Payment;
               $payment->item_number=$request->item_number;
               $payment->transaction_id=$request->tx;
               $payment->currency_code=$request->cc;
               $payment->payment_status=$request->st;
               $payment->save();
               $payment_id=$payment->id;
           }

       return 'Pyament has been done and your payment id is : '.$payment_id;

       }else{

           return 'Payment has failed';
       }
   }



}
