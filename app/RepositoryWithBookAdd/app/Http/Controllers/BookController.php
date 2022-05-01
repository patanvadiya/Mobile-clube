<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Repositories\BookInterface;
use App\Repositories\AddCartInterface;
use Illuminate\Routing\Route;
use App\AddCart;
use App\User;
use App\Book;
error_reporting(1);
class BookController extends Controller
{
    private $bookRepo;
    public function __construct(BookInterface $bookRepo, AddCartInterface $AddCartBook){

        $this->bookRepo = $bookRepo;
        $this->AddCartBook = $AddCartBook;
    }

    public function book(Request $request)
    {
    	$imagePath = $request->file('image');
    	$imageName = $imagePath->getClientOriginalName();
    	$this->bookRepo->create([
            'title'  =>  $request->get('title'),  
            'image'  =>  $request->file('image')->storeAs('uploads', $imageName, 'public'), 
            'quantity'  =>  $request->get('quantity'),
            'date'  =>  $request->get('date'),
            'price'  =>  $request->get('price'),
        ]);
        return redirect("home");
    }

    public function showBook($id)
    {
       $data['data'] =  $this->bookRepo->showBook($id);
       return view("showBook",$data);
    }

    public function AddCartbook(Request $request)
    {
        $user_id = auth()->user()->id;
        if ($this->AddCartBook->AddCartShowData()->where('title', $request->title)->first()) {
            $updateAddCart = $this->AddCartBook->AddCartShowData()->where('b_id', $request->b_id)
                ->where('user_id', $user_id)->first();
            $updateAddCart->addQty = $updateAddCart->addQty + 1;
            $updateAddCart->price = $updateAddCart->price + $request->price;
            $updateAddCart->status = 0;
            $updateAddCart->update();
            // return redirect("cuser/home");
        } else {

            $this->AddCartBook->create([
            'price'  =>  $request->get('price'),  
            'image' => $request->get('image'), 
            'quantity'  =>  $request->get('quantity'),
            //'addQty'  =>  $request->get('addQty'),
            'title'  =>  $request->get('title'),
            'status'  =>  0,
            'b_id'  =>  $request->get('b_id'),
            'user_id'  =>  $user_id,
            ]);
        }
        return redirect("cuser/home");
    }

    public function AddCartShowBook()
    {
        $user_id = auth()->user()->id;
        $data['data'] = $this->AddCartBook->AddCartShowData()->Where('status', 0)->Where('user_id',$user_id);
        return view("AddCartShowBook", $data);
    }

    public function buyBook($user_id)
    {
        
        $RelationUser =  User::find($user_id)->user;
        foreach ($RelationUser as  $cart_items) {
            
            $data = $this->bookRepo->getAll()->where('id', $cart_items->b_id)->first();
            $data->quantity = $data->quantity - $cart_items->addQty;
            $data->update();
        }

        $minusQty = Addcart::where('user_id', $user_id)->first();
        $minusQty->quantity -= $minusQty->addQty;
        $minusQty->save();
        AddCart::where('user_id', $user_id)->update(['status' => 1]);
        AddCart::where('user_id', $user_id)->update(['addQty' => 0]);
        return redirect("cuser/home");
    }

    public function delete($id)
    {
        $this->AddCartBook->delete($id);
        return redirect("AddCartShowBook");
    }

    public function bookDelete($id)
    {
        $data  = $this->AddCartBook->AddCartShowData()->where('b_id', $id)->first();
        if ($data) {
            $data->delete();
        } else {
            $this->bookRepo->delete($id);    
        }
        return redirect("home");
    }
}
