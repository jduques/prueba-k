<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class CategoriaSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $cat = array('Electrónicos', 'Ropa', 'Alimentos', 'Hogar', 'Deportes', 'Juguetes', 'Belleza', 'Automóviles', 'Libros', 'Mascotas', 'Muebles', 'Electrodomésticos', 'Salud', 'Moda', 'Joyas', 'Informática', 'Jardinería', 'Arte', 'Viajes', 'Oficina');
        $arrays = range(0, 19);
        foreach ($arrays as $indice) {
          DB::table('categorias')->insert([               
             'nombre' => $cat[$indice],
             'created_at' => Carbon::now(),
             'updated_at' => Carbon::now(),
          ]);
        }
    }
}
