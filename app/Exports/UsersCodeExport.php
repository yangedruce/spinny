<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersCodeExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    use Exportable;

    protected $codes;

    public function __construct($codes)
    {
        $this->codes = $codes;
    }

    public function collection()
    {
        $output = [];

        foreach ($this->codes as $code) {
            $output[] = [
                $code->id,
                $code->user_code,
                $code->name,
                $code->phone,
                $code->email,
                $code->validation ? 'Yes' : 'No',
            ];
        }

        return collect($output);
    }

    public function headings(): array
    {
        return [
            'id',
            'user_code',
            'name',
            'phone',
            'email',
            'validation',
        ];
    }
}
