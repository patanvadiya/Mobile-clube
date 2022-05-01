<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AddOppo;
use App\OppoVariance;

class OppoController extends Controller
{
    public function oppo()
    {
        $data['data'] = AddOppo::get();
        $data['var'] = AddOppo::get();
    	return view("Admin/OppoMobile/add_oppo",$data);
    }

    public function addOppoRequest(Request $request)
    {
    	$insert = new AddOppo();
    	$insert->title = $request->title;
        $insert->type = "004OPPO";
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
        return redirect("oppo")->with(['status' => $status]);
    }

    public function oppovariance(Request $request)
    {

        $insert = new OppoVariance();
        $insert->title_id = $request->title;
        $insert->type = "004OPPO";
        $insert->variance = $request->variance;
        $insert->price = $request->price;
        $insert->desc = $request->desc;
        $insert->save();
        $status = 'Successfully Done';
        //return back()->with(['status' => $status]);
        return redirect("oppo")->with(['status' => $status]);
    }


    // public function oppo_accessories()
    // {
    //     $data['data'] = miAccessoires::get();
    //     return view ("Admin/MiMobile/mi_accessories",$data);
    // }

}
