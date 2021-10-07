<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TypeStatusTableSeeder::class);
        $this->call(StatusTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(ClientsTableSeeder::class);
        $this->call(ShopsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(CompaniesTableSeeder::class);
        $this->call(ProvidersTableSeeder::class);
        $this->call(BillsTableSeeder::class);
    }
}
