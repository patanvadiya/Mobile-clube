<?php

namespace App\Http\Controllers;
//use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Session;
use App\Delivery;
use App\HomeImage;
use App\AddApple;
use App\AddMi;
use App\AddMotorola;
use App\AddOppo;
use App\AddRealme;
use App\Addvivo;
use App\Addcart;
use App\UserLogin;
use App\allCartData;
use DB;
use App\Wishlist;
use App\variance;
use App\homevariance;
use App\Applevariance;
use App\OppoVariance;
use App\RealmeVariance;
use App\VivoVariance;
use App\WishlistWarince;
use App\Compare;
use App\miAccessoires;
use Illuminate\Support\Facades\Mail;

class userController extends Controller
{
    public function search( Request $request)
    {
        $Query = $request->get('term','');
        $products = HomeImage::where('title','LIKE','%'.$Query.'%')->get();

        $mi = AddMi::where('title','LIKE','%'.$Query.'%')->get();
        $data = [];
        foreach ($products as $servies) {
            $data[] = [
                'value'=>$servies->title,
                'id'=>$servies->id
            ];
        }
         // print_r($products);die(); 

        // foreach ($mi as $mi1) {
        //     $data1[] = [
        //         'value'=>$mi1->title,
        //         'id'=>$mi1->id
        //     ];
        // }

        if (count($data)) {
            return $data;

        } else {

            return ["value"=>'No Result Found','id'=>''];
        }
    }


    public function searchbtn(Request $request)
    {
        $searchdata = $request->input('serach_product');
        $products = HomeImage::where('title','LIKE','%'.$searchdata.'%')->get();

        if ($products == true) {

            if (isset($_POST['searchbtn'])) {

                return redirect("viewWishlist");

            } else {

                return redirect("order");
            }

        } else {

            return redirect("/")->with("status","product Not Availble");
        }
        
    }


    public function index()
    {

        $sid = Session::get('id');
        // if (Request()->get('sort')=='price_asc') {
        //     $data['profile'] = UserLogin::where("id",$sid)->first();
        //     $data['var'] = homevariance::get(); 
        //     $data['data']= HomeImage::orderBy('price','asc')->get();
        //     $data['mi']= AddMi::orderBy('price','asc')->get();
        //     $data['oppo']= AddOppo::orderBy('price','asc')->get();
        //     $data['realMe']= AddRealme::orderBy('price','asc')->get();
        //     $data['vivo']= Addvivo::orderBy('price','asc')->get();
        //     $data['apple']= AddApple::orderBy('price','asc')->get();
        //     $data['motorola']= AddMotorola::orderBy('price','asc')->get();
        //     $data['data1'] = HomeImage::get();
        //     //$data['mi'] = AddMi::get();
        //    // $data['oppo'] = AddOppo::get();
        //     //$data['realMe'] = AddRealme::get();
        //     //$data['vivo'] = Addvivo::get();
        //     // $data['apple'] = AddApple::get();
        //     // $data['motorola'] = AddMotorola::get();
        //     $data['count'] = Addcart::get()->where('user_id', $sid)->where('status',0)->count();
        //     return view("userDashborad/index",$data);

        // } elseif (Request()->get('sort')=='price_dec') {
        //     $data['profile'] = UserLogin::where("id",$sid)->first();
        //     $data['data']= HomeImage::orderBy('price','desc')->get();
        //     $data['mi']= AddMi::orderBy('price','desc')->get();
        //     $data['oppo']= AddOppo::orderBy('price','desc')->get();
        //     $data['realMe']= AddRealme::orderBy('price','desc')->get();
        //     $data['vivo']= Addvivo::orderBy('price','desc')->get();
        //     $data['apple']= AddApple::orderBy('price','desc')->get();
        //     $data['motorola']= AddMotorola::orderBy('price','desc')->get();
        //     $data['data1'] = HomeImage::get();
        //     $data['count'] = Addcart::get()->where('user_id', $sid)->where('status',0)->count();
        //     return view("userDashborad/index",$data);
            
        // } elseif (Request()->get('sort')=='new_item') {
        //     $data['profile'] = UserLogin::where("id",$sid)->first();
        //     $data['data']= HomeImage::orderBy('created_at','desc')->get();
        //     $data['mi']= AddMi::orderBy('created_at','desc')->get();
        //     $data['oppo']= AddOppo::orderBy('created_at','desc')->get();
        //     $data['realMe']= AddRealme::orderBy('created_at','desc')->get();
        //     $data['vivo']= Addvivo::orderBy('created_at','desc')->get();
        //     $data['apple']= AddApple::orderBy('created_at','desc')->get();
        //     $data['motorola']= AddMotorola::orderBy('created_at','desc')->get();
        //     $data['data1'] = HomeImage::get();
        //     $data['count'] = Addcart::get()->where('user_id', $sid)->where('status',0)->count();
        //     return view("userDashborad/index",$data);

        // } else {
            $data['profile'] = UserLogin::where("id",$sid)->first();
            $data['var'] = variance::get();   
            $data['data'] = HomeImage::get();
            $data['data1'] = HomeImage::get();
            // $data['mi'] = AddMi::get();
            // $data['oppo'] = AddOppo::get();
            // $data['realMe'] = AddRealme::get();
            // $data['vivo'] = Addvivo::get();
            // $data['apple'] = AddApple::get();
            // $data['motorola'] = AddMotorola::get();
            $data['count'] = Addcart::get()->where('user_id', $sid)->where('status',0)->count();
            return view("userDashborad/index",$data); 
        //}

    }

    public function accessories()
    {

        return view("userDashborad/mobileCategory/accessories");
    }

    public function requestAccessories(Request $request)
    {
        $sid = Session::get('id');
        $insert = new Addcart();
        $insert->user_id = $sid;
        $insert->status = 0;
        $insert->title = $request->title;
        $insert->company = $request->company;
        $insert->image = $request->image;
        $insert->addQty = $request->addQty;
        $insert->price = $request->price * $request->addQty;
        $insert->tprice = $request->tprice;
        $insert->mobile_id = $request->mobile_id;
        $insert->desc = $request->desc;
        $insert->save();
        $status = 'Successfully Done';
        //return back()->with(['status' => $status]);
        return redirect("/")->with(Session::flash('message', "Addcart Succesfully...")); 
    }

    public function AddCartAccessories($id)
    {
        $sid = Session::get('id');
        $data['profile'] = UserLogin::where("id",$sid)->first();
        $data['count'] = Addcart::get()->where('user_id', $sid)->where('status',0)->count();
        $data['accessories'] = miAccessoires::where("id",$id)->first();
        return view("userDashborad/mobileCategory/AddCart_Accessories",$data);
    }

    public function mi()
    {
        if (Request()->get('sort')=='price_dec') {

            $data['data'] = AddMi::orderBy('price','desc')->get();
            $data['miAccessoires'] = miAccessoires::get();
            return view("userDashborad/mobileCategory/mi",$data);

        } elseif (Request()->get('sort')=='price_asc') {

            $data['data'] = AddMi::orderBy('price','asc')->get();
            $data['miAccessoires'] = miAccessoires::get();
            return view("userDashborad/mobileCategory/mi",$data);

        } elseif (Request()->get('sort')=='price_latest') {

            $data['data'] = AddMi::orderBy('created_at','desc')->get();
            $data['miAccessoires'] = miAccessoires::get();
            return view("userDashborad/mobileCategory/mi",$data);

        } else {
            $data['data'] = AddMi::get();
            $data['miAccessoires'] = miAccessoires::get();
            return view("userDashborad/mobileCategory/mi",$data); 
        }
        //$data['data'] = AddMi::get();
        //return view("userDashborad/mobileCategory/mi",$data);
    }

    public function vivo()
    {

        if (Request()->get('sort')=='price_dec') {

            $data['data'] = Addvivo::orderBy('price','desc')->get();
            return view("userDashborad/mobileCategory/vivo",$data);

        } elseif (Request()->get('sort')=='price_asc') {

            $data['data'] = Addvivo::orderBy('price','asc')->get();
            return view("userDashborad/mobileCategory/vivo",$data);

        } elseif (Request()->get('sort')=='price_latest') {

            $data['data'] = Addvivo::orderBy('created_at','desc')->get();
            return view("userDashborad/mobileCategory/vivo",$data);

        } else {
            $data['data'] = Addvivo::get();
            return view("userDashborad/mobileCategory/vivo",$data); 
        }
        //$data['data'] = Addvivo::get();
        //return view("userDashborad/mobileCategory/vivo",$data);
    }

    public function realme()
    {
        if (Request()->get('sort')=='price_dec') {

            $data['data'] = AddRealme::orderBy('price','desc')->get();
            return view("userDashborad/mobileCategory/realme",$data);

        } elseif (Request()->get('sort')=='price_asc') {

            $data['data'] = AddRealme::orderBy('price','asc')->get();
            return view("userDashborad/mobileCategory/realme",$data);

        } elseif (Request()->get('sort')=='price_latest') {

            $data['data'] = AddRealme::orderBy('created_at','desc')->get();
            return view("userDashborad/mobileCategory/realme",$data);

        } else {
            $data['data'] = AddRealme::get();
            return view("userDashborad/mobileCategory/realme",$data); 
        }
        //$data['data'] = AddRealme::get();
        //return view("userDashborad/mobileCategory/realme",$data);
    }

    public function apple()
    {
        if (Request()->get('sort')=='price_dec') {

            $data['data'] = AddApple::orderBy('price','desc')->get();
            return view("userDashborad/mobileCategory/apple",$data);

        } elseif (Request()->get('sort')=='price_asc') {

            $data['data'] = AddApple::orderBy('price','asc')->get();
            return view("userDashborad/mobileCategory/apple",$data);

        } elseif (Request()->get('sort')=='price_latest') {

            $data['data'] = AddApple::orderBy('created_at','desc')->get();
            return view("userDashborad/mobileCategory/apple",$data);

        } else {
            $data['data'] = AddApple::get();
            return view("userDashborad/mobileCategory/apple",$data); 
        }

        //$data['data'] = AddApple::get();
        //return view("userDashborad/mobileCategory/apple",$data);
    }

    public function oppo()
    {   
        if (Request()->get('sort')=='price_dec') {

            $data['data'] = AddOppo::orderBy('price','desc')->get();
            return view("userDashborad/mobileCategory/oppo",$data);

        } elseif (Request()->get('sort')=='price_asc') {

            $data['data'] = AddOppo::orderBy('price','asc')->get();
            return view("userDashborad/mobileCategory/oppo",$data);

        } elseif (Request()->get('sort')=='price_latest') {

            $data['data'] = AddOppo::orderBy('created_at','desc')->get();
            return view("userDashborad/mobileCategory/oppo",$data);

        } else {
            $data['data'] = AddOppo::get();
            return view("userDashborad/mobileCategory/oppo",$data); 
        }
        
    }

    public function login()
    {

        return view("userDashborad/login");
    }

    public function requestAdminLogin(Request $request)
    {
        $login = UserLogin::where('email',$request->email)->where("password",$request->password)->first();
        if ($login) {
            $request->session()->put('id',$login->id);
            $request->session()->put('name',$login->name);
            return redirect("/");
        } else {
            return redirect("login");    
        }
        
    }

    public function logout(){

        Session()->flush();
        return redirect(url("login"));
    }

    public function addCart($id, $type)
    {   
        $sid = Session::get('id');

        if ($sid==TRUE) {

            if ($data['data'] = HomeImage::where("id",$id)->where('type',$type)->first()) {
                $data['var'] = homevariance::where("title_id",$id)->get();                                                                                                  
                $data['profile'] = UserLogin::where("id",$sid)->first();
                $data['count'] = Addcart::get()->where('user_id', $sid)->where('status',0)->count();
                return view ("userDashborad/add_cart",$data); 

            } elseif ($data['data'] = AddOppo::where("id",$id)->where('type',$type)->first()) {
                $data['count'] = Addcart::get()->where('user_id', $sid)->where('status',0)->count();
                $data['var'] = OppoVariance::where("title_id",$id)->get();
                $data['profile'] = UserLogin::where("id",$sid)->first();
                return view ("userDashborad/add_cart",$data);

            } elseif ($data['data'] = AddMi::where("id",$id)->where('type',$type)->first()) {
                $data['count'] = Addcart::get()->where('user_id', $sid)->where('status',0)->count();                                                                        
               $data['var'] = variance::where("title_id",$id)->get();
               $data['profile'] = UserLogin::where("id",$sid)->first();

                return view ("userDashborad/add_cart",$data);

            } elseif ($data['data'] = AddRealme::where("id",$id)->where('type',$type)->first()) {
                $data['count'] = Addcart::get()->where('user_id', $sid)->where('status',0)->count();
                $data['var'] = RealmeVariance::where("title_id",$id)->get();                  
                $data['profile'] = UserLogin::where("id",$sid)->first();
                return view ("userDashborad/add_cart",$data);

            } elseif ($data['data'] = AddApple::where("id",$id)->where('type',$type)->first()) {
                $data['count'] = Addcart::get()->where('user_id', $sid)->where('status',0)->count();
                $data['var'] = Applevariance::where("title_id",$id)->get();                        $data['profile'] = UserLogin::where("id",$sid)->first();
                return view ("userDashborad/add_cart",$data);                                                                          
            } elseif ($data['data'] = Addvivo::where("id",$id)->where('type',$type)->first()) {
                $data['count'] = Addcart::get()->where('user_id', $sid)->where('status',0)->count();
                $data['var'] = VivoVariance::where("title_id",$id)->get();                                                                                       
                $data['profile'] = UserLogin::where("id",$sid)->first();
                return view ("userDashborad/add_cart",$data);

            } elseif ($data['data'] = AddMotorola::where("id",$id)->where('type',$type)->first()) {
                $data['count'] = Addcart::get()->where('user_id', $sid)->where('status',0)->count();
                return view ("userDashborad/add_cart",$data);
            }

        } else {

            return redirect("login")->with("fail","Please login to continue shopping...");
        }        
                                                                                            
    }

    public function requestAddcart(Request $request)
    {
        $sid = Session::get('id');
        $insert = new Addcart();
        $insert->user_id = $sid;
        $insert->status = 0;
        $insert->title = $request->title;
        $insert->company = $request->company;
        $insert->variance = $request->variance;
        $insert->image = $request->image;
        $insert->addQty = $request->addQty;
        $insert->price = $request->price * $request->addQty;
        $insert->tprice = $request->tprice;
        $insert->mobile_id = $request->mobile_id;
        $insert->desc = $request->desc;
        $insert->save();
        $status = 'Successfully Done';
        //return back()->with(['status' => $status]);
        return redirect("/")->with(Session::flash('message', "Addcart Succesfully...")); 
    }

    public function requestCompare(Request $request)
    {

        $sid = Session::get('id');
        $insert = new Compare();
        $insert->user_id = $sid;
        $insert->status = 0;
        $insert->title = $request->title;
        $insert->company = $request->company;
        $insert->variance = $request->variance;
        $insert->image = $request->image;
        $insert->mobile_id = $request->mobile_id;
        $insert->desc = $request->desc;
        $insert->color = $request->color;
        $insert->type = $request->type;
        $insert->save();
        return redirect("compare");
    }

    public function compare()
    {
        $data['data'] = Compare::get();
        $data['title'] = Compare::get();
        $data['color'] = Compare::get();
        $data['add_cart'] = Compare::get();
        $data['desc'] = Compare::get();
        $data['avl'] = Compare::get();
        $data['battery'] = Compare::get();
        $data['variant'] = Compare::get();
        return view("userDashborad/compare",$data);
    }

    public function showAddcart()
    {
        $sid = Session::get('id');
        $data['profile'] = UserLogin::where("id",$sid)->first();
        $data['data'] = Addcart::get()->where('user_id', $sid)->where('status',0);
        $data['count'] = Addcart::get()->where('user_id', $sid)->where('status',0)->count();
        $data['sum'] = Addcart::where('user_id', $sid)->where('status', 0)->sum('price');

        return view("userDashborad/show_addcart",$data);
    }

    public function updatecart(Request $request)
    {
        $qtymi = AddMi::where("id", $request->mobile_id)->first();
        $data = $qtymi->quantity;
        if($data>=$request->addQty) {
            $upadteqty = Addcart::where("id", $request->id)->first();
            $upadteqty->addQty = $request->addQty;
            $upadteqty->price = $request->price * $request->addQty;   
            $update = $upadteqty->update();
            return response()->json($update);
        } 
               
    }

    public function deleteCompare($id)
    {
        $delete = Compare::where("id",$id)->first();
        $delete->delete();
        return redirect("compare");
    }

    public function DeleteAddCart($id)
    {
        $delete =Addcart::where("id",$id)->first();
        $delete->delete();
        return redirect("showAddcart"); 
    }

    public function allCartData(Request $request)
    {   
        $sid = Session::get('id'); 
        $product_id = rand(10,100000); 
        foreach(json_decode($request->allCartData) as $insData) {
          
            $insert = new allCartData();
            $insert->product_id = "#".$product_id;
            $insert->price = $insData->price;
            $insert->title = $insData->title;
            $insert->variance = $insData->variance;
            $insert->company = $insData->company;
            $insert->quantity = $insData->quantity;
            $insert->image = $insData->image;
            $insert->status  = $insData->status = 1;
            $insert->user_id = $insData->user_id;
            $insert->mobile_id = $insData->mobile_id;
            $insert->addQty = $insData->addQty;
            $insert->save();
            
        }
        
        return redirect("delivery")->with("product_id",$product_id);
    }

    public function order()
    {
        $sid = Session::get('id');
        $data['profile'] = UserLogin::where("id",$sid)->first();
        $data['data'] = DB::table('deliveries')
        ->join('all_cart_data','deliveries.product_id','all_cart_data.product_id')->get()->where('user_id', $sid);
        $data['count'] = Addcart::get()->where('user_id', $sid)->where('status',0)->count();
        return view("userDashborad/order",$data);
    }

    public function wishlist($id , $type)
    {
        $sid = Session::get('id');
        if (HomeImage::where("id",$id)->where('type',$type)->first()) {

            $data['data'] = HomeImage::where("id",$id)->where('type',$type)->first();
            $data['count'] = Addcart::get()->where('user_id', $sid)->where('status',0)->count();
            $data['profile'] = UserLogin::where("id",$sid)->first();
            // $data['var'] = WishlistWarince::where("id", $id)->get(); 
            return view("userDashborad/Add_to_wishlist",$data);

        } elseif (AddMi::where("id",$id)->where('type',$type)->first()) {

            $data['data'] = AddMi::where("id",$id)->where('type',$type)->first();
            $data['count'] = Addcart::get()->where('user_id', $sid)->where('status',0)->count();
            $data['profile'] = UserLogin::where("id",$sid)->first();
            // $data['var'] = WishlistWarince::where("id", $id)->get(); 
            return view("userDashborad/Add_to_wishlist",$data);

        } elseif (AddApple::where("id",$id)->where('type',$type)->first()) {

            $data['data'] = AddApple::where("id",$id)->where('type',$type)->first();
            $data['count'] = Addcart::get()->where('user_id', $sid)->where('status',0)->count();
            $data['profile'] = UserLogin::where("id",$sid)->first();
            $data['var'] = WishlistWarince::where("id", $id)->get(); 
            return view("userDashborad/Add_to_wishlist",$data);

        } elseif (Addvivo::where("id",$id)->where('type',$type)->first()) {

            $data['data'] = Addvivo::where("id",$id)->where('type',$type)->first();
            $data['count'] = Addcart::get()->where('user_id', $sid)->where('status',0)->count();
            $data['profile'] = UserLogin::where("id",$sid)->first();
            $data['var'] = WishlistWarince::where("id", $id)->get(); 
            return view("userDashborad/Add_to_wishlist",$data);

        } elseif (AddRealme::where("id",$id)->where('type',$type)->first()) {

            $data['data'] = AddRealme::where("id",$id)->where('type',$type)->first();
            $data['count'] = Addcart::get()->where('user_id', $sid)->where('status',0)->count();
            $data['profile'] = UserLogin::where("id",$sid)->first();
            // $data['var'] = WishlistWarince::where("id", $id)->get(); 
            return view("userDashborad/Add_to_wishlist",$data);

        } elseif (AddOppo::where("id",$id)->where('type',$type)->first()) {

            $data['data'] = AddOppo::where("id",$id)->where('type',$type)->first();
            $data['count'] = Addcart::get()->where('user_id', $sid)->where('status',0)->count();
            $data['profile'] = UserLogin::where("id",$sid)->first();
            $data['var'] = WishlistWarince::where("id", $id)->get(); 
            return view("userDashborad/Add_to_wishlist",$data);
        }
        
    }

    public function requestWishlist(Request $request)
    {
        $sid = Session::get('id');
        $insert = new Wishlist();
        $insert->user_id = $sid;    
        $insert->title = $request->title;
        $insert->quantity = $request->quantity;
        $insert->company = $request->company;
        $insert->image = $request->image;
        $insert->mobile_id = $request->mobile_id;
        $insert->desc = $request->desc;
        $insert->type = $request->type;
        $insert->save();
        $status = 'Successfully Done';
        //return back()->with(['status' => $status]);
        return redirect("/")->with(Session::flash('message', "Add wishlist Succesfully...")); 

    }

    public function viewWishlist()
    {
        $sid = Session::get('id');
        $data['profile'] = UserLogin::where("id",$sid)->first();
        $data['data'] = Wishlist::get();
        $data['count'] = Addcart::get()->where('user_id', $sid)->where('status',0)->count();
        return view("userDashborad/viewWishlist",$data);
    }

    public function variancemi($id, $idd, $type)
    {
        if (variance::where("id", $idd)->where("type",$type)->first()) {
            $variance = variance::where("id", $idd)->first();
            return response()->json($variance);

        } elseif (homevariance::where("id", $idd)->where("type", $type)->first()) {
            $homevariance = homevariance::where("id", $idd)->first();
            return response()->json($homevariance);

        } elseif (OppoVariance::where("id", $idd)->where("type",$type)->first()) {
            $Oppovariance = OppoVariance::where("id", $idd)->first();
            return response()->json($Oppovariance);

        } elseif (Applevariance::where("id",$idd)->where("type", $type)->first()) {
            $Applevariance = Applevariance::where("id", $idd)->first();
            return response()->json($Applevariance);

        } elseif (VivoVariance::where("id",$idd)->where("type",$type)->first()) {
            $VivoVariance = VivoVariance::where("id",$idd)->first();
            return response()->json($VivoVariance);

        } elseif (RealmeVariance::where("id",$idd)->where("type",$type)->first()) {
            $RealmeVariance = RealmeVariance::where("id",$idd)->first();
            return response()->json($RealmeVariance);

        } else {
            $msg = "Sorry Data Not Available";
            return response()->json($msg);
        } 
          
    }

    public function profile($idd)
    {
        $data = UserLogin::where("id",$idd)->first();
        return response()->json($data);
    }

    public function profileAddcrat($id, $idd)
    {
        $data = UserLogin::where("id",$idd)->first();
        return response()->json($data);
    }
}
                                                                                                                                                                                             