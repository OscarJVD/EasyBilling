<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductsImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return Product|null
     */
    public function model(array $row)
    {
        foreach ($row as $r) {
            // dd($row[1]);
            // dd($row[0]);
            if (!empty($r)) {
                return new Product([
                    'name'          => $row[0],
                    'description'   => $row[1],
                    'purchase_price'=> $row[2],
                    'sale_price'    => $row[3],
                    'stock'         => $row[4],
                    'iva'           => $row[5],
                    'status_id'     => $row[6],
                    'user_id'       => $row[7],
                    'category_id'   => $row[8]
                ]);
            }
        }
    }
}
