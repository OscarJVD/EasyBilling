<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = array(
            ['name' => 'Administrador','status_id' => 1],
            ['name' => 'Empresa','status_id' => 1],
            ['name' => 'Proveedor','status_id' => 1],
            ['name' => 'Bodeguero','status_id' => 1],
            ['name' => 'Sucursal','status_id' => 1]
        );

        foreach($roles as $value){
            $role = new Role;
            $role->name = $value['name'];
            $role->status_id = $value['status_id'];
            $role->save();
        }
    }
}
