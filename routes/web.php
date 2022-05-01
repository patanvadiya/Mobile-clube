<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|;;
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

/*--------------- Admin Page Opartion ------------------*/

Route::get("homeImage","AdminController@homeImage");

Route::post("addHomeMobileImage","AdminController@addHomeMobileImage");

Route::get("updateHomeImage/{id}","AdminController@updateHomeImage");

Route::post("RequestupdateHomeImage","AdminController@RequestupdateHomeImage");

Route::get("deleteHomeImage/{id}","AdminController@deleteHomeImage");

Route::post("HomeAddVariance","AdminController@HomeAddVariance");

Route::get("addWishlistVarince","AdminController@addWishlistVarince");

Route::post("WishlistAddVariance","AdminController@WishlistAddVariance");

Route::get("sumsungAccessories","AdminController@sumsungAccessories");

Route::post("addsumsungAccessorieRequest","AdminController@addsumsungAccessorieRequest");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Mi Route

Route::get("MiAddImage","MIController@MiAddImage");

Route::post("addMiMobileImage","MIController@addMiMobileImage");

Route::get("updateMiImag/{id}","MIController@updateMiImag");

Route::post("RequestupdateMiImage","MIController@RequestupdateMiImage");

Route::get("variance","MIController@variance");

Route::POST("addVariance","MIController@addVariance");

Route::get("miAccessories","MIController@mi_accessories");

Route::post("addMIAccessorieRequest","MIController@addMIAccessorieRequest");

//Apple Route

Route::get("apple","AppleController@apple");

Route::post("addAppleRequest","AppleController@addAppleRequest");

Route::get("applevariance","AppleController@variance");

Route::post("addAppleVarianceRequest","AppleController@addAppleVarianceRequest");

Route::get("appleAccesories","AppleController@appleAccesories");

Route::post("addAppleAccessorieRequest","AppleController@addAppleAccessorieRequest");
//Oppo Route 

Route::get("oppo","OppoController@oppo");

Route::post("addOppoRequest","OppoController@addOppoRequest");

//realme Route

Route::get("realMe","realMeController@realMe");

Route::post("addRealmeRequest","realMeController@addRealmeRequest");

Route::post("realmeVariance","realMeController@realmeVariance");

//Vivo Route

Route::get("vivo","VivoController@vivo");

Route::post("addVivoRequest","VivoController@addVivoRequest");

Route::post("vivovariance","VivoController@vivovariance"); 


/****************************User Controller *****************************/


Route::get("/","userController@index");

Route::get("searchcomp","userController@search");

Route::post("search","userController@searchbtn");

Route::get("login","userController@login");

Route::post("requestAdminLogin","userController@requestAdminLogin");

Route::get("logout","userController@logout");

Route::get("addCart/{id}/{type}","userController@addCart");

Route::post("requestAddcart","userController@requestAddcart");

Route::get("showAddcart","userController@showAddcart");

Route::get("DeleteAddCart/{id}","userController@DeleteAddCart");

Route::post("allCartData","userController@allCartData");

Route::post("requestCompare","userController@requestCompare");

Route::get("compare","userController@compare");

Route::get("deleteCompare/{id}","userController@deleteCompare");

Route::get("accessories","userController@accessories");

Route::get("mi","userController@mi");

Route::get("vivo","userController@vivo");

Route::get("realmemo","userController@realme");

Route::get("apple","userController@apple");

Route::get("oppo","userController@oppo");

Route::post("updatecart","userController@updatecart");

Route::get("AddCartAccessories/{id}","userController@AddCartAccessories");

Route::post("requestAccessories","userController@requestAccessories");

//Payment Route

Route::get('checkout','CheckoutController@checkout');

Route::post('checkout','CheckoutController@afterpayment')->name('checkout.credit-card');

Route::get("delivery","CheckoutController@delivery");

Route::post("deleverAddressRequest","CheckoutController@deleverAddressRequest");

Route::get("sucessPayment","CheckoutController@afterpayment");

//End Payment Route

//order Route

Route::get("order","userController@order");

//Add to wishlist

Route::get("wishlist/{id}/{type}","userController@wishlist");

Route::post("requestWishlist","userController@requestWishlist");

Route::get("viewWishlist","userController@viewWishlist");

//Variance

Route::get("addCart/{id}/variancemi/{idd}/{type}","userController@variancemi");

Route::POST("oppovariance","OppoController@oppovariance");

Route::get("profile/{idd}","userController@profile");

Route::get("addCart/{id}/profile/{idd}","userController@profileAddcrat");

Route::get('/demo',function(){
	return view('layouts.demo');
});

// Route::get('/add_mobile',function(){
// 	return view('layouts.add_mobile');
// });

