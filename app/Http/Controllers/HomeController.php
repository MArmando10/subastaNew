<?php

namespace App\Http\Controllers;

use DB;
use App\Product;
use \App\Offers;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

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
        // $product = \App\Product::paginate(15);

        $bestOffers = collect();
        $products = Product::all();

        foreach($products as $product){
            if(count($product->ofertas) > 0){
                $bestOffers->push($product->ofertas()->orderBy('oferta', 'desc')->first());
            }
        }

        $bestOffers = $bestOffers->sortBy('oferta');

        $users = \App\User::all();
        // dd($users);
        $anterior = [];
        return view('home3',compact('anterior','products','users','bestOffers'));
    }

}
