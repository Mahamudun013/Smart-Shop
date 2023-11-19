@extends('admin.master')

@section('title')
Edit Shipment
@endsection

@section('content')

<div class="row">

	<div class="col-lg-12">
		<h3>Edit Shipment Details</h3>
	<hr>

    <h3 class="text-center text-success">{{ Session::get('message') }}</h3>
	    <div class="well">
        <h3 class="">Shipment # 0{{$shipmentById->shipmentId}} | Order # 0{{$shipmentById->orderId}}</h3>
        <hr>
        
        {!! Form::open(['url'=>'/shipment/update','method'=>'POST','class'=>'form-horizontal']) !!}
		          
      		<div class="form-group">
              <label for="name" class="col-sm-2 control-label" >Tracking Number</label>
                <div class="col-sm-10">
          	      <input type="text" class="form-control" name="trackingNumber" value="{{$shipmentById->trackingNumber}}" id="name">
                  <input type="hidden" class="form-control" name="shipmentId" value="{{$shipmentById->shipmentId}}">
          	      <span class="text-danger">
                    {{ $errors->has('trackingNumber') ? $errors->first('trackingNumber'):''}}
                  </span>
                </div>
           </div>


           <div class="form-group">
              <label for="adminComment" class="col-sm-2 control-label" >Admin Comment</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="adminComment" value="{{$shipmentById->adminComment}}" id="adminComment">
                  <span class="text-danger">{{ $errors->has('adminComment') ? $errors->first('adminComment'):''}}
                  </span>
                </div>
           </div>

           <div class="form-group">
              <label for="dateShipped" class="col-sm-2 control-label" >Date Shipped </label>
                <div class="col-sm-10">
                  <input type="date" class="form-control" name="dateShipped" 
                  value="{{$shipmentById->dateShipped}}" id="dateShipped">
                  <span class="text-danger">{{ $errors->has('dateShipped') ? $errors->first('dateShipped'):''}}
                  </span>
                </div>
           </div>

           <div class="form-group">
              <label for="dateDelivered" class="col-sm-2 control-label" >Date Delivered</label>
                <div class="col-sm-10">
                  <input type="date" class="form-control" name="dateDelivered" 
                  value="{{$shipmentById->dateDelivered}}" id="dateDelivered">
                  <span class="text-danger">{{ $errors->has('dateDelivered') ? $errors->first('dateDelivered'):''}}
                  </span>
                </div>
           </div>

            <div class="form-group">
            	<div class="col-sm-offset-2 col-sm-10">
            		<button type="submit" name="btn" class="btn btn-success btn-block">Update Shipment Info</button>
            	</div>
            </div>	
         {!! Form::close() !!}

		</div>
	</div>
	
</div>

@endsection