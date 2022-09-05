<?php

namespace App\Imports;

use App\Models\UserCode;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersCodeImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        if ($row['user_code'] != null) {
            return new UserCode([
                'user_code' => $row['user_code'],
                'name' => $row['name'],
                'phone' => $row['phone'],
                'email' => $row['email'],
                'validation' => $row['validation'],
            ]);
        }
    }
}
