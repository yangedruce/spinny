<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SpinCodesExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    use Exportable;

    protected $spinCodes;

    public function __construct($spinCodes)
    {
        $this->spinCodes = $spinCodes;
    }

    public function collection()
    {
        $output = [];

        foreach ($this->spinCodes as $spinCode) {
            $output[] = [
                $spinCode->id,
                $spinCode->code,
                $spinCode->validation ? 'Yes' : 'No',
            ];
        }

        return collect($output);
    }

    public function headings(): array
    {
        return [
            'id',
            'code',
            'validation',
        ];
    }
}
