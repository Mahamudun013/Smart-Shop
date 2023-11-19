@extends('admin.master')

@section('title')
Manage Customer
@endsection

@section('content')

            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Customers</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
           <div class="row">
                <div class="col-lg-12">
                    <h3 class="text-center text-success">{{ Session::get('message') }}</h3>
                    <h3 class="text-center text-success"></h3>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            You can update/delete customers from here.
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Customer Name</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Phone</th>    
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($customers as $customer)
                                    <tr class="odd gradeX">
                                        <td>{{$customer->id}}</td>
                                        <td>{{$customer->name}}</td>
                                        <td>{{$customer->email}}</td>
                                        <td>{!! $customer->address !!}</td>
                                        <td>{{$customer->phoneNumber}}</td> 
                                        <td>
                                            <a href="{{ url('/customer/edit/'.$customer->id)}}" class="btn btn-success" title="Customer Edit">
                                                <span class="glyphicon glyphicon-edit"></span>
                                            </a>
                                            <a href="{{ url('/customer/delete/'.$customer->id)}}" onclick="return confirm('Are you sure to delete?');"  class="btn btn-danger" title="Customer Delete">
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