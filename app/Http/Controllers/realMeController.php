<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AddRealme;
use App\RealmeVariance;

class realMeController extends Controller
{
    public function realMe()
    {
    	$data['data'] = AddRealme::get();
        $data['var'] = AddRealme::get();
        return view("Admin/RealMe/add_realme",$data);
    }

    public function addRealmeRequest(Request $request)
    {
    	$insert = new AddRealme();
    	$insert->title = $request->title;
        $insert->type = "005REALME";
        $insert->company = $request->company;
        $imagePath = $request->file('image');
        $imageName = $imagePath->getClientOriginalName();
        $insert->image = $request->file('image')->storeAs('uploads', $imageName, 'public');
        $insert->quantity = $request->quantity;
        $insert->price = $request->price;
        $insert->desc = $request->desc;
        $insert->save();
        $status = 'Successfully Done';
        //return back()->with(['status' => $status]);
        return redirect("realMe")->with(['status' => $status]);
    }

    public function realmeVariance(Request $request)
    {
        $insert = new RealmeVariance();
        $insert->title_id = $request->title;
        $insert->type = "005REALME";
        $insert->variance = $request->variance;
        $insert->price = $request->price;
        $insert->desc = $request->desc;
        $insert->save();
        $status = 'Successfully Done';
        //return back()->with(['status' => $status]);
        return redirect("realMe")->with(['status' => $status]);
    }
}
