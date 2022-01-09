<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 62);
            $table->string('descripcion')->nullable();
            $table->float('precio');
            $table->float('costo')->nullable()->default(0);
            $table->tinyInteger('almacenable')->default(0);
            $table->tinyInteger('vendible')->default(0);
            $table->tinyInteger('comprable')->default(0);
            $table->tinyInteger('tipo')->comment('0: Producto, 1: Servicio');
            $table->json('propiedades')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('productos');
    }
}
