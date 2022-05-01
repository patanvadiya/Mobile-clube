<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HomeImage;
use App\homevariance;
use App\Wishlist;
use App\WishlistWarince;
use App\sumsungAccessoires;


class AdminController extends Controller
{
    public function homeImage()
    {
    	$data['data'] = HomeImage::get();
        $data['var'] = HomeImage::get();
    	return view("Admin/HomeImage/add_image",$data);
    }

    public function addHomeMobileImage(Request $request)
    {
         // $validatedData = $request->validate([
         //    'title' => 'required|unique:home_images',
         //    'quantity' => 'required|unique:home_images',
         // ]);

    	$insert = new HomeImage();
    	$insert->title = $request->title;
        $insert->type = "003HOME";
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
        return redirect("homeImage")->with(['status' => $status]);
    }

    public function updateHomeImage($id)
    {
        $data['data'] = HomeImage::where("id",$id)->first();
    	return view("Admin/HomeImage/updateHomeImage",$data);
    }

    public function RequestupdateHomeImage(Request $request)
    {
        $update = HomeImage::where("id",$request->id)->first();
        $update->title = $request->title;
        $update->quantity = $request->quantity;
        $update->price = $request->price;
        $update->desc = $request->desc;
        $update->update();
        return redirect("homeImage")->with("status","Data Update Sucessfully");
    }

    public function deleteHomeImage($id)
    {
        $delete = HomeImage::where("id",$id)->first();
        $delete->delete();
        return redirect("homeImage")->with("delete","Data Delete Sucessfully");
    }

    public function HomeAddVariance(Request $request)
    {

        $insert = new homevariance();
        $insert->title_id = $request->title;
        $insert->type = "003HOME";
        $insert->variance = $request->variance;
        $insert->price = $request->price;
        $insert->desc = $request->desc;
        $insert->save();
        $status = 'Successfully Done';
        //return back()->with(['status' => $status]);
        return redirect("homeImage")->with(['status' => $status]);
    }

    public function addWishlistVarince()
    {
        $data['var'] = Wishlist::get();
        return view("Admin/HomeImage/addWishvarince",$data);
    }

    public function WishlistAddVariance(Request $request)
    {
        $insert = new WishlistWarince();
        $insert->title_id = $request->title;
        $insert->type = "007wishlist";
        $insert->variance = $request->variance;
        $insert->price = $request->price;
        $insert->desc = $request->desc;
        $insert->save();
        $status = 'Successfully Done';
        //return back()->with(['status' => $status]);
        return redirect("addWishlistVarince")->with(['status' => $status]);
    }

    public function sumsungAccessories()
    {
        $data['data'] = sumsungAccessoires::get();

        return view("Admin/Sumsung/sumsung_Accessories",$data);
    }

     public function addsumsungAccessorieRequest(Request $request)
    {
        $insert = new sumsungAccessoires();
        $insert->company = $request->company;
        $insert->title = $request->title;
        $insert->type = $request->type;
        $insert->price = $request->price;
        $imagePath = $request->file('image');
        $imageName = $imagePath->getClientOriginalName();
        $insert->image = $request->file('image')->storeAs('uploads', $imageName, 'public');
        $insert->qantity = $request->quantity;
        $insert->desc = $request->desc;
        $insert->save();
        return redirect("sumsungAccessories");
    }

}
