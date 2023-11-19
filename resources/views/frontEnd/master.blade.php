<!DOCTYPE html>
<html>
<head>
<title> @yield('title')</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Smart Shop Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="{{ asset('public/frontEnd/css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="{{ asset('public/frontEnd/css/flexslider.css')}}" type="text/css" media="screen" />
<!-- pignose css -->
<link href="{{ asset('public/frontEnd/css/pignose.layerslider.css') }}" rel="stylesheet" type="text/css" media="all" />

<link rel="stylesheet" type="text/css" href="{{ asset('public/frontEnd/css/jquery-ui.css') }}">

<!-- //pignose css -->
<link href="{{ asset('public/frontEnd/css/style.css') }}" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script type="text/javascript" src="{{ asset('public/frontEnd/js/jquery-2.1.4.min.js') }}"></script>
<!-- //js -->
<script src="{{ asset('public/frontEnd/js/imagezoom.js')}}"></script>
<script src="{{ asset('public/frontEnd/js/jquery.flexslider.js')}}"></script>
<!-- cart -->
	<script src="{{ asset('public/frontEnd/js/simpleCart.min.js') }}"></script>
<!-- cart -->
<!-- for bootstrap working -->
	<script type="text/javascript" src="{{ asset('public/frontEnd/js/bootstrap-3.1.1.min.js') }}"></script>
<!-- //for bootstrap working -->
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<script src="{{ asset('public/frontEnd/js/jquery.easing.min.js') }}"></script>

<!-- tinymce CDN link -->
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>

<style>
   @yield('cssstyle')
</style>

</head>
<body>
<!-- header -->
@include('frontEnd.includes.header')
<!-- banner -->
@include('frontEnd.includes.menu')
<!-- //banner-top -->
<!-- banner -->
@yield('mainContent')
<!-- //product-nav -->

@include('frontEnd.includes.coupon')
<!-- footer -->
@include('frontEnd.includes.footer')
<!-- //footer -->
<!-- login -->
			<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
						</div>
						<div class="modal-body modal-spa">
							<div class="login-grids">
								<div class="login">
									<div class="login-bottom">
										<h3>Sign up here...</h3>
								{!! Form::open(['url'=>'/customer/sign-up','method'=>'POST']) !!}
											<div class="sign-up">
												<h4>Name :</h4>
												<input type="text" name="name" placeholder="Enter your name" required>
												<span class="text-danger">
                                                 {{ $errors->has('name') ? $errors->first('name'):''}}
                                                </span>
											</div>
			
											<div class="sign-up">
												<h4>Email :</h4>
												<input type="text" name="email" placeholder="Enter your email" required>
												<span class="text-danger">
                                                 {{ $errors->has('email') ? $errors->first('email'):''}}
                                                </span>
											</div>
											<div class="sign-up">
												<h4>Password :</h4>
												<input type="password" name="password" placeholder="Enter your password" required>
												<span class="text-danger">
                                                 {{ $errors->has('password') ? $errors->first('password'):''}}
                                                </span>
											</div>
											
											<div class="sign-up">
												<input type="submit" value="REGISTER NOW" >
											</div>
											<hr>	
								{!! Form::close() !!}

								<div class="form-group">
				                            	<h3>Social Account Sign-up</h3>
				                              <div class="col-md-6 ">
				                                 <a href="{{ url('/auth/facebook') }}" class="btn btn-facebook-lg"><i class="fa fa-facebook-square"></i> Facebook</a>
				                  
				                                 <a href="{{ url('/auth/google') }}" class="btn btn-google"><i class="fa fa-google-plus-square"></i> Google</a>

				                                 <a href="{{ url('/auth/github') }}" class="btn btn-github"><i class="fa fa-github-square"></i> Github</a>
				                    
				                                  <a href="{{ url('/auth/twitter') }}" class="btn btn-twitter"><i class="fa fa-twitter-square"></i> Twitter</a>
				                              </div>
				                         </div>
									</div>

									<div class="login-right">
										<h3>Sign in with your account</h3>
										@if(session()->has('loginError'))
										<h4 class=" alert alert-danger text-center">
										{{ Session::get('loginError') }}
									    </h4>
									    @endif
									{!! Form::open(['url'=>'/customer/sign-in','method'=>'POST']) !!}
											<div class="sign-in">
												<h4>Email :</h4>
												<input type="text" name="email" placeholder="Enter your email" required>
											</div>

											<div class="sign-in">
												<h4>Password :</h4>
												<input type="password" name="password" placeholder="Enter your password" required>
							
												<a href="#">Forgot password?</a>
											</div>
											
											<div class="single-bottom">
												<input type="checkbox"  id="brand" value="">
												<label for="brand"><span></span>Remember Me.</label>
											</div>
											<div class="sign-in">
												<input type="submit" value="SIGNIN" >
											</div>
									{!! Form::close() !!}
										<hr>
                   
										 <div class="form-group">
				                            	<h3>Social Account Sign-in</h3>
				                              <div class="col-md-6 ">
				                                 <a href="{{ url('/auth/facebook') }}" class="btn btn-facebook-lg"><i class="fa fa-facebook-square"></i> Facebook</a>
				                  
				                                 <a href="{{ url('/auth/google') }}" class="btn btn-google"><i class="fa fa-google-plus-square"></i> Google</a>

				                                 <a href="{{ url('/auth/github') }}" class="btn btn-github"><i class="fa fa-github-square"></i> Github</a>
				                    
				                                  <a href="{{ url('/auth/twitter') }}" class="btn btn-twitter"><i class="fa fa-twitter-square"></i> Twitter</a>
				                              </div>
				                         </div>
									</div>
										
									<div class="clearfix"></div>
								</div>
								<p>By logging in you agree to our <a href="#">Terms and Conditions</a> and <a href="#">Privacy Policy</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
<!-- //login -->
</body>
</html>
