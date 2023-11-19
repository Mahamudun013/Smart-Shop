@extends('admin.master')

@section('title')
Edit Customer
@endsection

@section('content')

<div class="row">

	<div class="col-lg-12">
		<h3>Edit customer details</h3>    
	<hr>

    <h3 class="text-center text-success">{{ Session::get('message') }}</h3>
	    <div class="well">
     {!! Form::open(['url'=>'/customer/update','method'=>'POST',
     'class'=>'form-horizontal','name'=>'editCustomerForm']) !!}
		
      		<div class="form-group">
              <label for="name" class="col-sm-2 control-label" >Customer Name</label>
                <div class="col-sm-10">
          	      <input type="text" class="form-control" name="name" id="name" 
                  value="{{ $customerById->name}}">
                  <input type="hidden" class="form-control" name="customerId" value="{{ $customerById->id}}" id="email">
                </div>
           </div>

           <div class="form-group">
              <label for="email" class="col-sm-2 control-label" >Email</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" name="email" id="email" value="{{ $customerById->email}}" readonly>
                </div>
           </div>

            <div class="form-group">
              <label for="password" class="col-sm-2 control-label" >Password</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="password" id="password" value="{{ $customerById->password}}">
                </div>
            </div>

          <div class="form-group">
            <label for="address" class="col-sm-2 control-label" >Address</label>
              <div class="col-sm-10">
      	         <textarea class="form-control" name="address" rows="5">
                  {{ $customerById->address}}
                 </textarea>
              </div>
          </div>

           <div class="form-group">
              <label for="phoneNumber" class="col-sm-2 control-label" >Phone</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" name="phoneNumber" id="phoneNumber" value="{{ $customerById->phoneNumber}}">
                </div>
           </div>

            <div class="form-group">
                 <label for="districtName" class="col-sm-2 control-label">District Name</label>
                     <div class="col-sm-10">
                        <select class="form-control" name="districtName">
                            <option>--- Select District Name ---</option>
                            <option value="Dhaka">Dhaka</option>
                            <option value="Faridpur">Faridpur</option>
                            <option value="Gazipur">Gazipur</option>
                            <option value="Rangpur">Rangpur</option>
                            <option value="Lalmonirhat">Lalmonirhat</option>
                            <option value="Dinajpur">Dinajpur</option>
                            <option value="Gaibandha">Gaibandha</option>
                            <option value="Kurigram">Kurigram</option>
                        </select>
                        <span class="text-danger">{{ $errors->has('districtName') ? $errors->first('districtName'):''}}
                  </span>
                </div>
            </div> 
           
            <div class="form-group">
            	<div class="col-sm-offset-2 col-sm-10">
            		<button type="submit" name="btn" class="btn btn-success btn-block">Update Customer Info</button>
            	</div>
            </div>	

        {!! Form::close() !!}

		</div>
	</div>
	
</div>

<script>
    document.forms['editCustomerForm'].elements['districtName'].value='{{$customerById->districtName}}'
</script>

@endsection