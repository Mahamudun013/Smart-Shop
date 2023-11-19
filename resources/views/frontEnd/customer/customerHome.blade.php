@extends('frontEnd.master')

@section('title')
Checkout-confirmation
@endsection

@section('mainContent')

<hr>
<div class="container">
    <div class="row">
        
        <div class="col-lg-12">
            <div class="well lead text-center text-success">
                <h1>Thank you. Your order has been successfully processed!</h1>
                <br><br>
                <?php 
                       $orderId=Session::get('orderId');
                       $orderTotal=Session::get('orderTotal');
                 ?>

              <div style="border:2px solid green; padding:30px; width: 600px; margin: 0px auto;">
            	  <h2>
                  Your Order Id# 0<?php echo $orderId; ?> <br>
                  Order Total: TK.<?php echo $orderTotal; ?>/-
                </h2>
            	</div>
            	 <br><br>
            </div>
       
        </div>        
    </div>
</div>

@endsection