<?php

use Illuminate\Database\Seeder;

// COMPONENTE GENERADO DE DATOS ALEATORIOS
use Faker\Factory as Faker;

// PARA GENERAR NUEVOS USUARIOS
use App\Models\Provider;

class ProvidersTableSeeder extends Seeder
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
            $provider = new Provider;
            $provider->name = $faker->name;
            $provider->address = $faker->address;
            $provider->phone = $faker->phoneNumber;
            $provider->nit = $faker->randomNumber();
            $provider->status_id = 1;
            $provider->save();
        }
    }
}
