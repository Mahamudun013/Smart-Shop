@extends('admin.master')

@section('title')
Add Shipment
@endsection

@section('content')

<div class="row">

	<div class="col-lg-12">
		<h3>Add a new Shipment</h3>
	<hr>

    <h3 class="text-center text-success">{{ Session::get('message') }}</h3>
	    <div class="well">
        <h3 class="">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspOrder ID# 0{{$orderId}} </h3>
        <hr>
        <span class="text-danger text-center">
           <h3> {{ $errors->has('orderId') ? 'This Order is already shipped for delivery.Please check!':''}}</h3>
        </span>
        {!! Form::open(['url'=>'/shipment/save/'.$orderId,'method'=>'POST','class'=>'form-horizontal']) !!}
		          
      		<div class="form-group">
              <label for="name" class="col-sm-2 control-label" >Tracking Number</label>
                <div class="col-sm-10">
          	      <input type="text" class="form-control" name="trackingNumber" id="name">
                  <input type="hidden" class="form-control" name="orderId" value="{{$orderId}}">
          	      <span class="text-danger">
                    {{ $errors->has('trackingNumber') ? $errors->first('trackingNumber'):''}}
                  </span>
                </div>
           </div>


           <div class="form-group">
              <label for="adminComment" class="col-sm-2 control-label" >Admin Comment</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="adminComment" id="adminComment">
                  <span class="text-danger">{{ $errors->has('adminComment') ? $errors->first('adminComment'):''}}
                  </span>
                </div>
           </div>

           <div class="form-group">
              <label for="dateShipped" class="col-sm-2 control-label" >Date Shipped </label>
                <div class="col-sm-10">
                  <input type="date" class="form-control" name="dateShipped" id="dateShipped">
                  <span class="text-danger">{{ $errors->has('dateShipped') ? $errors->first('dateShipped'):''}}
                  </span>
                </div>
           </div>

           <div class="form-group">
              <label for="dateDelivered" class="col-sm-2 control-label" >Date Delivered</label>
                <div class="col-sm-10">
                  <input type="date" class="form-control" name="dateDelivered" id="dateDelivered">
                  <span class="text-danger">{{ $errors->has('dateDelivered') ? $errors->first('dateDelivered'):''}}
                  </span>
                </div>
           </div>

            <div class="form-group">
            	<div class="col-sm-offset-2 col-sm-10">
            		<button type="submit" name="btn" class="btn btn-success btn-block">Save Shipment Info</button>
            	</div>
            </div>	
         {!! Form::close() !!}

		</div>
	</div>
	
</div>

@endsection