<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Addvivo;
use App\VivoVariance;

class VivoController extends Controller
{
    public function vivo()
    {
    	$data['data'] = Addvivo::get();
        $data['var'] = Addvivo::get();
        return view("Admin/vivoMobile/add_vivo_mobil",$data);
    }

    public function addVivoRequest(Request $request)
    {
    	$insert = new Addvivo();
    	$insert->title = $request->title;
        $insert->type = "006VIVO";
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
        return redirect("vivo")->with(['status' => $status]);
    }

    public function vivovariance(Request $request)
    {

        $insert = new VivoVariance();
        $insert->title_id = $request->title;
        $insert->type = "006VIVO";
        $insert->variance = $request->variance;
        $insert->price = $request->price;
        $insert->desc = $request->desc;
        $insert->save();
        $status = 'Successfully Done';
        //return back()->with(['status' => $status]);
        return redirect("vivo")->with(['status' => $status]);
    }
}
