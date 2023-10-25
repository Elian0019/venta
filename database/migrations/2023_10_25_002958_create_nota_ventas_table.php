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
        Schema::create('nota_ventas', function (Blueprint $table) {
            $table->id();
            
            $table->date('fecha');
            $table->float('monto');
            $table->tinyInteger('activo')->default(1);
            $table->foreignId('id_cliente')->nullable()->constrained('clientes')->cascadeOnUpdate()->nullOnDelete(); //
           
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
        Schema::dropIfExists('nota_ventas');
    }
};
