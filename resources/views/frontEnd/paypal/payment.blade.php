@extends('frontEnd.master')

@section('title')
Paypal Payment
@endsection

@section('mainContent')

<form action="https://www.sandbox.paypal.com/us/signin" method="post" name="frmTransaction" id="frmTransaction">

   <input type="hidden" name="business" value="121">

   <input type="hidden" name="cmd" value="_xclick">

   <input type="hidden" name="item_name" value="Shirt">
    
   <input type="hidden" name="item_number" value="22">

   <input type="hidden" name="amount" value="100">   

   <input type="hidden" name="currency_code" value="USD">   

   <input type="hidden" name="cancel_return" value="http://demo.expertphp.in/payment-cancel">

   <input type="hidden" name="return" value="http://demo.expertphp.in/payment-status">

</form>

<script>document.frmTransaction.submit();</script>

@endsection