<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Producto;
use App\Models\Categoria;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;


class ProductoSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();
        $categoriasIds = Categoria::pluck('id')->toArray();
        $arrays = range(0, 29);

        foreach ($arrays as $indice) {
            $idAleatorio = $categoriasIds[array_rand($categoriasIds)];
            DB::table('productos')->insert([               
                'categoria_id' => $idAleatorio,
                'nombre' => $faker->word,
                'referencia' => $faker->regexify('[A-Za-z0-9]{8}'),
                'precio' => $faker->numberBetween($min = 100, $max = 200),
                'peso' => $faker->numberBetween($min = 1, $max = 20),
                'stock' => $faker->numberBetween($min = 0, $max = 100),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
          ]);
        }
    }
}
