<?php

namespace App\Http\Controllers;

use App\Product;
use \App\Image;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $isGame = true;
        $product = \App\Product::all();
        $Users = \App\User::all();
        $anterior = [];
        return view('home3',compact('anterior','product','Users'));
    }


}
