@extends('admin.master')

@section('title')
Order Billing Address
@endsection

@section('content')

            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Order Billing Address</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
           <div class="row">
                <div class="col-lg-12">
            
                    <div class="panel panel-default">
        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <tr>
                                        <th>Full Name</th>
                                        <th>{{ $customerById->name }}</th>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <th>{{ $customerById->email }}</th>
                                    </tr>
                                    <tr>
                                        <th>Phone Number</th>
                                        <th>{{ $customerById->phoneNumber }}</th>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <th>{!! $customerById->address !!}</th>
                                    </tr>
                                    <tr>
                                        <th>District Name</th>
                                        <th>{{ $customerById->districtName}}</th>
                                    </tr>
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