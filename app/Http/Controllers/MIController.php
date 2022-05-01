<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AddMi;
use App\variance;
use DB;
use App\miAccessoires;

class MIController extends Controller
{
    //

    public function MiAddImage()
    {
    	$data['data'] = AddMi::get();
        $data['var'] = variance::get();
    	return view('Admin/MiMobile/Add_mi_mobile',$data);
    }

    public function addMiMobileImage(Request $request)
    {
    	$insert = new AddMi();
    	$insert->title = $request->title;
        $insert->brand = $request->brand;
        $insert->type = "001MI";
        $imagePath = $request->file('image');
        $imageName = $imagePath->getClientOriginalName();
        $insert->image = $request->file('image')->storeAs('uploads', $imageName, 'public');
        $insert->quantity = $request->quantity;
        $insert->price = $request->price;
        $insert->desc = $request->desc;
        $insert->save();
        $status = 'Successfully Done';
        //return back()->with(['status' => $status]);
        return redirect("MiAddImage")->with(['status' => $status]);
    }

    public function updateMiImag($id)
    {
    	$data['data'] = AddMi::where("id",$id)->first();
    	return view('Admin/MiMobile/updateMiImage',$data);
    }

    public function RequestupdateMiImage(Request $request)
    {
        $update = AddMi::where("id",$request->id)->first();
        $update->title = $request->title;
        $update->quantity = $request->quantity;
        $update->price = $request->price;
        $update->desc = $request->desc;
        $update->update();
        return redirect("MiAddImage")->with("status","Data Update Sucessfully");
    }

    public function variance()
    {
        $data['var'] = AddMi::get();
        //$data['data'] = variance::get();
        $data['data'] = DB::table('add_mis')
        ->join('variances','add_mis.id','variances.title_id')->get();
        return view("Admin/MiMobile/variance",$data);
    }

    public function addVariance(Request $request)
    {

        $insert = new variance();
        $insert->title_id = $request->title;
        $insert->type = "001MI";
        $insert->variance = $request->variance;
        $insert->price = $request->price;
        $insert->desc = $request->desc;
        $insert->save();
        return redirect("variance");
    }

    public function mi_accessories()
    {
        $data['data'] = miAccessoires::get();
        return view ("Admin/MiMobile/mi_accessories",$data);
    }

    public function addMIAccessorieRequest(Request $request)
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
