@extends('admin.master')

@section('title')
Best Seller
@endsection

@section('content')

            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Best Seller</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
           <div class="row">
                <div class="col-lg-12">
                	<h3 class="text-center text-success">{{ Session::get('message') }}</h3>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            You can update info from here.
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover text-center" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th> Product Name </th>
                                        <th>Total quantity</th>
                                        <th>Total amount</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	
                                    <tr class="odd gradeX">
                                        <td> 1 </td>
                                        <td>Product Name </td>
                                        <td>Total quantity</td>
                                        <td>Total amount</td>
                                        <td>
                                        	<a href="{{ url('#')}}" class="btn btn-success" title="Product Edit">
                                        		<span class="glyphicon glyphicon-edit"></span> Edit
                                        	</a>
                                        </td>
                                    </tr>
                                                                                                                                           
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