<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PrizeWinnersExport implements FromCollection, WithHeadings
{
    use Exportable;

    protected $prizewinners;

    public function __construct($prizewinners)
    {
        $this->prizewinners = $prizewinners;
    }

    public function collection()
    {
        $output = [];

        foreach ($this->prizewinners as $prizewinner) {
            $output[] = [
                $prizewinner->id,
                $prizewinner->code_id,
                $prizewinner->prize_id,
                $prizewinner->email,
                $prizewinner->shared,
            ];
        }

        return collect($output);
    }

    public function headings(): array
    {
        return [
            'id',
            'code_id',
            'prize_id',
            'email',
            'shared',
        ];
    }
}
