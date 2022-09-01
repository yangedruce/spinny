<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class GrandPrizeWinnersExport implements FromCollection, WithHeadings
{
    use Exportable;

    protected $grandprizewinners;

    public function __construct($grandprizewinners)
    {
        $this->grandprizewinners = $grandprizewinners;
    }

    public function collection()
    {
        $output = [];

        foreach ($this->grandprizewinners as $grandprizewinner) {
            $output[] = [
                $grandprizewinner->id,
                $grandprizewinner->code_id,
                $grandprizewinner->email,
                $grandprizewinner->month,
            ];
        }

        return collect($output);
    }

    public function headings(): array
    {
        return [
            'id',
            'code_id',
            'email',
            'month',
        ];
    }
}
