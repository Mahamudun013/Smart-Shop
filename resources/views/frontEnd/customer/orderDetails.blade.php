@extends('frontEnd.master')

@section('title')
Order details info
@endsection

@section('mainContent')

<br><br>

<div class="container">
    
    <div class="row">
         <div class="col-lg-2" >
            <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="{{ url('/customer/home')}}"><i class="fa fa-user fa-fw"></i> Customer Info</a>
                        </li>
                        <li>
                            <a href="{{ url('/customer/orders')}}"><i class="fa fa-shopping-cart"></i> My Orders</a>
                        </li>
                    </ul>
            </div> 
         </div>

                <div class="col-lg-10">
                    
                      <div class="well lead text-center text-info">
                          <h1>Orders details info</h1>
                      </div>
                      <hr>

                      <div class="col-lg-6">
                          <h3><b>Order ID # 0{{$orderDetails[0]->id}}<b></h3>
                          <h4><b>Order Total :</b> TK.{{$orderDetails[0]->orderTotal}}/-</h4>
                          <h4><b>Order Status :</b> {{$orderDetails[0]->orderStatus}}</h4>
                          <h4><b>Order Date :</b> {{$orderDetails[0]->created_at}}</h4>
                      </div>

                      <div class="col-lg-6">
                        @if($shipment != null)
                           <h3><b>Shipment ID # 0{{$shipment->shipmentId}}</b></h3>
                           <h4><b>Tracking Number :</b>{{$shipment->trackingNumber}}</h4>
                           <h4><b>Date Shipped:</b> {{$shipment->dateShipped}}</h4>
                           <h4><b>Date Delivered:</b> {{$shipment->dateDelivered}}</h4>
                        @else
                           <h3><b>Shipment: </b> Not yet shipped</h3>
                        @endif
                          
                      </div>

                
                 <br><br>
            <div class="col-lg-12">
                <br><hr><br>
                  <h3 class="text-center"><b>Products List</b></h3>
                  <br>
                <div class="table-responsive checkout-right animated wow slideInUp" data-wow-delay=".5s">
                  <table class="timetable_sub">
                    <thead>
                      <tr>
                         <th>Product Name</th>
                         <th>Product Image</th>
                         <th>Product Price</th>
                         <th>Purchased Quantity</th>
                         <th>Total Price</th>
                      </tr>
                    </thead>

                      @foreach($orderDetails as $orderDetail)
                        <tr class="rem1">
                          <td class="invert"><h4>{{ $orderDetail->productName}}</h4></td>
                          <td class="invert"><img src="{{asset($orderDetail->productImage)}}" height="80" width="80"></td>
                          <td class="invert"><h4>TK.{{ $orderDetail->productPrice}}</h4></td>
                          <td class="invert"><h4>{{ $orderDetail->productQuantity}}</h4></td>
                          <td class="invert">
                           <h4>
                             TK. {{$orderDetail->productPrice*$orderDetail->productQuantity}}
                           </h4>
                          </td>
                       </tr>
                      @endforeach

                 </table>

              </div>

           </div>

       </div>           

   </div>

 </div>

<br><br><br>
@endsection
