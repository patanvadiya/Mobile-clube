<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AddApple;
use App\Applevariance;
use App\AppleAccssories;

class AppleController extends Controller
{
    public function apple()
    {
        $data['data'] = AddApple::get();
        $data['var'] = AddApple::get();
    	return view("Admin/AppleMobile/add_apple",$data);
    }

    public function addAppleRequest(Request $request)
    {
    	$insert = new AddApple();
    	$insert->title = $request->title;
        $insert->company = $request->company;
        $insert->type = "002Apple";
        $imagePath = $request->file('image');
        $imageName = $imagePath->getClientOriginalName();
        $insert->image = $request->file('image')->storeAs('uploads', $imageName, 'public');
        $insert->quantity = $request->quantity;
        $insert->price = $request->price;
        $insert->desc = $request->desc;
        $insert->save();
        $status = 'Successfully Done';
        //return back()->with(['status' => $status]);
        return redirect("apple")->with(['status' => $status]);
    }

    public function addAppleVarianceRequest(Request $request)
    {

        $insert = new Applevariance();
        $insert->title_id = $request->title;
        $insert->type = "002Apple";
        $insert->variance = $request->variance;
        $insert->price = $request->price;
        $insert->desc = $request->desc;
        $insert->save();
        $status = 'Successfully Done';
        //return back()->with(['status' => $status]);
        return redirect("apple")->with(['status' => $status]);
    }

    public function appleAccesories()
    {
        $data['data'] = AppleAccssories::get();
        return view("Admin/AppleMobile/apple_Accessories",$data);
    }

    public function addAppleAccessorieRequest(Request $request)
    {
        $insert = new miAccessoires();
        $insert->company = $request->company;
        $insert->title = $request->title;
        $insert->type = "001MIACCS";
        $insert->price = $request->price;
        $imagePath = $request->file('image');
        $imageName = $imagePath->getClientOriginalName();
        $insert->image = $request->file('image')->storeAs('uploads', $imageName, 'public');
        $insert->qantity = $request->quantity;
        $insert->desc = $request->desc;
        $insert->save();
        return redirect("miAccessories");
    }
}
