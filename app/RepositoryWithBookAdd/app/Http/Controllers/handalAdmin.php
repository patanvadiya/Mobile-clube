<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Repositories\UserRepositoryInterface;

class handalAdmin extends Controller
{
    private $userRepo;
    public function __construct(UserRepositoryInterface $userRepo){

        $this->userRepo = $userRepo;
    }

	public function Store_data(Request $request)
    {
        $random =  rand();
        $ran = Hash::make($random);
        // $insert = new User();
        // $insert->password = $ran;
        // $insert->save();

        //$this->userRepo->create($request->only(['password' => $ran],$this->userRepo->getModel()->fillable));

        $this->userRepo->create([
            'name'  =>  $request->get('name'),
            'email'  =>  $request->get('email'),
            'is_admin'  =>  0,
            'password'  =>  $ran
        ]); 

        $to_name = $request->get('name');
        $to_email = $request->get('email');
        $data = array('name'=>"Author Login Email Id And Password", 'email' => $request->get('email'),'body' =>  $random);
        Mail::send('mail', $data, function ($message) use ($to_name, $to_email) {

            $message->to($to_email)->subject('You Are Add please Login below Pass And curret Email Id');

        });
        return redirect('admin/home');  
    }

    public function storeBook(Request $request)
    {
         $this->userRepo->create([
            'name'  =>  $request->get('name'),
            'email'  =>  $request->get('email'),
            'is_admin'  =>  0,
            'password'  =>  $ran
        ]);
    }
 
}
