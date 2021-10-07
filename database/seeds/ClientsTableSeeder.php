<?php

use Illuminate\Database\Seeder;

// COMPONENTE GENERADO DE DATOS ALEATORIOS
use Faker\Factory as Faker;

// PARA GENERAR NUEVOS USUARIOS
use App\Models\Client;

class ClientsTableSeeder extends Seeder
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
            $client = new Client;
            $client->name = $faker->name;
            $client->email = $faker->email;
            $client->surname = $faker->name;
            $client->identification_type = $faker->name;
            $client->identification_number = $faker->randomNumber();
            $client->address = $faker->address;
            $client->phone = $faker->randomNumber();
            $client->status_id = 1;
            $client->save();
        }
    }
}
