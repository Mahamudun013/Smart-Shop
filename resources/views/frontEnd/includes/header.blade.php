<!-- header -->
<div class="header">
	<div class="container">
		<ul>
			<li><span class="glyphicon glyphicon-time" aria-hidden="true"></span>Free and Fast Delivery</li>
			<li><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>Free shipping On all orders</li>
			<li><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span><a href="mailto:info@smartshop.com">info@smartshop.com</a></li>
		</ul>
	</div>
</div>
<!-- //header -->
<!-- header-bot -->
<div class="header-bot">
	<div class="container">
		<div class="col-md-3 header-left"> 
			<h1><a href="{{ url('/')}}"><img src="{{ asset('public/frontEnd/images/logo3.jpg') }}"></a></h1>
		</div>
		<div class="col-md-6 header-middle">
			<form>
				<div class="search">
					<input type="search" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}" required="">
				</div>
				<div class="section_room">
					<select id="country" onchange="change_country(this.value)" class="frm-field required">
						<option value="null">All categories</option>
						
						@foreach($publishedCategories as $publishedCategory)
						<option value="{{$publishedCategory->id}}">
							{{$publishedCategory->categoryName}}
						</option>
						@endforeach
						
					</select>
				</div>
				<div class="sear-sub">
					<input type="submit" value=" ">
				</div>
				<div class="clearfix"></div>
			</form>
		</div>
		<div class="col-md-3 header-right footer-bottom">
			<ul>
				<?php
				$loginId=Session::get('customerId');
				if($loginId != null){ ?>

				 <li>
					<a href="{{ url('/customer/home')}}" class="use1" title="My account" data-toggle="modal" ><span> My account </span></a>
				 </li>
				
		  <?php }
				else{
				?>  
				<li>
					<a href="#" class="use1" title="Login" data-toggle="modal" data-target="#myModal4"><span>Login</span></a>	
				 </li>

		<?php   } ?>
				
				<li><a class="fb" title="Facebook" href="https://facebook.com/smart.shop" target="_blank"></a></li>
				<li><a class="twi" title="Twitter" href="https://twitter.com/" target="_blank"></a></li>
				<li><a class="insta" title="Instagram" href="https://www.instagram.com/smart.shop" target="_blank"></a></li>
		 <?php
				//$loginId=Session::get('customerId');
				if($loginId != null){ ?>
				<li><a href="{{url('/customer/log-out')}}" class="use1" title="Logout">
					<span>Logout</span>
		            </a>
		        </li>
		    <?php } ?>
			</ul>
		</div>

		<div class="clearfix"></div>
	</div>
</div>
<!-- //header-bot -->