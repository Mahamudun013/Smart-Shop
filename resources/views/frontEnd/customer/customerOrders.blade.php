@extends('frontEnd.master')

@section('title')
My orders
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
                <h1> My account - Orders info</h1>
            </div>
          <hr>
        @if(count($customerOrdersById)>0)
             @foreach($customerOrdersById as $customerOrder)
                <a href="{{url('/customer/order-details/'.$customerOrder->id)}}" class="orderDetails">
                   <div class="well box box-primary">
                   
                        <h2><b>Order ID # 0{{$customerOrder->id}}</b></h2><hr>
                        <h3><b>Order Total :</b> TK.{{$customerOrder->orderTotal}}/-</h3>
                        <h3><b>Order Status :</b> {{$customerOrder->orderStatus}}</h3>
                        <h3><b>Order date :</b> {{$customerOrder->created_at}}</h3> 
                   </div>
                </a>
               @endforeach

        @else
            <div class="well box box-primary text-center">

                   <h2>No order history found !</h2>
                   <br><br><br><br><br><br><br>
            </div>

        @endif


        </div>

        <div class="pagination-grid text-right">

              {{ $customerOrdersById->links() }}
        </div>

        <br><br>

    </div>
</div>

@endsection

@section('cssstyle')

.orderDetails { 
  
 background-color: lightblue;

}

.orderDetails a:visited {
  text-decoration: none;
}
.orderDetails a:active {
  text-decoration: none;
}
.orderDetails a:hover {
  text-decoration: none;
}
.orderDetails a:link {
  text-decoration: none;
}

@endsection