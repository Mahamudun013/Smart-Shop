<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use App\Category;

class WelcomeController extends Controller
{
    public function index()
    {
        $publishedProducts=Product::where('publicationStatus',1)->get();

        $offerPublishedProducts=Product::where('publicationStatus',1)
                                        ->where('specialOffer',1)
                                        ->get();


    	return view('frontEnd.home.homeContent',['publishedProducts'=>$publishedProducts,'offerPublishedProducts'=>$offerPublishedProducts]);

    }

    public function contactForm(){

        return view('frontEnd.home.contactForm');

    }


    public function category($id)
    {
        $publishedCategoryProducts=Product::where('categoryId',$id)
                                            ->where('publicationStatus',1)
                                            ->get();
        $CategoryInfo=Category::where('id',$id)->first();

    	return view('frontEnd.category.categoryContent',['publishedCategoryProducts'=>$publishedCategoryProducts,'CategoryInfo'=>$CategoryInfo]);
    }

    public function productDetails($id)
    {
        $productById=Product::where('id',$id)->first();

    	return view('frontEnd.product.productContent',['productById'=>$productById]);
    }

    public function demoShowCart(){

        $cartProducts=Product::take(3)->get();

        return view('frontEnd.cart.demoShowCart',['cartProducts'=>$cartProducts]);
    }





}
