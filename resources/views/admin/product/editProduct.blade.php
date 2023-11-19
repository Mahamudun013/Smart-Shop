@extends('admin.master')

@section('title')
Edit Product
@endsection

@section('content')

<div class="row">

	<div class="col-lg-12">
		<h3>Edit product details</h3>  
	<hr>

    <h3 class="text-center text-success">{{ Session::get('message') }}</h3>
	    <div class="well">
      {!! Form::open(['url'=>'/product/update','method'=>'POST','class'=>'form-horizontal','enctype'=>'multipart/form-data','name'=>'editProductForm']) !!}
		
		<div class="form-group">
          <label for="email" class="col-sm-2 control-label" >Product Name</label>
            <div class="col-sm-10">
    	      <input type="text" class="form-control" name="productName" id="email" value="{{$product->productName}}">

            <input type="hidden" class="form-control" name="productId" value="{{ $product->id}}" id="email">
    	      
            </div>
        </div>

        <div class="form-group">
          <label for="email" class="col-sm-2 control-label" >Category Name</label>
            <div class="col-sm-10">
              <select class="form-control" name="categoryId">
                <option>Select Category Name</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->categoryName }}</option>
                @endforeach
              </select>
            </div>
        </div>

        <div class="form-group">
          <label for="email" class="col-sm-2 control-label" >Manufacturer Name</label>
            <div class="col-sm-10">
              <select class="form-control" name="manufacturerId">
                <option>Select Manufacturer Name</option>
                @foreach($manufacturers as $manufacturer)
                <option value="{{ $manufacturer->id }}">{{ $manufacturer->manufacturerName }}</option>
                @endforeach
              </select>
            </div>
        </div>

        <div class="form-group">
          <label for="email" class="col-sm-2 control-label" >Product Price</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" name="productPrice" id="email" 
              value="{{$product->productPrice}}">
              
            </div>
        </div>

        <div class="form-group">
          <label for="email" class="col-sm-2 control-label" >Product Quantity</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" name="productQuantity" id="email" value="{{$product->productQuantity}}">
              
            </div>
        </div>

        <div class="form-group">
          <label for="email2" class="col-sm-2 control-label" >Product Short Description</label>
            <div class="col-sm-10">
    	      <textarea class="form-control" name="productShortDescription" rows="5">{{$product->productShortDescription}}</textarea>
    	      
            </div>
        </div>

        <div class="form-group">
          <label for="email2" class="col-sm-2 control-label" >Product Long Description</label>
            <div class="col-sm-10">
              <textarea class="form-control" name="productLongDescription" rows="8">{{$product->productLongDescription}}</textarea>
              
            </div>
        </div>

        <div class="form-group">
          <label for="email" class="col-sm-2 control-label" >Product Image</label>
            <div class="col-sm-10">
              <input type="file"  name="productImage" accept="image/*">
              <img src="{{asset($product->productImage)}}" height="200" width="200">
              

            </div>
        </div>

        <div class="form-group">
          <label for="email" class="col-sm-2 control-label" >Publication Status</label>
            <div class="col-sm-10">
    	      <select class="form-control" name="publicationStatus">
    	      	<option>Select Publication Status</option>
    	      	<option value="1">Published</option>
    	      	<option value="0">Unpublished</option>
    	      </select>
            </div>
        </div>

        <div class="form-group">
          <label for="email" class="col-sm-2 control-label" >Special Offers</label>
            <div class="col-sm-10">
            <select class="form-control" name="specialOffer">
              <option>Select Offers Status</option>
              <option value="1">Set To Special Offer</option>
              <option value="0">Not yet set</option>
            </select>
            </div>
        </div>

        <div class="form-group">
        	<div class="col-sm-offset-2 col-sm-10">
        		<button type="submit" name="btn" class="btn btn-success btn-block">Update Product Info</button>
        	</div>
        </div>	

		
    {!! Form::close() !!}

		</div>
	</div>
	
</div>

<script>
    document.forms['editProductForm'].elements['categoryId'].value={{ $product->categoryId }}
</script>

<script>
    document.forms['editProductForm'].elements['manufacturerId'].value={{ $product->manufacturerId }}
</script>

<script>
    document.forms['editProductForm'].elements['publicationStatus'].value={{ $product->publicationStatus }}
</script>

<script>
    document.forms['editProductForm'].elements['specialOffer'].value={{ $product->specialOffer }}
</script>

@endsection