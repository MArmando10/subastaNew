<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Images;
use App\Offers;
use App\Product;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class OffersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ofertas = \App\Oferta::paginate(4);
        $products = Product::where('id', '=', $request->input('product_id'))->get();  //DB::table('products')->where('id', '=', $request->input('product_id'))->get();
        $ofertas = $products[0]->ofertas;
        //dd($);
        //dd($product[0]->ofertas);
        //$ofertas = $product[0]->ofertas;
        return view('ofertas.index',compact('ofertas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'oferta' => 'required',
        ]);
            $oferta = new Offers();
            $oferta->user_id = \Auth::user()->id;
            //$oferta->product_id = \Auth::user();
            $oferta->product_id =request()->input('product_id');
            $oferta->oferta = request()->input('oferta');
            // $oferta = Input::get('oferta', 'default oferta');
            $oferta -> save();
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Images  $images
     * @return \Illuminate\Http\Response
     */
    public function show(Images $images)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Images  $images
     * @return \Illuminate\Http\Response
     */
    public function edit(Images $images)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Images  $images
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Images $images)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Images  $images
     * @return \Illuminate\Http\Response
     */
    public function destroy(Images $images)
    {
        //
    }
}
