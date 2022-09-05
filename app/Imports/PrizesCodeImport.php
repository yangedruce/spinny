<?php

namespace App\Imports;

use App\Models\Prize;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PrizesCodeImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        if ($row['prize_code'] != null) {
            return new Prize([
                'prize_code' => $row['prize_code'],
                'prize_name' => $row['prize_name'],
                'total_count' => $row['total_count'],
                'remaining' => $row['remaining'],
            ]);
        }
    }
}
