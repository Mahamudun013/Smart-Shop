@extends('frontEnd.master')

@section('title')
Billing Info
@endsection

@section('mainContent')

<hr>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="well lead text-center text-success">Hello <b>{{$customerById->name}}</b>! You have to give us products billing information to complete your valuable Order.If your previous info is correct then just press Save Billing Info Button.</div>
        </div>      
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
          <h3 class="box-title">Billing Info</h3>
          <hr>
            <div class="well box box-primary">
                {!!Form::open(['url'=>'/checkout/save-billing','method'=>'POST','name'=>'billingForm'])!!}
                 
                    <div class="form-group">
                       <label for="address">Address</label><span class="text-danger"> *</span>
                       <textarea name="address" class="form-control" placeholder="Enter address">{{$customerById->address}}</textarea>
                       <input type="hidden" name="billingCustomerId" value="{{$customerById->id}}">
                        <span class="text-danger">
                            {{ $errors->has('address') ? $errors->first('address'):''}}
                      </span>
                    </div>

                    <div class="form-group">
                        <label for="phoneNumber">Phone Number</label><span class="text-danger"> *</span>
                        <input type="text" value="{{$customerById->phoneNumber}}"  name="phoneNumber" class="form-control" placeholder="Enter phone number" >
                        <span class="text-danger">
                            {{ $errors->has('phoneNumber') ? $errors->first('phoneNumber'):''}}
                        </span>
                    </div>
                      
                    <div class="form-group">
                        <label for="districtName">District Name</label><span class="text-danger"> *</span>
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
                        <span class="text-danger">
                            {{ $errors->has('districtName') ? $errors->first('districtName'):''}}
                        </span>
                    </div>

                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-primary btn-block" value="Save Billing Info">
                    </div>
                    
                {!! Form::close() !!}
            </div>
        </div>
        
    </div>
</div>

<script>
    document.forms['billingForm'].elements['districtName'].value='{{$customerById->districtName}}'
</script>

@endsection