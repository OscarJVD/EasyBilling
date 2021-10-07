<?php

use Illuminate\Database\Seeder;

// COMPONENTE GENERADO DE DATOS ALEATORIOS
use Faker\Factory as Faker;

// PARA GENERAR NUEVOS USUARIOS
use App\User;

// GENERAR CLAVES ENCRIPTADAS
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i=0; $i < 10; $i++) {
            $user = new User;
            $user->name = $faker->name;
            $user->surname = $faker->firstName();
            $user->identification_type = $faker->domainName;
            $user->identification_number = $faker->randomNumber();
            $user->address = $faker->address();
            $user->phone = $faker->randomNumber();
            $user->date_birth = $faker->dateTime();
            $user->email = $faker->email;
            $user->password = Hash::make('test123');
            $user->status_id = 1;
            $user->role_id = 1;
            $user->company_id = $faker->numberBetween($min = 1, $max = 10); // que raro
            $user->provider_id = $faker->numberBetween($min = 1, $max = 10); // que raro
            $user->shop_id = $faker->numberBetween($min = 1, $max = 10); // que raro
            $user->save();
        }
    }
}
