<?php

namespace App\Imports;

use App\Models\UserCode;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersCodeImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        if (! (array_key_exists('user_code', $row)
                && array_key_exists('name', $row)
                && array_key_exists('phone', $row)
                && array_key_exists('email', $row)
                && array_key_exists('validation', $row))) {
            session()->flash('importError', true);
            return;
        }

        if ($row['user_code'] != null) {
            $usercodes = UserCode::all();

            $import = true;
            foreach ($usercodes as $usercode) {
                if ($row['user_code'] == $usercode->user_code
                    || $row['name'] == $usercode->name
                    || $row['phone'] == $usercode->phone
                    || $row['email'] == $usercode->email) {
                    $import = false;
                }
            }

            if ($import) {
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
}
