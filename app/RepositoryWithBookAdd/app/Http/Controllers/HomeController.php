<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepositoryInterface;
use App\Repositories\BookInterface;
use App\Repositories\AddCartInterface;
class HomeController extends Controller
{
    private $userRepo;
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserRepositoryInterface $userRepo, BookInterface $bookRepo, AddCartInterface $AddcartData)
    {
        $this->middleware('auth');
        $this->userRepo = $userRepo;
        $this->bookRepo = $bookRepo;
        $this->AddcartData = $AddcartData;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['data'] = $this->bookRepo->getAll();
        return view('home', $data);
    }

    public function handleAdmin()
    {
        $data['data'] = $this->userRepo->getAll()->where('is_admin', 0);
        return view('handleAdmin', $data);
    }

    public function handleCuser()
    {
        $data['data'] = $this->bookRepo->getAll();
        $data['count'] = $this->AddcartData->AddCartShowData()->where('status', 0)->count();
        return view("cuser", $data);
    }    
}