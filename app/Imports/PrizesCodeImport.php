<?php

namespace App\Imports;

use App\Models\Prize;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PrizesCodeImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        if (! (array_key_exists('prize_code', $row)
                && array_key_exists('prize_name', $row)
                && array_key_exists('total_count', $row)
                && array_key_exists('remaining', $row))) {
            session()->flash('importError', true);
            return;
        }

        if ($row['prize_code'] != null) {
            $prizecodes = Prize::all();

            $import = true;
            foreach ($prizecodes as $prizecode) {
                if ($row['prize_code'] == $prizecode->prize_code
                    || $row['prize_name'] == $prizecode->prize_name
                    || $row['total_count'] == $prizecode->total_count
                    || $row['remaining'] == $prizecode->remaining) {
                    $import = false;
                }
            }

            if ($import) {
                return new Prize([
                    'prize_code' => $row['prize_code'],
                    'prize_name' => $row['prize_name'],
                    'total_count' => $row['total_count'],
                    'remaining' => $row['remaining'],
                ]);
            }
        }
    }
}
