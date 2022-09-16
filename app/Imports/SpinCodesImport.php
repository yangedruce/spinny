<?php

namespace App\Imports;

use App\Models\SpinCode;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SpinCodesImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        if (! array_key_exists('code', $row) || count($row) > 2) {
            session()->flash('importError', true);
            return;
        }
        
        if ($row['code'] != null) {
            $spinCodes = SpinCode::all();

            $import = true;
            foreach ($spinCodes as $spinCodes) {
                if ($row['code'] == $spinCodes->code) {
                    $import = false;
                }
            }

            if ($import) {
                return new SpinCode([
                    'code' => $row['code'],
                    'validation' => false,
                ]);
            }
        }
    }
}
