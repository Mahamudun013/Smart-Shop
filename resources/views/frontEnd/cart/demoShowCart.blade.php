@extends('frontEnd.master')

@section('title')
Shopping Cart
@endsection

@section('mainContent')

<div class="page-head">
	<div class="container">
		<h3>Check Out</h3>
	</div>
</div>
<!-- //banner -->
<!-- check out -->
<div class="checkout">
	<div class="container">
		<h3>My Shopping Bag</h3>
		<div class="table-responsive checkout-right animated wow slideInUp" data-wow-delay=".5s">
			<table class="timetable_sub">
				<thead>
					<tr>
						<th>Remove</th>
						<th>Product Image</th>
						<th>Product Name</th>
						<th>Quantity</th>
						<th>Price</th>
						<th>Item Total</th>
					</tr>
				</thead>
				<?php $total=0; ?>
				@foreach($cartProducts as $cartProduct)
					<tr class="rem1">
						<td class="invert-closeb">
							<div class="rem">
								<a href="{{ url('/cart/delete/'.$cartProduct->rowId)}}" class="btn btn-danger">
									<span class="glyphicon glyphicon-trash"></span>
								</a>
							</div>
						</td>
						<td class="invert">
						<img src="{{asset($cartProduct->options['productImage'])}}" height="80" width="80">
						</td>
						<td class="invert">
							<b>{{$cartProduct->name}}</b>
						</td>
                        <td class="invert">
							 <div class="quantity">
							 	{!! Form::open(['url'=>'/cart/update','method'=>'POST']) !!}
							 	    <input type="hidden" name="rowId" value="{{$cartProduct->rowId}}">
							 		<div class="input-group">
							 			<input type="number" name="qty" class="form-control" value="{{$cartProduct->qty}}">
							 			<span class="input-group-btn">
							 				<button type="submit" name="btn" class="btn btn-primary">
							 					<span class="glyphicon glyphicon-upload"></span>
							 				</button>
							 			</span>	
							 		</div>
							 	{!! Form::close() !!}
								
							</div>
						</td>
						<td class="invert">TK.{{ $cartProduct->price}}</td>
						<td class="invert">TK.{{ $itemTotal=$cartProduct->price*$cartProduct->qty}}</td>
						<?php  ?>			
					</tr>
					<?php $total=$total+$itemTotal; ?>
					@endforeach
			
			</table>
		</div>

		<div class="checkout-left">
				
				<div class="checkout-right-basket animated wow slideInRight" data-wow-delay=".5s">
					<a href="{{ url('/')}}"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Back To Shopping</a>
                <?php 
                if($cartCount>0)
                {  ?>  
					<?php 
					 $customerId=Session::get('customerId');
					 $shippingId=Session::get('shippingId');

					 if($customerId != null && $shippingId != null){  ?>
					 	 <a href="{{ url('/checkout/payment')}}">  
					      <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
					      Checkout
					     </a>

				<?php } else if($customerId != null){  ?>

					      <a href="{{ url('/checkout/billing')}}">
					      <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
					      Checkout
					      </a>

				<?php } else{ ?>

				    <a href="{{ url('/checkout')}}">  
					   <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
					   Checkout
					</a>
				<?php }
				}
				   ?>

				</div>


				<div class="checkout-left-basket animated wow slideInLeft" data-wow-delay=".5s">
					<h4>Shopping basket</h4>
					<ul>
						<li>Total Amount<i>-</i> <span>TK. {{$total}}</span></li>
						<?php
						Session::put('orderTotal',$total);
						?>
					</ul>
				</div>
				<div class="clearfix"> </div>
				
			</div>
			<hr>
	</div>
</div>
@endsection