<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Addcart;
use App\Payment;
use Session;
use App\Delivery;
use App\HomeImage;
use App\AddApple;
use App\AddMi;
use App\AddMotorola;
use App\AddOppo;
use App\AddRealme;
use App\Addvivo;
use App\allCartData;
use DB;
use App\Wishlist;
use App\UserLogin;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
	public function delivery()
	{
		return view('userDashborad/delivery_address');
	}

	public function deleverAddressRequest(Request $request) {

    	$sid = Session::get('id');
        $insert = new Delivery();
        $insert->user_id = $sid;
        $insert->product_id = "#".$request->product_id;
        $insert->full_name = $request->full_name;
        $insert->address_line1 = $request->address_line1;
        $insert->address_line2 = $request->address_line2;
        $insert->city = $request->city;
        $insert->state = $request->state;
        $insert->pincode = $request->pincode;
        $insert->country = $request->country;
        $insert->save();
        return redirect("checkout");
    }

    public function checkout()
    {   
    	$sid = Session::get('id');
        $data['profile'] = UserLogin::where("id",$sid)->first();
        $total_price = Addcart::where('user_id', $sid)->where('status',0)->sum('price');
        $data = allCartData::where('user_id', $sid)->where('status',1)->get();

		foreach ($data as $alldata) {                                 
			$transaction_id = rand(10,100000000000);		
			$insert = new Payment;
            $insert->user_id = $alldata->user_id;
            $insert->variance = $alldata->variance;
			$insert->transaction_id = $transaction_id;
            $insert->product_id = $alldata->product_id;                                         
		    $insert->title = $alldata->title;
		    $insert->price = $alldata->price;
		    $insert->company = $alldata->company;
		    $insert->quantity = $alldata->addQty;
		    $insert->save();
		}
        

        \Stripe\Stripe::setApiKey('sk_test_51IMdLQKQNRhrNe2StwIGHSIHKJ5jVTE5fRPXbv1tjteoqlzUYnyN4WTcROM60Qr8cxuQItISjJJ2nQJWoOPJkd1P00AhC6q5uz');
        		
		$amount = $total_price;
		$amount *= 100;
        $amount = (int) $amount;
        
        $payment_intent = \Stripe\PaymentIntent::create([
			'description' => 'Stripe Mobile Payment',
			'amount' => $amount,
			'currency' => 'INR',
			'description' => 'Payment From Mobile.com',
			'payment_method_types' => ['card'],	
		]);
		$intent = $payment_intent->client_secret;

        $last_id=$insert->product_id;
        $alldata = allCartData::where("user_id",$sid)->where("product_id",$last_id)->get();

        foreach ($alldata as $mngqty) {
        
            if ($hdata = HomeImage::where('id',$mngqty->mobile_id)->first()) {
                $hdata->quantity -= $mngqty->addQty;
                $hdata->save();

            } elseif ($adata = AddApple::where('id',$mngqty->mobile_id)->first()) {
                $adata->quantity -= $mngqty->addQty;
                $adata->save();

            } elseif ($adata = AddMi::where('id',$mngqty->mobile_id)->first()) {
                $adata->quantity -= $mngqty->addQty;
                $adata->save();

            } elseif ($adata = AddMotorola::where('id',$mngqty->mobile_id)->first()) {
                $adata->quantity -= $mngqty->addQty;
                $adata->save();

            } elseif ($adata = AddOppo::where('id',$mngqty->mobile_id)->first()) {
                $adata->quantity -= $mngqty->addQty;
                $adata->save();

            } elseif ($adata = Addvivo::where('id',$mngqty->mobile_id)->first()) {
                $adata->quantity -= $mngqty->addQty;
                $adata->save();

            } elseif ($adata = AddRealme::where('id',$mngqty->mobile_id)->first()) {
                $adata->quantity -= $mngqty->addQty;
                $adata->save();
            }
        }

		return view('userDashborad/checkout.credit-card',compact('intent'));

    }

    public function afterPayment()
     {
    	$sid = Session::get('id');
        $data['profile'] = UserLogin::where("id",$sid)->first();
    	Addcart::where('user_id',$sid)->update(['status' => 1]);
        allCartData::where('user_id',$sid)->update(['buy' => 1]);
        Payment::where('user_id',$sid)->update(['status' => 1]);
        $data['count'] = Addcart::get()->where('user_id', $sid)->where('status',0)->count();
        
        $email = UserLogin::where('id',$sid)->first();
        $user_mail = $email->email;
        $user_name = $email->name;

        $to_name = $user_name;
        $to_email = $user_mail;
        $data1 = array('name'=> $user_name,'payment'=>"Your Paymant Successfully",'order'=>'Thank you.. Your Order Completed');
        Mail::send('mail',$data1,function ($message) use ($to_name,$to_email){

            $message->to($to_email)->subject("mobile clube Order");
        });

        return view("userDashborad/sucessPayment",$data);
    	   		
    }
    
}
        