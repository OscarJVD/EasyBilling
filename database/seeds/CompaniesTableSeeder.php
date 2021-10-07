<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
use App\Models\Company;

class CompaniesTableSeeder extends Seeder
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
            $company = new Company;
            $company->name = $faker->name;
            $company->address = $faker->address;
            $company->email = $faker->email;
            $company->nit = $faker->randomNumber();
            $company->phone = $faker->phoneNumber; // que raro
            $company->years_experiences = $faker->randomNumber();
            $company->status_id = 1;
            $company->save();
        }
    }
}
