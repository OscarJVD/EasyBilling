<?php

use Illuminate\Database\Seeder;

// COMPONENTE GENERADO DE DATOS ALEATORIOS
use Faker\Factory as Faker;

// PARA GENERAR NUEVOS USUARIOS
use App\Models\Shop;

class ShopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i = 0; $i < 10; $i++) {
            $shop = new Shop;
            $shop->name = $faker->name;
            $shop->address = $faker->address;
            $shop->email = $faker->email;
            $shop->phone = $faker->randomNumber();
            $shop->nit = $faker->randomNumber();
            $shop->status_id = 1;
            $shop->save();
        }
    }
}
