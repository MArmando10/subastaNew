<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Image;
use App\Subasta;
use App\Product;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class SubastaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $products = product::orderBy('id', 'asc')->paginate(5);
        $anterior = [];
        $Users = \App\User::all();

        return view('subasta.index',compact('products','Users','anterior'));
    }
    // else{

    //     return view('home3');
    // }


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

        $product = Auth::user()->products;
        // dd($products);
        // dd($product[0]->imagenes);
        if($product->count() == 0) {
            echo "entra";
        }

        // dd($imagenes);

        return view('subasta.show',compact('product'));
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


    public function search(Request $request){
        $product = product::where('categoria','like','%' .$busqueda. '%' )->paginate(4);

        return view('subasta.index',compact('product'));
    }
}
