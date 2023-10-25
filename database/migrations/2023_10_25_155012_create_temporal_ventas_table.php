<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temporal_ventas', function (Blueprint $table) {
            $table->id();
            $table->integer('id_producto');
            $table->integer('cantidad');
            $table->float('precio_unidad');
            $table->string('codigo');
            $table->float('subtotal');
         
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
        Schema::dropIfExists('temporal_ventas');
    }
};
