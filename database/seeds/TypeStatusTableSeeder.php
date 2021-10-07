<?php

use Illuminate\Database\Seeder;
use App\Models\TypeStatus;

class TypeStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $typeStatus = array(
            ['name' => 'General'],
            ['name' => 'Usuario'],
            ['name' => 'Producto']
            // Si el tipo de estado es producto, osea 3 en algún estado se aplican filtros y condiciones
        );

        foreach ($typeStatus as $value) {
            $typeStatus = new TypeStatus;
            $typeStatus->name = $value['name'];
            $typeStatus->save();
        }
    }
}
