<?php

namespace App\Imports;

use App\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return User|null
     */
    public function model(array $row)
    {

        foreach ($row as $r) {
            if (!empty($r)) {
                return new User([
                    'name'     => $row[0],
                    'email'    => $row[1],
                    'password' => Hash::make($row[2]),
                    'status_id' => $row[3],
                    'role_id'  => $row[4]
                ]);
            }
        }
    }
}
