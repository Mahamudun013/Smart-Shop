@extends('admin.master')

@section('title')
Add Customer
@endsection

@section('content')

<div class="row">

	<div class="col-lg-12">
		<h3>Add a new customer</h3>  
	<hr>

    <h3 class="text-center text-success">{{ Session::get('message') }}</h3>
	    <div class="well">
        {!! Form::open(['url'=>'/customer/save','method'=>'POST','class'=>'form-horizontal']) !!}
		
      		<div class="form-group">
              <label for="name" class="col-sm-2 control-label" >Customer Name</label>
                <div class="col-sm-10">
          	      <input type="text" class="form-control" name="name" id="name">
          	      <span class="text-danger">
                    {{ $errors->has('name') ? $errors->first('name'):''}}
                  </span>
                </div>
           </div>

           <div class="form-group">
              <label for="email" class="col-sm-2 control-label" >Email</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" name="email" id="email">
                  <span class="text-danger">{{ $errors->has('email') ? $errors->first('email'):''}}
                  </span>
                </div>
           </div>

           <div class="form-group">
              <label for="password" class="col-sm-2 control-label" >Password</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="password" id="password">
                  <span class="text-danger">{{ $errors->has('password') ? $errors->first('password'):''}}
                  </span>
                </div>
           </div>

          <div class="form-group">
            <label for="address" class="col-sm-2 control-label" >Address</label>
              <div class="col-sm-10">
      	         <textarea class="form-control" name="address" rows="5"></textarea>
      	         <span class="text-danger">
                  {{ $errors->has('address') ? $errors->first('address'):''}}
                </span>
              </div>
          </div>

           <div class="form-group">
              <label for="phoneNumber" class="col-sm-2 control-label" >Phone</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" name="phoneNumber" id="phoneNumber">
                  <span class="text-danger">{{ $errors->has('phoneNumber') ? $errors->first('phoneNumber'):''}}
                  </span>
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
            		<button type="submit" name="btn" class="btn btn-success btn-block">Save Customer Info</button>
            	</div>
            </div>	

		
         {!! Form::close() !!}

		</div>
	</div>
	
</div>

@endsection