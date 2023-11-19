<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/* Front-End Info */
Route::get('/','WelcomeController@index');
Route::get('/contact','WelcomeController@contactForm');
Route::get('/category-view/{id}','WelcomeController@category');
Route::get('/product-details/{id}','WelcomeController@productDetails');

/* End Front-End Info */     


/* Cart Info */
Route::post('/cart/add','CartController@addToCart');
Route::post('/cart/update','CartController@updateToCart');
Route::get('/cart/show','CartController@showCart');
Route::get('/cart/delete/{id}','CartController@deleteCartProduct');
Route::get('/cart/empty','CartController@emptyCartProduct');
/* End Cart Info */


/* Checkout Info */
Route::get('/checkout','CheckoutController@index');
Route::post('/checkout/sign-up','CheckoutController@customerRegistration');
Route::post('/checkout/sign-in','CheckoutController@customerLogin');

Route::group(['middleware'=>'AuthenticateCustomer'],function(){ 

	Route::get('/checkout/billing','CheckoutController@showBillingForm');
	Route::post('/checkout/save-billing','CheckoutController@saveBillingInfo');
	Route::get('/checkout/shipping','CheckoutController@showShippingForm');
	Route::post('/checkout/save-shipping','CheckoutController@saveShippingInfo');
	Route::get('/checkout/payment','CheckoutController@showPaymentForm');
	Route::post('/checkout/save-order','CheckoutController@saveOrderInfo');
	Route::get('/checkout/confirmation','CheckoutController@customerHome');
/* End Checkout Info */

});


/* Customer Profile Info*/
Route::post('/customer/sign-up','CustomerController@customerRegistration');
Route::post('/customer/sign-in','CustomerController@customerSignIn');

Route::group(['middleware'=>'AuthenticateCustomer'],function(){ 

	Route::get('/customer/home','CustomerController@myHome');
	Route::post('/customer/info-update','CustomerController@customerInfoUpdate');
	Route::get('/customer/orders','CustomerController@customerOrders');
	Route::get('/customer/order-details/{id}','CustomerController@showOrderDetails');
	Route::get('/customer/log-out','CustomerController@customerLogout');
	/* End Customer Profile Info*/
});


/* Paypal payment Info */
Route::get('payment-status',array('as'=>'payment.status','uses'=>'PaymentController@paymentInfo'));

Route::get('payment',array('as'=>'payment','uses'=>'PaymentController@payment'));

Route::get('payment-cancel', function () {

   return 'Payment has been canceled';

});

/* End Paypal payment Info */


/* Social Customer sign-up/sign-in Info*/
Route::get('auth/{provider}', 'CustomerController@redirectToProvider');
Route::get('auth/{provider}/callback', 'CustomerController@handleProviderCallback');
Route::get('/customer/social', 'CustomerController@customerSocial');
/* End Social Customer sign-up/sign-in Info*/


/* ------------Admin panel Routes Info------------*/ 
Auth::routes();
Route::get('/dashboard','HomeController@index');

Route::group(['middleware'=>'AuthenticateMiddleware'],function(){

	/* Category Info*/ 
	Route::get('/category/add','CategoryController@createCategory');
	Route::post('/category/save','CategoryController@storeCategory');     
	Route::get('/category/manage','CategoryController@manageCategory');
	Route::get('/category/edit/{id}','CategoryController@editCategory');
	Route::post('/category/update','CategoryController@updateCategory');
	Route::get('/category/delete/{id}','CategoryController@deleteCategory');
	/*End Category Info*/

	/* Manufacturer Info */ 
	Route::get('/manufacturer/add','ManufacturerController@createManufacturer');
	Route::post('/manufacturer/save','ManufacturerController@storeManufacturer');     
	Route::get('/manufacturer/manage','ManufacturerController@manageManufacturer');
	Route::get('/manufacturer/edit/{id}','ManufacturerController@editManufacturer');
	Route::post('/manufacturer/update','ManufacturerController@updateManufacturer');
	Route::get('/manufacturer/delete/{id}','ManufacturerController@deleteManufacturer');
	/*End Manufacturer Info*/

	/* Product Info */
	Route::get('/product/add','ProductController@createProduct');
	Route::post('/product/save','ProductController@storeProduct');     
	Route::get('/product/manage','ProductController@manageProduct');
	Route::get('/product/view/{id}','ProductController@viewProduct');
	Route::get('/product/edit/{id}','ProductController@editProduct');
	Route::post('/product/update','ProductController@updateProduct');
	Route::get('/product/delete/{id}','ProductController@deleteProduct');
	/*End Product Info*/

    /* User Info */
    Route::get('/user/add','UserController@createUser');
    Route::post('/user/save','UserController@storeUser');
	Route::get('/user/manage','UserController@manageUser');
	Route::get('/user/edit/{id}','UserController@editUser');
	Route::post('/user/update','UserController@updateUser');
	Route::get('/user/delete/{id}','UserController@deleteUser');
	/*End User Info*/


	/* Customer Info */
	Route::get('/customer/add','CustomerController@createCustomer');
	Route::post('/customer/save','CustomerController@storeCustomer');
	Route::get('/customer/manage','CustomerController@manageCustomer');
	Route::get('/customer/edit/{id}','CustomerController@editCustomer');
	Route::post('/customer/update','CustomerController@updateCustomer');
	Route::get('/customer/delete/{id}','CustomerController@deleteCustomer');
	/*End Customer Info*/


	/* Order Info */
	Route::get('/order/manage','OrderController@manageOrder');   
	Route::get('/order/edit/{id}','OrderController@editOrder');
	Route::post('/order/status-update','OrderController@updateOrderStatus');
	Route::get('/update/payment-status/{id}','OrderController@updatePaymentStatus');
	Route::get('/order/billing-address/{id}','OrderController@showBillingAddress');
	Route::get('/order/shipping-address/{id}','OrderController@showShippingAddress');
	Route::get('/order/product/list/{id}','OrderController@showProductList');
	/*End Order Info */


    /* Shipment Info */
	Route::get('/shipment/add/{id}','ShipmentController@createShipment');
	Route::post('/shipment/save/{id}','ShipmentController@saveShipment');
	Route::get('/shipment/manage','ShipmentController@manageShipment');
	Route::get('/shipment/edit/{id}','ShipmentController@editShipment');
	Route::post('/shipment/update','ShipmentController@updateShipment');
	Route::get('/shipment/delete/{id}','ShipmentController@deleteShipment');
    /*End Shipment Info*/
    

    /* Report Info */
    Route::get('/report/low-stock','ReportController@lowStockProduct');
    Route::get('/report/best-seller','ReportController@bestSellerProduct');
    /*End Report Info*/



});