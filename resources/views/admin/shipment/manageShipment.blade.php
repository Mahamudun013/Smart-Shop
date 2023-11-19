@extends('admin.master')

@section('title')
Manage Shipment
@endsection

@section('content')

            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Shipments</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
           <div class="row">
                <div class="col-lg-12">
                	<h3 class="text-center text-success">{{ Session::get('message') }}</h3>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            You can manage shipments from here.
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Shipment #</th>
                                        <th>Order #</th>
                                        <th>Tracking Number</th>
                                        <th>Admin Comment</th>
                                        <th>Date Shipped</th>
                                        <th>Date Delivered</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                        @foreach($shipments as $shipment)
                                    <tr class="odd gradeX">
                                        <td>{{$shipment->shipmentId}}</td>
                                        <td>{{$shipment->orderId}}</td>
                                        <td>{{$shipment->trackingNumber}}</td>
                                        <td>{{$shipment->adminComment}}</td>
                                        <td>{{$shipment->dateShipped}}</td>
                                        <td>{{$shipment->dateDelivered}}</td>
                                        <td>
                                            <a href="{{ url('/shipment/edit/'.$shipment->shipmentId)}}" class="btn btn-success" title="Shipment Edit">
                                                <span class="glyphicon glyphicon-edit"></span>
                                            </a>
                                            <a href="{{ url('/shipment/delete/'.$shipment->shipmentId)}}" class="btn btn-danger" onclick="confirm('Are you sure to delete ?')" title="Shipment Delete">
                                                <span class="glyphicon glyphicon-trash"></span>
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