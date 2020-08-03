<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->integer('categoria_id');
            $table->integer('condicion');
            $table->string('marca');
            $table->string('descripcion');
            $table->integer('duracion');
            $table->datetime('fechaInicio');
            $table->datetime('fechaFinal');
            $table->float('precioInicial');
            $table->float('precioReserva');
            $table->integer('cantidad');
            // $table->boolean('refundSwitch');
            $table->string('Destino');
            $table->integer('Alto');
            $table->integer('Ancho');
            $table->integer('Largo');
            $table->integer('Peso');
            $table->string('geografi');
            $table->integer('status')->default(1);
            $table->foreignId('user_id');

            //$imagen->url = $request->input('url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
