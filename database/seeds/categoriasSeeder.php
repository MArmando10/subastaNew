<?php

use Illuminate\Database\Seeder;
use App\Categoria;

class categoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // categoria
        $categoria = new Categoria();
        $categoria->nombre = "Auto";
        $categoria->save();

        // categoria
        $categoria = new Categoria();
        $categoria->nombre = "Alimentos y Bebidas";
        $categoria->save();

        // categoria
        $categoria = new Categoria();
        $categoria->nombre = "Deporte y Aire Libre";
        $categoria->save();

        // categoria
        $categoria = new Categoria();
        $categoria->nombre = "Hogar y Cocina";
        $categoria->save();

        // categoria
        $categoria = new Categoria();
        $categoria->nombre = "Juegos y Juguetes";
        $categoria->save();

        // categoria
        $categoria = new Categoria();
        $categoria->nombre = "Libros";
        $categoria->save();

        // categoria
        $categoria = new Categoria();
        $categoria->nombre = "Música";
        $categoria->save();

        // categoria
        $categoria = new Categoria();
        $categoria->nombre = "Ropa";
        $categoria->save();
            //subcategoria
            // $categoria = new Categoria();
            // $categoria->categoria = "Hombre";
            // $categoria->categoria = $categoria->id;
            $categoria->save();
            //subcategoria
            // $categoria = new Categoria();
            // $categoria->categoria = "Mujer";
            // $categoria->categoria = $categoria->id;
            // $categoria->save();

             // categoria
        $categoria = new Categoria();
        $categoria->nombre = "Software";
        $categoria->save();

        // categoria
        $categoria = new Categoria();
        $categoria->nombre = "Tecnología";
        $categoria->save();
    }
    }

