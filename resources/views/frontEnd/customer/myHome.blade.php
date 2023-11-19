@extends('frontEnd.master')

@section('title')
My account 
@endsection

@section('mainContent')

<br><br>
<div class="container">
    <div class="row">
        <div class="col-lg-2" >
            <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="{{ url('/customer/home')}}"><i class="fa fa-user fa-fw"></i> Customer Info</a>
                        </li>
                        <li>
                            <a href="{{ url('/customer/orders')}}"><i class="fa fa-shopping-cart"></i> My Orders</a>
                        </li>
                    </ul>
            </div> 
        </div>

        <div class="col-lg-10">
            <div class="well lead text-center text-info">
                <h1> My account - Customer info</h1>
            </div>
          <hr>
          <h3 class="text-center text-success">{{ Session::get('message') }}</h3>
            <div class="well box box-primary">
            {!! Form::open(['url'=>'/customer/info-update','method'=>'POST','name'=>'updateCustomerInfo']) !!}
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" name="name" class="form-control" 
                      value="{{$customerInfo->name}}" required>
                      <input type="hidden" name="customerId" value="{{$customerInfo->id}}">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" value="{{$customerInfo->email}}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" name="password" class="form-control" value="{{$customerInfo->password}}"  required>
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea name="address" class="form-control" required="">{!! $customerInfo->address !!}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="phoneNumber">Phone Number</label>
                        <input type="text" name="phoneNumber" class="form-control" placeholder="Enter phone number" value="{{$customerInfo->phoneNumber}}" required>
                    </div>

                    <div class="form-group">
                        <label for="districtName">District Name</label>
                        <select class="form-control" name="districtName" required="">
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
                    </div>


                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-primary btn-block" value="Save">
                    </div>
                    
            {!! Form::close() !!}
            </div>
        </div>

    </div>
</div>

<script>
    document.forms['updateCustomerInfo'].elements['districtName'].value='{{$customerInfo->districtName}}'
</script>

@endsection