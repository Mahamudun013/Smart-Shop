@extends('frontEnd.master')

@section('title')
Shipping Info
@endsection

@section('mainContent')

<hr>
<div class="container">
    <div class="row">
        <h3 class="text-center text-success">{{ Session::get('message') }}</h3>
        <div class="col-lg-12">
            <div class="well lead text-center text-success">Hello  <b>{{$customerById->name}}</b> ! You have to give us products shipping information to complete your valuable Order.If your billing and shipping info are same then just press Save Shipping Info Button.</div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
          <h3 class="box-title">Shipping Address Info</h3>
          <hr>
            <div class="well box box-primary">
                 {!! Form::open(['url'=>'/checkout/save-shipping','method'=>'POST','name'=>'shippingForm']) !!}
                    <div class="form-group">
                      <label for="fullName">Full Name</label>
                      <input type="text" name="fullName" class="form-control" placeholder="Enter full name"
                      value="{{$customerById->name}}" >
                      <span class="text-danger">
                            {{ $errors->has('fullName') ? $errors->first('fullName'):''}}
                      </span>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" value="{{$customerById->email}}" name="email" class="form-control" placeholder="Enter email" >
                        <span class="text-danger">
                            {{ $errors->has('email') ? $errors->first('email'):''}}
                      </span>
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea name="address" class="form-control" placeholder="Enter address" required>{{$customerById->address}}</textarea>
                        <span class="text-danger">
                            {{ $errors->has('address') ? $errors->first('address'):''}}
                      </span>
                    </div>
                    <div class="form-group">
                        <label for="phoneNumber">Phone Number</label>
                        <input type="text" value="{{$customerById->phoneNumber}}"  name="phoneNumber" class="form-control" placeholder="Enter phone number" >
                    </div>
                    <span class="text-danger">
                            {{ $errors->has('phoneNumber') ? $errors->first('phoneNumber'):''}}
                      </span>

                    <div class="form-group">
                        <label for="districtName">District Name</label>
                        <select class="form-control" name="districtName">
                            <option>--- Select District Name ---</option>
                            <option value="dhaka">Dhaka</option>
                            <option value="faridpur">Faridpur</option>
                            <option value="gazipur">Gazipur</option>
                            <option value="rangpur">Rangpur</option>
                            <option value="lalmonirhat">Lalmonirhat</option>
                            <option value="dinajpur">Dinajpur</option>
                            <option value="gaibandha ">Gaibandha</option>
                            <option value="kurigram ">Kurigram</option>
                        </select>
                        <span class="text-danger">
                            {{ $errors->has('districtName') ? $errors->first('districtName'):''}}
                      </span>
                    </div>

                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-primary btn-block" value="Save Shipping Info">
                    </div>
                    
                 {!! Form::close() !!}
            </div>
        </div>
        
    </div>
</div>

<script>
    document.forms['shippingForm'].elements['districtName'].value='{{$customerById->districtName}}'
</script>

@endsection