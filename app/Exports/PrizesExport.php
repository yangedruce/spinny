<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PrizesExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    use Exportable;

    protected $prizes;

    public function __construct($prizes)
    {
        $this->prizes = $prizes;
    }

    public function collection()
    {
        $output = [];

        foreach ($this->prizes as $prize) {
            $output[] = [
                $prize->id,
                $prize->code,
                $prize->name,
                $prize->total_count,
                $prize->remaining,
            ];
        }

        return collect($output);
    }

    public function headings(): array
    {
        return [
            'id',
            'code',
            'name',
            'total_count',
            'remaining',
        ];
    }
}
