<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ReportController extends Controller
{

    public function lowStockProduct(){

    	$lowStockProduct=Product::where('productQuantity','<',1)->get();


    	return view('admin.report.lowStockProduct',['products'=>$lowStockProduct]);
 
    }


    public function bestSellerProduct(){


        return view('admin.report.bestSellerProduct');
    }



}
