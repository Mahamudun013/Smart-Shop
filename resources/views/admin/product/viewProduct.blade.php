@extends('admin.master')

@section('title')
View Product
@endsection

@section('content')

            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Product Details 
                        &nbsp &nbsp<a href="{{ url('/product/manage')}}" class="btn btn-info">
                         <span class="glyphicon glyphicon-arrow-left"></span> Back
                        </a>
                    </h2>
                    
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
                                        <th>Product ID</th>
                                        <th>{{ $product->id }}</th>
                                    </tr>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>{{ $product->productName }}</th>
                                    </tr>
                                    <tr>
                                        <th>Category Name</th>
                                        <th>{{ $product->categoryName }}</th>
                                    </tr>
                                    <tr>
                                        <th>Manufacturer Name</th>
                                        <th>{{ $product->manufacturerName }}</th>
                                    </tr>
                                    <tr>
                                        <th>ProductcPrice</th>
                                        <th>TK. {{ $product->productPrice }}</th>
                                    </tr>
                                    <tr>
                                        <th>Product Quantity</th>
                                        <th>{{ $product->productQuantity }}</th>
                                    </tr>
                                    <tr>
                                        <th>Product Short Description</th>
                                        <th>{!! $product->productShortDescription !!} </th>
                                    </tr>
                                    <tr>
                                        <th>Product Long Description</th>
                                        <th>{!! $product->productLongDescription !!} </th>
                                    </tr>
                                    <tr>
                                        <th>Product Image</th>
                                        <th> <img src="{{ asset($product->productImage) }}" alt="{{ $product->productName }}" height="200" width="200"> </th>
                                    </tr>
                                    <tr>
                                        <th>Publication Status</th>
                                        <th>{{ $product->publicationStatus==1 ? 'Published':'Unpublished'}}</th>
                                    </tr>
                                    <tr>
                                        <th>Special Offers</th>
                                        <th>{{ $product->specialOffer==1 ? 'Yes':'Not yet set'}}</th>
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