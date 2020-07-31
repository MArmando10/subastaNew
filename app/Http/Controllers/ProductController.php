<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Offers;
use Session;
use App\Image;
use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Cache;
use Illuminate\Pagination\LengthAwarePaginator;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Product $product)
    {
        
            // dd("entro");
            $products = Product::orderBy('id','DESC')->paginate(6);
            $Product = \App\Product::all();
            $offer = \App\Offers::all();
            $Users = \App\User::all();
        
            return view('products.index',compact('Users','Product','products','offer'));
        }   
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // dd($request);
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product)
    {
        if ($request->user())
        {
        $request->validate([ 
            'titulo' => 'required',
            'categoria'=>'required',
            'condicion'=>'required',
            'marca'=>'required',
            'descripcion'=>'required',
            'duracion'=>'required',
            'fechaInicio'=>'required',
            'precioInicial'=>'required',
            'precioReserva'=>'required',
            'cantidad'=>'required',
            // 'refundSwitch'=>'required',
            'Destino'=>'required',
            'Alto'=>'required',
            'Ancho'=>'required',
            'Largo'=>'required',
            'Peso'=>'required',
            'geografi' => 'required',
            'images' => 'required',  
            ]);
        //dd($request);
        $files = $request->file('images');

        
        $producto = new Product();
          
        $producto->titulo  =request()->input('titulo');
        $producto->categoria =request()->input('categoria');
        $producto->condicion =request()->input('condicion');
        $producto->marca =request()->input('marca');
        $producto->descripcion =request()->input('descripcion');
        $producto->duracion =request()->input('duracion');
        $producto->fechaInicio =request()->input('fechaInicio');
        $producto->fechaFinal =request()->input('fechaFinal');
        $producto->precioInicial =request()->input('precioInicial');
        $producto->precioReserva =request()->input('precioReserva');
        $producto->cantidad =request()->input('cantidad');
        $producto->Destino =request()->input('Destino');
        $producto->Alto =request()->input('Alto');
        $producto->Ancho =request()->input('Ancho');
        $producto->Largo =request()->input('Largo');
        $producto->Peso =request()->input('Peso');
        $producto->geografi =request()->input('geografi');
        $producto->user_id = Auth::user()->id;

        $producto->save();

        foreach ($files as $file) {
            //dd($file);
            $archivo = Storage::putFile('storage', new File($file));
            //dd($file);
            $imagen = new image();
            $imagen->nombre = $file->getClientOriginalName();
            $imagen->url = $archivo;
            $imagen->product_id = $producto->id;
            
            $imagen->save();
        }
            return redirect()->route('product.index');
    }
    else {
        // dd('entra otra');  
        return view('home3'); 
        // return view('home3');
     }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $now = now();
        $ofer = \App\Offers::all();
        $oferta_maxima = $product->ofertas()->max('oferta');

        return view('products.show',compact('product','now', 'oferta_maxima','ofer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }



    function searchBuscar(Request $request) {

        Session::forget('message');    
        $anterior = $request->all();
        if($request->categoria != "" )
        {    
           $producto = producto::when($request->categoria,function($query,$request){return $query->where('categoria','like', $request .'%');})
           ->orderBy('categoria', 'ASC')
           ->paginate(10)
           ->setPath ( '' );
            $producto->appends ( array (
            'categoria ' => $request->categoria
            ) );
         }
             if(isset($producto)){
               $count = $producto->total();
             }else{
                 $count = 0;
              }

             if ($count  > 0){
                 Session::flash('message','Se encontraron '.$count.' registros en la busqueda.');
      
                return view('products.index',compact('productos','anterior'));
             }
             else{
                 Session::flash('message','No se encontraron registros en la busqueda.');
      
                         return view('products.index',compact('anterior'));
             }
          return redirect()->route('products.productsView');
        }



        public function getLicenseExpireAttribute($tiempo)
        {
            return Carbon::parse($tiempo);
        }

}
