@extends('admin.master')

@section('title')
Order Product List
@endsection

@section('content')

            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Order Product List</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
           <div class="row">
                <div class="col-lg-12">
                    <h3 class="text-center text-success">{{ Session::get('message') }}</h3>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover text-center" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Product Name</th>
                                        <th>Product Image</th>
                                        <th>Product Price</th>
                                        <th>Purchased Quantity</th>
                                        <th>Total Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     <?php $i=1; ?>
                                    @foreach($orderProducts as $orderProduct)
                                    <tr class="odd gradeX">
                                        <td> {{$i}} </td>
                                        <td> {{$orderProduct->productName}} </td>
                                        <td> <img src="{{asset($orderProduct->productImage)}}" height="90" width="90"></td> 
                                        <td>TK. {{$orderProduct->productPrice}} </td>
                                        <td> {{$orderProduct->productQuantity}} </td>
                                        <td>
                                        TK. {{$orderProduct->productPrice*$orderProduct->productQuantity}} 
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-success" title="Product Edit">
                                                <span class="glyphicon glyphicon-edit"></span>
                                            </a>
                                            <a href="#" onclick="return confirm('Are you sure to delete?');"  class="btn btn-danger" title="Product Delete">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
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