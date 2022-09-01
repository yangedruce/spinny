<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Prize;
use App\Exports\PrizesCodeExport;
use Maatwebsite\Excel\Facades\Excel;


class PrizesCodeExportController extends Controller
{
    public function export()
    {
        $prizes = Prize::query()->get(['id', 'prize_code', 'prize_name', 'total_count', 'remaining']);
        return Excel::download(new PrizesCodeExport($prizes ?? []), 'prizes_code.xlsx');
    }
}
