<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    public function addToCart(Request $request){

    	$productId=$request->productId;


    	$productById=Product::where('id',$productId)->first();
    	
    	Cart::add([
    		'id'=>$productId,
    		'name'=>$productById->productName,
            'options' =>['productImage' =>$productById->productImage],
    		'price'=>$productById->productPrice,
    		'qty'=>$request->qty,
            //['productImage'=>$productById->productImage]
    	]);


         return redirect('cart/show');

    }


    public function updateToCart(Request $request){

        $rowId=$request->rowId;
        $qty= $request->qty;

        Cart::update($rowId,$qty);


        return redirect('cart/show');

    }



    public function showCart(){
    	
    	$cartProducts=Cart::content();
        $cartCount=Cart::content()->count();


    	//return view('frontEnd.cart.showCart',['cartProducts'=>$cartProducts]);

       return view('frontEnd.cart.demoShowCart',['cartProducts'=>$cartProducts,'cartCount'=>$cartCount]);

    }


    public function deleteCartProduct($id){

    	Cart::remove($id);

    	return redirect('/cart/show');


    }

    public function emptyCartProduct(){

        Cart::destroy();

        return redirect('/cart/show');
    }
}
