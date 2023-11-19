@extends('admin.master')

@section('title')
Edit Order Details
@endsection

@section('content')

            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Edit Order Details
                        &nbsp &nbsp<a href="{{ url('/order/manage')}}" class="btn btn-info">
                         <span class="glyphicon glyphicon-arrow-left"></span> Back
                        </a>
                    </h2>
                </div>

                <!-- /.col-lg-12 -->
            </div>
            <a href="{{url('/order/billing-address/'.$customerId)}}" class="btn btn-info">Billing address</a> &nbsp &nbsp
            <a href="{{url('/order/shipping-address/'.$shippingId)}}" class="btn btn-info">Shipping address</a> &nbsp &nbsp
            <a href="{{url('/order/product/list/'.$orderById[0]->id)}}" class="btn btn-info">Products</a>
           <div class="row">
                <div class="col-lg-12">
                    <h3 class="text-center text-success">{{ Session::get('message') }}</h3>
                    <div class="panel panel-default">
        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <tr>
                                        <th>Order ID</th>
                                        <th>{{ $orderById[0]->id }}</th>
                                    </tr>
                                    <tr>
                                        <th>Order Status</th>
                                        <th>
                            {!! Form::open(['url'=>'/order/status-update','class'=>'form-horizontal','name'=>'updateOrderStatus']) !!}
                                <div class="form-group">
                                  <div class="col-sm-6">
                                    <select class="form-control" name="orderStatus" required>
                                        <option value="Pending">Pending</option>
                                        <option value="Processing">Processing</option>
                                        <option value="Complete">Complete</option>
                                    </select>
                                </div>
                                </div>
                                <input type="hidden" name="orderId" value="{{$orderById[0]->id}}">
                                <div class="form-group">
                                    <div class="col-sm-3">
                                    <input type="submit" name="Save" class="btn btn-primary btn-sm" value="Save">
                                   </div>
                                </div>
                                    
                            {!! Form::close() !!}
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>Customer Name</th>
                                        <th>{{ $orderById[0]->name }}</th>
                                    </tr>
                                    <tr>
                                        <th>Customer Email</th>
                                        <th>{{ $orderById[0]->email }}</th>
                                    </tr>
                                    <tr>
                                        <th>Order Total</th>
                                        <th>TK. {{ $orderById[0]->orderTotal }}</th>
                                    </tr>
                                    <tr>
                                        <th>Payment Method</th>
                                        @if('cashOnDelivery'==$orderById[0]->paymentType)
                                        <th>Cash On Delivery</th>
                                        @elseif('bkash'==$orderById[0]->paymentType)
                                        <th>Bkash</th>
                                        @elseif('paypal'==$orderById[0]->paymentType)
                                        <th>Paypal</th>
                                        @endif
                                    </tr>
                                    <tr>
                                        <th>Payment Status</th>
                                        <th>{{ $orderById[0]->paymentStatus }} <br><br>
                                        @if('Pending'==$orderById[0]->paymentStatus)
                                          <a href="{{url('/update/payment-status/'.$orderById[0]->id)}}" class="btn btn-primary btn-sm" role="button">Mark as paid</a>
                                        @else
                                          <a href="{{url('#')}}" class="btn btn-primary btn-sm" role="button">Refund(Offline)</a>
                                        @endif

                                        </th>
                                    </tr>
                                    <tr>
                                        <th>Created On</th>
                                        <th>{{ $orderById[0]->created_at}} </th>
                                    </tr>  
                                 
                            </table>
                            <!-- /.table-responsive -->
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    @if($findShipment != null)
                       <a href="{{url('/shipment/edit/'.$findShipment->shipmentId)}}" class="btn btn-success" role="button"> Already shipped </a>
                       <br><br>
                    @else
                       <a href="{{url('/shipment/add/'.$orderById[0]->id)}}" class="btn btn-primary" role="button"><span class="glyphicon glyphicon-plus"></span>
                       Add shipment</a>
                       <br><br>
                    @endif
                </div>
                <!-- /.col-lg-12 -->
            </div>

<script>
    document.forms['updateOrderStatus'].elements['orderStatus'].value='{{$orderById[0]->orderStatus}}'
</script>

@endsection