<?php

use Illuminate\Database\Seeder;

// COMPONENTE GENERADO DE DATOS ALEATORIOS
use Faker\Factory as Faker;

// PARA GENERAR NUEVOS USUARIOS
use App\Models\Bill;

class BillsTableSeeder extends Seeder
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
            $bill = new Bill;
            $bill->date_bill = $faker->dateTime();
            $bill->discount = $faker->randomNumber();
            $bill->way_to_pay = $faker->name;
            $bill->total = $faker->randomFloat();
            $bill->user_id = $faker->numberBetween($min = 2, $max = 10); // que raro
            $bill->client_id = $faker->numberBetween($min = 1, $max = 10); // que raro
            $bill->status_id = 1;
            $bill->save();
        }
    }
}
