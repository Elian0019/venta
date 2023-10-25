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
        Schema::create('detalle_ventas', function (Blueprint $table) {
            $table->id();
            $table->float('precio_v');
            $table->integer('cantidad');
            $table->foreignId('id_notaventa')->nullable()->constrained('nota_ventas')->cascadeOnUpdate()->nullOnDelete(); //
            $table->foreignId('id_producto')->nullable()->constrained('productos')->cascadeOnUpdate()->nullOnDelete(); //
           
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
        Schema::dropIfExists('detalle_ventas');
    }
};
