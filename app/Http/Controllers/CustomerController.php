<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Order;
use App\Shipment;
use App\SocialCustomer;
use Auth;
use DB;
use Illuminate\Http\Request;
use Session;
use Socialite;

class CustomerController extends Controller
{
    
    // ***Admin panel Customer functionality***


	public function createCustomer(){

		 return view('admin.customer.createCustomer');
	}



	public function storeCustomer(Request $request){

		$this->validate($request,[
         'name'=>'required',
         'email'=>'required|string|email|max:255|unique:customers',
         'password'=>'required',
         'address'=>'required',
         'phoneNumber'=>'required',
         'districtName'=>'required',
    	]);


        $customer=new Customer();
        $customer->name=$request->name;
        $customer->email=$request->email;
        $customer->password=$request->password;
        $customer->address=$request->address;
        $customer->phoneNumber=$request->phoneNumber;
        $customer->districtName=$request->districtName;
        $customer->save();


    return redirect('/customer/add')->with('message','Customer Info Added Successfully!');

	}



	public function manageCustomer(){

		 $customers=Customer::all();

    return view('admin.customer.manageCustomer',['customers'=>$customers]);
	}



	public function editCustomer($id){

		 $customerById= Customer::where('id',$id)->first();
       
    return view('admin.customer.editCustomer',['customerById'=>$customerById]);

	}



	public function updateCustomer(Request $request){

       $this->validate($request,[
         'name'=>'required',
         'email'=>'required',
         'password'=>'required',
         'address'=>'required',
         'phoneNumber'=>'required',
         'districtName'=>'required',
      ]);

      $customerId=$request->customerId;
      $customer=Customer::find($customerId);
      

    	  $customer->name=$request->name;
    	  $customer->email=$request->email;
        $customer->password=$request->password;
    	  $customer->address=$request->address;
    	  $customer->phoneNumber=$request->phoneNumber;
        $customer->districtName=$request->districtName;
        $customer->save();

  
      return redirect('/customer/manage')->with('message','Customer Info Updated Successfully!');

  }



  public function deleteCustomer($id){

    	$customer=Customer::find($id);
    	$customer->delete();

    return redirect('/customer/manage')->with('message','Customer Info Deleted Successfully!');

  }


    // ***End Admin panel Customer functionality***



  

// ***sign-up & sign-in from modal***
    
  public function customerRegistration(Request $request){

        $this->validate($request,[
         'name'=>'required',
         'email'=>'required|string|email|max:255|unique:customers',
         'password'=>'required',
        ]);

        $customer=new Customer();
        $customer->name=$request->name;
        $customer->email=$request->email;
        $customer->password=$request->password;
        $customer->save();

        $customerId=$customer->id;
        Session::put('customerId',$customerId);

        
    return redirect('/customer/home');
  }



  public function customerSignIn(Request $request){

        $customerEmail=$request->email;
        $customerPassword=$request->password;
        $authCustomer=Customer::where('email',$customerEmail)
                                ->where('password',$customerPassword)->first();

        if($authCustomer){

            Session::put('customerId',$authCustomer->id);
      

            return redirect('/customer/home');
        }


        else{

            return redirect('/')->with('loginError','Sorry ! Wrong email/password.');
        }

  }



  public function myHome(){

        $customerId= Session::get('customerId');
        $customerInfo=Customer::find($customerId);

      return view('frontEnd.customer.myHome',['customerInfo'=>$customerInfo]);
  }



  public function customerInfoUpdate(Request $request){

        $customerId=$request->customerId;
        $customer=Customer::find($customerId);

        $this->validate($request,[
         'name'=>'required',
         'password'=>'required',
         'address'=>'required',
         'phoneNumber'=>'required',
         'districtName'=>'required',
        ]);

      
        $customer->name=$request->name;
        $customer->password=$request->password;
        $customer->address=$request->address;
        $customer->phoneNumber=$request->phoneNumber;
        $customer->districtName=$request->districtName;
        $customer->save();


      return redirect('/customer/home')->with('message','Your Info Updated Successfully.');

  }


  public function customerOrders(){

      $customerId= Session::get('customerId');
      $customerOrdersById=Order::where('customerId',$customerId)->paginate(3);

      //$customerOrdersById=Order::where('customerId',$customerId)->get();

  
      return view('frontEnd.customer.customerOrders',['customerOrdersById'=>$customerOrdersById]);
  }



  public function showOrderDetails($id){

    $orderId=$id;
    $orderDetails=DB::table('orders')
                 ->leftJoin('order_details','orders.id','=','order_details.orderId')
                 ->leftJoin('products','products.id','=','order_details.productId')
                 ->select('orders.*','order_details.productName','order_details.productPrice','order_details.productQuantity','products.productImage')
                 ->where('orders.id',$id)
                 ->get();

    $shipment=Shipment::where('orderId',$orderId)->first();

  

     return view('frontEnd.customer.orderDetails',['orderDetails'=>$orderDetails,'shipment'=>$shipment]);
  }


  public function customerLogout(){
         
         $customerId=Session::get('customerId');

        if ($customerId){
            
            Session::forget(['customerId']);
            Session::forget(['shippingId']); 
            Session::forget(['orderTotal']);
            Session::forget(['orderId']);
            Session::forget(['customerName']);
           
            
          return redirect('/')->with('message','Successfully Logout!');
        }
        
        else{

          return redirect('/');
        }

  }



  //Social Customer sign-up & sign-in


  public function redirectToProvider($provider){
       
      return Socialite::driver($provider)->redirect();

  }

    
  public function handleProviderCallback($provider){
       
      $user = Socialite::driver($provider)->stateless()->user();


          $authUser = $this->findOrCreateUser($user, $provider);
          //Auth::login($authUser, true);
          //return redirect($this->redirectTo); 

          Session::put('customerId',$authUser->id);
          Session::put('customerName',$authUser->name);

        
          $msg="Congratulation ! You have successfully registered/login using ".$authUser->provider.".";
        

    return redirect('/customer/home')->with('message',$msg);
  }



    public function findOrCreateUser($user, $provider)
    {
        $authUser =Customer::where('provider_id', $user->id)->first();
        if ($authUser) {
            return $authUser;
        }

        // return  $user; 

        return Customer::create([
            'name'     => $user->name,
            'email'    => $user->email,
            'password'=> "123456",
            'provider' => $provider,
            'provider_id' => $user->id,
        ]);

    }


    public function customerSocial(){


      return view('frontEnd.customer.customerSocial');
    }



}
