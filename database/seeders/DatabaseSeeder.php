<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call([

            CategoriaSeeder::class,
            ProductoSeeder::class,
            VentaSeeder::class,
            
        ]);
    }
}
