<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Imagen;
use App\Subasta;
use App\Product;
use Illuminate\Http\Request;

class SubastaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Auth::user()->products;
     
        return view('subasta.index',compact('products'));   
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subasta  $subasta
     * @return \Illuminate\Http\Response
     */
    public function show(Subasta $subasta, Request $request)
    {        
        $products = Product::where('id', '=', $request->input('product_id'))->get();
        // dd($subasta);
        if($products->count() == 1) {
            $product = $products[0];
            echo "entra";
        }
        return view('subasta.index',compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subasta  $subasta
     * @return \Illuminate\Http\Response
     */
    public function edit(Subasta $subasta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subasta  $subasta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subasta $subasta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subasta  $subasta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subasta $subasta)
    {
        //
    }
}
