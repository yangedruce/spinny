<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersCodeExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    use Exportable;

    protected $usercodes;

    public function __construct($usercodes)
    {
        $this->usercodes = $usercodes;
    }

    public function collection()
    {
        $output = [];

        foreach ($this->usercodes as $usercode) {
            $output[] = [
                $usercode->id,
                $usercode->user_code,
                $usercode->name,
                $usercode->phone,
                $usercode->email,
                $usercode->validation ? 'Yes' : 'No',
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
