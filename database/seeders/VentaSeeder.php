<?php

// Para nuestros datos de prueba la venta es de 1 a 3 articulos por producto, por lo que
// el precio de venta sera el producto de la cantidad y el precio individual
// Elegimos 30 productos en orden aleatorio y los llevamos a un Array
// Luego insertamos cada registro en la tabla ventas, simulando 30 ventas

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Venta;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Faker\Factory as Faker;
use App\Models\Producto;

class VentaSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        
        $productos = Producto::inRandomOrder()->take(30)->get()->toArray();
        foreach ($productos as $producto) {
             $vendidos = $faker->numberBetween($min = 1, $max = 4);
             DB::table('ventas')->insert([               
                 'producto_id' => $producto['id'],
                 'cantidad' => $vendidos,
                 'precio_total' => $producto['precio'] * $vendidos,
                 'created_at' => Carbon::now(),
                 'updated_at' => Carbon::now(),
          ]);

        };

    }
}