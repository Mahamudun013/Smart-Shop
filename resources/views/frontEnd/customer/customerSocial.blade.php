@extends('frontEnd.master')

@section('title')
Social-home
@endsection

@section('mainContent')

<hr>
<div class="container">
    <div class="row">
        
        <div class="col-lg-12">
            <div class="well lead text-center text-success">
                <h1> Thanks for Register....</h1>
                <br><br>
                <?php 
                       $customerId=Session::get('customerId');
                       $customerName=Session::get('customerName');
                 ?>
            	 <h2>
                   Your customer ID#<?php echo $customerId; ?> <br>
                   Your customer Name#<?php echo $customerName; ?> 
                
                </h2>
            	   
            	 <br><br>
            </div>
       
        </div>

        
    </div>
</div>

@endsection