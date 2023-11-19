@extends('admin.master')

@section('title')
Manage Order
@endsection

@section('content')

            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Orders</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
           <div class="row">
                <div class="col-lg-12">
                	<h3 class="text-center text-success">{{ Session::get('message') }}</h3>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            You can manage orders from here.
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Order #</th>
                                        <th>Order Status</th>
                                        <th>Payment Status</th>
                                        <th>Customer Name</th>
                                        <th>Created On</th>
                                        <th>Order Total</th>
                                        <th>View</th>
                                    </tr>
                                </thead>
                                <tbody>
                        @foreach($orders as $order)
                                    <tr class="odd gradeX">
                                        <td>{{$order->id}}</td>
                                    @if('Processing'==$order->orderStatus)
                                        <td><button class="btn btn-info btn-sm">{{$order->orderStatus}}</button>
                                        </td>
                                    @elseif('Complete'==$order->orderStatus)
                                       <td><button class="btn btn-success btn-sm">{{$order->orderStatus}}</button>
                                       </td>
                                    @else
                                        <td><button class="btn btn-warning btn-sm">{{$order->orderStatus}}</button>
                                        </td>
                                    @endif
                                        <td>{{$order->paymentStatus}}</td>
                                        <td>{{$order->name}}<br>({{$order->email}})</td>
                                        <td>{{$order->created_at}}</td>
                                        <td>TK.{{$order->orderTotal}}</td>
                                        <td>
                                            <a href="{{ url('/order/edit/'.$order->id)}}" class="btn btn-success" title="Order Edit">
                                                <span class="glyphicon glyphicon-eye-open"></span> View
                                            </a>
                                        </td>
                                    </tr>
                        @endforeach
                                                                                                        
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>


@endsection