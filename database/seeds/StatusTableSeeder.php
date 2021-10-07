<?php

use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = array(
            ['name' => 'Activo', 'type_status_id' => 1],
            ['name' => 'Inactivo', 'type_status_id' =>1],
            ['name' => 'Con proveedor', 'type_status_id' =>3],
            ['name' => 'En bodega', 'type_status_id' =>3],
            ['name' => 'En sucursal', 'type_status_id' =>3],
            ['name' => 'Vendido', 'type_status_id' =>3],
            ['name' => 'Pendiente', 'type_status_id' =>3],
        );

        foreach($statuses as $value){
            $status = new Status;
            $status->name = $value['name'];
            $status->type_status_id = $value['type_status_id'];
            $status->save();
        }
    }
}
