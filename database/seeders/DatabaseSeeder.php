<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Categoria;
use App\Models\cliente;
use App\Models\NotaVenta;
use Illuminate\Database\Seeder;
use App\Models\Paciente;
use App\Models\Producto;
use App\Models\Sala;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $c1=Categoria::create([
            'nombre' => 'computadoras'
        ]);
        $c2=Categoria::create([
            'nombre' => 'parlantes'
        ]);
        $c3=Categoria::create([
            'nombre' => 'impresoras'
        ]);

        Producto::create([
            'descripcion' => 'computadora hp',
            'precio' => 12.2,
            'stock' => 10,
            'id_categoria' => $c1->id
        ]);
        Producto::create([
            'descripcion' => 'computadora samsung intel core 9, tactil, 16 ram',
            'precio' => 11.2,
            'stock' => 9,

            'activo'=> 0,
            'id_categoria' => $c2->id
        ]);
        cliente::create([
            'nombre' => 'Elian Alvarez',
            'telefono' => '67875116',
            'direccion' => 'elian@gmail.com',
            'activo'=> 1,

        ]);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
