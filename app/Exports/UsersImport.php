<?php

namespace App\Exports;

use App\Models\Product;
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
        print_r($row);
        return new Product([
           'name'     => $row[1],
           'user_id'     => $row[2],
           'detail'    => $row[3],
        ]);
    }
}
