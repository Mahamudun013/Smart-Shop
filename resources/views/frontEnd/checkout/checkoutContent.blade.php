@extends('frontEnd.master')

@section('title')
Checkout
@endsection

@section('mainContent')

<hr>
<div class="container">
    <div class="row">
        <h3 class="text-center text-success">{{ Session::get('message') }}</h3>
        <div class="col-lg-12">
            <div class="well lead text-center text-success">You have to Login first for Place an Order.If you are not registered. Register here...</div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-6">
          <h3 class="box-title">Customer Registration</h3>
          <hr>
            <div class="well box box-primary">
                 {!! Form::open(['url'=>'/checkout/sign-up','method'=>'POST']) !!}
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
                    </div>

                    <div class="form-group">
                     <input type="submit" name="submit" class="btn btn-primary btn-block" value="Register">
                    </div>
                    
                 {!! Form::close() !!}
            </div>
        </div>

        <div class="col-lg-6">
          <h3 class="box-title">Customer Login</h3>
          <hr>
          @if(session()->has('loginError'))
          <h3 class="alert alert-danger">{{ Session::get('loginError') }}</h3>
          @endif
            <div class="well box box-primary">
                {!! Form::open(['url'=>'/checkout/sign-in','method'=>'POST']) !!}

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
                        <a href="#">Forgot password?</a>
                    </div>

                    <div class="form-group">
                        <input type="checkbox" id="brand" value="">
                            <label for="brand"><span></span>Remember Me.</label>
                    </div>

                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-primary btn-block" value="Login">
                    </div>
                    
                 {!! Form::close() !!}
            </div>
        </div>

        
    </div>
</div>


@endsection