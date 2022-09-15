<?php

namespace App\Imports;

use App\Models\Prize;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PrizesImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        if (! (array_key_exists('code', $row)
                && array_key_exists('name', $row)
                && array_key_exists('total_count', $row)
                && array_key_exists('remaining', $row))) {
            session()->flash('importError', true);
            return;
        }

        if ($row['code'] != null) {
            $prizes = Prize::all();

            $import = true;
            foreach ($prizes as $prize) {
                if ($row['code'] == $prize->code
                    || $row['name'] == $prize->name
                    || $row['total_count'] == $prize->total_count
                    || $row['remaining'] == $prize->remaining) {
                    $import = false;
                }
            }

            if ($import) {
                return new Prize([
                    'code' => $row['code'],
                    'name' => $row['name'],
                    'total_count' => $row['total_count'],
                    'remaining' => $row['remaining'],
                ]);
            }
        }
    }
}
