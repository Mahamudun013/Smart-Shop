@extends('admin.master')

@section('title')
Manage Product
@endsection

@section('content')

            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Products</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
           <div class="row">
                <div class="col-lg-12">
                	<h3 class="text-center text-success">{{ Session::get('message') }}</h3>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            You can update/delete products from here.
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover text-center" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Product Name</th>
                                        <th>Image</th>
                                        <th>Category</th>
                                        <th>Manufacturer</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	@foreach($products as $product)
                                    <tr class="odd gradeX">
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->productName }}</td>
                                        <td> <img src="{{asset($product->productImage)}}" height="80" 
                                            width="80"></td>
                                        <td>{{ $product->categoryName }}</td>
                                        <td>{{ $product->manufacturerName }}</td>
                                        <td>TK. {{ $product->productPrice }}</td>
                                        <td>{{ $product->productQuantity }}</td>
                                        <td>{{ $product->publicationStatus==1 ? 'Published':'Unpublished'}}</td>
                                        <td>
                                            <a href="{{ url('/product/view/'.$product->id)}}" class="btn btn-primary" title="Product View">
                                                <span class="glyphicon glyphicon-eye-open"></span>
                                            </a>
                                        	<a href="{{ url('/product/edit/'.$product->id)}}" class="btn btn-success" title="Product Edit">
                                        		<span class="glyphicon glyphicon-edit"></span>
                                        	</a>
                                        	<a href="{{ url('/product/delete/'.$product->id)}}" onclick="return confirm('Are you sure to delete?');"  class="btn btn-danger" title="Product Delete">
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