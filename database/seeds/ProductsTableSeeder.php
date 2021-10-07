<?php

use Illuminate\Database\Seeder;

// COMPONENTE GENERADO DE DATOS ALEATORIOS
use Faker\Factory as Faker;

// PARA GENERAR NUEVOS USUARIOS
use App\Models\Product;

class ProductsTableSeeder extends Seeder
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
            $product = new Product;
            $product->name = $faker->name;
            $product->description = $faker->realText();
            $product->purchase_price = $faker->randomFloat();
            $product->sale_price = $faker->randomFloat();
            $product->stock = $faker->randomNumber();
            $product->iva = 19;
            $product->user_id = $faker->numberBetween($min = 2, $max = 10); // que raro
            $product->category_id = $faker->numberBetween($min = 1, $max = 10); // que raro
            $product->status_id = 1;
            $product->save();
        }
    }
}
