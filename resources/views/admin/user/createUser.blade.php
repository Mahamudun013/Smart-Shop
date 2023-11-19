@extends('admin.master')

@section('title')
Add User
@endsection

@section('content')

<div class="row">

	<div class="col-lg-12">
		<h3>Add a new user(Admin)</h3> 
	<hr>

    <h3 class="text-center text-success">{{ Session::get('message') }}</h3>
	    <div class="well">
        {!! Form::open(['url'=>'/user/save','method'=>'POST','class'=>'form-horizontal']) !!}
		
      		<div class="form-group">
              <label for="name" class="col-sm-2 control-label" >User Name</label>
                <div class="col-sm-10">
          	      <input type="text" class="form-control" name="name" id="name">
          	      <span class="text-danger">
                    {{ $errors->has('name') ? $errors->first('name'):''}}
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
            	<div class="col-sm-offset-2 col-sm-10">
            		<button type="submit" name="btn" class="btn btn-success btn-block">Save User Info</button>
            	</div>
            </div>	

		
         {!! Form::close() !!}

		</div>
	</div>
	
</div>

@endsection