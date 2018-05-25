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

Route::get('/', 'MyController@index');

Route::get('/events', 'MyController@event');

Route::get('/about', 'MyController@about');

Route::get('/contact', 'MyController@contact');

Route::get('/branded-products', 'MyController@brandedProducts');

Route::get('/services', 'MyController@services');

Route::post('/fourZero/404', 'MyController@fourZeroPost');

Route::get('/fourZero/404', 'MyController@fourZeroGet');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'HomeController@index');

Route::get('/customer/logout', 'CustomerAccessController@logoutCustomer');

Route::get('/customer/login', 'CustomerAccessController@loginCustomer');

Route::get('/ajax-email-check-general/{emailId}', 'CustomerAccessController@emailCheck');

Route::post('/customer/sign-in', 'CustomerAccessController@signInCustomer');

Route::post('/customer/register', 'CustomerAccessController@registerCustomer');

Route::get('/customer/profile', 'CustomerAccessController@customerProfile');

Route::get('/customer/edit-profile', 'CustomerAccessController@editCustomerProfile');

Route::post('/customer/update-profile', 'CustomerAccessController@updateCustomerInfo');

Route::get('/customer/change-password', 'CustomerAccessController@changeCustomerPassword');

Route::post('/customer/update-password', 'CustomerAccessController@updateCustomerPassword');

Route::get('search', 'MyController@searchData');

Route::get('/product/discount-offer', 'MyController@productDiscount');


Route::group(['middleware'=>'CheckIDMiddleware'], function(){
Route::get('/sub-category/front/{id}', 'MyController@subCategory');

Route::get('/product-details/{id}', 'MyController@productDetails');  
});

/* Cart Functionalities */
Route::get('/cart/add/{id}', 'CartController@addToCart');

Route::get('/cart', 'CartController@index');

//Route::match(['get','post'],'/cart/add/{id}', 'CartController@addToCart');

Route::group(['middleware'=>'CheckoutMiddleware'], function(){

Route::get('/cart/remove/{id}', 'CartController@removeFromCart');

Route::get('/cart/update', 'CartController@updateCart');
/* //Cart Functionalities */    

/* Checkout Functionalities */
Route::get('/checkout', 'CheckoutController@index');

Route::get('/ajax-email-check/{emailId}', 'CheckoutController@emailCheck');

Route::post('/checkout/login', 'CheckoutController@customerLogin');

Route::post('/checkout/sign-up', 'CheckoutController@customerRegistration');

Route::get('/checkout/shipping', 'CheckoutController@showShippingForm');

Route::post('/checkout/save-shipping', 'CheckoutController@saveShippingInfo');
/* //Checkout Functionalities */

/* Payment & Order Functionalities */
Route::get('/order/payment', 'OrderController@showPaymentForm');

Route::post('/order/save-order', 'OrderController@saveOrderInfo');

Route::get('/order/order-success', 'OrderController@orderSuccess');
/* //Payment & Order Functionalities */
});


Route::group(['middleware'=>'AthenticateMiddleware'], function(){
    /* Category Info */
Route::get('/category/add', 'CategoryController@createCategory');
Route::post('/category/save', 'CategoryController@storeCategory');
Route::get('/category/manage', 'CategoryController@manageCategory');
Route::get('/category/edit/{id}', 'CategoryController@editCategory');
Route::post('/category/update', 'CategoryController@updateCategory');
Route::get('/category/delete/{id}', 'CategoryController@deleteCategory');
/* //Category Info */

/* Sub-Category */
Route::get('/sub-category/add', 'SubCategoryController@createSubCategory');
Route::post('/sub-category/save', 'SubCategoryController@storeSubCategory');
Route::get('/sub-category/manage', 'SubCategoryController@manageSubCategory');
Route::get('/sub-category/edit/{id}', 'SubCategoryController@editSubCategory');
Route::post('/sub-category/update', 'SubCategoryController@updateSubCategory');
Route::get('/sub-category/delete/{id}', 'SubCategoryController@deleteSubCategory');
/* //Sub-Category */

/* Manufacturer */
Route::get('/manufacturer/add', 'ManufacturerController@createManufacturer');
Route::post('/manufacturer/save', 'ManufacturerController@storeManufacturer');
Route::get('/manufacturer/manage', 'ManufacturerController@manageManufacturer');
Route::get('/manufacturer/edit/{id}', 'ManufacturerController@editManufacturer');
Route::post('/manufacturer/update', 'ManufacturerController@updateManufacturer');
Route::get('/manufacturer/delete/{id}', 'ManufacturerController@deleteManufacturer');
/* //Manufacturer */

/* Product */
Route::get('/product/add', 'ProductController@createProduct');
Route::post('/product/save', 'ProductController@storeProduct');
Route::get('/product/manage', 'ProductController@manageProduct');
Route::get('/product/view/{id}', 'ProductController@viewProduct');
Route::get('/product/edit/{id}', 'ProductController@editProduct');
Route::post('/product/update', 'ProductController@updateProduct');
Route::get('/product/delete/{id}', 'ProductController@deleteProduct');
/* //Product */

/* Orders */
Route::get('/order/manage', 'OrderManageController@index');
Route::get('/order/invoice/{id}', 'OrderManageController@viewInvoice');
Route::get('/order/edit/{id}', 'OrderManageController@editOrder');
Route::get('/order/delete/{id}', 'OrderManageController@deleteOrder');
/* //Orders */

/* User */
Route::get('/user/profile/{id}', 'UserController@userProfile');
Route::post('user/change-password', 'UserController@changePassword');
Route::get('/user/add', 'UserController@createUser');
Route::post('/user/save', 'UserController@saveUser');
Route::get('/user/manage', 'UserController@manageUser');
Route::get('/user/edit/{id}', 'UserController@editUser');
Route::post('/user/update', 'UserController@updateUser');
Route::get('/user/delete/{id}', 'UserController@deleteUser');
/* //User */
});